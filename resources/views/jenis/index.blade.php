@extends('layouts.app')

@section('tittle', 'Jenis')

@push('styles')
    <style>
        body {
            background-color: #f8fafc;
        }

        .jenis-page-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem 1rem 4rem;
        }

        .jenis-header {
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

        .jenis-count {
            font-size: 0.85rem;
            font-weight: 500;
            color: #94a3b8;
        }

        .jenis-toolbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
        }

        .jenis-toolbar .btn-primary {
            background-color: #4f46e5;
            border-color: #4f46e5;
            font-size: 0.85rem;
            font-weight: 600;
            padding: 0.55rem 1.2rem;
            border-radius: 8px;
            box-shadow: 0 1px 2px rgba(79, 70, 229, 0.25);
            order: 2;
        }

        .jenis-toolbar .btn-primary:hover {
            background-color: #4338ca;
            border-color: #4338ca;
        }

        .jenis-search {
            flex: 1;
            min-width: 220px;
            max-width: 340px;
            order: 1;
        }

        .jenis-search .form-control {
            font-size: 0.82rem;
            border: 1px solid #e2e8f0;
            background-color: #f8fafc;
            padding: 0.5rem 0.85rem;
        }

        .jenis-search .form-control:focus {
            border-color: #4f46e5;
            background-color: #ffffff;
            box-shadow: 0 0 0 3px #eef2ff;
        }

        .jenis-search .btn-outline-secondary {
            font-size: 0.82rem;
            border-color: #e2e8f0;
            background-color: #f8fafc;
            color: #94a3b8;
        }

        .jenis-search .btn-outline-secondary:hover {
            background-color: #4f46e5;
            border-color: #4f46e5;
            color: #ffffff;
        }

        .jenis-page-content .table-responsive {
            border: 1px solid #eef0f4;
            border-radius: 12px;
            overflow: hidden;
            background-color: #ffffff;
            box-shadow: 0 1px 2px rgba(15, 23, 42, 0.04);
        }

        .jenis-page-content .table {
            font-size: 0.85rem;
            margin-bottom: 0;
        }

        .jenis-page-content .table thead th {
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

        .jenis-page-content .table thead th:first-child {
            width: 48px;
            color: #cbd5e1;
        }

        .jenis-page-content .table tbody td {
            padding: 0.75rem 1rem;
            vertical-align: middle;
            color: #334155;
            border-bottom: 1px solid #f8fafc;
        }

        .jenis-page-content .table tbody tr:last-child td {
            border-bottom: none;
        }

        .jenis-page-content .table tbody tr:hover {
            background-color: #f8fafc;
        }

        .jenis-page-content .table tbody td:first-child {
            color: #cbd5e1;
            font-size: 0.78rem;
        }

        .jenis-nama {
            font-weight: 600;
            color: #0f172a;
        }

        .jenis-count-badge {
            display: inline-block;
            padding: 0.2rem 0.65rem;
            border-radius: 999px;
            font-size: 0.72rem;
            font-weight: 700;
            background-color: #eef2ff;
            color: #4338ca;
        }

        .action-group {
            display: flex;
            gap: 0.4rem;
            flex-wrap: wrap;
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

        .jenis-empty {
            padding: 3rem 1rem;
            text-align: center;
            color: #94a3b8;
        }

        .jenis-empty i {
            font-size: 2rem;
            display: block;
            margin-bottom: 0.5rem;
        }

        @media (max-width: 991.98px) {
            .jenis-page-content {
                padding: 1.5rem 1rem 3rem;
            }
        }

        @media (max-width: 767.98px) {
            .jenis-page-content {
                padding: 1.25rem 0.85rem 3rem;
            }

            .page-title {
                font-size: 1.25rem;
            }

            .jenis-toolbar {
                flex-direction: column;
                align-items: stretch;
            }

            .jenis-toolbar .btn-primary {
                order: 1;
                width: 100%;
                text-align: center;
            }

            .jenis-search {
                order: 2;
                max-width: 100%;
            }

            .jenis-page-content .table-responsive {
                border: none;
                box-shadow: none;
                background-color: transparent;
                overflow: visible;
            }

            .jenis-page-content .table {
                border: none;
            }

            .jenis-page-content .table thead {
                display: none;
            }

            .jenis-page-content .table tbody {
                display: flex;
                flex-direction: column;
                gap: 0.75rem;
            }

            .jenis-page-content .table tbody tr {
                display: flex;
                flex-direction: column;
                background-color: #ffffff;
                border: 1px solid #eef0f4;
                border-radius: 12px;
                box-shadow: 0 1px 2px rgba(15, 23, 42, 0.04);
                padding: 0.9rem 1rem;
            }

            .jenis-page-content .table tbody td {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 0.75rem;
                padding: 0.4rem 0;
                border-bottom: 1px dashed #f1f5f9;
                text-align: right;
            }

            .jenis-page-content .table tbody tr td:last-child {
                border-bottom: none;
            }

            .jenis-page-content .table tbody td::before {
                content: attr(data-label);
                font-size: 0.7rem;
                font-weight: 700;
                text-transform: uppercase;
                letter-spacing: 0.04em;
                color: #94a3b8;
                text-align: left;
            }

            .jenis-page-content .table tbody td:first-child {
                justify-content: flex-start;
                font-weight: 700;
                color: #4f46e5;
            }

            .jenis-page-content .table tbody td:first-child::before {
                content: "#";
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
            .jenis-page-content .table tbody td {
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

    <div class="jenis-page-content">
        <div class="jenis-header">
            <h1 class="page-title">Jenis Produk</h1>
            <span class="jenis-count">{{ $jenis->total() }} jenis terdaftar</span>
        </div>

        <div class="jenis-toolbar">
            <form action="{{ route('jenis.index') }}" method="GET" class="jenis-search">
                <div class="input-group">
                    <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                        placeholder="Cari jenis...">
                    <button class="btn btn-outline-secondary" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>

            <a href="{{ route('jenis.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> Tambah Jenis
            </a>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Jenis</th>
                        <th scope="col">Jumlah Produk</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($jenis as $item)
                        <tr>
                            <td data-label="#">{{ $jenis->firstItem() + $loop->index }}</td>
                            <td data-label="Nama Jenis" class="jenis-nama">{{ $item->nama }}</td>
                            <td data-label="Jumlah Produk">
                                <span class="jenis-count-badge">{{ $item->produk->count() }}</span>
                            </td>
                            <td data-label="Aksi">
                                <div class="action-group">
                                    <a href="{{ route('jenis.edit', $item) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('jenis.destroy', $item) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger"
                                            onclick="return confirm('Yakin hapus jenis ini?')">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">
                                <div class="jenis-empty">
                                    <i class="bi bi-tags"></i>
                                    Belum ada jenis produk
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $jenis->links() }}
    </div>

@endsection
