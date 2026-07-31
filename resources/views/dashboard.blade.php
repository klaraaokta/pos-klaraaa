<!-- memanggil file app.blade.php -->
@extends('layouts.app')

<!-- mengirimkan nilai ke tittle untuk ditampilkan -->
@section('title', 'Login')

@push('styles')
    <style>
        body {
            background: linear-gradient(180deg, #F4F5F7 0%, #E9EBEE 100%);
            min-height: 100vh;
        }

        /* Alert status (mis. "Selamat Datang") — disamakan tema abu profesional */
        .alert-success {
            background: #F8F9FA !important;
            border: 1px solid #E3E5E9 !important;
            border-left: 4px solid #3A4150 !important;
            color: #2B3040 !important;
            border-radius: 10px !important;
            box-shadow: 0 1px 2px rgba(16, 24, 40, 0.04);
            width: 100%;
            margin: 1.25rem auto !important;
            padding: .8rem 1.1rem !important;
            font-size: .85rem;
        }

        @media (max-width: 576px) {
            .alert-success {
                margin: .75rem auto !important;
                padding: .65rem .85rem !important;
                font-size: .78rem;
            }
        }

        .dashboard-content {
            padding-bottom: 3rem;
        }

        /* Judul utama halaman */
        .dashboard-title {
            font-size: clamp(1.15rem, 3.6vw, 1.55rem);
            font-weight: 700;
            color: #2B3040;
            margin: 1.75rem 0 2rem;
        }

        .dashboard-title small {
            display: block;
            font-size: clamp(.72rem, 2.2vw, .82rem);
            font-weight: 400;
            color: #6B7280;
            margin-top: .3rem;
        }

        /* Judul tiap section (Today's Sales, Cash & Payment, dst) */
        .section-title {
            font-size: clamp(.9rem, 2.6vw, 1.05rem);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: .04em;
            color: #6B7280;
            margin: 0 0 1.1rem;
            padding-bottom: .6rem;
            border-bottom: 1px solid #E3E5E9;
        }

        .dashboard-row {
            margin-top: 2.75rem;
        }

        .dashboard-row:first-of-type {
            margin-top: 0;
        }

        /* Card ringkasan angka */
        .card {
            border: 1px solid #E3E5E9;
            border-radius: 12px;
            box-shadow: 0 1px 2px rgba(16, 24, 40, 0.04), 0 8px 20px -10px rgba(16, 24, 40, 0.08);
            margin-bottom: 1rem;
            overflow: hidden;
        }

        .card-header {
            background: #F8F9FA;
            border-bottom: 1px solid #E3E5E9;
            font-size: .74rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: .03em;
            color: #6B7280;
            padding: .75rem .9rem;
        }

        .card-body {
            padding: 1rem .9rem;
        }

        .card-title {
            font-size: clamp(1rem, 3vw, 1.25rem);
            font-weight: 700;
            color: #2B3040;
            margin: 0;
        }

        /* Sub judul tabel */
        .table-subtitle {
            font-size: .82rem;
            font-weight: 600;
            color: #3A4150;
            margin-bottom: .85rem;
            text-align: left;
        }

        /* Tabel */
        .table-responsive {
            border-radius: 10px;
            box-shadow: 0 1px 2px rgba(16, 24, 40, 0.04);
            margin-bottom: .75rem;
        }

        .table {
            background: #fff;
            font-size: .8rem;
            margin-bottom: 0;
        }

        .table thead th {
            background: #F8F9FA;
            color: #6B7280;
            font-size: .68rem;
            text-transform: uppercase;
            letter-spacing: .04em;
            font-weight: 600;
            border-bottom: 2px solid #E3E5E9;
            padding: .6rem .7rem;
            white-space: nowrap;
        }

        .table tbody td {
            padding: .55rem .7rem;
            border-color: #EEF0F2;
            vertical-align: middle;
            color: #2B3040;
        }

        .table tbody tr:hover {
            background: #F8F9FA;
        }

        /* Jarak antar kolom di dalam satu row */
        .dashboard-row.row,
        .dashboard-row .row {
            row-gap: 1rem;
        }

        @media (max-width: 767px) {
            .dashboard-row {
                margin-top: 2rem;
            }

            .table {
                font-size: .74rem;
            }

            .card-body {
                padding: .85rem .8rem;
            }
        }
    </style>
@endpush

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