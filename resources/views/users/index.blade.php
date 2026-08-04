@extends('layouts.app')

@section('tittle', 'Users')

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