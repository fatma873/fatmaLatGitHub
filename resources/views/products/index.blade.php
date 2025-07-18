<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
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

    /* --- Button Transisi Cepat (Tombol atas) --- */
    .btn.btn-success {
        background-color: #a8dadc;
        border-color: #a8dadc;
        color: #1d3557;
        transition: background-color 0.25s ease-in-out, transform 0.25s ease-in-out;
    }

    .btn.btn-success:hover {
        background-color: #81cfcf;
        border-color: #81cfcf;
        transform: scale(1.03);
    }

    /* --- Button Transisi Soft (SHOW, EDIT, HAPUS) --- */
    .btn-sm {
        transition: background-color 0.4s ease, color 0.4s ease, transform 0.4s ease;
    }

    .btn-dark {
        background-color: #adb5bd;
        border-color: #adb5bd;
        color: #343a40;
    }

    .btn-dark:hover {
        background-color: #9199a1;
        transform: scale(1.02);
    }

    .btn-primary {
        background-color: #b2c7f5;
        border-color: #b2c7f5;
        color: #1d3557;
    }

    .btn-primary:hover {
        background-color: #94afe9;
        transform: scale(1.02);
    }

    .btn-danger {
        background-color: #f8d7da;
        border-color: #f8d7da;
        color: #721c24;
    }

    .btn-danger:hover {
        background-color: #f5c2c7;
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

    hr {
        border-top: 1px solid #ced4da;
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
            transition: color 0.3s ease;
        }

        .navbar-brand:hover {
            color: #1e88e5 !important;
        }

        .nav-link {
            font-weight: 500;
            color: #4a4a4a !important;
            transition: color 0.3s ease;
        }

        .nav-link:hover {
            color: #1e88e5 !important;
        }
    </style>

</head>
<body>

  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand" href="/">fatmaApp</a>

      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item me-2">
            <a href="{{ route('products.create') }}" class="btn btn-sm btn-success">ADD PRODUCT</a>
          </li>
          <li class="nav-item">
            <a href="{{ route('category.index') }}" class="btn btn-sm btn-success">CHECK CATEGORIES</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container mt-5">
    <!--<div class="row">-->
      <div class="col-md-12">
        <div>
          <h3 class="text-center my-4">Data Products</h3>
        </div>
        <div class="card shadow-sm rounded">
          <div class="card-body">
        <form action="{{ route('products.index') }}" method="GET" class="mb-4">
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
              <input type="number" name="stock" class="form-control" placeholder="Search Stock" value="{{ request('stock') }}">
            </div>

            <div class="col-md-2 d-grid">
              <button type="submit" class="btn btn-outline-primary">Cari</button>
            </div>
          </div>
        </form>

            <table class="table table-bordered">    
              <thead>
                <tr>
                  <th scope="col">IMAGE</th>
                  <th scope="col">TITLE</th>
                  <th scope="col">CATEGORY</th>
                  <th scope="col">PRICE</th>
                  <th scope="col">STOCK</th>
                  <th scope="col" style="width: 20%">ACTIONS</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($products as $product)
                <tr>
                  <td class="text-center">
                    <img src="{{ asset('/storage/products/'.$product->image) }}" class="rounded" style="width: 150px">
                  </td>
                  <td>{{ $product->title }}</td>
                  <td>{{ $product->category->name ?? '-' }}</td>
                  <td>{{ "Rp " . number_format($product->price, 2, ',', '.') }}</td>
                  <td>{{ $product->stock }}</td>
                  <td class="text-center">
                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('products.destroy', $product->id) }}" method="POST">
                      <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                      <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                    </form>
                  </td>
                </tr>
                @empty
                <tr>
                  <td colspan="6" class="text-center text-danger">Data Products belum ada.</td>
                </tr>
                @endforelse
              </tbody>
            </table>

            {{ $products->withQueryString()->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>

    <footer class="text-center text-muted py-3">
      &copy; {{ date('Y') }} fatmaApp. All rights reserved.
    </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
    // Message with SweetAlert
    @if(session('success'))
      Swal.fire({
        icon: "success",
        title: "BERHASIL",
        text: "{{ session('success') }}",
        showConfirmButton: false,
        timer: 2000
      });
    @elseif(session('error'))
      Swal.fire({
        icon: "error",
        title: "GAGAL!",
        text: "{{ session('error') }}",
        showConfirmButton: false,
        timer: 2000
      });
    @endif
  </script>

</body>
</html>
