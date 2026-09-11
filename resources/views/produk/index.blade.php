@extends('layouts.app')

@section('tittle', 'Produk')
@push('styles')
    <style>
        body {
            background-color: #f8fafc;
        }

        .produk-page-content {
            max-width: 1150px;
            margin: 0 auto;
            padding: 1.5rem 1rem 3rem;
        }

        .produk-header {
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

        .produk-count {
            font-size: 0.82rem;
            font-weight: 500;
            color: #8891a0;
        }

        .produk-toolbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            margin-bottom: 1.25rem;
            flex-wrap: wrap;
        }

        .produk-toolbar .btn-primary {
            background-color: #4f46e5;
            border-color: #4f46e5;
            font-size: 0.82rem;
            font-weight: 600;
            padding: 0.5rem 1.1rem;
            border-radius: 7px;
            box-shadow: 0 1px 2px rgba(79, 70, 229, 0.2);
            order: 2;
        }

        .produk-toolbar .btn-primary:hover {
            background-color: #4338ca;
            border-color: #4338ca;
        }

        .produk-search {
            display: flex;
            align-items: center;
            gap: 0.55rem;
            flex: 1;
            min-width: 260px;
            max-width: 540px;
            order: 1;
            flex-wrap: wrap;
        }

        .produk-search .input-group {
            flex: 1;
            min-width: 200px;
        }

        .produk-search .form-control {
            font-size: 0.8rem;
            border: 1px solid #e5e7eb;
            background-color: #f8fafc;
            padding: 0.45rem 0.8rem;
        }

        .produk-search .form-control:focus {
            border-color: #4f46e5;
            background-color: #ffffff;
            box-shadow: 0 0 0 3px #eef2ff;
        }

        .produk-search .btn-outline-secondary {
            font-size: 0.8rem;
            border-color: #e5e7eb;
            background-color: #f8fafc;
            color: #8891a0;
        }

        .produk-search .btn-outline-secondary:hover {
            background-color: #4f46e5;
            border-color: #4f46e5;
            color: #ffffff;
        }

        .filter-jenis {
            position: relative;
            flex: 0 0 auto;
            min-width: 160px;
        }

        .filter-jenis i {
            position: absolute;
            left: 0.7rem;
            top: 50%;
            transform: translateY(-50%);
            font-size: 0.8rem;
            color: #8891a0;
            pointer-events: none;
        }

        .filter-jenis select {
            width: 100%;
            appearance: none;
            -webkit-appearance: none;
            font-size: 0.8rem;
            font-weight: 500;
            color: #334155;
            border: 1px solid #e5e7eb;
            background-color: #f8fafc;
            padding: 0.45rem 1.9rem 0.45rem 2rem;
            border-radius: 6px;
            cursor: pointer;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%2394a3b8' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 0.55rem center;
            background-size: 13px;
            transition: border-color 0.15s, background-color 0.15s;
        }

        .filter-jenis select:hover {
            border-color: #c7d2fe;
        }

        .filter-jenis select:focus {
            outline: none;
            border-color: #4f46e5;
            background-color: #ffffff;
            box-shadow: 0 0 0 3px #eef2ff;
        }

        .produk-page-content .table-responsive {
            border: 1px solid #ececf1;
            border-radius: 10px;
            overflow-x: auto;
            overflow-y: hidden;
            -webkit-overflow-scrolling: touch;
            background-color: #ffffff;
            box-shadow: 0 1px 2px rgba(15, 23, 42, 0.04);
        }

        .produk-page-content .table {
            font-size: 0.82rem;
            margin-bottom: 0;
        }

        .produk-page-content .table thead th {
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

        .produk-page-content .table tbody td,
        .produk-page-content .table tbody th {
            padding: 0.55rem 0.85rem;
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
            font-size: 0.76rem;
            font-weight: 500;
        }

        .produk-nama {
            font-weight: 600;
            color: #0f172a;
        }

        .produk-user {
            font-size: 0.76rem;
            color: #8891a0;
        }

        .produk-thumb {
            width: 42px;
            height: 42px;
            object-fit: cover;
            border-radius: 7px;
            border: 1px solid #ececf1;
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
            padding: 0.18rem 0.6rem;
            border-radius: 999px;
            font-size: 0.72rem;
            font-weight: 700;
            background-color: #eef2ff;
            color: #4338ca;
        }

        .jenis-badge {
            display: inline-block;
            padding: 0.18rem 0.6rem;
            border-radius: 999px;
            font-size: 0.7rem;
            font-weight: 700;
            background-color: #f1f5f9;
            color: #475569;
        }

        .jenis-kosong {
            font-size: 0.76rem;
            color: #cbd5e1;
        }

        .action-group {
            display: flex;
            gap: 0.35rem;
            flex-wrap: wrap;
        }

        .action-group .btn-warning {
            background-color: transparent;
            border-color: #f59e0b;
            color: #b45309;
            font-size: 0.78rem;
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
            font-size: 0.78rem;
            padding: 0.3rem 0.7rem;
            border-radius: 6px;
        }

        .action-group .btn-danger:hover {
            background-color: #dc2626;
            color: #ffffff;
        }

        .produk-empty {
            padding: 2.5rem 1rem;
            text-align: center;
            color: #a1a8b5;
        }

        .produk-empty i {
            font-size: 1.8rem;
            display: block;
            margin-bottom: 0.4rem;
        }

        @media (max-width: 991.98px) {
            .produk-page-content {
                padding: 1.25rem 1rem 2.5rem;
            }
        }

        @media (max-width: 767.98px) {
            .produk-page-content {
                padding: 1rem 0.85rem 2.5rem;
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
                flex-direction: column;
                align-items: stretch;
            }

            .produk-search .input-group {
                min-width: 100%;
            }

            .filter-jenis {
                min-width: 100%;
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
                gap: 0.6rem;
            }

            .produk-page-content .table tbody tr {
                display: flex;
                flex-direction: column;
                background-color: #ffffff;
                border: 1px solid #ececf1;
                border-radius: 10px;
                box-shadow: 0 1px 2px rgba(15, 23, 42, 0.04);
                padding: 0.75rem 0.85rem;
            }

            .produk-page-content .table tbody td,
            .produk-page-content .table tbody th {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 0.6rem;
                padding: 0.3rem 0;
                border-bottom: 1px dashed #ececf1;
                text-align: right;
            }

            .produk-page-content .table tbody tr td:last-child,
            .produk-page-content .table tbody tr th:last-child {
                border-bottom: none;
            }

            .produk-page-content .table tbody td::before,
            .produk-page-content .table tbody th::before {
                content: attr(data-label);
                font-size: 0.66rem;
                font-weight: 600;
                color: #a1a8b5;
                text-align: left;
            }

            .produk-page-content .table tbody th:first-child {
                justify-content: flex-start;
                border-bottom: 1px dashed #ececf1;
                font-weight: 700;
                color: #4f46e5;
            }

            .produk-page-content .table tbody th:first-child::before {
                content: "#";
            }

            .produk-thumb {
                width: 40px;
                height: 40px;
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
            <div class="produk-search">
                <form action="{{ route('produk.index') }}" method="GET" class="input-group">
                    <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                        placeholder="Cari nama produk...">
                    <button class="btn btn-outline-secondary" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </form>

                <form action="{{ route('produk.index') }}" method="GET" class="filter-jenis">
                    <i class="bi bi-funnel"></i>
                    <select name="jenis" onchange="this.form.submit()">
                        <option value="">Semua Jenis</option>
                        @foreach ($jenisList as $jenis)
                            <option value="{{ $jenis->id }}" {{ request('jenis') == $jenis->id ? 'selected' : '' }}>
                                {{ $jenis->nama }}
                            </option>
                        @endforeach
                    </select>
                </form>
            </div>

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
                        <th scope="col">No</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jenis</th>
                        <th scope="col">Harga Pokok</th>
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
                            <td data-label="Jenis">
                                @if ($product->jenis)
                                    <span class="jenis-badge">{{ $product->jenis->nama }}</span>
                                @else
                                    <span class="jenis-kosong">-</span>
                                @endif
                            </td>
                            <td data-label="Harga Beli" class="harga-beli">Rp {{ number_format($product->harga_beli) }}
                            </td>
                            <td data-label="Harga Jual" class="harga-jual">Rp {{ number_format($product->harga_jual) }}
                            </td>
                            <td data-label="Stok"><span class="stok-badge">{{ $product->stok }}</span></td>
                            <td data-label="User" class="produk-user">{{ $product->user->name }}</td>
                            <td data-label="Aksi">
                                <div class="action-group">
                                    @can('update', $product)
                                        <a href="{{ route('produk.edit', $product) }}" class="btn btn-sm btn-warning">Edit</a>
                                    @endcan
                                    @can('delete', $product)
                                        <form action="{{ route('produk.destroy', $product) }}" method="POST" class="d-inline"
                                            data-confirm="Apakah anda yakin menghapus produk ini?" data-confirm-color="#b91c1c">
                                            <!-- Menambahkan warna merah di sini -->
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
                            <td colspan="9">
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
