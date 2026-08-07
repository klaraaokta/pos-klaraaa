@extends('layouts.app')

@section('tittle', 'Produk')

@push('styles')
    <style>
        body {
            background-color: #f8fafc;
        }

        .produk-page-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem 1rem 4rem;
        }

        .produk-header {
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

        .produk-count {
            font-size: 0.85rem;
            font-weight: 500;
            color: #94a3b8;
        }

        .produk-toolbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
        }

        .produk-toolbar .btn-primary {
            background-color: #4f46e5;
            border-color: #4f46e5;
            font-size: 0.85rem;
            font-weight: 600;
            padding: 0.55rem 1.2rem;
            border-radius: 8px;
            box-shadow: 0 1px 2px rgba(79, 70, 229, 0.25);
            order: 2;
        }

        .produk-toolbar .btn-primary:hover {
            background-color: #4338ca;
            border-color: #4338ca;
        }

        .produk-search {
            flex: 1;
            min-width: 220px;
            max-width: 340px;
            order: 1;
        }

        .produk-search .form-control {
            font-size: 0.82rem;
            border: 1px solid #e2e8f0;
            background-color: #f8fafc;
            padding: 0.5rem 0.85rem;
        }

        .produk-search .form-control:focus {
            border-color: #4f46e5;
            background-color: #ffffff;
            box-shadow: 0 0 0 3px #eef2ff;
        }

        .produk-search .btn-outline-secondary {
            font-size: 0.82rem;
            border-color: #e2e8f0;
            background-color: #f8fafc;
            color: #94a3b8;
        }

        .produk-search .btn-outline-secondary:hover {
            background-color: #4f46e5;
            border-color: #4f46e5;
            color: #ffffff;
        }

        .produk-page-content .table-responsive {
            border: 1px solid #eef0f4;
            border-radius: 12px;
            overflow: hidden;
            background-color: #ffffff;
            box-shadow: 0 1px 2px rgba(15, 23, 42, 0.04);
        }

        .produk-page-content .table {
            font-size: 0.85rem;
            margin-bottom: 0;
        }

        .produk-page-content .table thead th {
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

        .produk-page-content .table tbody td,
        .produk-page-content .table tbody th {
            padding: 0.7rem 1rem;
            vertical-align: middle;
            color: #334155;
            border-bottom: 1px solid #f8fafc;
        }

        .produk-page-content .table tbody tr:last-child td {
            border-bottom: none;
        }

        .produk-page-content .table tbody tr:hover {
            background-color: #f8fafc;
        }

        .produk-page-content .table tbody th:first-child {
            color: #cbd5e1;
            font-size: 0.78rem;
            font-weight: 500;
        }

        .produk-nama {
            font-weight: 600;
            color: #0f172a;
        }

        .produk-user {
            font-size: 0.78rem;
            color: #94a3b8;
        }

        .produk-thumb {
            width: 56px;
            height: 56px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid #eef0f4;
            flex-shrink: 0;
        }

        .harga-beli {
            color: #64748b;
        }

        .harga-jual {
            font-weight: 600;
            color: #4338ca;
        }

        .stok-badge {
            display: inline-block;
            padding: 0.2rem 0.65rem;
            border-radius: 999px;
            font-size: 0.75rem;
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

        .produk-empty {
            padding: 3rem 1rem;
            text-align: center;
            color: #94a3b8;
        }

        .produk-empty i {
            font-size: 2rem;
            display: block;
            margin-bottom: 0.5rem;
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

        @media (max-width: 991.98px) {
            .produk-page-content {
                padding: 1.5rem 1rem 3rem;
            }
        }

        @media (max-width: 767.98px) {
            .produk-page-content {
                padding: 1.25rem 0.85rem 3rem;
            }

            .page-title {
                font-size: 1.25rem;
            }

            .produk-toolbar {
                flex-direction: column;
                align-items: stretch;
            }

            .produk-toolbar .btn-primary {
                order: 1;
                width: 100%;
                text-align: center;
            }

            .produk-search {
                order: 2;
                max-width: 100%;
            }

            .produk-page-content .table-responsive {
                border: none;
                box-shadow: none;
                background-color: transparent;
                overflow: visible;
            }

            .produk-page-content .table {
                border: none;
            }

            .produk-page-content .table thead {
                display: none;
            }

            .produk-page-content .table tbody {
                display: flex;
                flex-direction: column;
                gap: 0.75rem;
            }

            .produk-page-content .table tbody tr {
                display: flex;
                flex-direction: column;
                background-color: #ffffff;
                border: 1px solid #eef0f4;
                border-radius: 12px;
                box-shadow: 0 1px 2px rgba(15, 23, 42, 0.04);
                padding: 0.9rem 1rem;
            }

            .produk-page-content .table tbody td,
            .produk-page-content .table tbody th {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 0.75rem;
                padding: 0.4rem 0;
                border-bottom: 1px dashed #f1f5f9;
                text-align: right;
            }

            .produk-page-content .table tbody tr td:last-child,
            .produk-page-content .table tbody tr th:last-child {
                border-bottom: none;
            }

            .produk-page-content .table tbody td::before,
            .produk-page-content .table tbody th::before {
                content: attr(data-label);
                font-size: 0.7rem;
                font-weight: 700;
                text-transform: uppercase;
                letter-spacing: 0.04em;
                color: #94a3b8;
                text-align: left;
            }

            .produk-page-content .table tbody th:first-child {
                justify-content: flex-start;
                border-bottom: 1px dashed #f1f5f9;
                font-weight: 700;
                color: #4f46e5;
            }

            .produk-page-content .table tbody th:first-child::before {
                content: "#";
            }

            .produk-thumb {
                width: 48px;
                height: 48px;
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
            .produk-page-content .table tbody td,
            .produk-page-content .table tbody th {
                flex-direction: column;
                align-items: flex-start;
                text-align: left;
                gap: 0.15rem;
            }

            .produk-page-content .table tbody td::before,
            .produk-page-content .table tbody th::before {
                text-align: left;
            }
        }
    </style>
@endpush

@section('content')

    @include('layouts.navbar')

    <div class="produk-page-content">
        <div class="produk-header">
            <h1 class="page-title">Produk</h1>
            <span class="produk-count">{{ $products->total() }} produk terdaftar</span>
        </div>

        <div class="produk-toolbar">
            <form action="{{ route('produk.index') }}" method="GET" class="produk-search">
                <div class="input-group">
                    <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                        placeholder="Cari nama produk...">
                    <button class="btn btn-outline-secondary" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>

            @can('create', App\Models\Produk::class)
                <a href="{{ route('produk.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i> Tambah Produk
                </a>
            @endcan
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Harga Beli</th>
                        <th scope="col">Harga Jual</th>
                        <th scope="col">Stok</th>
                        <th scope="col">User</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <th scope="row" data-label="#">{{ $products->firstItem() + $loop->index }}</th>
                            <td data-label="Foto">
                                <img src="{{ asset('storage/' . $product->foto) }}" class="produk-thumb"
                                    alt="{{ $product->nama }}">
                            </td>
                            <td data-label="Nama" class="produk-nama">{{ $product->nama }}</td>
                            <td data-label="Harga Beli" class="harga-beli">Rp {{ number_format($product->harga_beli) }}</td>
                            <td data-label="Harga Jual" class="harga-jual">Rp {{ number_format($product->harga_jual) }}</td>
                            <td data-label="Stok"><span class="stok-badge">{{ $product->stok }}</span></td>
                            <td data-label="User" class="produk-user">{{ $product->user->name }}</td>
                            <td data-label="Aksi">
                                <div class="action-group">
                                    @can('update', $product)
                                        <a href="{{ route('produk.edit', $product) }}"
                                            class="btn btn-sm btn-warning">Edit</a>
                                    @endcan
                                    @can('delete', $product)
                                        <form action="{{ route('produk.destroy', $product) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger"
                                                onclick="return confirm('Apakah anda yakin menghapus produk ini?')">
                                                Hapus
                                            </button>
                                        </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8">
                                <div class="produk-empty">
                                    <i class="bi bi-box-seam"></i>
                                    Data produk tidak tersedia
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $products->links() }}
    </div>

@endsection