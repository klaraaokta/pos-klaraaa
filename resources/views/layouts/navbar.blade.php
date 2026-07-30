<nav class="navbar navbar-expand bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="#">POS</a>

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
        <form class="position-absolute top-50 start-100 translate-middle-y" action="{{ route('logout') }}"
            method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </div>
</nav>
