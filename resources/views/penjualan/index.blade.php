@extends('layouts.app')

@section('title', 'Penjualan')

@push('styles')
    <style>
        body {
            background-color: #f8fafc;
        }

        .penjualan-page-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem 1rem 4rem;
        }

        .penjualan-header {
            display: flex;
            align-items: baseline;
            gap: 0.6rem;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
        }

        .page-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #0f172a;
            letter-spacing: -0.01em;
            margin-bottom: 0;
        }

        .penjualan-count {
            font-size: 0.85rem;
            font-weight: 500;
            color: #94a3b8;
        }

        .penjualan-page-content .alert-danger {
            background-color: #fef2f2;
            color: #b91c1c;
            border: 1px solid #fecaca;
            border-radius: 10px;
            font-size: 0.875rem;
            font-weight: 500;
            padding: 0.85rem 1.1rem;
            margin-bottom: 1.25rem;
        }

        .penjualan-toolbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
        }

        .penjualan-toolbar .btn-primary {
            background-color: #4f46e5;
            border-color: #4f46e5;
            font-size: 0.85rem;
            font-weight: 600;
            padding: 0.55rem 1.2rem;
            border-radius: 8px;
            box-shadow: 0 1px 2px rgba(79, 70, 229, 0.25);
            order: 2;
        }

        .penjualan-toolbar .btn-primary:hover {
            background-color: #4338ca;
            border-color: #4338ca;
        }

        .penjualan-search {
            flex: 1;
            min-width: 220px;
            max-width: 340px;
            order: 1;
        }

        .penjualan-search .form-control {
            font-size: 0.82rem;
            border: 1px solid #e2e8f0;
            background-color: #f8fafc;
            padding: 0.5rem 0.85rem;
        }

        .penjualan-search .form-control:focus {
            border-color: #4f46e5;
            background-color: #ffffff;
            box-shadow: 0 0 0 3px #eef2ff;
        }

        .penjualan-search .btn-outline-secondary {
            font-size: 0.82rem;
            border-color: #e2e8f0;
            background-color: #f8fafc;
            color: #94a3b8;
        }

        .penjualan-search .btn-outline-secondary:hover {
            background-color: #4f46e5;
            border-color: #4f46e5;
            color: #ffffff;
        }

        .penjualan-page-content .table-responsive {
            border: 1px solid #eef0f4;
            border-radius: 12px;
            overflow: hidden;
            background-color: #ffffff;
            box-shadow: 0 1px 2px rgba(15, 23, 42, 0.04);
        }

        .penjualan-page-content .table {
            font-size: 0.85rem;
            margin-bottom: 0;
        }

        .penjualan-page-content .table thead th {
            background-color: #f8fafc;
            color: #64748b;
            font-weight: 600;
            font-size: 0.72rem;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            border-bottom: 1px solid #eef0f4;
            padding: 0.8rem 1rem;
            white-space: nowrap;
        }

        .penjualan-page-content .table tbody td,
        .penjualan-page-content .table tbody th {
            padding: 0.7rem 1rem;
            vertical-align: middle;
            color: #334155;
            border-bottom: 1px solid #f8fafc;
        }

        .penjualan-page-content .table tbody tr:last-child td {
            border-bottom: none;
        }

        .penjualan-page-content .table tbody tr:hover {
            background-color: #f8fafc;
        }

        .penjualan-page-content .table tbody th:first-child {
            color: #cbd5e1;
            font-size: 0.78rem;
            font-weight: 500;
        }

        .penjualan-tanggal {
            color: #64748b;
            font-size: 0.82rem;
        }

        .penjualan-kasir {
            color: #94a3b8;
            font-size: 0.82rem;
        }

        .penjualan-total {
            font-weight: 700;
            color: #0f172a;
            font-size: 0.9rem;
        }

        .metode-badge {
            display: inline-block;
            padding: 0.2rem 0.65rem;
            border-radius: 999px;
            font-size: 0.72rem;
            font-weight: 700;
            background-color: #eef2ff;
            color: #4338ca;
            text-transform: capitalize;
        }

        .status-badge {
            display: inline-block;
            padding: 0.2rem 0.65rem;
            border-radius: 999px;
            font-size: 0.72rem;
            font-weight: 700;
            text-transform: capitalize;
        }

        .status-badge.lunas,
        .status-badge.selesai,
        .status-badge.paid {
            background-color: #dcfce7;
            color: #15803d;
        }

        .status-badge.pending,
        .status-badge.menunggu {
            background-color: #fef3c7;
            color: #b45309;
        }

        .status-badge.batal,
        .status-badge.cancelled,
        .status-badge.gagal {
            background-color: #fee2e2;
            color: #b91c1c;
        }

        .action-group {
            display: flex;
            gap: 0.4rem;
            flex-wrap: wrap;
        }

        .action-group .btn-primary {
            font-size: 0.78rem;
            padding: 0.32rem 0.75rem;
            border-radius: 6px;
        }

        .action-group .btn-warning {
            background-color: transparent;
            border-color: #f59e0b;
            color: #b45309;
        }

        .action-group .btn-warning:hover {
            background-color: #f59e0b;
            color: #ffffff;
        }

        .action-group .btn-danger {
            background-color: transparent;
            border-color: #dc2626;
            color: #dc2626;
        }

        .action-group .btn-danger:hover {
            background-color: #dc2626;
            color: #ffffff;
        }

        .penjualan-empty {
            padding: 3rem 1rem;
            text-align: center;
            color: #94a3b8;
        }

        .penjualan-empty i {
            font-size: 2rem;
            display: block;
            margin-bottom: 0.5rem;
        }

        @media (max-width: 991.98px) {
            .penjualan-page-content {
                padding: 1.5rem 1rem 3rem;
            }
        }

        @media (max-width: 767.98px) {
            .penjualan-page-content {
                padding: 1.25rem 0.85rem 3rem;
            }

            .page-title {
                font-size: 1.25rem;
            }

            .penjualan-toolbar {
                flex-direction: column;
                align-items: stretch;
            }

            .penjualan-toolbar .btn-primary {
                order: 1;
                width: 100%;
                text-align: center;
            }

            .penjualan-search {
                order: 2;
                max-width: 100%;
            }

            .penjualan-page-content .table-responsive {
                border: none;
                box-shadow: none;
                background-color: transparent;
                overflow: visible;
            }

            .penjualan-page-content .table {
                border: none;
            }

            .penjualan-page-content .table thead {
                display: none;
            }

            .penjualan-page-content .table tbody {
                display: flex;
                flex-direction: column;
                gap: 0.75rem;
            }

            .penjualan-page-content .table tbody tr {
                display: flex;
                flex-direction: column;
                background-color: #ffffff;
                border: 1px solid #eef0f4;
                border-radius: 12px;
                box-shadow: 0 1px 2px rgba(15, 23, 42, 0.04);
                padding: 0.9rem 1rem;
            }

            .penjualan-page-content .table tbody td,
            .penjualan-page-content .table tbody th {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 0.75rem;
                padding: 0.4rem 0;
                border-bottom: 1px dashed #f1f5f9;
                text-align: right;
            }

            .penjualan-page-content .table tbody tr td:last-child,
            .penjualan-page-content .table tbody tr th:last-child {
                border-bottom: none;
            }

            .penjualan-page-content .table tbody td::before,
            .penjualan-page-content .table tbody th::before {
                content: attr(data-label);
                font-size: 0.7rem;
                font-weight: 700;
                text-transform: uppercase;
                letter-spacing: 0.04em;
                color: #94a3b8;
                text-align: left;
            }

            .penjualan-page-content .table tbody th:first-child {
                justify-content: flex-start;
                font-weight: 700;
                color: #4f46e5;
            }

            .penjualan-page-content .table tbody th:first-child::before {
                content: "#";
            }

            .penjualan-page-content .table tbody td[colspan]::before {
                content: none;
            }

            .penjualan-page-content .table tbody td[colspan] {
                justify-content: center;
            }

            .action-group {
                justify-content: flex-end;
                width: 100%;
            }

            .action-group .btn {
                flex: 1;
                text-align: center;
            }

            .alert-success {
                background-color: #eef2ff;
                color: #4338ca;
                border: 1px solid #c7d2fe;
                border-radius: 10px;
                font-size: 0.875rem;
                font-weight: 500;
                padding: 0.85rem 1.25rem;
                margin: 1rem auto 0;
                max-width: 480px;
                text-align: center;
            }
        }

        @media (max-width: 400px) {
            .penjualan-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.2rem;
            }

            .penjualan-page-content .table tbody td,
            .penjualan-page-content .table tbody th {
                flex-direction: column;
                align-items: flex-start;
                text-align: left;
                gap: 0.15rem;
            }
        }
    </style>
@endpush

@section('content')

    @include('layouts.navbar')

    <div class="penjualan-page-content">
        @if (session('errors'))
            <div class="alert alert-danger">
                {{ session('errors') }}
            </div>
        @endif

        <div class="penjualan-header">
            <h1 class="page-title">Penjualan</h1>
            <span class="penjualan-count">{{ $sales->total() }} transaksi tercatat</span>
        </div>

        <div class="penjualan-toolbar">
            <form action="{{ route('penjualan.index') }}" method="GET" class="penjualan-search">
                <div class="input-group">
                    <input type="text" name="search" value="{{ request()->search }}" class="form-control"
                        placeholder="Cari penjualan...">
                    <button class="btn btn-outline-secondary" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>

            <a href="{{ route('penjualan.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> Tambah Penjualan
            </a>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tanggal Transaksi</th>
                        <th scope="col">Total Pembayaran</th>
                        <th scope="col">Metode Pembayaran</th>
                        <th scope="col">Status</th>
                        <th scope="col">Kasir</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($sales as $sale)
                        <tr>
                            <th scope="row" data-label="#">{{ $sales->firstItem() + $loop->index }}</th>
                            <td data-label="Tanggal" class="penjualan-tanggal">
                                {{ $sale->created_at->translatedFormat('d-m-Y H:i:s') }}
                            </td>
                            <td data-label="Total" class="penjualan-total">
                                Rp {{ number_format($sale->total_pembayaran) }}
                            </td>
                            <td data-label="Metode">
                                <span class="metode-badge">{{ $sale->metode_pembayaran }}</span>
                            </td>
                            <td data-label="Status">
                                <span class="status-badge {{ strtolower($sale->status) }}">{{ $sale->status }}</span>
                            </td>
                            <td data-label="Kasir" class="penjualan-kasir">{{ $sale->user->name }}</td>
                            <td data-label="Aksi">
                                <div class="action-group">
                                    <a href="" class="btn btn-primary">Detail</a>
                                    @can('view', $sale)
                                        <a href="{{ route('penjualan.edit', $sale) }}" class="btn btn-sm btn-warning">Edit</a>
                                    @endcan
                                    @can('delete', $sale)
                                        <form action="{{ route('penjualan.destroy', $sale) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger"
                                                onclick="return confirm('Apakah anda yakin akan menghapus penjualan ini?')">
                                                Hapus
                                            </button>
                                        </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">
                                <div class="penjualan-empty">
                                    <i class="bi bi-receipt"></i>
                                    Data penjualan tidak ditemukan
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $sales->links() }}
    </div>

@endsection
