@extends('layouts.app')

@section('tittle', isset($user) ? 'Edit User' : 'Create User')

@push('styles')
    <style>
        body {
            background-color: #f8fafc;
        }

        .user-form-outer {
            min-height: calc(100vh - 90px);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
        }

        .user-form-wrapper {
            max-width: 480px;
            width: 100%;
        }

        .user-form-card {
            background-color: #ffffff;
            border: 1px solid #eef0f4;
            border-radius: 14px;
            box-shadow: 0 4px 16px rgba(15, 23, 42, 0.06);
            overflow: hidden;
        }

        .user-form-header {
            background-color: #4f46e5;
            color: #ffffff;
            padding: 1.15rem 1.75rem;
        }

        .user-form-header h1 {
            font-size: 1.05rem;
            font-weight: 700;
            margin-bottom: 0.2rem;
        }

        .user-form-header p {
            font-size: 0.78rem;
            color: #e0e7ff;
            margin-bottom: 0;
        }

        .user-form-body {
            padding: 1.75rem;
        }

        .user-form-body .mb-3 {
            margin-bottom: 1.25rem !important;
        }

        .user-form-body .form-label {
            font-size: 0.8rem;
            font-weight: 600;
            color: #334155;
            margin-bottom: 0.4rem;
        }

        .user-form-body .form-control,
        .user-form-body .form-select {
            font-size: 0.875rem;
            padding: 0.55rem 0.85rem;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            width: 100%;
        }

        .user-form-body .form-control:focus,
        .user-form-body .form-select:focus {
            border-color: #4f46e5;
            box-shadow: 0 0 0 3px #eef2ff;
        }

        .user-form-body .is-invalid {
            border-color: #dc2626;
        }

        .user-form-body .invalid-feedback {
            font-size: 0.75rem;
        }

        .user-form-actions {
            display: flex;
            gap: 0.6rem;
            margin-top: 1.75rem;
            padding-top: 1.25rem;
            border-top: 1px solid #f1f5f9;
        }

        .user-form-actions .btn-success {
            flex: 1;
            background-color: #4f46e5;
            border-color: #4f46e5;
            font-size: 0.875rem;
            font-weight: 600;
            padding: 0.6rem 0;
            border-radius: 8px;
        }

        .user-form-actions .btn-success:hover {
            background-color: #4338ca;
            border-color: #4338ca;
        }

        .user-form-actions .btn-secondary {
            background-color: transparent;
            border: 1px solid #cbd5e1;
            color: #64748b;
            font-size: 0.875rem;
            font-weight: 500;
            padding: 0.6rem 1.1rem;
            border-radius: 8px;
        }

        .user-form-actions .btn-secondary:hover {
            background-color: #f1f5f9;
            border-color: #cbd5e1;
            color: #334155;
        }

        /* ---------- TABLET (≤ 991.98px) ---------- */
        @media (max-width: 991.98px) {
            .user-form-outer {
                padding: 1.5rem 1rem;
            }
        }

        /* ---------- MOBILE (≤ 575.98px) ---------- */
        @media (max-width: 575.98px) {
            .user-form-outer {
                min-height: auto;
                padding: 1.25rem 0.85rem 2.5rem;
            }

            .user-form-header {
                padding: 1rem 1.25rem;
            }

            .user-form-body {
                padding: 1.25rem;
            }

            .user-form-actions {
                flex-direction: column-reverse;
            }

            .user-form-actions .btn-secondary {
                width: 100%;
                text-align: center;
            }
        }

        /* ---------- SMALL MOBILE (≤ 400px) ---------- */
        @media (max-width: 400px) {
            .user-form-header {
                padding: 0.85rem 1rem;
            }

            .user-form-header h1 {
                font-size: 0.95rem;
            }

            .user-form-header p {
                font-size: 0.72rem;
            }

            .user-form-body {
                padding: 1rem;
            }
        }
    </style>
@endpush

@section('content')

    @include('layouts.navbar')

    <div class="user-form-outer">
        <div class="user-form-wrapper">
            <div class="user-form-card">
                <div class="user-form-header">
                    <h1>{{ isset($user) ? 'Edit User' : 'Tambah User Baru' }}</h1>
                    <p>{{ isset($user) ? 'Perbarui informasi akun user' : 'Lengkapi data untuk membuat akun baru' }}</p>
                </div>

                <div class="user-form-body">
                    <form action="{{ isset($user) ? route('admin.users.update', $user) : route('admin.users.store') }}"
                        method="POST">
                        @csrf
                        @if (isset($user))
                            @method('PUT')
                        @endif

                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name', $user->name ?? '') }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email', $user->email ?? '') }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Role</label>
                            <select name="role_id" class="form-select @error('role_id') is-invalid @enderror">
                                <option value="">-- Pilih Role --</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}" @selected(old('role_id', $user->role_id ?? '') == $role->id)>
                                        {{ ucfirst($role->name) }}
                                    </option>
                                @endforeach
                            </select>
                            @error('role_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="user-form-actions">
                            <button class="btn btn-success">Simpan</button>
                            <a href="{{ route('admin.users') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
