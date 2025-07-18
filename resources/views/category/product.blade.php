@extends('layouts.public')

@section('content')
<div class="container py-5">
  <h2 class="text-center mb-5">Kategori Produk</h2>

  @foreach($categories as $category)
    @if($category->products->count())
      <div class="mb-4">
        <h4 class="mb-3 text-primary">{{ $category->name }}</h4>

        <div class="swiper-container swiper-{{ $category->id }}">
          <div class="swiper-wrapper">
            @foreach($category->products as $product)
              <div class="swiper-slide" style="width: 230px;">
                <div class="card">
                  <img src="{{ asset('storage/products/' . $product->image) }}" class="card-img-top" style="height: 150px; object-fit: cover;" alt="{{ $product->title }}">
                  <div class="card-body text-center">
                    <h6 class="card-title">{{ $product->title }}</h6>
                    <p class="text-muted mb-1">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-outline-primary">Lihat</a>
                  </div>
                </div>
              </div>
            @endforeach
          </div>

          <!-- Navigasi panah -->
          <div class="swiper-button-next swiper-button-next-{{ $category->id }}"></div>
          <div class="swiper-button-prev swiper-button-prev-{{ $category->id }}"></div>
        </div>
      </div>
    @endif
  @endforeach
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

<script>
  @foreach($categories as $category)
    new Swiper('.swiper-{{ $category->id }}', {
      slidesPerView: 4,
      spaceBetween: 20,
      navigation: {
        nextEl: '.swiper-button-next-{{ $category->id }}',
        prevEl: '.swiper-button-prev-{{ $category->id }}',
      },
      breakpoints: {
        640: { slidesPerView: 2 },
        768: { slidesPerView: 3 },
        1024: { slidesPerView: 4 }
      }
    });
  @endforeach
</script>
@endpush
