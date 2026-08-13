@extends('layouts.app')

@section('tittle', 'Users')

@push('styles')
    <style>
        body {
            background-color: #f8fafc;
        }

        .users-page-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem 1rem 4rem;
        }

        .users-header {
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

        .users-count {
            font-size: 0.85rem;
            font-weight: 500;
            color: #94a3b8;
        }

        .users-toolbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
        }

        .users-toolbar .btn-primary {
            background-color: #4f46e5;
            border-color: #4f46e5;
            font-size: 0.85rem;
            font-weight: 600;
            padding: 0.55rem 1.2rem;
            border-radius: 8px;
            box-shadow: 0 1px 2px rgba(79, 70, 229, 0.25);
            order: 2;
        }

        .users-toolbar .btn-primary:hover {
            background-color: #4338ca;
            border-color: #4338ca;
        }

        .users-search {
            flex: 1;
            min-width: 220px;
            max-width: 340px;
            order: 1;
        }

        .users-search .form-control {
            font-size: 0.82rem;
            border: 1px solid #e2e8f0;
            background-color: #f8fafc;
            padding: 0.5rem 0.85rem;
        }

        .users-search .form-control:focus {
            border-color: #4f46e5;
            background-color: #ffffff;
            box-shadow: 0 0 0 3px #eef2ff;
        }

        .users-search .btn-outline-secondary {
            font-size: 0.82rem;
            border-color: #e2e8f0;
            background-color: #f8fafc;
            color: #94a3b8;
        }

        .users-search .btn-outline-secondary:hover {
            background-color: #4f46e5;
            border-color: #4f46e5;
            color: #ffffff;
        }

        .users-page-content .table-responsive {
            border: 1px solid #eef0f4;
            border-radius: 12px;
            overflow: hidden;
            background-color: #ffffff;
            box-shadow: 0 1px 2px rgba(15, 23, 42, 0.04);
        }

        .users-page-content .table {
            font-size: 0.85rem;
            margin-bottom: 0;
        }

        .users-page-content .table thead th {
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

        .users-page-content .table thead th:first-child {
            width: 48px;
            color: #cbd5e1;
        }

        .users-page-content .table tbody td {
            padding: 0.75rem 1rem;
            vertical-align: middle;
            color: #334155;
            border-bottom: 1px solid #f8fafc;
        }

        .users-page-content .table tbody tr:last-child td {
            border-bottom: none;
        }

        .users-page-content .table tbody tr:hover {
            background-color: #f8fafc;
        }

        .users-page-content .table tbody td:first-child {
            color: #cbd5e1;
            font-size: 0.78rem;
        }

        .user-name {
            font-weight: 600;
            color: #0f172a;
        }

        .user-email {
            color: #94a3b8;
            font-size: 0.82rem;
        }

        .role-badge {
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

        @media (max-width: 991.98px) {
            .users-page-content {
                padding: 1.5rem 1rem 3rem;
            }
        }

        @media (max-width: 767.98px) {
            .users-page-content {
                padding: 1.25rem 0.85rem 3rem;
            }

            .page-title {
                font-size: 1.2rem;
            }

            .users-toolbar {
                flex-direction: column;
                align-items: stretch;
            }

            .users-toolbar .btn-primary {
                order: 1;
                width: 100%;
                text-align: center;
            }

            .users-search {
                order: 2;
                max-width: 100%;
            }

            .users-page-content .table-responsive {
                border: none;
                box-shadow: none;
                background-color: transparent;
                overflow: visible;
            }

            .users-page-content .table {
                border: none;
                font-size: 0.85rem;
            }

            .users-page-content .table thead {
                display: none;
            }

            .users-page-content .table tbody {
                display: flex;
                flex-direction: column;
                gap: 0.75rem;
            }

            .users-page-content .table tbody tr {
                display: flex;
                flex-direction: column;
                background-color: #ffffff;
                border: 1px solid #eef0f4;
                border-radius: 12px;
                box-shadow: 0 1px 2px rgba(15, 23, 42, 0.04);
                padding: 0.9rem 1rem;
            }

            .users-page-content .table tbody td {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 0.75rem;
                padding: 0.4rem 0;
                border-bottom: 1px dashed #f1f5f9;
                text-align: right;
            }

            .users-page-content .table tbody tr td:last-child {
                border-bottom: none;
            }

            .users-page-content .table tbody td::before {
                content: attr(data-label);
                font-size: 0.7rem;
                font-weight: 700;
                text-transform: uppercase;
                letter-spacing: 0.04em;
                color: #94a3b8;
                text-align: left;
            }

            .users-page-content .table tbody td:first-child {
                justify-content: flex-start;
                font-weight: 700;
                color: #4f46e5;
            }

            .users-page-content .table tbody td:first-child::before {
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
            .users-page-content .table tbody td {
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

    <div class="users-page-content">
        <div class="users-header">
            <h1 class="page-title">Users</h1>
            <span class="users-count">{{ $users->total() }} user terdaftar</span>
        </div>

        <div class="users-toolbar">
            <form action="{{ route('admin.users') }}" method="GET" class="users-search">
                <div class="input-group">
                    <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                        placeholder="Cari username atau email...">
                    <button class="btn btn-outline-secondary" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>

            <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> Tambah User
            </a>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td data-label="#">{{ $users->firstItem() + $loop->index }}</td>
                            <td data-label="Name" class="user-name">{{ $user->name }}</td>
                            <td data-label="Email" class="user-email">{{ $user->email }}</td>
                            <td data-label="Role"><span class="role-badge">{{ $user->role->name }}</span></td>
                            <td data-label="Aksi">
                                <div class="action-group">
                                    <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-sm btn-warning">Edit
                                        Akun</a>
                                    <form action="{{ route('admin.users.destroy', $user) }}" method="post"
                                        class="d-inline">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-danger"
                                            onclick="return confirm('Yakin hapus user ini?')">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
