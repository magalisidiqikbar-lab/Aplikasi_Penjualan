@extends('layouts.app') @section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="card-title">Dashboard Pelanggan</h4>
                </div>
                <div class="card-body">
                    <h5>Selamat Datang, {{ Auth::guard('costumer')->user()->name }}!</h5>
                    <p>Silakan pilih menu di bawah ini untuk mulai berbelanja atau melihat pesanan.</p>
                    <hr>
                    <div class="row text-center">
                        <div class="col-md-4">
                            <a href="{{ route('home.product') }}" class="btn btn-info btn-block py-3">
                                <b>🛍️ Mulai Belanja</b>
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="{{ route('home.list_cart') }}" class="btn btn-warning btn-block py-3">
                                <b>🛒 Keranjang Belanja</b>
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="{{ route('home.orderdetail') }}" class="btn btn-success btn-block py-3">
                                <b>📜 Riwayat Pesanan</b>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop