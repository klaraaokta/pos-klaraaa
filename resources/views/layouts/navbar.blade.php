@push('styles')
    <style>
        html {
            overflow-y: scroll;
        }

        :root {
            --pos-primary: #4f46e5;
            --pos-primary-hover: #4338ca;
            --pos-primary-soft: #eef2ff;
            --pos-slate-900: #0f172a;
            --pos-slate-700: #334155;
            --pos-slate-500: #64748b;
            --pos-slate-200: #e2e8f0;
            --pos-danger: #dc2626;
            --pos-danger-hover: #b91c1c;
        }

        .pos-navbar {
            background-color: #ffffff !important;
            border: 1px solid var(--pos-slate-200);
            border-radius: 12px;
            padding: 0.65rem 1rem;
            margin: 1rem 1rem 0;
            box-shadow: 0 1px 3px rgba(15, 23, 42, 0.04);
        }

        .pos-navbar .navbar-brand {
            font-weight: 700;
            font-size: 1.15rem;
            color: var(--pos-slate-900);
            letter-spacing: 0.01em;
        }

        .pos-navbar .navbar-nav {
            gap: 0.25rem;
        }

        .pos-navbar .nav-link {
            position: relative;
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--pos-slate-500);
            padding: 0.5rem 0.75rem !important;
            border-radius: 0;
            background-color: transparent !important;
            transition: color 0.15s ease;
        }

        .pos-navbar .nav-link::after {
            content: "";
            position: absolute;
            left: 0.75rem;
            right: 0.75rem;
            bottom: 0;
            height: 2px;
            background-color: var(--pos-primary);
            border-radius: 2px;
            transform: scaleX(0);
            transition: transform 0.15s ease;
        }

        .pos-navbar .nav-link:hover {
            background-color: transparent !important;
            color: var(--pos-primary);
        }

        .pos-navbar .nav-link:hover::after {
            transform: scaleX(0.6);
        }

        .pos-navbar .nav-link.active {
            background-color: transparent !important;
            color: var(--pos-primary) !important;
            font-weight: 700;
        }

        .pos-navbar .nav-link.active::after {
            transform: scaleX(1);
        }

        .pos-navbar .navbar-toggler {
            border: 1px solid var(--pos-slate-200);
            padding: 0.35rem 0.6rem;
        }

        .pos-navbar .navbar-toggler:focus {
            box-shadow: 0 0 0 3px var(--pos-primary-soft);
        }

        .pos-navbar .btn-danger {
            font-size: 0.85rem;
            font-weight: 500;
            padding: 0.45rem 1rem;
            background-color: transparent;
            border: 1px solid var(--pos-slate-200);
            color: var(--pos-slate-500);
            border-radius: 8px;
            transition: background-color 0.15s ease, border-color 0.15s ease, color 0.15s ease;
        }

        .pos-navbar .btn-danger:hover {
            background-color: #fef2f2;
            border-color: #fecaca;
            color: var(--pos-danger);
        }

        .pos-navbar .navbar-collapse.collapsing {
            transition: height 0.25s ease;
        }

        @media (max-width: 991.98px) {
            .pos-navbar .navbar-collapse {
                margin-top: 0.75rem;
                padding-top: 0.75rem;
                border-top: 1px solid var(--pos-slate-200);
            }

            .pos-navbar .navbar-nav {
                gap: 0.15rem;
                margin-bottom: 0.75rem;
            }

            .pos-navbar .nav-link {
                padding: 0.6rem 0.75rem !important;
            }

            .pos-navbar .nav-link::after {
                display: none;
            }

            .pos-navbar .nav-link {
                border-left: 3px solid transparent;
            }

            .pos-navbar .nav-link:hover,
            .pos-navbar .nav-link.active {
                border-left-color: var(--pos-primary);
                padding-left: 0.6rem !important;
            }

            .pos-navbar form {
                width: 100%;
            }

            .pos-navbar .btn-danger {
                width: 100%;
            }
        }

        @media (max-width: 575.98px) {
            .pos-navbar {
                margin: 0.6rem 0.6rem 0;
                padding: 0.55rem 0.85rem;
                border-radius: 10px;
            }

            .pos-navbar .navbar-brand {
                font-size: 1rem;
            }

            .pos-navbar .nav-link {
                font-size: 0.82rem;
            }
        }

        @media (max-width: 360px) {
            .pos-navbar {
                margin: 0.5rem 0.4rem 0;
                padding: 0.5rem 0.65rem;
            }
        }
    </style>
@endpush
<nav class="navbar navbar-expand-lg bg-body-tertiary pos-navbar">
    <div class="container">
        <a class="navbar-brand" href="#">POS</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#posNavbarContent"
            aria-controls="posNavbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="posNavbarContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page"
                        href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                @can('viewAny', App\Models\User::class)
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('admin/users') ? 'active' : '' }}" aria-current="page"
                            href="{{ route('admin.users') }}">Users</a>
                    </li>
                @endcan
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('produk') ? 'active' : '' }}" aria-current="page"
                        href="{{ route('produk.index') }}">Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('penjualan') ? 'active' : '' }}" aria-current="page"
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
