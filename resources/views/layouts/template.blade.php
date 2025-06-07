<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Daftar Movie - @yield('title', 'Homepage')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
      .nav-link.disabled {
        cursor: default;
        opacity: 1;
      }
      .logout-btn {
        background: none;
        border: none;
        padding: 0;
      }
    </style>
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-success navbar-dark">
      <div class="container">
        <a class="navbar-brand" href="/">MovieApp</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
          aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">Home</a>
            </li>

            @auth
              <!-- Menu yang hanya muncul setelah login -->
              <li class="nav-item">
                <a class="nav-link {{ request()->is('movie') ? 'active' : '' }}" href="/movie">Data Movie</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ request()->is('movie/create') ? 'active' : '' }}" href="/movie/create">Tambah Movie</a>
              </li>
            @endauth

            <!-- Dropdown Genre -->
            @php
              use App\Models\Movie;
              $usedCategories = Movie::with('category')
                  ->get()
                  ->pluck('category')
                  ->unique('id')
                  ->filter()
                  ->values();
            @endphp
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Genre
              </a>
              <ul class="dropdown-menu">
                @foreach ($usedCategories as $category)
                  <li>
                    <a class="dropdown-item" href="{{ url('/?genre=' . urlencode($category->category_name)) }}">
                      {{ $category->category_name }}
                    </a>
                  </li>
                @endforeach
              </ul>
            </li>
          </ul>

          <ul class="navbar-nav">
            @auth
              <li class="nav-item">
                <span class="nav-link disabled">{{ Auth::user()->name }}</span>
              </li>
              <li class="nav-item">
                <form action="{{ route('logout') }}" method="POST">
                  @csrf
                  <button type="submit" class="nav-link logout-btn text-white">
                    Logout
                  </button>
                </form>
              </li>
            @else
              <li class="nav-item">
                <a class="nav-link {{ request()->is('login') ? 'active' : '' }}" href="/login">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ request()->is('register') ? 'active' : '' }}" href="/register">Register</a>
              </li>
            @endauth
          </ul>

          <form class="d-flex" role="search" action="{{ url('/') }}" method="GET">
  <input class="form-control me-2" type="search" name="search" placeholder="Search movies..." aria-label="Search" />
  <button class="btn btn-light" type="submit">😺Search</button>
</form>
        </div>
      </div>
    </nav>

    <!-- Main Content -->
    <div class="container my-4">
      @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
      @endif
      
      @if(session('error'))
        <div class="alert alert-danger">
          {{ session('error') }}
        </div>
      @endif
      
      @yield('content')
    </div>

    <!-- Footer -->
    <footer class="bg-success text-white text-center py-3">
      &copy; {{ date('Y') }} Developed by Kulbet
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
  </body>
</html>