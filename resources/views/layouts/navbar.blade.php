<nav class="navbar navbar-expand bg-body-tertiary">
  <div class="container">
    <a class="navbar-brand" href="#">POS</a>
    
    <div class="navbar-nav me-auto flex-row gap-3">
      <a class="nav-link active" aria-current="page" href="{{ route('dashboard') }}">Dashboard</a>
    </div>

    <form class="position-absolute top-50 start-100 translate-middle-y" action="{{ route('logout') }}" method="POST">
      @csrf
      <button type="submit" class="btn btn-danger">Logout</button>
    </form>
  </div>
</nav>
