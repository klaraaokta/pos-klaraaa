@push('styles')
    <style>
        .pos-navbar {
            background: #FFFFFF !important;
            border: 1px solid #E3E5E9;
            border-radius: 16px;
            padding-top: 1rem;
            padding-bottom: 1rem;
            margin: 1.5rem auto 0;
            width: calc(100% - .5rem);
            max-width: 1200px;
            box-shadow: 0 1px 2px rgba(16, 24, 40, 0.04), 0 8px 20px -12px rgba(16, 24, 40, 0.1);
        }

        @media (max-width: 576px) {
            .pos-navbar {
                margin-top: 1rem;
                border-radius: 12px;
                width: calc(100% - .25rem);
            }
        }

        .pos-navbar .container {
            gap: 1rem;
        }

        .pos-navbar .navbar-brand {
            font-weight: 700;
            color: #2B3040;
            letter-spacing: .03em;
            font-size: 1.2rem;
            margin-right: 1.5rem;
        }

        .pos-navbar .navbar-nav {
            gap: .35rem;
        }

        .pos-navbar .nav-link {
            color: #6B7280;
            font-size: .88rem;
            font-weight: 500;
            padding: .55rem 1rem;
            border-radius: 8px;
            transition: background .15s ease, color .15s ease;
        }

        .pos-navbar .nav-link:hover {
            color: #2B3040;
            background: #F1F3F5;
        }

        .pos-navbar .nav-link.active {
            color: #2B3040 !important;
            background: #EEF0F2;
        }

        .pos-navbar .navbar-toggler {
            border: 1px solid #E3E5E9;
            border-radius: 8px;
            padding: .4rem .65rem;
        }

        .pos-navbar .navbar-toggler:focus {
            box-shadow: 0 0 0 3px rgba(75, 85, 99, 0.15);
        }

        .pos-navbar form .btn-danger {
            border-radius: 8px;
            font-size: .85rem;
            font-weight: 600;
            padding: .5rem 1.25rem;
            box-shadow: 0 1px 2px rgba(16, 24, 40, 0.06);
        }

        @media (min-width: 992px) {
            .pos-navbar form {
                margin-left: 1.5rem;
            }
        }

        @media (max-width: 991.98px) {
            .pos-navbar .navbar-collapse {
                margin-top: 1rem;
                padding-top: 1rem;
                border-top: 1px solid #E3E5E9;
            }

            .pos-navbar .navbar-nav {
                gap: .25rem;
                margin-bottom: 1rem;
            }

            .pos-navbar .nav-link {
                padding: .7rem .85rem;
            }

            .pos-navbar form .btn-danger {
                width: 100%;
                padding: .65rem 1rem;
            }
        }
    </style>
@endpush

<nav class="navbar navbar-expand-lg bg-body-tertiary pos-navbar">
    <div class="container">
        <a class="navbar-brand" href="#">POS</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#posNavbarContent" aria-controls="posNavbarContent"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="posNavbarContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard') ? 'active link-dark fw-bold' : '' }}" aria-current="page"
                        href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin/users') ? 'active link-dark fw-bold' : '' }}"
                        aria-current="page" href="{{ route('admin.users') }}">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('produk') ? 'active link-dark fw-bold' : '' }}" aria-current="page"
                        href="{{ route('produk.index') }}">Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('penjualan') ? 'active link-dark fw-bold' : '' }}" aria-current="page"
                        href="{{ route('penjualan.index') }}">Penjualan</a>
                </li>
            </ul>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>
    </div>
</nav>