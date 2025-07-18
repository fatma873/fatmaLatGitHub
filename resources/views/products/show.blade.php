<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
  <title>Show Products - SantriKoding.com</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet"/>

  <style>
    body {
      background-color: #f5f7fa;
      font-family: 'Poppins', sans-serif;
      color: #333;
    }

    .card {
      border: none;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.07);
    }

    img {
      border-radius: 12px;
      transition: transform 0.4s ease-in-out;
    }

    img:hover {
      transform: scale(1.02);
    }

    h3 {
      font-weight: 600;
      color: #1d3557;
    }

    p, code {
      font-size: 16px;
      color: #555;
    }

    code p {
      font-family: 'Poppins', sans-serif;
      background-color: #f1f1f1;
      padding: 8px;
      border-radius: 8px;
      display: inline-block;
      width: 100%;
    }

  </style>
</head>
<body>

  <div class="container mt-5 mb-5">
    <div class="row">
      <div class="col-md-4 mb-3">
        <div class="card shadow-sm rounded">
          <div class="card-body p-3">
            <img src="{{ asset('/storage/products/'.$product->image) }}" alt="{{ $product->title }}" class="w-100">
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="card shadow-sm rounded">
          <div class="card-body">
            <h3>{{ $product->title }}</h3>
            <hr/>
            <p><strong>Harga:</strong> {{ "Rp " . number_format($product->price, 2, ',', '.') }}</p>

            <!-- Tambahan: Kategori -->
            <p><strong>Kategori:</strong> {{ $product->category->name ?? '-' }}</p>

            <code>
              <p>{!! $product->description !!}</p>
            </code>
            <hr/>
            <p><strong>Stock:</strong> {{ $product->stock }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
