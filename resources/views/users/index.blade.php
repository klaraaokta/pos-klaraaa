@extends('layouts.app')

@section('tittle', 'Users')

@push('styles')
    <style>
        body {
            background: linear-gradient(180deg, #F4F5F7 0%, #E9EBEE 100%);
            min-height: 100vh;
        }

        .page-title {
            font-size: clamp(1.15rem, 3.6vw, 1.55rem);
            font-weight: 700;
            color: #2B3040;
            margin: 1.75rem 0 1.25rem;
        }

        .btn-primary {
            background: #3A4150;
            border-color: #3A4150;
            font-weight: 600;
            font-size: .85rem;
            border-radius: 8px;
            padding: .55rem 1.15rem;
            transition: background .15s ease, transform .1s ease;
        }

        .btn-primary:hover {
            background: #2C323E;
            border-color: #2C323E;
            transform: translateY(-1px);
        }

        .users-toolbar {
            margin-top: 1.25rem;
        }

        .users-search {
            width: 100%;
            margin-top: 1rem;
        }

        .users-search .form-control {
            border: 1px solid #D8DBE0;
            background: #FBFBFC;
            font-size: .85rem;
            padding: .55rem .85rem;
        }

        .users-search .form-control:focus {
            box-shadow: 0 0 0 3px rgba(75, 85, 99, 0.12);
            border-color: #4B5563;
        }

        .users-search .btn-outline-secondary {
            border: 1px solid #D8DBE0;
            border-left: none;
            color: #3A4150;
            font-weight: 600;
            font-size: .85rem;
            padding: .55rem 1.1rem;
        }

        .users-search .btn-outline-secondary:hover {
            background: #3A4150;
            border-color: #3A4150;
            color: #fff;
        }

        /* Tabel */
        .table-responsive {
            border-radius: 12px;
            border: 1px solid #E3E5E9;
            box-shadow: 0 1px 2px rgba(16, 24, 40, 0.04);
            margin-top: 1.5rem;
        }

        .table {
            background: #fff;
            font-size: .85rem;
            margin-bottom: 0;
        }

        .table thead th {
            background: #F8F9FA;
            color: #6B7280;
            font-size: .72rem;
            text-transform: uppercase;
            letter-spacing: .04em;
            font-weight: 600;
            border-bottom: 2px solid #E3E5E9;
            padding: .75rem .9rem;
            white-space: nowrap;
        }

        .table tbody td {
            padding: .7rem .9rem;
            border-color: #EEF0F2;
            vertical-align: middle;
            color: #2B3040;
        }

        .table tbody tr:hover {
            background: #F8F9FA;
        }

        .action-group {
            display: flex;
            align-items: center;
            gap: .6rem;
            flex-wrap: wrap;
        }

        .action-divider {
            width: 1px;
            height: 18px;
            background: #E3E5E9;
        }

        .btn-warning {
            background: #E8A33D;
            border-color: #E8A33D;
            color: #1B1204;
            font-weight: 600;
            font-size: .78rem;
            border-radius: 7px;
            padding: .35rem .8rem;
        }

        .btn-warning:hover {
            background: #D48A22;
            border-color: #D48A22;
            color: #1B1204;
        }

        .btn-danger {
            font-weight: 600;
            font-size: .78rem;
            border-radius: 7px;
            padding: .35rem .8rem;
        }

        @media (max-width: 576px) {
            .table {
                font-size: .78rem;
            }

            .action-group {
                gap: .5rem;
            }
        }
    </style>
@endpush

@section('content')

    @include('layouts.navbar')

    <h1 class="page-title">Halaman Users</h1>

    <div class="users-toolbar">
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Create</a>

        <form action="{{ route('admin.users') }}" method="GET" class="users-search">
            <div class="input-group">
                <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search username or email">

                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </div>
        </form>
    </div>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $users->firstItem() + $loop->index }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role->name }}</td>
                        <td>
                            <div class="action-group">
                                <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-sm btn-warning">Edit Akun</a>
                                <span class="action-divider"></span>
                                <form action="{{ route('admin.users.destroy', $user) }}" method="post" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus user ini?')">
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

@endsection