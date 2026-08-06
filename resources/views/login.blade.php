@extends('layouts.app')

@section('title', 'Login')

@push('styles')
    <style>
        body {
            background-color: #f8fafc;
        }

        .login-outer {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem 1rem;
        }

        .login-card {
            width: 100%;
            max-width: 380px;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            box-shadow: 0 4px 16px rgba(15, 23, 42, 0.08);
            overflow: hidden;
        }

        .login-card .card-header {
            background-color: #4f46e5;
            color: #ffffff;
            font-weight: 600;
            font-size: 1rem;
            letter-spacing: 0.02em;
            padding: 1rem 1.25rem;
            border-bottom: none;
        }

        .login-card .card-body {
            padding: 1.75rem 1.5rem;
        }

        .login-card .form-label {
            font-size: 0.85rem;
            font-weight: 500;
            color: #334155;
            margin-bottom: 0.4rem;
        }

        .login-card .form-control {
            font-size: 0.9rem;
            padding: 0.55rem 0.85rem;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            width: 100%;
        }

        .login-card .form-control:focus {
            border-color: #4f46e5;
            box-shadow: 0 0 0 3px #eef2ff;
        }

        .login-card .mb-3 {
            margin-bottom: 1.1rem !important;
            text-align: left;
        }

        .login-card .badge.bg-danger {
            font-weight: 400;
            font-size: 0.75rem;
            padding: 0.35rem 0.6rem;
            margin-top: 0.4rem;
        }

        .login-card .btn-primary {
            width: 100%;
            background-color: #4f46e5;
            border-color: #4f46e5;
            font-size: 0.9rem;
            font-weight: 500;
            padding: 0.6rem 0;
            border-radius: 8px;
            margin-top: 0.25rem;
            transition: background-color 0.15s ease;
        }

        .login-card .btn-primary:hover {
            background-color: #4338ca;
            border-color: #4338ca;
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

        /* ---------- MOBILE (≤ 575.98px) ---------- */
        @media (max-width: 575.98px) {
            .login-outer {
                padding: 1rem 0.85rem;
            }

            .login-card {
                max-width: 100%;
            }

            .login-card .card-body {
                padding: 1.5rem 1.25rem;
            }
        }

        /* ---------- SMALL MOBILE (≤ 360px) ---------- */
        @media (max-width: 360px) {
            .login-card .card-header {
                padding: 0.85rem 1rem;
                font-size: 0.9rem;
            }

            .login-card .card-body {
                padding: 1.25rem 1rem;
            }
        }
    </style>
@endpush

@section('content')

    <div class="login-outer">
        <div class="card text-center login-card">
            <div class="card-header">
                Login POS
            </div>
            <div class="card-body">
                <form action="{{ route('auth') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                        @error('email')
                            <div class="badge bg-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                        @error('password')
                            <div class="badge bg-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

@endsection