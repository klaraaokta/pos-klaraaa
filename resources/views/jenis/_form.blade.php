@extends('layouts.app')

@section('tittle', isset($jenis) ? 'Edit Jenis' : 'Tambah Jenis')

@push('styles')
    <style>
        body {
            background-color: #f8fafc;
        }

        .jenis-form-outer {
            min-height: calc(100vh - 90px);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
        }

        .jenis-form-wrapper {
            max-width: 420px;
            width: 100%;
        }

        .jenis-form-card {
            background-color: #ffffff;
            border: 1px solid #eef0f4;
            border-radius: 14px;
            box-shadow: 0 4px 16px rgba(15, 23, 42, 0.06);
            overflow: hidden;
        }

        .jenis-form-header {
            background-color: #4f46e5;
            color: #ffffff;
            padding: 1.15rem 1.75rem;
        }

        .jenis-form-header h1 {
            font-size: 1.05rem;
            font-weight: 700;
            margin-bottom: 0.2rem;
        }

        .jenis-form-header p {
            font-size: 0.78rem;
            color: #e0e7ff;
            margin-bottom: 0;
        }

        .jenis-form-body {
            padding: 1.75rem;
        }

        .jenis-form-body .form-label {
            font-size: 0.8rem;
            font-weight: 600;
            color: #334155;
            margin-bottom: 0.4rem;
        }

        .jenis-form-body .form-control {
            font-size: 0.875rem;
            padding: 0.55rem 0.85rem;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            width: 100%;
        }

        .jenis-form-body .form-control:focus {
            border-color: #4f46e5;
            box-shadow: 0 0 0 3px #eef2ff;
            outline: none;
        }

        .jenis-form-body .is-invalid {
            border-color: #dc2626;
        }

        .jenis-form-body .invalid-feedback {
            font-size: 0.75rem;
            margin-top: 0.3rem;
        }

        .jenis-form-actions {
            display: flex;
            gap: 0.6rem;
            margin-top: 1.75rem;
            padding-top: 1.25rem;
            border-top: 1px solid #f1f5f9;
        }

        .jenis-form-actions .btn-success {
            flex: 1;
            background-color: #4f46e5;
            border-color: #4f46e5;
            font-size: 0.875rem;
            font-weight: 600;
            padding: 0.6rem 0;
            border-radius: 8px;
        }

        .jenis-form-actions .btn-success:hover {
            background-color: #4338ca;
            border-color: #4338ca;
        }

        .jenis-form-actions .btn-secondary {
            background-color: transparent;
            border: 1px solid #cbd5e1;
            color: #64748b;
            font-size: 0.875rem;
            font-weight: 500;
            padding: 0.6rem 1.1rem;
            border-radius: 8px;
        }

        .jenis-form-actions .btn-secondary:hover {
            background-color: #f1f5f9;
            border-color: #cbd5e1;
            color: #334155;
        }

        @media (max-width: 991.98px) {
            .jenis-form-outer {
                padding: 1.5rem 1rem;
            }
        }

        @media (max-width: 575.98px) {
            .jenis-form-outer {
                min-height: auto;
                padding: 1.25rem 0.85rem 2.5rem;
            }

            .jenis-form-header {
                padding: 1rem 1.25rem;
            }

            .jenis-form-body {
                padding: 1.25rem;
            }

            .jenis-form-actions {
                flex-direction: column-reverse;
            }

            .jenis-form-actions .btn-secondary {
                width: 100%;
                text-align: center;
            }
        }
    </style>
@endpush

@section('content')

    @include('layouts.navbar')

    <div class="jenis-form-outer">
        <div class="jenis-form-wrapper">
            <div class="jenis-form-card">
                <div class="jenis-form-header">
                    <h1>{{ isset($jenis) ? 'Edit Jenis' : 'Tambah Jenis Baru' }}</h1>
                    <p>{{ isset($jenis) ? 'Perbarui nama jenis produk' : 'Lengkapi data untuk menambahkan jenis baru' }}</p>
                </div>

                <div class="jenis-form-body">
                    <form action="{{ isset($jenis) ? route('jenis.update', $jenis) : route('jenis.store') }}" method="POST">
                        @csrf
                        @if (isset($jenis))
                            @method('PUT')
                        @endif

                        <div class="mb-3">
                            <label class="form-label">Nama Jenis</label>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                                value="{{ old('nama', $jenis->nama ?? '') }}"
                                placeholder="Contoh: Minuman, Makanan, Alat Tulis">
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="jenis-form-actions">
                            <button class="btn btn-success">Simpan</button>
                            <a href="{{ route('jenis.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
