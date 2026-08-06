@extends('layouts.app')

@section('title', 'POS')

@push('styles')
    <style>
        body {
            background-color: #f8fafc;
        }

        .pos-page-content {
            max-width: 1300px;
            margin: 0 auto;
            padding: 1.5rem 1rem 4rem;
        }

        .pos-page-content .alert-danger {
            background-color: #fef2f2;
            color: #b91c1c;
            border: 1px solid #fecaca;
            border-radius: 10px;
            font-size: 0.875rem;
            font-weight: 500;
            padding: 0.85rem 1.1rem;
            margin-bottom: 1.25rem;
        }

        .pos-title {
            font-size: 1.35rem;
            font-weight: 700;
            color: #0f172a;
            letter-spacing: -0.01em;
            margin-bottom: 1.25rem;
        }

        /* ---------- Card base ---------- */
        .pos-page-content .card {
            border: 1px solid #eef0f4;
            border-radius: 14px;
            box-shadow: 0 1px 3px rgba(15, 23, 42, 0.05);
            overflow: hidden;
        }

        /* =========================================================
           KOLOM PRODUK (kiri)
           ========================================================= */
        .produk-panel-header {
            padding: 0.9rem 1rem 0;
        }

        .produk-panel-header .form-control {
            font-size: 0.85rem;
            border: 1px solid #e2e8f0;
            background-color: #f8fafc;
            padding: 0.6rem 0.9rem 0.6rem 2.2rem;
            border-radius: 8px;
        }

        .produk-search-wrap {
            position: relative;
        }

        .produk-search-wrap i {
            position: absolute;
            left: 0.75rem;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 0.85rem;
        }

        .produk-panel-header .form-control:focus {
            border-color: #4f46e5;
            background-color: #ffffff;
            box-shadow: 0 0 0 3px #eef2ff;
        }

        .produk-list {
            max-height: 65vh;
            overflow-y: auto;
            padding: 0.75rem 1rem 1rem;
        }

        .produk-item-form {
            display: flex;
            gap: 0.5rem;
            align-items: stretch;
            margin-bottom: 0.6rem;
        }

        .produk-item-btn {
            display: flex;
            align-items: center;
            gap: 0.65rem;
            width: 100%;
            text-align: left;
            padding: 0.55rem 0.75rem;
            border: 1px solid #eef0f4;
            background-color: #ffffff;
            border-radius: 10px;
            transition: border-color 0.15s ease, background-color 0.15s ease;
        }

        .produk-item-btn:hover:not(.disabled) {
            border-color: #4f46e5;
            background-color: #f5f5ff;
        }

        .produk-item-btn.disabled {
            opacity: 0.5;
            pointer-events: none;
        }

        .produk-item-thumb {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            object-fit: cover;
            flex-shrink: 0;
            border: 1px solid #eef0f4;
        }

        .produk-item-nama {
            font-size: 0.85rem;
            font-weight: 600;
            color: #0f172a;
            line-height: 1.2;
        }

        .produk-item-harga {
            font-size: 0.76rem;
            color: #64748b;
        }

        .produk-item-qty {
            width: 64px;
            flex-shrink: 0;
        }

        .produk-item-qty .form-control {
            height: 100%;
            text-align: center;
            font-size: 0.85rem;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            padding: 0.4rem;
        }

        .produk-item-qty .form-control:focus {
            border-color: #4f46e5;
            box-shadow: 0 0 0 3px #eef2ff;
        }

        .produk-item-add {
            width: 42px;
            flex-shrink: 0;
            background-color: #4f46e5;
            border-color: #4f46e5;
            border-radius: 8px;
            font-weight: 700;
        }

        .produk-item-add:hover {
            background-color: #4338ca;
            border-color: #4338ca;
        }

        /* =========================================================
           KOLOM KERANJANG (kanan)
           ========================================================= */
        .keranjang-header {
            padding: 0.9rem 1rem;
            border-bottom: 1px solid #eef0f4;
            font-size: 0.8rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            color: #64748b;
        }

        .pos-page-content .table {
            font-size: 0.83rem;
            margin-bottom: 0;
        }

        .pos-page-content .table thead th {
            background-color: #f8fafc;
            color: #64748b;
            font-weight: 600;
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            border-bottom: 1px solid #eef0f4;
            padding: 0.65rem 0.85rem;
        }

        .pos-page-content .table tbody td {
            padding: 0.6rem 0.85rem;
            vertical-align: middle;
            color: #334155;
            border-bottom: 1px solid #f8fafc;
        }

        .cart-item-nama {
            font-weight: 600;
            color: #0f172a;
        }

        .cart-item-subtotal {
            font-weight: 700;
            color: #4338ca;
        }

        .cart-qty-input {
            width: 60px;
            font-size: 0.82rem;
            padding: 0.3rem 0.4rem;
            border-radius: 6px;
        }

        .cart-item-hapus {
            font-size: 0.75rem;
            padding: 0.3rem 0.6rem;
            border-radius: 6px;
            background-color: transparent;
            border: 1px solid #dc2626;
            color: #dc2626;
        }

        .cart-item-hapus:hover {
            background-color: #dc2626;
            color: #ffffff;
        }

        .cart-empty {
            padding: 2.5rem 1rem;
            text-align: center;
            color: #94a3b8;
        }

        .cart-empty i {
            font-size: 1.8rem;
            display: block;
            margin-bottom: 0.5rem;
        }

        /* ---------- Footer: Total & Checkout (paling penting) ---------- */
        .keranjang-footer {
            background-color: #ffffff;
            border-top: 1px solid #eef0f4;
            padding: 1.1rem 1.1rem 1.25rem;
        }

        .keranjang-total-row {
            display: flex;
            align-items: baseline;
            justify-content: space-between;
            margin-bottom: 1rem;
        }

        .keranjang-total-label {
            font-size: 0.78rem;
            font-weight: 600;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .keranjang-total-value {
            font-size: 1.65rem;
            font-weight: 800;
            color: #0f172a;
            letter-spacing: -0.02em;
        }

        .keranjang-footer .form-select {
            font-size: 0.85rem;
            padding: 0.55rem 0.85rem;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            margin-bottom: 0.7rem;
        }

        .keranjang-footer .form-select:focus {
            border-color: #4f46e5;
            box-shadow: 0 0 0 3px #eef2ff;
        }

        /* Checkout = aksi paling dominan di seluruh halaman */
        .btn-checkout {
            background-color: #16a34a;
            border-color: #16a34a;
            font-size: 0.95rem;
            font-weight: 700;
            padding: 0.75rem 0;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(22, 163, 74, 0.3);
            letter-spacing: 0.01em;
        }

        .btn-checkout:hover:not(.disabled) {
            background-color: #15803d;
            border-color: #15803d;
        }

        .btn-checkout.disabled {
            opacity: 0.5;
        }

        /* Batal Transaksi = aksi destruktif, sengaja diredupkan */
        .btn-batal {
            background-color: transparent;
            border: 1px solid #e2e8f0;
            color: #94a3b8;
            font-size: 0.8rem;
            font-weight: 500;
            padding: 0.55rem 0;
            border-radius: 8px;
            margin-top: 0.6rem;
        }

        .btn-batal:hover:not(:disabled) {
            background-color: #fef2f2;
            border-color: #fecaca;
            color: #dc2626;
        }

        /* =========================================================
           RESPONSIVE — TABLET (≤ 991.98px)
           ========================================================= */
        @media (max-width: 991.98px) {
            .pos-page-content {
                padding: 1.25rem 1rem 3rem;
            }

            .produk-list {
                max-height: 50vh;
            }
        }

        /* =========================================================
           RESPONSIVE — MOBILE (≤ 767.98px)
           Kolom produk & keranjang jadi stack (produk dulu, baru keranjang)
           Table keranjang jadi card list
           ========================================================= */
        @media (max-width: 767.98px) {
            .pos-page-content {
                padding: 1rem 0.75rem 3rem;
            }

            .pos-title {
                font-size: 1.15rem;
            }

            .row > [class*="col-"] {
                margin-bottom: 1rem;
            }

            .row > [class*="col-"]:last-child {
                margin-bottom: 0;
            }

            .produk-list {
                max-height: 42vh;
            }

            .produk-item-nama {
                font-size: 0.82rem;
            }

            .produk-item-harga {
                font-size: 0.72rem;
            }

            /* Table keranjang -> card list */
            .pos-page-content .table {
                border: none;
            }

            .pos-page-content .table thead {
                display: none;
            }

            .pos-page-content .table tbody {
                display: flex;
                flex-direction: column;
                gap: 0.6rem;
                padding: 0.75rem;
            }

            .pos-page-content .table tbody tr {
                display: flex;
                flex-direction: column;
                background-color: #f8fafc;
                border: 1px solid #eef0f4;
                border-radius: 10px;
                padding: 0.7rem 0.85rem;
            }

            .pos-page-content .table tbody td {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 0.75rem;
                padding: 0.3rem 0;
                border-bottom: 1px dashed #e2e8f0;
                text-align: right;
            }

            .pos-page-content .table tbody tr td:last-child {
                border-bottom: none;
            }

            .pos-page-content .table tbody td::before {
                content: attr(data-label);
                font-size: 0.68rem;
                font-weight: 700;
                text-transform: uppercase;
                letter-spacing: 0.04em;
                color: #94a3b8;
                text-align: left;
            }

            .pos-page-content .table tbody td[colspan] {
                justify-content: center;
            }

            .pos-page-content .table tbody td[colspan]::before {
                content: none;
            }

            .keranjang-total-value {
                font-size: 1.4rem;
            }
        }

        /* =========================================================
           RESPONSIVE — SMALL MOBILE (≤ 400px)
           ========================================================= */
        @media (max-width: 400px) {
            .produk-item-form {
                flex-wrap: wrap;
            }

            .produk-item-btn {
                width: 100%;
            }

            .produk-item-qty,
            .produk-item-add {
                flex: 1;
                width: auto;
            }
        }
    </style>
@endpush

@section('content')

    <div class="pos-page-content">
        @if (session('errors'))
            <div class="alert alert-danger">
                {{ session('errors') }}
            </div>
        @endif

        <h4 class="pos-title">Tambah dan Edit</h4>

        <div class="row g-3">

            {{-- ================== PRODUK ================== --}}
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="produk-panel-header">
                        <form method="GET" action="{{ route('penjualan.create') }}" class="produk-search-wrap">
                            <i class="bi bi-search"></i>
                            <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                                placeholder="Cari produk..." onkeyup="this.form.submit()">
                        </form>
                    </div>

                    <div class="produk-list">
                        @foreach ($products as $product)
                            <form method="POST" action="{{ route('itempenjualan.store') }}" class="produk-item-form">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">

                                <button
                                    class="produk-item-btn {{ $sale->status === 'COMPLETED' ? 'disabled' : '' }}">
                                    <img src="{{ asset('storage/' . $product->foto) }}" alt="{{ $product->nama }}"
                                        class="produk-item-thumb">
                                    <div>
                                        <div class="produk-item-nama">{{ $product->nama }}</div>
                                        <div class="produk-item-harga">Rp
                                            {{ number_format($product->harga_jual) }}</div>
                                    </div>
                                </button>

                                <div class="produk-item-qty">
                                    <input type="number" name="quantity" value="1" min="1"
                                        class="form-control {{ $sale->status === 'COMPLETED' ? 'readonly' : '' }}">
                                </div>

                                <button
                                    class="btn btn-primary produk-item-add {{ $sale->status === 'COMPLETED' ? 'disabled' : '' }}">+</button>
                            </form>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- ================== KERANJANG ================== --}}
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="keranjang-header">
                        <i class="bi bi-cart3"></i> Keranjang
                    </div>

                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>Produk</th>
                                <th>Harga</th>
                                <th>Qty</th>
                                <th>Subtotal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($sale->itemPenjualan as $item)
                                <tr>
                                    <td data-label="Produk" class="cart-item-nama">{{ $item->produk->nama }}</td>
                                    <td data-label="Harga">Rp {{ number_format($item->produk->harga_jual) }}</td>
                                    <td data-label="Qty">
                                        <form method="POST"
                                            action="{{ route('itempenjualan.update', $item->id) }}">
                                            @csrf @method('PUT')
                                            <input type="number" name="quantity" value="{{ $item->kuantitas }}"
                                                class="form-control form-control-sm cart-qty-input">
                                        </form>
                                    </td>
                                    <td data-label="Subtotal" class="cart-item-subtotal">Rp
                                        {{ number_format($item->subtotal) }}</td>
                                    <td data-label="Aksi">
                                        @can('delete', $item)
                                            <form method="POST"
                                                action="{{ route('itempenjualan.destroy', $item->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn cart-item-hapus">Hapus</button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">
                                        <div class="cart-empty">
                                            <i class="bi bi-cart-x"></i>
                                            Keranjang kosong
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="keranjang-footer">
                        <div class="keranjang-total-row">
                            <span class="keranjang-total-label">Total</span>
                            <span class="keranjang-total-value">Rp
                                {{ number_format($sale->total_pembayaran) }}</span>
                        </div>

                        <form method="POST" action="{{ route('penjualan.update', $sale->id) }}"
                            onsubmit="return confirm('Yakin ingin checkout?')">
                            @csrf
                            @method('PUT')
                            <select name="payment_method" class="form-select" required>
                                <option value="" disabled selected>Pilih Pembayaran</option>
                                <option value="CASH">Cash</option>
                                <option value="QRIS">QRIS</option>
                            </select>
                            <button
                                class="btn btn-checkout w-100 {{ $sale->status === 'COMPLETED' ? 'disabled' : '' }}">
                                <i class="bi bi-check-circle-fill"></i> Checkout
                            </button>
                        </form>

                        @can('delete', $sale)
                            <form method="POST" action="{{ route('penjualan.destroy', $sale->id) }}"
                                onsubmit="return confirm('Yakin ingin membatalkan transaksi')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-batal w-100"
                                    {{ $sale->status === 'COMPLETED' ? 'disabled' : '' }}>
                                    Batal Transaksi
                                </button>
                            </form>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection