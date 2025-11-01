<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Travesta')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
      <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">Travesta</a>
        <div class="collapse navbar-collapse">
          <ul class="navbar-nav me-auto">
            <li class="nav-item"><a class="nav-link" href="{{ route('posts.index') }}">Posts</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('categories.index') }}">Categories</a></li>
          </ul>
          <ul class="navbar-nav ms-auto">
            @guest
              <li class="nav-item"><a class="nav-link" href="#">Login</a></li>
            @else
              <li class="nav-item"><a class="nav-link" href="#">{{ auth()->user()->name }}</a></li>
              <li class="nav-item">
                <form method="POST" action="{{ route('logout') }}">@csrf <button class="btn btn-link nav-link">Logout</button></form>
              </li>
            @endguest
          </ul>
        </div>
      </div>
    </nav>

    <div class="container">
      @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif

      @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
