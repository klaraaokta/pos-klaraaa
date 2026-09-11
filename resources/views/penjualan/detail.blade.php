@extends('layouts.app')

@section('title', 'Detail Penjualan')

@push('styles')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;700&display=swap" rel="stylesheet">

    <style>
        body {
            background-color: #f1f3f5;
        }

        .detail-page-content {
            max-width: 480px;
            margin: 0 auto;
            padding: 1.5rem 1rem 3rem;
        }

        .detail-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
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

        .btn-back {
            background-color: transparent;
            border: 1px solid #e5e7eb;
            color: #64748b;
            font-size: 0.8rem;
            font-weight: 500;
            padding: 0.45rem 0.9rem;
            border-radius: 7px;
        }

        .btn-back:hover {
            background-color: #f1f5f9;
            border-color: #cbd5e1;
            color: #334155;
        }

        /* ---------- Kertas struk ---------- */
        .receipt-paper {
            background-color: #ffffff;
            border-radius: 4px;
            box-shadow: 0 2px 10px rgba(15, 23, 42, 0.08);
            padding: 1.5rem 1.4rem;
            font-family: 'JetBrains Mono', 'Courier New', monospace;
            color: #1e293b;
            margin-bottom: 1.25rem;
        }

        .receipt-store {
            text-align: center;
            margin-bottom: 0.9rem;
        }

        .receipt-store-name {
            font-size: 1.05rem;
            font-weight: 700;
            letter-spacing: 0.03em;
        }

        .receipt-store-sub {
            font-size: 0.7rem;
            color: #64748b;
            margin-top: 0.15rem;
        }

        .receipt-divider {
            border-top: 1px dashed #cbd5e1;
            margin: 0.75rem 0;
        }

        .receipt-info-row {
            display: flex;
            justify-content: space-between;
            font-size: 0.76rem;
            padding: 0.12rem 0;
            color: #334155;
        }

        .receipt-info-row span:first-child {
            color: #94a3b8;
        }

        .receipt-item {
            margin-bottom: 0.55rem;
        }

        .receipt-item-nama {
            font-size: 0.8rem;
            font-weight: 700;
            color: #0f172a;
        }

        .receipt-item-detail {
            display: flex;
            justify-content: space-between;
            font-size: 0.76rem;
            color: #475569;
            padding-left: 0.1rem;
        }

        .receipt-total-row {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            font-size: 0.95rem;
            font-weight: 700;
            padding: 0.15rem 0;
        }

        .receipt-pay-row {
            display: flex;
            justify-content: space-between;
            font-size: 0.78rem;
            padding: 0.1rem 0;
            color: #334155;
        }

        .receipt-status {
            text-align: center;
            margin: 0.85rem 0 0.4rem;
        }

        .receipt-status-badge {
            display: inline-block;
            padding: 0.2rem 0.75rem;
            border-radius: 3px;
            font-size: 0.68rem;
            font-weight: 700;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            border: 1px dashed currentColor;
        }

        .receipt-status-badge.completed,
        .receipt-status-badge.lunas,
        .receipt-status-badge.selesai,
        .receipt-status-badge.paid {
            color: #15803d;
        }

        .receipt-status-badge.open,
        .receipt-status-badge.pending,
        .receipt-status-badge.menunggu {
            color: #b45309;
        }

        .receipt-status-badge.batal,
        .receipt-status-badge.cancelled,
        .receipt-status-badge.gagal {
            color: #b91c1c;
        }

        .receipt-barcode {
            display: flex;
            justify-content: center;
            margin: 1rem 0 0.35rem;
        }

        .receipt-barcode-number {
            text-align: center;
            font-size: 0.72rem;
            letter-spacing: 0.15em;
            color: #334155;
        }

        .receipt-footer {
            text-align: center;
            font-size: 0.72rem;
            color: #64748b;
            margin-top: 0.9rem;
            line-height: 1.5;
        }

        .receipt-empty {
            text-align: center;
            padding: 1.25rem 0;
            color: #94a3b8;
            font-size: 0.8rem;
        }

        .detail-actions {
            display: flex;
            gap: 0.55rem;
            justify-content: flex-end;
        }

        .detail-actions .btn-print {
            background-color: #4f46e5;
            border-color: #4f46e5;
            color: #ffffff;
            font-size: 0.82rem;
            font-weight: 600;
            padding: 0.5rem 1.1rem;
            border-radius: 7px;
        }

        .detail-actions .btn-print:hover {
            background-color: #4338ca;
            border-color: #4338ca;
        }

        @media (max-width: 575.98px) {
            .detail-page-content {
                padding: 1rem 0.85rem 2.5rem;
            }

            .receipt-paper {
                padding: 1.25rem 1rem;
            }

            .detail-actions {
                justify-content: stretch;
            }

            .detail-actions .btn-print {
                width: 100%;
                text-align: center;
            }
        }

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
                max-width: 320px !important;
            }

            .receipt-paper {
                box-shadow: none !important;
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

        <div class="receipt-paper">

            {{-- ================== KOP TOKO ================== --}}
            <div class="receipt-store">
                <div class="receipt-store-name">KLARA RASA</div>
                <div class="receipt-store-sub">Struk Pembelian</div>
            </div>

            <div class="receipt-divider"></div>

            {{-- ================== INFO TRANSAKSI ================== --}}
            <div class="receipt-info-row">
                <span>No. Transaksi</span>
                <span>#{{ str_pad($sale->id, 6, '0', STR_PAD_LEFT) }}</span>
            </div>
            <div class="receipt-info-row">
                <span>Tanggal</span>
                <span>{{ $sale->created_at->translatedFormat('d/m/Y') }}</span>
            </div>
            <div class="receipt-info-row">
                <span>Waktu</span>
                <span>{{ $sale->created_at->format('H:i') }}</span>
            </div>
            <div class="receipt-info-row">
                <span>Kasir</span>
                <span>{{ $sale->user->name }}</span>
            </div>

            <div class="receipt-divider"></div>

            {{-- ================== ITEM PRODUK ================== --}}
            @forelse ($sale->itemPenjualan as $item)
                <div class="receipt-item">
                    <div class="receipt-item-nama">{{ strtoupper($item->produk->nama) }}</div>
                    <div class="receipt-item-detail">
                        <span>{{ $item->kuantitas }} x {{ number_format($item->harga_satuan, 0, ',', '.') }}</span>
                        <span>{{ number_format($item->subtotal, 0, ',', '.') }}</span>
                    </div>
                </div>
            @empty
                <div class="receipt-empty">Tidak ada item produk</div>
            @endforelse

            <div class="receipt-divider"></div>

            {{-- ================== TOTAL ================== --}}
            <div class="receipt-total-row">
                <span>TOTAL</span>
                <span>Rp {{ number_format($sale->total_pembayaran, 0, ',', '.') }}</span>
            </div>

            <div class="receipt-divider"></div>

            {{-- ================== PEMBAYARAN ================== --}}
            <div class="receipt-pay-row">
                <span>Metode</span>
                <span>{{ $sale->metode_pembayaran }}</span>
            </div>

            @if ($sale->metode_pembayaran === 'CASH')
                <div class="receipt-pay-row">
                    <span>Uang Masuk</span>
                    <span>Rp {{ number_format($sale->uang_bayar, 0, ',', '.') }}</span>
                </div>
                <div class="receipt-pay-row">
                    <span>Kembali</span>
                    <span>Rp {{ number_format($sale->kembalian, 0, ',', '.') }}</span>
                </div>
            @endif

            {{-- ================== STATUS ================== --}}
            <div class="receipt-status">
                <span class="receipt-status-badge {{ strtolower($sale->status) }}">{{ $sale->status }}</span>
            </div>

            {{-- ================== BARCODE (visual) ================== --}}
            @php
                mt_srand($sale->id);
                $barCount = 46;
                $gap = 1.6;
                $barWidths = [];
                for ($i = 0; $i < $barCount; $i++) {
                    $barWidths[] = mt_rand(1, 3);
                }
                // Total lebar semua batang + jarak antar batang,
                // dipakai sebagai viewBox biar SVG-nya otomatis penuh 220px
                $totalWidth = array_sum($barWidths) + ($barCount - 1) * $gap;
                $barcodeNumber = str_pad($sale->id, 12, '0', STR_PAD_LEFT);
            @endphp
            <div class="receipt-barcode">
                <svg width="220" height="46" viewBox="0 0 {{ $totalWidth }} 46" preserveAspectRatio="none"
                    xmlns="http://www.w3.org/2000/svg">
                    @php $x = 0; @endphp
                    @foreach ($barWidths as $w)
                        <rect x="{{ $x }}" y="0" width="{{ $w }}" height="38" fill="#0f172a">
                        </rect>
                        @php $x += $w + $gap; @endphp
                    @endforeach
                </svg>
            </div>
            <div class="receipt-barcode-number">{{ $barcodeNumber }}</div>
            <div class="receipt-footer">
                TERIMA KASIH ATAS KUNJUNGAN ANDA<br>
                Barang yang sudah dibeli tidak dapat dikembalikan
            </div>
        </div>

        <div class="detail-actions">
            <button onclick="window.print()" class="btn btn-print">
                <i class="bi bi-printer"></i> Cetak Struk
            </button>
        </div>
    </div>

@endsection
