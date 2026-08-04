<!-- memanggil file app.blade.php -->
@extends('layouts.app')

<!-- mengirimkan nilai ke tittle untuk ditampilkan -->
@section('title', 'Login')

<!-- batas awal isi konten -->
@section('content')

    @include('layouts.navbar')

    <div class="text-center dashboard-content">
        <h1 class="dashboard-title">
            Ringkasan Hari Ini
            <small class="text-muted">
                ({{ $tanggalHariIni->translatedFormat('l, d F Y') }})
            </small>
        </h1>
        <div class="row g-3 dashboard-row">
            @can('viewAny', App\Models\User::class)
                <div class="col-md-12">
                    <h1 class="section-title">Today's Sales</h1>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Total Nilai Penjualan Hari Ini</div>
                        <div class="card-body">
                            <h5 class="card-title">Rp {{ number_format($ringkasan['total_penjualan']) }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Jumlah Transaksi Hari Ini</div>
                        <div class="card-body">
                            <h5 class="card-title">Rp {{ $ringkasan['total_transaksi'] }}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-3 dashboard-row">
                <div class="col-md-12">
                    <h1 class="section-title">Cash & Payment Status</h1>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Total Pembayaran Tunai</div>
                        <div class="card-body">
                            <h5 class="card-title">Rp {{ number_format($ringkasan['total_cash']) }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Total Pembayaran Non-Tunai</div>
                        <div class="card-body">
                            <h5 class="card-title">Rp {{ number_format($ringkasan['total_non_tunai']) }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        @endcan
        <div class="row g-4 dashboard-row">
            <div class="col-md-12">
                <h1 class="section-title">Critical Inventory Status</h1>
            </div>
            <div class="col-md-6">
                <h3 class="table-subtitle">Daftar Produk Stok Rendah</h3>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Stok</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($produkStokRendah as $index => $produk)
                                <tr>
                                    <td>{{ $produkStokRendah->firstItem() + $index }}</td>
                                    <td>{{ $produk->nama }}</td>
                                    <td>{{ $produk->stok }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-muted text-center">
                                        Seluruh produk berada dalam kondisi stok aman
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                {{ $produkStokRendah->links() }}
            </div>
            <div class="col-md-6">
                <h3 class="table-subtitle">Produk Habis Stok</h3>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Stok</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($produkStokHabis as $index => $produk)
                                <tr>
                                    <td>{{ $produkStokHabis->firstItem() + $index }}</td>
                                    <td>{{ $produk->nama }}</td>
                                    <td>{{ $produk->stok }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-muted text-center">
                                        Seluruh produk berada dalam kondisi stok aman
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                {{ $produkStokHabis->links() }}
            </div>
        </div>
        <div class="row g-4 dashboard-row">
            <div class="col-md-12">
                <h1 class="section-title">Best Seller Products</h1>
            </div>
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nama</th>
                                <th scope="col">Stok</th>
                                <th scope="col">Unit Terjual</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($produkTerlaris as $produk)
                                <tr>
                                    <td>{{ $produk->nama }}</td>
                                    <td>{{ $produk->stok }}</td>
                                    <td>{{ $produk->total_terjual }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-muted text-center">
                                        Seluruh produk berada dalam kondisi stok aman
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- batas akhir isi konten -->
@endsection
