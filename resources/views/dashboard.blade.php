@extends('layouts.layout')

@section('main')
<div class="container-fluid mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="font-weight-bold text-dark">🚀 Dashboard Quantum Mart</h2>
        <span class="badge badge-primary px-3 py-2" style="border-radius: 10px;">{{ date('l, d F Y') }}</span>
    </div>

    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-0" style="border-radius: 20px; background: linear-gradient(45deg, #6f42c1, #a29bfe); color: white;">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="mb-1 opacity-7">Total Produk</p>
                            <h2 class="font-weight-bold mb-0">{{ $products_count }}</h2>
                        </div>
                        <div class="icon-shape bg-white text-primary p-3 rounded-circle shadow-sm">
                            <i class="fas fa-box fa-2x text-purple"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <small><a href="{{ route('produk.index') }}" class="text-white text-decoration-none">Lihat Detail →</a></small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-0" style="border-radius: 20px; background: linear-gradient(45deg, #5e35b1, #8e24aa); color: white;">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="mb-1 opacity-7">Total Kategori</p>
                            <h2 class="font-weight-bold mb-0">{{ $categories_count }}</h2>
                        </div>
                        <div class="icon-shape bg-white text-primary p-3 rounded-circle shadow-sm">
                            <i class="fas fa-tags fa-2x text-purple-dark"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <small><a href="{{ route('kategori.index') }}" class="text-white text-decoration-none">Lihat Detail →</a></small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-0" style="border-radius: 20px; background: linear-gradient(45deg, #4834d4, #686de0); color: white;">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="mb-1 opacity-7">Total Pesanan</p>
                            <h2 class="font-weight-bold mb-0">{{ $orders_count }}</h2>
                        </div>
                        <div class="icon-shape bg-white text-primary p-3 rounded-circle shadow-sm">
                            <i class="fas fa-shopping-cart fa-2x text-blue"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <small><a href="{{ route('orders.index') }}" class="text-white text-decoration-none">Lihat Detail →</a></small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-12">
            <div class="card shadow-sm border-0 p-4" style="border-radius: 20px;">
                <div class="d-flex align-items-center">
                    <div class="mr-4">
                        <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=6f42c1&color=fff&size=100" class="rounded-circle" alt="User">
                    </div>
                    <div>
                        <h4 class="font-weight-bold mb-1">Selamat Datang, {{ Auth::user()->name }}!</h4>
                        <p class="text-muted mb-0">Sistem manajemen Quantum Mart siap digunakan. Pantau stok barang dan laporan penjualan Anda hari ini.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .text-purple { color: #6f42c1; }
    .text-purple-dark { color: #5e35b1; }
    .text-blue { color: #4834d4; }
    .opacity-7 { opacity: 0.8; }
    .card { transition: transform 0.3s ease; }
    .card:hover { transform: translateY(-5px); }
</style>
@endsection