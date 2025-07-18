<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
  <title>Add New Products</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
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
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
    }

    label {
      font-weight: 500;
      color: #495057;
    }

    .form-control {
      border-radius: 8px;
      transition: border-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    }

    .form-control:focus {
      border-color: #a8dadc;
      box-shadow: 0 0 0 0.2rem rgba(168, 218, 220, 0.25);
    }

    .btn-primary {
      background-color: #b2c7f5;
      border-color: #b2c7f5;
      color: #1d3557;
      transition: background-color 0.4s ease, transform 0.4s ease;
    }

    .btn-primary:hover {
      background-color: #94afe9;
      transform: scale(1.03);
    }

    .btn-warning {
      background-color: #ffe0ac;
      border-color: #ffe0ac;
      color: #6c584c;
      transition: background-color 0.4s ease, transform 0.4s ease;
    }

    .btn-warning:hover {
      background-color: #ffd38d;
      transform: scale(1.03);
    }

    .alert-danger {
      border-radius: 8px;
    }
  </style>
</head>
<body>

  <div class="container mt-5 mb-5">
    <div class="row">
      <div class="col-md-12">
        <div class="card border-0 shadow-sm rounded">
          <div class="card-body">
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
              @csrf

              <div class="form-group mb-3">
                <label>IMAGE</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                @error('image')
                  <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group mb-3">
                <label>TITLE</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" placeholder="Masukkan Judul Produk">
                @error('title')
                  <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group mb-3">
                <label>DESCRIPTION</label>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="5" placeholder="Masukkan Deskripsi Produk">{{ old('description') }}</textarea>
                @error('description')
                  <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group mb-3">
                <label>KATEGORI</label>
                <select name="category_id" class="form-control @error('category_id') is-invalid @enderror" required>
                  <option value="">-- Pilih Kategori --</option>
                  @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                      {{ $category->name }}
                    </option>
                  @endforeach
                </select>
                @error('category_id')
                  <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group mb-3">
                    <label>PRICE</label>
                    <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" placeholder="Masukkan Harga Produk">
                    @error('price')
                      <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group mb-3">
                    <label>STOCK</label>
                    <input type="number" class="form-control @error('stock') is-invalid @enderror" name="stock" value="{{ old('stock') }}" placeholder="Masukkan Stok Produk">
                    @error('stock')
                      <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>

              <button type="submit" class="btn btn-md btn-primary me-3">SAVE</button>
              <button type="reset" class="btn btn-md btn-warning">RESET</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
  <script>
    CKEDITOR.replace('description');
  </script>
</body>
</html>
