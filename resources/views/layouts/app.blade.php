<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>fatmaApp</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

  <style>
    body {
      background-color: #f8fafc;
      font-family: 'Poppins', sans-serif;
    }

    .navbar {
      background-color: #e2e8f0;
      box-shadow: 0 1px 4px rgba(0, 0, 0, 0.05);
    }

    .navbar-brand {
      font-weight: bold;
      color: #1e293b;
    }

    .nav-link {
      color: #475569 !important;
      font-weight: 500;
    }

    .nav-link:hover {
      color: #2563eb !important;
    }
  </style>

  @stack('styles')
</head>
<body>

  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand" href="/">fatmaApp</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item me-2">
            <a class="nav-link" href="{{ route('products.index') }}">Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('category.index') }}">Categories</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <main class="py-4">
    <div class="container">
      @yield('content')
    </div>
  </main>

  <footer class="text-center text-muted py-3">
    &copy; {{ date('Y') }} fatmaApp. All rights reserved.
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  @stack('scripts')
</body>
</html>
