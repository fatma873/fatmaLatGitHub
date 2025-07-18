<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>fatmaApp</title>

  <!-- Bootstrap & Fonts -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet"/>

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f5f7fa;
      color: #333;
    }

    nav {
      background-color: #e2e8f0;
      border-bottom: 1px solid #d0d7e2;
      box-shadow: 0 1px 4px rgba(0, 0, 0, 0.05);
      padding: 1rem 2rem;
    }

    nav h1 {
      font-weight: 600;
      font-size: 1.5rem;
      color: #2c3e50;
      margin: 0;
    }

    nav a, .dropdown-toggle {
      font-weight: 500;
      color: #4a4a4a;
      text-decoration: none;
      transition: color 0.3s ease;
    }

    nav a:hover, .dropdown-toggle:hover {
      color: #1e88e5;
    }

    .container {
      padding: 3rem 2rem;
    }

    .btn-user {
      background-color: #b2c7f5;
      border: none;
      color: #1d3557;
      padding: 0.75rem 1.5rem;
      border-radius: 12px;
      font-size: 1rem;
      font-weight: 500;
      transition: background-color 0.3s ease-in-out, transform 0.3s ease-in-out;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
    }

    .btn-user:hover {
      background-color: #94afe9;
      transform: scale(1.05);
    }

    .dropdown-menu {
      font-size: 0.95rem;
    }

    .dropdown-item span {
      display: block;
      font-weight: 600;
    }

    .dropdown-item small {
      color: #6c757d;
    }
  </style>
</head>
<body>

<nav class="d-flex justify-content-between align-items-center">
  <h1>fatmaApp</h1>
  <div class="d-flex align-items-center gap-3">
    <!-- Profil Dropdown -->
    <div class="dropdown">
      <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        👤 {{ Auth::user()->name }}
      </a>
      <ul class="dropdown-menu dropdown-menu-end">
        <li class="dropdown-item">
          <span>{{ Auth::user()->name }}</span>
          <small>{{ Auth::user()->email }}</small><br>
          <small>Role: {{ Auth::user()->role ?? 'User' }}</small>
        </li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Edit Profil</a></li>
        <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container text-center">
  <h2>Halo User! 👋</h2>
  <p>Selamat datang di dashboard fatmaApp.</p>

  <button class="btn-user"><a href="/products-view" class="btn-user">Lihat Produk</a></button>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
