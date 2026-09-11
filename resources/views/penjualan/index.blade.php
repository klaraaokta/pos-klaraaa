@extends('layouts.app')

@section('title', 'Penjualan')
@push('styles')
    <style>
        body {
            background-color: #f8fafc;
        }

        .penjualan-page-content {
            max-width: 1150px;
            margin: 0 auto;
            padding: 1.5rem 1rem 3rem;
        }

        .penjualan-header {
            display: flex;
            align-items: baseline;
            gap: 0.6rem;
            margin-bottom: 1.25rem;
            flex-wrap: wrap;
        }

        .page-title {
            font-size: 1.2rem;
            font-weight: 700;
            color: #0f172a;
            letter-spacing: -0.01em;
            margin-bottom: 0;
        }

        .penjualan-count {
            font-size: 0.82rem;
            font-weight: 500;
            color: #8891a0;
        }

        .penjualan-page-content .alert-danger {
            background-color: #fef2f2;
            color: #b91c1c;
            border: 1px solid #fecaca;
            border-radius: 10px;
            font-size: 0.85rem;
            font-weight: 500;
            padding: 0.75rem 1rem;
            margin-bottom: 1.1rem;
        }

        .penjualan-toolbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            margin-bottom: 1.25rem;
            flex-wrap: wrap;
        }

        .penjualan-toolbar .btn-primary {
            background-color: #4f46e5;
            border-color: #4f46e5;
            font-size: 0.82rem;
            font-weight: 600;
            padding: 0.5rem 1.1rem;
            border-radius: 7px;
            box-shadow: 0 1px 2px rgba(79, 70, 229, 0.2);
            order: 2;
        }

        .penjualan-toolbar .btn-primary:hover {
            background-color: #4338ca;
            border-color: #4338ca;
        }

        .penjualan-search {
            flex: 1;
            min-width: 220px;
            max-width: 320px;
            order: 1;
        }

        .penjualan-search .form-control {
            font-size: 0.8rem;
            border: 1px solid #e5e7eb;
            background-color: #f8fafc;
            padding: 0.45rem 0.8rem;
        }

        .penjualan-search .form-control:focus {
            border-color: #4f46e5;
            background-color: #ffffff;
            box-shadow: 0 0 0 3px #eef2ff;
        }

        .penjualan-search .btn-outline-secondary {
            font-size: 0.8rem;
            border-color: #e5e7eb;
            background-color: #f8fafc;
            color: #8891a0;
        }

        .penjualan-search .btn-outline-secondary:hover {
            background-color: #4f46e5;
            border-color: #4f46e5;
            color: #ffffff;
        }

        .penjualan-page-content .table-responsive {
            border: 1px solid #ececf1;
            border-radius: 10px;
            overflow-x: auto;
            overflow-y: hidden;
            -webkit-overflow-scrolling: touch;
            background-color: #ffffff;
            box-shadow: 0 1px 2px rgba(15, 23, 42, 0.04);
        }

        .penjualan-page-content .table {
            font-size: 0.82rem;
            margin-bottom: 0;
        }

        .penjualan-page-content .table thead th {
            background-color: #4f46e5;
            color: #ffffff;
            font-weight: 600;
            font-size: 0.68rem;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            border-bottom: 1px solid #4f46e5;
            padding: 0.65rem 0.85rem;
            white-space: nowrap;
        }

        .penjualan-page-content .table tbody td,
        .penjualan-page-content .table tbody th {
            padding: 0.55rem 0.85rem;
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
            font-size: 0.76rem;
            font-weight: 500;
        }

        .penjualan-tanggal {
            color: #64748b;
            font-size: 0.8rem;
        }

        .penjualan-kasir {
            color: #8891a0;
            font-size: 0.8rem;
        }

        .penjualan-total {
            font-weight: 700;
            color: #0f172a;
            font-size: 0.88rem;
        }

        .metode-badge {
            display: inline-block;
            padding: 0.18rem 0.6rem;
            border-radius: 999px;
            font-size: 0.7rem;
            font-weight: 700;
            background-color: #eef2ff;
            color: #4338ca;
            text-transform: capitalize;
        }

        .status-badge {
            display: inline-block;
            padding: 0.18rem 0.6rem;
            border-radius: 999px;
            font-size: 0.7rem;
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
            gap: 0.35rem;
            flex-wrap: wrap;
        }

        .action-group .btn-primary {
            font-size: 0.76rem;
            padding: 0.3rem 0.7rem;
            border-radius: 6px;
        }

        .action-group .btn-warning {
            background-color: transparent;
            border-color: #f59e0b;
            color: #b45309;
            font-size: 0.76rem;
            padding: 0.3rem 0.7rem;
            border-radius: 6px;
        }

        .action-group .btn-warning:hover {
            background-color: #f59e0b;
            color: #ffffff;
        }

        .action-group .btn-danger {
            background-color: transparent;
            border-color: #dc2626;
            color: #dc2626;
            font-size: 0.76rem;
            padding: 0.3rem 0.7rem;
            border-radius: 6px;
        }

        .action-group .btn-danger:hover {
            background-color: #dc2626;
            color: #ffffff;
        }

        .penjualan-empty {
            padding: 2.5rem 1rem;
            text-align: center;
            color: #a1a8b5;
        }

        .penjualan-empty i {
            font-size: 1.8rem;
            display: block;
            margin-bottom: 0.4rem;
        }

        @media (max-width: 991.98px) {
            .penjualan-page-content {
                padding: 1.25rem 1rem 2.5rem;
            }
        }

        @media (max-width: 767.98px) {
            .penjualan-page-content {
                padding: 1rem 0.85rem 2.5rem;
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
                gap: 0.6rem;
            }

            .penjualan-page-content .table tbody tr {
                display: flex;
                flex-direction: column;
                background-color: #ffffff;
                border: 1px solid #ececf1;
                border-radius: 10px;
                box-shadow: 0 1px 2px rgba(15, 23, 42, 0.04);
                padding: 0.75rem 0.85rem;
            }

            .penjualan-page-content .table tbody td,
            .penjualan-page-content .table tbody th {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 0.6rem;
                padding: 0.3rem 0;
                border-bottom: 1px dashed #ececf1;
                text-align: right;
            }

            .penjualan-page-content .table tbody tr td:last-child,
            .penjualan-page-content .table tbody tr th:last-child {
                border-bottom: none;
            }

            .penjualan-page-content .table tbody td::before,
            .penjualan-page-content .table tbody th::before {
                content: attr(data-label);
                font-size: 0.66rem;
                font-weight: 600;
                color: #a1a8b5;
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
                        placeholder="Cari nama kasir...">
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
                        <th scope="col">No</th>
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
                                    @can('view', $sale)
                                        <a href="{{ route('penjualan.edit', $sale) }}" class="btn btn-sm btn-warning">Edit</a>
                                    @endcan
                                    <a href="{{ route('penjualan.show', $sale) }}" class="btn btn-primary">Detail</a>
                                    @can('delete', $sale)
                                        <form action="{{ route('penjualan.destroy', $sale) }}" method="POST" class="d-inline"
                                            data-confirm="Apakah anda yakin akan menghapus penjualan ini?"
                                            data-confirm-color="#b91c1c">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger">
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
