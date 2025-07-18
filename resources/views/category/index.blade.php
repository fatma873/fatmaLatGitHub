<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Category - fatmaApp</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

  <style>
    body {
      background-color: #f5f7fa;
      font-family: 'Poppins', sans-serif;
      color: #333;
    }

    h2 {
      font-weight: 600;
      color: #1d3557;
    }

    .card {
      border: none;
      border-radius: 12px;
      transition: all 0.3s ease;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
    }

    .card:hover {
      transform: translateY(-6px);
      box-shadow: 0 12px 20px rgba(0, 0, 0, 0.08);
    }

    .card-title {
      font-size: 18px;
      font-weight: 500;
      margin-top: 8px;
      color: #1d3557;
    }

    .card-img-top {
      border-top-left-radius: 12px;
      border-top-right-radius: 12px;
      height: 180px;
      object-fit: cover;
      transition: transform 0.4s ease;
    }

    .card:hover .card-img-top {
      transform: scale(1.0);
    }

    a.text-decoration-none:hover .card-title {
      color: #0077b6;
    }
  </style>
</head>
<body>

@extends('layouts.app')

@section('content')
<div class="container py-5">
  <h2 class="text-center mb-4">Pilih Kategori Produk</h2>

  <div class="row justify-content-center">
    @foreach ($categories as $category)
      <div class="col-md-4 col-lg-3 mb-4">
        <a href="{{ route('products.index', $category->id) }}" class="text-decoration-none">
          <div class="card h-100">
            <img src="{{ asset('images/category/' . $category->image) }}" class="card-img-top img-fluid" alt="{{ $category->name }}">
            <div class="card-body text-center">
              <h5 class="card-title">{{ $category->name }}</h5>
            </div>
          </div>
        </a>
      </div>
    @endforeach
  </div>
</div>
@endsection
  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
