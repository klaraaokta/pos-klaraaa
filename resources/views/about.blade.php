@extends('layouts.app')

@section('title', 'Tentang')

@push('styles')
    <style>
        body {
            background-color: #f8fafc;
        }

        .about-page-content {
            max-width: 720px;
            margin: 0 auto;
            padding: 2rem 1rem 4rem;
        }

        .about-header {
            margin-bottom: 1.5rem;
        }

        .about-header .page-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #0f172a;
            letter-spacing: -0.01em;
            margin-bottom: 0.2rem;
        }

        .about-header .page-subtitle {
            font-size: 0.85rem;
            color: #94a3b8;
        }

        /* ================== HERO PROFIL ================== */
        .about-hero {
            background-color: #ffffff;
            border: 1px solid #eef0f4;
            border-radius: 16px;
            box-shadow: 0 4px 16px rgba(15, 23, 42, 0.06);
            overflow: hidden;
            margin-bottom: 2rem;
        }

        .about-hero-banner {
            height: 96px;
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
        }

        .about-avatar-wrap {
            display: flex;
            justify-content: center;
            margin-top: -52px;
        }

        .about-avatar {
            width: 104px;
            height: 104px;
            border-radius: 50%;
            border: 4px solid #ffffff;
            box-shadow: 0 4px 14px rgba(15, 23, 42, 0.14);
            background-color: #eef2ff;
            color: #4338ca;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.9rem;
            font-weight: 700;
            overflow: hidden;
        }

        .about-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .about-hero-info {
            text-align: center;
            padding: 0.75rem 1.75rem 1.75rem;
        }

        .about-name {
            font-size: 1.2rem;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 0.5rem;
        }

        .about-tags {
            display: flex;
            justify-content: center;
            gap: 0.4rem;
            flex-wrap: wrap;
            margin-bottom: 0.9rem;
        }

        .about-role {
            display: inline-block;
            font-size: 0.75rem;
            font-weight: 600;
            color: #4338ca;
            background-color: #eef2ff;
            padding: 0.28rem 0.85rem;
            border-radius: 999px;
        }

        .about-since {
            display: inline-block;
            font-size: 0.75rem;
            font-weight: 600;
            color: #64748b;
            background-color: #f1f5f9;
            padding: 0.28rem 0.85rem;
            border-radius: 999px;
        }

        .about-bio {
            max-width: 440px;
            margin: 0 auto 1.1rem;
            font-size: 0.85rem;
            color: #475569;
            line-height: 1.65;
        }

        .about-contact {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        .about-contact a {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            font-size: 0.78rem;
            font-weight: 500;
            color: #334155;
            border: 1px solid #e2e8f0;
            padding: 0.4rem 0.9rem;
            border-radius: 999px;
            text-decoration: none;
            transition: border-color 0.15s ease, color 0.15s ease, background-color 0.15s ease;
        }

        .about-contact a:hover {
            border-color: #4f46e5;
            color: #4f46e5;
            background-color: #eef2ff;
        }

        /* ================== DIVIDER ================== */
        .about-divider {
            border: none;
            border-top: 1px dashed #e2e8f0;
            margin: 0 0 1.5rem;
        }

        /* ================== SECTION: TENTANG APLIKASI ================== */
        .about-app-card {
            background-color: #ffffff;
            border: 1px solid #eef0f4;
            border-radius: 16px;
            box-shadow: 0 4px 16px rgba(15, 23, 42, 0.06);
            padding: 1.5rem 1.5rem 1.75rem;
        }

        .about-section-heading {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            margin-bottom: 0.6rem;
        }

        .about-section-heading .about-section-icon {
            width: 32px;
            height: 32px;
            border-radius: 9px;
            background-color: #eef2ff;
            color: #4f46e5;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.95rem;
            flex-shrink: 0;
        }

        .about-section-heading h2 {
            font-size: 1.02rem;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 0;
        }

        .about-app-desc {
            font-size: 0.85rem;
            color: #475569;
            line-height: 1.65;
            margin: 0 0 1.5rem;
            max-width: 60ch;
        }

        .about-subheading {
            font-size: 0.78rem;
            font-weight: 700;
            color: #94a3b8;
            margin-bottom: 0.75rem;
        }

        /* ================== FEATURE CARDS ================== */
        .about-feature-grid {
            list-style: none;
            margin: 0;
            padding: 0;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
        }

        .about-feature-card {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
            font-size: 0.82rem;
            color: #334155;
            background-color: #ffffff;
            border: 1px solid #eef0f4;
            border-radius: 14px;
            padding: 1.1rem 1rem;
            box-shadow: 0 4px 14px rgba(15, 23, 42, 0.05);
            transition: transform 0.15s ease, box-shadow 0.15s ease, border-color 0.15s ease;
        }

        .about-feature-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 22px rgba(79, 70, 229, 0.12);
            border-color: #c7d2fe;
        }

        .about-feature-card .about-feature-icon {
            width: 42px;
            height: 42px;
            border-radius: 11px;
            background: linear-gradient(135deg, #eef2ff 0%, #e0e7ff 100%);
            color: #4f46e5;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.15rem;
            flex-shrink: 0;
        }

        .about-feature-card .about-feature-title {
            font-weight: 700;
            color: #0f172a;
            font-size: 0.85rem;
            margin-bottom: 0.15rem;
        }

        .about-feature-card .about-feature-desc {
            color: #64748b;
            font-size: 0.78rem;
            line-height: 1.5;
        }

        @media (max-width: 575.98px) {
            .about-page-content {
                padding: 1.25rem 0.85rem 2.5rem;
            }

            .about-hero-info {
                padding: 0.75rem 1.25rem 1.5rem;
            }

            .about-feature-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
@endpush

@section('content')

    @include('layouts.navbar')

    <div class="about-page-content">

        <div class="about-header">
            <h1 class="page-title">Tentang</h1>
            <p class="page-subtitle">Profil pembuat dan informasi aplikasi Klara Rasa</p>
        </div>

        {{-- ================== HERO PROFIL PEMBUAT ================== --}}
        <div class="about-hero">
            <div class="about-hero-banner"></div>
            <div class="about-avatar-wrap">
                <div class="about-avatar">
                    <img src="{{ asset('images/IMG_1362.JPG') }}" alt="Klara"
                        style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;">
                </div>
            </div>
            <div class="about-hero-info">
                <div class="about-name">Klara Oktaviana</div>
                <div class="about-tags">
                    <span class="about-role">Developer</span>
                    <span class="about-since">Sejak 2024</span>
                </div>
                <p class="about-bio">
                    Pemilik sekaligus developer di balik Klara Rasa. Sistem kasir ini dibangun sendiri
                    untuk membantu operasional kafe berjalan lebih rapi — mulai dari pencatatan produk,
                    transaksi harian, sampai pemantauan stok.
                </p>
                <div class="about-contact">
                    <a href="mailto:halo@klararasa.com"><i class="bi bi-envelope"></i> klaraoktavianaaa@gmail.com</a>
                    <a href="https://instagram.com/klararasa" target="_blank"><i class="bi bi-instagram"></i>
                        Instagram</a>
                    <a href="https://github.com/klaraaokta" target="_blank"><i class="bi bi-github"></i> GitHub</a>
                </div>
            </div>
        </div>

        <hr class="about-divider">

        {{-- ================== TENTANG APLIKASI ================== --}}
        <div class="about-app-card">
            <div class="about-section-heading">
                <div class="about-section-icon"><i class="bi bi-shop"></i></div>
                <h2>Tentang aplikasi</h2>
            </div>

            <p class="about-app-desc">
                Klara Rasa adalah sistem Point of Sale yang membantu pencatatan penjualan, manajemen
                produk, dan pemantauan stok secara digital dan efisien untuk kebutuhan operasional
                kafe sehari-hari.
            </p>

            <p class="about-subheading">Fitur utama</p>
            <ul class="about-feature-grid">
                <li class="about-feature-card">
                    <span class="about-feature-icon"><i class="bi bi-box-seam"></i></span>
                    <div>
                        <div class="about-feature-title">Manajemen produk</div>
                        <div class="about-feature-desc">Kelola produk & jenis produk dengan mudah</div>
                    </div>
                </li>
                <li class="about-feature-card">
                    <span class="about-feature-icon"><i class="bi bi-receipt"></i></span>
                    <div>
                        <div class="about-feature-title">Transaksi penjualan</div>
                        <div class="about-feature-desc">Catat setiap transaksi secara real-time</div>
                    </div>
                </li>
                <li class="about-feature-card">
                    <span class="about-feature-icon"><i class="bi bi-printer"></i></span>
                    <div>
                        <div class="about-feature-title">Cetak struk</div>
                        <div class="about-feature-desc">Struk otomatis untuk setiap transaksi</div>
                    </div>
                </li>
                <li class="about-feature-card">
                    <span class="about-feature-icon"><i class="bi bi-people"></i></span>
                    <div>
                        <div class="about-feature-title">Manajemen user</div>
                        <div class="about-feature-desc">Atur akses role admin & kasir</div>
                    </div>
                </li>
                <li class="about-feature-card">
                    <span class="about-feature-icon"><i class="bi bi-graph-up"></i></span>
                    <div>
                        <div class="about-feature-title">Laporan penjualan</div>
                        <div class="about-feature-desc">Pantau performa penjualan harian</div>
                    </div>
                </li>
                <li class="about-feature-card">
                    <span class="about-feature-icon"><i class="bi bi-boxes"></i></span>
                    <div>
                        <div class="about-feature-title">Monitoring stok</div>
                        <div class="about-feature-desc">Notifikasi stok rendah & habis</div>
                    </div>
                </li>
            </ul>
        </div>

    </div>

@endsection
