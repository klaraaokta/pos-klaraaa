<?php

namespace App\Http\Controllers;

use App\Models\ItemPenjualan;
use App\Models\Penjualan;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ItemPenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            // FIX: wajibkan sale_id dari form, jangan menebak sale OPEN "pertama".
            'sale_id'    => 'required|exists:penjualan,id',
            'product_id' => 'required|exists:produk,id',
            'quantity'   => 'required|integer|min:1'
        ]);

        // FIX: validasi stok dipindah SEBELUM transaction, supaya redirect
        // dengan pesan error benar-benar jalan (return di dalam closure
        // transaction tidak menghentikan method).
        $product = Produk::findOrFail($request->product_id);

        if ($product->stok < $request->quantity) {
            return back()->with('errors', 'Produk stok tidak mencukupi');
        }

        DB::transaction(function () use ($request) {

            // FIX: ambil sale berdasarkan id yang dikirim dari form,
            // bukan sekadar "OPEN pertama milik user".
            $sale = Penjualan::where('id', $request->sale_id)
                ->where('user_id', Auth::id())
                ->where('status', 'OPEN')
                ->lockForUpdate()
                ->firstOrFail();

            $product = Produk::lockForUpdate()->findOrFail($request->product_id);

            // Cek Stok lagi di dalam transaction (guard terhadap race condition)
            if ($product->stok < $request->quantity) {
                abort(422, 'Produk stok tidak mencukupi');
            }

            // Kurangi Stok
            $product->decrement('stok', $request->quantity);

            // + Update / insert item penjualan
            $item = ItemPenjualan::where('penjualan_id', $sale->id)
                ->where('produk_id', $product->id)
                ->lockForUpdate()
                ->first();

            if ($item) {
                // UPDATE
                $item->kuantitas += $request->quantity;
            } else {
                // CREATE
                $item = new ItemPenjualan([
                    'penjualan_id' => $sale->id,
                    'produk_id'    => $product->id,
                    'kuantitas'    => $request->quantity,
                    'harga_satuan' => $product->harga_jual,
                ]);
            }

            // hitung subtotal setelah kuantitas fix
            $item->subtotal = $item->kuantitas * $item->harga_satuan;
            $item->save();

            // TOTAL PEMBAYARAN
            $sale->total_pembayaran = $sale->itemPenjualan()->sum('subtotal');
            $sale->save();
        });

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ItemPenjualan $itempenjualan)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $produk  = $itempenjualan->produk;
        $selisih = $request->quantity - $itempenjualan->kuantitas;

        // FIX: validasi stok sebelum transaction
        if ($selisih > 0 && $produk->stok < $selisih) {
            return back()->with('errors', 'Stok tidak mencukupi');
        }

        DB::transaction(function () use ($request, $itempenjualan, $selisih) {

            $produk = $itempenjualan->produk()->lockForUpdate()->first();

            // Jika qty bertambah -> kurangi stok
            if ($selisih > 0) {
                if ($produk->stok < $selisih) {
                    abort(422, 'Stok tidak mencukupi');
                }
                $produk->decrement('stok', $selisih);
            }

            // Jika qty berkurang -> kembalikan stok
            if ($selisih < 0) {
                $produk->increment('stok', abs($selisih));
            }

            // Update Item
            $itempenjualan->update([
                'kuantitas' => $request->quantity,
                'subtotal'  => $request->quantity * $itempenjualan->harga_satuan
            ]);

            // Update total penjualan
            $itempenjualan->penjualan->update([
                'total_pembayaran' =>
                $itempenjualan->penjualan->itemPenjualan()->sum('subtotal')
            ]);
        });

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ItemPenjualan $itempenjualan)
    {
        $this->authorize('delete', $itempenjualan);

        DB::transaction(function () use ($itempenjualan) {

            $produk = $itempenjualan->produk;
            $sale   = $itempenjualan->penjualan;

            // Kembalikan stok
            $produk->increment('stok', $itempenjualan->kuantitas);

            // Hapus item
            $itempenjualan->delete();

            // Update total penjualan
            $sale->update([
                'total_pembayaran' => $sale->itemPenjualan()->sum('subtotal')
            ]);
        });

        return back();
    }
}