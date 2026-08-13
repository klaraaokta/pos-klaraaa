@extends('layouts.app')

@section('title', 'Detail Penjualan')

@push('styles')
    <style>
        body {
            background-color: #f8fafc;
        }

        .detail-page-content {
            max-width: 800px;
            margin: 0 auto;
            padding: 2rem 1rem 4rem;
        }

        /* ---------- Page header ---------- */
        .detail-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
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

        .btn-back {
            background-color: transparent;
            border: 1px solid #e2e8f0;
            color: #64748b;
            font-size: 0.82rem;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 8px;
        }

        .btn-back:hover {
            background-color: #f1f5f9;
            border-color: #cbd5e1;
            color: #334155;
        }

        /* ---------- Card utama ---------- */
        .detail-card {
            background-color: #ffffff;
            border: 1px solid #eef0f4;
            border-radius: 14px;
            box-shadow: 0 1px 3px rgba(15, 23, 42, 0.05);
            overflow: hidden;
            margin-bottom: 1.5rem;
        }

        /* ---------- Info transaksi ---------- */
        .detail-info {
            padding: 1.5rem;
            border-bottom: 1px solid #f1f5f9;
        }

        .detail-info-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0.6rem 0;
            border-bottom: 1px dashed #f1f5f9;
        }

        .detail-info-row:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .detail-info-row:first-child {
            padding-top: 0;
        }

        .detail-info-label {
            font-size: 0.78rem;
            font-weight: 600;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: 0.04em;
        }

        .detail-info-value {
            font-size: 0.9rem;
            font-weight: 600;
            color: #0f172a;
            text-align: right;
        }

        /* ID Transaksi = identifier unik, dibedain */
        .detail-info-value.detail-id {
            color: #4f46e5;
            font-family: monospace;
        }

        /* Kasir = info sekunder, diredupkan */
        .detail-info-value.detail-kasir {
            font-weight: 500;
            color: #94a3b8;
            font-size: 0.85rem;
        }

        /* ---------- Badge ---------- */
        .metode-badge {
            display: inline-block;
            padding: 0.2rem 0.65rem;
            border-radius: 999px;
            font-size: 0.72rem;
            font-weight: 700;
            background-color: #eef2ff;
            color: #4338ca;
            text-transform: capitalize;
        }

        .status-badge {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 999px;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: capitalize;
        }

        .status-badge.completed,
        .status-badge.lunas,
        .status-badge.selesai,
        .status-badge.paid {
            background-color: #dcfce7;
            color: #15803d;
        }

        .status-badge.open,
        .status-badge.pending,
        .status-badge.menunggu {
            background-color: #fef3c7;
            color: #b45309;
        }

        .status-badge.batal,
        .status-badge.cancelled,
        .status-badge.gagal {
            background-color: #fee2e2;
            color: #b91c1c;
        }

        /* ---------- Item list ---------- */
        .detail-items-header {
            padding: 1.1rem 1.5rem 0.8rem;
            font-size: 0.78rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #64748b;
            border-bottom: 1px solid #f1f5f9;
        }

        .detail-item-row {
            display: flex;
            align-items: center;
            gap: 0.85rem;
            padding: 0.9rem 1.5rem;
            border-bottom: 1px solid #f8fafc;
        }

        .detail-item-row:last-child {
            border-bottom: none;
        }

        .detail-item-thumb {
            width: 48px;
            height: 48px;
            border-radius: 8px;
            object-fit: cover;
            border: 1px solid #eef0f4;
            flex-shrink: 0;
        }

        .detail-item-info {
            flex: 1;
            min-width: 0;
        }

        .detail-item-nama {
            font-size: 0.88rem;
            font-weight: 600;
            color: #0f172a;
            margin-bottom: 0.1rem;
        }

        .detail-item-meta {
            font-size: 0.78rem;
            color: #94a3b8;
        }

        .detail-item-subtotal {
            font-size: 0.9rem;
            font-weight: 700;
            color: #4338ca;
            text-align: right;
            flex-shrink: 0;
        }

        .detail-empty {
            padding: 2.5rem 1rem;
            text-align: center;
            color: #94a3b8;
        }

        .detail-empty i {
            font-size: 1.8rem;
            display: block;
            margin-bottom: 0.5rem;
        }

        /* ---------- Footer total ---------- */
        .detail-footer {
            background-color: #f8fafc;
            padding: 1.25rem 1.5rem;
        }

        .detail-total-row {
            display: flex;
            align-items: baseline;
            justify-content: space-between;
        }

        .detail-total-label {
            font-size: 0.85rem;
            font-weight: 700;
            color: #334155;
            text-transform: uppercase;
            letter-spacing: 0.04em;
        }

        .detail-total-value {
            font-size: 1.55rem;
            font-weight: 800;
            color: #0f172a;
            letter-spacing: -0.02em;
        }

        /* ---------- Actions ---------- */
        .detail-actions {
            display: flex;
            gap: 0.6rem;
            justify-content: flex-end;
        }

        .detail-actions .btn-print {
            background-color: #4f46e5;
            border-color: #4f46e5;
            color: #ffffff;
            font-size: 0.85rem;
            font-weight: 600;
            padding: 0.55rem 1.2rem;
            border-radius: 8px;
        }

        .detail-actions .btn-print:hover {
            background-color: #4338ca;
            border-color: #4338ca;
        }

        /* =========================================================
               RESPONSIVE — TABLET & window sempit (≤ 991.98px)
               ========================================================= */
        @media (max-width: 991.98px) {
            .detail-page-content {
                padding: 1.5rem 1rem 3rem;
            }
        }

        /* =========================================================
               RESPONSIVE — MOBILE (≤ 575.98px)
               ========================================================= */
        @media (max-width: 575.98px) {
            .detail-page-content {
                padding: 1.25rem 0.85rem 3rem;
            }

            .page-title {
                font-size: 1.2rem;
            }

            .detail-info,
            .detail-items-header,
            .detail-item-row,
            .detail-footer {
                padding-left: 1rem;
                padding-right: 1rem;
            }

            .detail-info-row {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.15rem;
            }

            .detail-info-value {
                text-align: left;
            }

            .detail-item-row {
                flex-wrap: wrap;
            }

            .detail-item-subtotal {
                width: 100%;
                text-align: left;
                padding-left: calc(48px + 0.85rem);
            }

            .detail-total-value {
                font-size: 1.3rem;
            }

            .detail-actions {
                justify-content: stretch;
            }

            .detail-actions .btn-print {
                width: 100%;
                text-align: center;
            }
        }

        /* =========================================================
               PRINT — sembunyikan elemen yang gak perlu di hasil cetak
               ========================================================= */
        @media print {

            .pos-navbar,
            .detail-header .btn-back,
            .detail-actions {
                display: none !important;
            }

            body {
                background-color: #ffffff !important;
            }

            .detail-page-content {
                padding: 0 !important;
                max-width: 100% !important;
            }

            .detail-card {
                box-shadow: none !important;
                border: 1px solid #cbd5e1 !important;
            }
        }
    </style>
@endpush

@section('content')

    @include('layouts.navbar')

    <div class="detail-page-content">
        <div class="detail-header">
            <h1 class="page-title">Detail Penjualan</h1>
            <a href="{{ route('penjualan.index') }}" class="btn btn-back">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>

        <div class="detail-card">
            {{-- ================== INFO TRANSAKSI ================== --}}
            <div class="detail-info">
                <div class="detail-info-row">
                    <span class="detail-info-label">ID Transaksi</span>
                    <span class="detail-info-value detail-id">#{{ $sale->id }}</span>
                </div>
                <div class="detail-info-row">
                    <span class="detail-info-label">Tanggal Transaksi</span>
                    <span class="detail-info-value">{{ $sale->created_at->translatedFormat('d F Y, H:i:s') }}</span>
                </div>
                <div class="detail-info-row">
                    <span class="detail-info-label">Total Pembayaran</span>
                    <span class="detail-info-value">Rp {{ number_format($sale->total_pembayaran) }}</span>
                </div>
                <div class="detail-info-row">
                    <span class="detail-info-label">Metode Pembayaran</span>
                    <span class="detail-info-value">
                        <span class="metode-badge">{{ $sale->metode_pembayaran }}</span>
                    </span>
                </div>
                <div class="detail-info-row">
                    <span class="detail-info-label">Status</span>
                    <span class="detail-info-value">
                        <span class="status-badge {{ strtolower($sale->status) }}">{{ $sale->status }}</span>
                    </span>
                </div>
                <div class="detail-info-row">
                    <span class="detail-info-label">Kasir</span>
                    <span class="detail-info-value detail-kasir">{{ $sale->user->name }}</span>
                </div>
            </div>

            {{-- ================== ITEM PRODUK ================== --}}
            <div class="detail-items-header">
                Item Produk ({{ $sale->itemPenjualan->count() }})
            </div>

            @forelse ($sale->itemPenjualan as $item)
                <div class="detail-item-row">
                    <img src="{{ asset('storage/' . $item->produk->foto) }}" alt="{{ $item->produk->nama }}"
                        class="detail-item-thumb">
                    <div class="detail-item-info">
                        <div class="detail-item-nama">{{ $item->produk->nama }}</div>
                        <div class="detail-item-meta">
                            {{ $item->kuantitas }} x Rp {{ number_format($item->harga_satuan) }}
                        </div>
                    </div>
                    <div class="detail-item-subtotal">
                        Rp {{ number_format($item->subtotal) }}
                    </div>
                </div>
            @empty
                <div class="detail-empty">
                    <i class="bi bi-box-seam"></i>
                    Tidak ada item produk pada transaksi ini
                </div>
            @endforelse

            {{-- ================== TOTAL ================== --}}
            <div class="detail-footer">
                <div class="detail-total-row">
                    <span class="detail-total-label">Total Pembayaran</span>
                    <span class="detail-total-value">Rp {{ number_format($sale->total_pembayaran) }}</span>
                </div>
            </div>
        </div>

        <div class="detail-actions">
            <button onclick="window.print()" class="btn btn-print">
                <i class="bi bi-printer"></i> Cetak Struk
            </button>
        </div>
    </div>

@endsection
