@extends('layouts.app')

@section('title', 'Dashboard')

@push('styles')
    <style>
        body {
            background-color: #f8fafc;
        }

        .dashboard-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem 1rem 4rem;
            text-align: left;
        }

        .dashboard-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #0f172a;
            letter-spacing: -0.01em;
            margin-bottom: 0.15rem;
        }

        .dashboard-title small {
            display: block;
            font-size: 0.85rem;
            font-weight: 400;
            color: #94a3b8;
            margin-top: 0.35rem;
        }

        .dashboard-row {
            margin-bottom: 0.25rem;
        }

        .dashboard-section {
            margin-top: 2.5rem;
        }

        .dashboard-section:first-of-type {
            margin-top: 2rem;
        }

        .section-title {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            font-size: 0.8rem;
            font-weight: 700;
            color: #475569;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            margin-bottom: 1rem;
            padding-bottom: 0.6rem;
            border-bottom: 2px solid #e2e8f0;
            text-align: left;
        }

        .table-subtitle {
            font-size: 0.9rem;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 0.75rem;
        }

        /* ---------- Stat card: base ---------- */
        .dashboard-content .card {
            border: 1px solid #eef0f4;
            border-left: 3px solid #4f46e5;
            border-radius: 12px;
            box-shadow: 0 1px 2px rgba(15, 23, 42, 0.04);
            height: 100%;
            transition: box-shadow 0.15s ease;
        }

        .dashboard-content .card:hover {
            box-shadow: 0 4px 14px rgba(15, 23, 42, 0.06);
        }

        .dashboard-content .card-header {
            background-color: #ffffff;
            border-bottom: none;
            font-size: 0.78rem;
            font-weight: 600;
            color: #64748b;
            padding: 1.1rem 1.25rem 0.2rem;
        }

        .dashboard-content .card-body {
            padding: 0.3rem 1.25rem 1.35rem;
        }

        .dashboard-content .card-title {
            font-size: 1.55rem;
            font-weight: 700;
            color: #0f172a;
            letter-spacing: -0.01em;
            margin-bottom: 0;
            font-variant-numeric: tabular-nums;
        }

        .dashboard-content .card-title.card-price {
            color: #4f46e5;
        }

        /* ---------- Stat card: featured (metrik paling penting) ---------- */
        .dashboard-content .card.card-featured {
            border-left-width: 5px;
            background-color: #fbfbff;
        }

        .card-featured .card-header {
            background-color: transparent;
            font-weight: 700;
            color: #4338ca;
        }

        .card-featured .card-title {
            font-size: 1.7rem;
        }

        /* ---------- Table (default: tablet & up) ---------- */
        .dashboard-content .table-responsive {
            border: 1px solid #eef0f4;
            border-radius: 12px;
            overflow: hidden;
            background-color: #ffffff;
            box-shadow: 0 1px 2px rgba(15, 23, 42, 0.04);
        }

        .dashboard-content .table {
            font-size: 0.85rem;
            margin-bottom: 0;
        }

        .dashboard-content .table thead th {
            background-color: #f8fafc;
            color: #64748b;
            font-weight: 600;
            font-size: 0.72rem;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            border-bottom: 1px solid #eef0f4;
            padding: 0.75rem 1rem;
            white-space: nowrap;
        }

        .dashboard-content .table thead th:first-child {
            width: 48px;
            color: #cbd5e1;
        }

        .dashboard-content .table tbody td {
            padding: 0.7rem 1rem;
            vertical-align: middle;
            color: #334155;
            border-bottom: 1px solid #f8fafc;
        }

        .dashboard-content .table tbody tr:last-child td {
            border-bottom: none;
        }

        .dashboard-content .table tbody td:first-child {
            color: #cbd5e1;
            font-size: 0.78rem;
        }

        .dashboard-content .table tbody td:nth-child(2) {
            font-weight: 600;
            color: #0f172a;
        }

        .dashboard-content .table tbody tr:hover {
            background-color: #f8fafc;
        }

        .stock-badge {
            display: inline-block;
            padding: 0.2rem 0.65rem;
            border-radius: 999px;
            font-size: 0.75rem;
            font-weight: 700;
        }

        .stock-badge.low {
            background-color: #fef3c7;
            color: #b45309;
        }

        .stock-badge.out {
            background-color: #fee2e2;
            color: #b91c1c;
        }

        .dashboard-content .pagination {
            margin-top: 0.9rem;
            font-size: 0.8rem;
        }

        /* =========================================================
               RESPONSIVE — TABLET (≤ 991.98px)
               ========================================================= */
        @media (max-width: 991.98px) {
            .dashboard-content {
                padding: 1.75rem 1rem 3.5rem;
            }

            .dashboard-content .card-body {
                padding: 0.3rem 1rem 1.15rem;
            }
        }

        /* =========================================================
               RESPONSIVE — MOBILE (≤ 767.98px)
               ========================================================= */
        @media (max-width: 767.98px) {
            .dashboard-content {
                padding: 1.25rem 0.85rem 3rem;
            }

            .dashboard-title {
                font-size: 1.2rem;
            }

            .dashboard-section {
                margin-top: 1.75rem;
            }

            .dashboard-content .card-title {
                font-size: 1.3rem;
            }

            .card-featured .card-title {
                font-size: 1.45rem;
            }

            .dashboard-content .table-responsive {
                border: none;
                box-shadow: none;
                background-color: transparent;
                overflow: visible;
            }

            .dashboard-content .table {
                border: none;
            }

            .dashboard-content .table thead {
                display: none;
            }

            .dashboard-content .table tbody {
                display: flex;
                flex-direction: column;
                gap: 0.6rem;
            }

            .dashboard-content .table tbody tr {
                display: flex;
                flex-direction: column;
                background-color: #ffffff;
                border: 1px solid #eef0f4;
                border-radius: 10px;
                box-shadow: 0 1px 2px rgba(15, 23, 42, 0.04);
                padding: 0.7rem 0.9rem;
            }

            .dashboard-content .table tbody td {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 0.75rem;
                padding: 0.3rem 0;
                border-bottom: 1px dashed #f1f5f9;
                text-align: right;
            }

            .dashboard-content .table tbody tr td:last-child {
                border-bottom: none;
            }

            .dashboard-content .table tbody td::before {
                content: attr(data-label);
                font-size: 0.68rem;
                font-weight: 700;
                text-transform: uppercase;
                letter-spacing: 0.04em;
                color: #94a3b8;
                text-align: left;
            }

            .dashboard-content .table tbody td:first-child {
                display: none;
            }
        }
    </style>
@endpush

@section('content')

    @include('layouts.navbar')

    <div class="text-center dashboard-content">
        <h1 class="dashboard-title">
            Ringkasan Hari Ini
            <small class="text-muted">
                {{ $tanggalHariIni->translatedFormat('l, d F Y') }}
            </small>
        </h1>

        @can('viewAny', App\Models\User::class)
            <div class="dashboard-section">
                <div class="row g-3 dashboard-row">
                    <div class="col-md-12">
                        <h1 class="section-title">Today's Sales</h1>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="card card-featured">
                            <div class="card-header">Total Nilai Penjualan Hari Ini</div>
                            <div class="card-body">
                                <h5 class="card-title card-price">Rp {{ number_format($ringkasan['total_penjualan']) }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="card">
                            <div class="card-header">Jumlah Transaksi Hari Ini</div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $ringkasan['total_transaksi'] }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="dashboard-section">
                <div class="row g-3 dashboard-row">
                    <div class="col-md-12">
                        <h1 class="section-title">Cash & Payment Status</h1>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="card">
                            <div class="card-header">Total Pembayaran Tunai</div>
                            <div class="card-body">
                                <h5 class="card-title card-price">Rp {{ number_format($ringkasan['total_cash']) }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="card">
                            <div class="card-header">Total Pembayaran Non-Tunai</div>
                            <div class="card-body">
                                <h5 class="card-title card-price">Rp {{ number_format($ringkasan['total_non_tunai']) }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endcan

        <div class="dashboard-section">
            <div class="row g-4 dashboard-row">
                <div class="col-md-12">
                    <h1 class="section-title">Critical Inventory Status</h1>
                </div>
                <div class="col-12 col-md-6">
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
                                        <td data-label="#">{{ $produkStokRendah->firstItem() + $index }}</td>
                                        <td data-label="Nama">{{ $produk->nama }}</td>
                                        <td data-label="Stok"><span class="stock-badge low">{{ $produk->stok }}</span>
                                        </td>
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
                <div class="col-12 col-md-6">
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
                                        <td data-label="#">{{ $produkStokHabis->firstItem() + $index }}</td>
                                        <td data-label="Nama">{{ $produk->nama }}</td>
                                        <td data-label="Stok"><span class="stock-badge out">{{ $produk->stok }}</span>
                                        </td>
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
        </div>

        <div class="dashboard-section">
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
                                        <td data-label="Nama">{{ $produk->nama }}</td>
                                        <td data-label="Stok">{{ $produk->stok }}</td>
                                        <td data-label="Unit Terjual">{{ $produk->total_terjual }}</td>
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
    </div>

@endsection
