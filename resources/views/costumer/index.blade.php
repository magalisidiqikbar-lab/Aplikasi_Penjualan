@extends('layouts.layout')

@section('title')
    Home - QuantumMart
@endsection

@section('index')
    active
@endsection

@section('main')
<main class="site-main">

    <section class="hero-banner">
      <div class="container">
        <div class="row no-gutters align-items-center pt-60px">
          <div class="col-5 d-none d-sm-block">
            <div class="hero-banner__img">
              <img class="img-fluid" src="{{ asset('assets/img/home/hero-banner.png') }}" alt="Hero Banner">
            </div>
          </div>
          <div class="col-sm-7 col-lg-6 offset-lg-1 pl-4 pl-md-5 pl-lg-0">
            <div class="hero-banner__content">
              <h4 style="color: #6f42c1;">Shop is fun</h4>
              <h1>Browse Our Premium Product</h1>
              <p>Temukan produk teknologi terbaik dengan kualitas premium hanya di QuantumMart. Belanja jadi lebih mudah dan menyenangkan.</p>
              <a class="button button-hero" href="{{ route('produk.index') }}" style="background: #6f42c1; border-color: #6f42c1;">Browse Now</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="section-margin calc-60px">
      <div class="container">
        <div class="section-intro pb-60px text-center">
          <p class="text-muted">Tampil trendi dengan produk terbaru kami.</p>
          <h2>Produk <span class="section-intro__style" style="color: #6f42c1;">Terbaru</span></h2>
        </div>
        <div class="row">

          @forelse ($products as $row)
            <div class="col-md-6 col-lg-4 col-xl-3">
              <div class="card text-center card-product" style="border-radius: 15px; overflow: hidden; border: none; shadow: 0 4px 6px rgba(0,0,0,0.1);">
                <div class="card-product__img">
                  <img class="card-img" src="{{ asset('storage/products/' . $row->image) }}" alt="{{ $row->name }}">
                  <ul class="card-product__imgOverlay">
                    <li><button><i class="ti-search"></i></button></li>
                    <li><a href="{{ url('/product/' . $row->slug) }}"><button><i class="ti-shopping-cart"></i></button></a></li>
                    <li><button><i class="ti-heart"></i></button></li>
                  </ul>
                </div>
                <div class="card-body">
                  <p class="text-primary mb-1">{{ $row->category->name ?? 'Uncategorized' }}</p>
                  <h4 class="card-product__title"><a href="{{ url('/product/' . $row->slug) }}">{{ $row->name }}</a></h4>
                  <p class="card-product__price" style="font-weight: bold; color: #6f42c1;">Rp {{ number_format($row->price) }}</p>
                </div>
              </div>
            </div>
          @empty
            <div class="col-12 text-center">
                <p class="text-muted">Belum ada produk yang ditambahkan.</p>
            </div>
          @endforelse

        </div>
      </div>
    </section>
    </main>
@endsection