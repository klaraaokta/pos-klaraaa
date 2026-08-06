@push('styles')
    <style>
        body {
            background-color: #f8fafc;
        }

        .produk-form-outer {
            min-height: calc(100vh - 90px);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
        }

        .produk-form-wrapper {
            max-width: 640px;
            width: 100%;
        }

        .produk-form-card {
            background-color: #ffffff;
            border: 1px solid #eef0f4;
            border-radius: 14px;
            box-shadow: 0 4px 16px rgba(15, 23, 42, 0.06);
            overflow: hidden;
        }

        .produk-form-header {
            background-color: #4f46e5;
            color: #ffffff;
            padding: 1.15rem 1.75rem;
        }

        .produk-form-header h1 {
            font-size: 1.05rem;
            font-weight: 700;
            margin-bottom: 0.2rem;
        }

        .produk-form-header p {
            font-size: 0.78rem;
            color: #e0e7ff;
            margin-bottom: 0;
        }

        .produk-form-body {
            padding: 1.75rem;
        }

        .produk-form-body>div:not(.row) {
            margin-bottom: 1.25rem;
        }

        .produk-form-body label {
            display: block;
            font-size: 0.8rem;
            font-weight: 600;
            color: #334155;
            margin-bottom: 0.4rem;
        }

        .produk-form-body .form-control {
            font-size: 0.875rem;
            padding: 0.55rem 0.85rem;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            width: 100%;
        }

        .produk-form-body .form-control:focus {
            border-color: #4f46e5;
            box-shadow: 0 0 0 3px #eef2ff;
            outline: none;
        }

        .produk-form-body .is-invalid {
            border-color: #dc2626;
        }

        .produk-form-body .invalid-feedback {
            font-size: 0.75rem;
            margin-top: 0.3rem;
        }

        /* ---------- Foto saat ini ---------- */
        .produk-current-foto {
            display: flex;
            align-items: center;
            gap: 1rem;
            background-color: #f8fafc;
            border: 1px solid #eef0f4;
            border-radius: 10px;
            padding: 0.85rem 1rem;
            margin-bottom: 1.25rem;
        }

        .produk-current-foto label {
            margin-bottom: 0;
            font-size: 0.75rem;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            font-weight: 700;
        }

        .produk-current-foto img,
        .produk-form-body #preview {
            width: 72px;
            height: 72px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid #eef0f4;
        }

        /* ---------- Upload & Preview row ---------- */
        .produk-form-body .row {
            display: flex;
            gap: 1rem;
            margin-bottom: 1.25rem;
        }

        .produk-form-body .row .col {
            flex: 1;
            min-width: 0;
        }

        .produk-upload-box {
            border: 1.5px dashed #cbd5e1;
            border-radius: 10px;
            padding: 0.75rem;
            background-color: #f8fafc;
        }

        .produk-form-body input[type="file"] {
            font-size: 0.8rem;
            padding: 0.4rem 0;
            border: none;
            background: transparent;
        }

        .produk-preview-box {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 90px;
            border: 1px solid #eef0f4;
            border-radius: 10px;
            background-color: #f8fafc;
        }

        .produk-preview-box #preview {
            margin-top: 0 !important;
        }

        .produk-preview-empty {
            font-size: 0.75rem;
            color: #cbd5e1;
            text-align: center;
        }

        /* ---------- Actions ---------- */
        .produk-form-actions {
            display: flex;
            gap: 0.6rem;
            margin-top: 1.75rem;
            padding-top: 1.25rem;
            border-top: 1px solid #f1f5f9;
        }

        .produk-form-actions .btn-success {
            flex: 1;
            background-color: #4f46e5;
            border-color: #4f46e5;
            font-size: 0.875rem;
            font-weight: 600;
            padding: 0.6rem 0;
            border-radius: 8px;
        }

        .produk-form-actions .btn-success:hover {
            background-color: #4338ca;
            border-color: #4338ca;
        }

        .produk-form-actions .btn-secondary {
            background-color: transparent;
            border: 1px solid #cbd5e1;
            color: #64748b;
            font-size: 0.875rem;
            font-weight: 500;
            padding: 0.6rem 1.1rem;
            border-radius: 8px;
        }

        .produk-form-actions .btn-secondary:hover {
            background-color: #f1f5f9;
            border-color: #cbd5e1;
            color: #334155;
        }

        /* =========================================================
               RESPONSIVE — TABLET (≤ 991.98px)
               ========================================================= */
        @media (max-width: 991.98px) {
            .produk-form-outer {
                padding: 1.5rem 1rem;
            }
        }

        /* =========================================================
               RESPONSIVE — MOBILE (≤ 575.98px)
               ========================================================= */
        @media (max-width: 575.98px) {
            .produk-form-outer {
                min-height: auto;
                padding: 1.25rem 0.85rem 2.5rem;
            }

            .produk-form-header {
                padding: 1rem 1.25rem;
            }

            .produk-form-body {
                padding: 1.25rem;
            }

            .produk-form-body .row {
                flex-direction: column;
                gap: 1.25rem;
            }

            .produk-form-actions {
                flex-direction: column-reverse;
            }

            .produk-form-actions .btn-secondary {
                width: 100%;
                text-align: center;
            }

            /* =========================================================
       RESPONSIVE — SMALL MOBILE (≤ 400px)
       ========================================================= */
            @media (max-width: 400px) {
                .produk-form-header {
                    padding: 0.85rem 1rem;
                }

                .produk-form-header h1 {
                    font-size: 0.95rem;
                }

                .produk-form-header p {
                    font-size: 0.72rem;
                }

                .produk-form-body {
                    padding: 1rem;
                }

                .produk-current-foto {
                    flex-direction: column;
                    align-items: flex-start;
                    gap: 0.5rem;
                }

                .produk-upload-box {
                    padding: 0.6rem;
                }

                .produk-form-body input[type="file"] {
                    font-size: 0.75rem;
                }

                .produk-preview-box {
                    min-height: 70px;
                }

                .produk-current-foto img,
                .produk-form-body #preview {
                    width: 60px;
                    height: 60px;
                }
            }
        }
    </style>
@endpush

<div class="produk-form-outer">
    <div class="produk-form-wrapper">
        <div class="produk-form-card">
            <div class="produk-form-header">
                <h1>{{ isset($produk) ? 'Edit Produk' : 'Tambah Produk Baru' }}</h1>
                <p>{{ isset($produk) ? 'Perbarui informasi produk' : 'Lengkapi data untuk menambahkan produk baru' }}
                </p>
            </div>

            <div class="produk-form-body">
                @csrf

                @if (!empty($produk->foto))
                    <div class="produk-current-foto">
                        <img src="{{ asset('storage/' . $produk->foto) }}" alt="{{ $produk->nama }}">
                        <label>Foto Saat Ini</label>
                    </div>
                @endif

                <div class="row">
                    <div class="col">
                        <label>Gambar</label>
                        <div class="produk-upload-box">
                            <input type="file" name="foto" onchange="previewImage(this)"
                                class="form-control @error('foto') is-invalid @enderror">
                        </div>
                        @error('foto')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col">
                        <label>Preview Foto</label>
                        <div class="produk-preview-box">
                            <img id="preview" style="display: none">
                            <span class="produk-preview-empty" id="previewEmptyText">Belum ada gambar dipilih</span>
                        </div>
                    </div>
                </div>

                <div>
                    <label>Nama Produk</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name', $produk->nama ?? '') }}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div>
                    <label>Harga Beli</label>
                    <input type="number" name="purchase_price"
                        class="form-control @error('purchase_price') is-invalid @enderror"
                        value="{{ old('purchase_price', $produk->harga_beli ?? '') }}">
                    @error('purchase_price')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div>
                    <label>Harga Jual</label>
                    <input type="number" name="selling_price"
                        class="form-control @error('selling_price') is-invalid @enderror"
                        value="{{ old('selling_price', $produk->harga_jual ?? '') }}">
                    @error('selling_price')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div>
                    <label>Stok</label>
                    <input type="number" name="stock" class="form-control @error('stock') is-invalid @enderror"
                        value="{{ old('stock', $produk->stok ?? '') }}">
                    @error('stock')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="produk-form-actions">
                    <button class="btn btn-success" type="submit">Simpan</button>
                    <a href="{{ route('produk.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function previewImage(input) {
        const preview = document.getElementById('preview');
        const emptyText = document.getElementById('previewEmptyText');
        const file = input.files[0];

        if (file) {
            preview.src = URL.createObjectURL(file);
            preview.style.display = 'block';
            emptyText.style.display = 'none';
        }
    }
</script>
