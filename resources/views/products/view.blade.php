<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Products - fatmaApp</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet"/>

  <style>
    body {
        background-color: #f5f7fa;
        font-family: 'Poppins', sans-serif;
        color: #333;
    }

    .card {
        background-color: #ffffff;
        border: none;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    }

    .btn-dark {
        background-color: #adb5bd;
        border-color: #adb5bd;
        color: #343a40;
        transition: transform 0.3s ease;
    }

    .btn-dark:hover {
        background-color: #9199a1;
        transform: scale(1.02);
    }

    table th {
        background-color: #dee2e6;
        color: #495057;
    }

    table td {
        vertical-align: middle;
    }

    h3 {
        color: #457b9d;
    }

    .navbar {
        background-color: #e2e8f0;
        border-bottom: 1px solid #d0d7e2;
        box-shadow: 0 1px 4px rgba(0, 0, 0, 0.05);
    }

    .navbar-brand {
        font-weight: 600;
        font-size: 1.3rem;
        color: #2c3e50 !important;
    }

    .nav-link {
        font-weight: 500;
        color: #4a4a4a !important;
    }
  </style>
</head>
<body>

  <!-- Navbar -->
<nav class="navbar navbar-expand-lg">
  <div class="container">
    <a class="navbar-brand" href="/">fatmaApp</a>

    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a href="{{ route('products.view') }}" class="nav-link">Produk</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('categories.view') }}" class="nav-link">Kategori</a>
        </li>
      </ul>
    </div>
  </div>
</nav>


  <!-- Content -->
  <div class="container mt-5">
    <div class="col-md-12">
      <h3 class="text-center my-4">Data Products</h3>

      <div class="card shadow-sm rounded">
        <div class="card-body">

          <!-- Filter Form -->
          <form action="{{ route('products.view') }}" method="GET" class="mb-4">
            <div class="row g-3">
              <div class="col-md-3">
                <input type="text" name="search" class="form-control" placeholder="Search title" value="{{ request('search') }}">
              </div>

              <div class="col-md-3">
                <select name="category_id" class="form-control">
                  <option value="">Category</option>
                  @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                      {{ $category->name }}
                    </option>
                  @endforeach
                </select>
              </div>

              <div class="col-md-2">
                <input type="number" name="price" class="form-control" placeholder="Search price" value="{{ request('price') }}">
              </div>

              <div class="col-md-2">
                <input type="number" name="stock" class="form-control" placeholder="Search stock" value="{{ request('stock') }}">
              </div>

              <div class="col-md-2 d-grid">
                <button type="submit" class="btn btn-outline-primary">Cari</button>
              </div>
            </div>
          </form>

          <!-- Product Table -->
          <table class="table table-bordered">    
            <thead>
              <tr>
                <th scope="col">IMAGE</th>
                <th scope="col">TITLE</th>
                <th scope="col">CATEGORY</th>
                <th scope="col">PRICE</th>
                <th scope="col">STOCK</th>
                <th scope="col" style="width: 15%">ACTION</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($products as $product)
              <tr>
                <td class="text-center">
                  <img src="{{ asset('/storage/products/'.$product->image) }}" class="rounded" style="width: 120px">
                </td>
                <td>{{ $product->title }}</td>
                <td>{{ $product->category->name ?? '-' }}</td>
                <td>{{ 'Rp ' . number_format($product->price, 2, ',', '.') }}</td>
                <td>{{ $product->stock }}</td>
                <td class="text-center">
                  <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                </td>
              </tr>
              @empty
              <tr>
                <td colspan="6" class="text-center text-danger">Data Products belum ada.</td>
              </tr>
              @endforelse
            </tbody>
          </table>

          <!-- Pagination -->
          {{ $products->withQueryString()->links() }}

        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="text-center text-muted py-3">
    &copy; {{ date('Y') }} fatmaApp. All rights reserved.
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
