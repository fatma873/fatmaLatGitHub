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

    nav a {
      font-weight: 500;
      color: #4a4a4a;
      text-decoration: none;
      transition: color 0.3s ease;
    }

    nav a:hover {
      color: #1e88e5;
    }

    .container {
      padding: 3rem 2rem;
    }

    .btn-dashboard {
      background-color: #a8dadc;
      border: none;
      color: #1d3557;
      padding: 0.75rem 1.5rem;
      border-radius: 12px;
      font-size: 1rem;
      font-weight: 500;
      transition: background-color 0.3s ease-in-out, transform 0.3s ease-in-out;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
      margin: 0.5rem;
    }

    .btn-dashboard:hover {
      background-color: #81cfcf;
      transform: scale(1.05);
    }

    .btn-success {
      background-color: #a8dadc;
      border-color: #a8dadc;
      color: #1d3557;
      transition: background-color 0.25s ease-in-out, transform 0.25s ease-in-out;
    }

    .btn-success:hover {
      background-color: #81cfcf;
      border-color: #81cfcf;
      transform: scale(1.03);
    }

    .btn-outline-danger {
      border-color: #f8d7da;
      color: #721c24;
    }

    .btn-outline-danger:hover {
      background-color: #f5c2c7;
      color: #721c24;
      transform: scale(1.03);
    }
  </style>
</head>
<body>

<nav class="d-flex justify-content-between align-items-center">
  <h1>fatmaApp</h1>
  <div class="d-flex gap-3 align-items-center">
    <form action="{{ route('logout') }}" method="POST">
      @csrf
      <button type="submit" class="btn btn-outline-danger btn-sm">Logout</button>
    </form>
  </div>
</nav>

<div class="container text-center">
  <h2>Halo Admin! 🛠️</h2>
  <p>Selamat datang di dashboard admin</p>

  <a href="{{ route('products.index') }}">
    <button class="btn-dashboard">Kelola Produk</button>
  </a>
  <a href="{{ route('category.index') }}">
    <button class="btn-dashboard">Kelola Kategori</button>
  </a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
