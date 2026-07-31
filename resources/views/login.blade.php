<!-- memanggil file app.blade.php -->
@extends('layouts.app')

<!-- mengirimkan nilai ke tittle untuk ditampilkan -->
@section('title', 'Login')

@push('styles')
    <style>
        body {
            background: linear-gradient(180deg, #F4F5F7 0%, #E9EBEE 100%);
            min-height: 100vh;
        }

        .login-card {
            width: min(92vw, 22rem);
            border: 1px solid #E3E5E9;
            border-radius: 14px;
            background: #FFFFFF;
            box-shadow: 0 1px 2px rgba(16, 24, 40, 0.04), 0 12px 28px -8px rgba(16, 24, 40, 0.12);
            overflow: hidden;
        }

        .login-card .card-header {
            background: #F8F9FA;
            border-bottom: 1px solid #E3E5E9;
            padding: 1.1rem 1.25rem;
            font-weight: 600;
            font-size: .95rem;
            letter-spacing: .02em;
            color: #2B3040;
        }

        .login-card .card-body {
            padding: 1.75rem 1.5rem 1.5rem;
        }

        .login-card .form-label {
            font-size: .78rem;
            font-weight: 500;
            color: #6B7280;
            text-align: left;
            display: block;
            margin-bottom: .4rem;
        }

        .login-card .form-control {
            border: 1px solid #D8DBE0;
            border-radius: 8px;
            padding: .6rem .8rem;
            font-size: .9rem;
            background: #FBFBFC;
            transition: border-color .15s ease, box-shadow .15s ease, background .15s ease;
        }

        .login-card .form-control:focus {
            outline: none;
            background: #fff;
            border-color: #4B5563;
            box-shadow: 0 0 0 3px rgba(75, 85, 99, 0.12);
        }

        .login-card .mb-3 {
            text-align: left;
        }

        .login-card .btn-primary {
            width: 100%;
            background: #3A4150;
            border: none;
            border-radius: 8px;
            padding: .65rem 1rem;
            font-weight: 600;
            font-size: .88rem;
            letter-spacing: .02em;
            margin-top: .35rem;
            transition: background .15s ease, transform .1s ease;
        }

        .login-card .btn-primary:hover {
            background: #2C323E;
            transform: translateY(-1px);
        }

        .login-card .btn-primary:active {
            transform: translateY(0);
        }

        .login-card .badge.bg-danger {
            background: transparent !important;
            color: #DC2626;
            font-weight: 400;
            font-size: .76rem;
            padding: .25rem 0 0;
            display: block;
            text-align: left;
        }

        /* Alert status (mis. "Anda telah keluar aplikasi") — disamakan ke tema abu profesional */
        .alert-success {
            background: #F8F9FA !important;
            border: 1px solid #E3E5E9 !important;
            border-left: 4px solid #3A4150 !important;
            color: #2B3040 !important;
            border-radius: 10px !important;
            box-shadow: 0 1px 2px rgba(16, 24, 40, 0.04);
            max-width: 960px;
            width: 100%;
            margin: 1.25rem auto !important;
            padding: .85rem 1.1rem !important;
            font-size: .88rem;
        }

        @media (max-width: 576px) {
            .alert-success {
                margin: .85rem auto !important;
                padding: .7rem .9rem !important;
                font-size: .82rem;
            }
        }
    </style>
@endpush

<!-- batas awal isi konten -->
@section('content')

    <div class="card text-center position-absolute top-50 start-50 translate-middle login-card">
        <div class="card-header">
            Login POS
        </div>
        <div class="card-body">
            <form action="{{ route('auth') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
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
    <!-- batas akhir isi konten -->
@endsection