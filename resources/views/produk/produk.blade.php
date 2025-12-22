@extends('adminlte::page')

@section('title', 'QuantumMart | Produk')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="text-dark font-weight-bold">Manajemen Produk</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent p-0 m-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Product</li>
            </ol>
        </nav>
    </div>
@stop

@section('content')
<div class="container-fluid">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h5 class="m-0 font-weight-bold text-primary">Daftar Produk Terdaftar</h5>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ route('product.create') }}" class="btn btn-primary px-4 shadow-sm">
                        <i class="fas fa-plus-circle mr-1"></i> Tambah Produk Baru
                    </a>
                </div>
            </div>
        </div>
        
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="icon fas fa-check-circle"></i> {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="row mb-4">
                <div class="col-md-8">
                    </div>
                <div class="col-md-4">
                    <form action="{{ route('product.index') }}" method="get">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control border-right-0 shadow-none" placeholder="Cari nama produk..." value="{{ request()->q }}">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary border-left-0" type="submit">
                                    <i class="fas fa-search text-muted"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle custom-table">
                    <thead class="bg-light">
                        <tr>
                            <th width="80px" class="text-center border-0">Foto</th>
                            <th class="border-0">Informasi Produk</th>
                            <th class="border-0">Harga</th>
                            <th class="border-0">Stok & Berat</th>
                            <th class="border-0">Status</th>
                            <th width="150px" class="text-center border-0">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($product as $row)
                        <tr>
                            <td class="text-center">
                                <div class="product-img-wrapper shadow-sm border rounded">
                                    <img src="{{ asset('storage/products/' . $row->image) }}" alt="{{ $row->name }}" class="img-fluid rounded">
                                </div>
                            </td>
                            <td>
                                <div class="font-weight-bold text-dark mb-1">{{ $row->name }}</div>
                                <span class="badge badge-soft-info px-2 py-1">
                                    <i class="fas fa-tag mr-1 small"></i> {{ $row->category->name }}
                                </span>
                                <div class="small text-muted mt-1">Dibuat: {{ $row->created_at->format('d M Y') }}</div>
                            </td>
                            <td>
                                <span class="text-primary font-weight-bold">Rp {{ number_format($row->price) }}</span>
                            </td>
                            <td>
                                <div class="small mb-1"><i class="fas fa-boxes mr-1 text-muted"></i> {{ $row->stock }} Unit</div>
                                <div class="small text-muted"><i class="fas fa-weight-hanging mr-1"></i> {{ $row->weight }} gr</div>
                            </td>
                            <td>
                                @if(str_contains($row->status_label, 'Publish'))
                                    <span class="badge badge-success shadow-xs px-3">Aktif</span>
                                @else
                                    <span class="badge badge-secondary px-3">Draft</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <form action="{{ route('product.destroy', $row->id) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <div class="btn-group shadow-sm border rounded overflow-hidden">
                                        <a href="{{ route('product.edit', $row->id) }}" class="btn btn-white btn-sm px-3" title="Edit">
                                            <i class="fas fa-edit text-warning"></i>
                                        </a>
                                        <button class="btn btn-white btn-sm px-3" onclick="return confirm('Hapus produk ini?')" title="Hapus">
                                            <i class="fas fa-trash-alt text-danger"></i>
                                        </button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-5">
                                <img src="https://cdni.iconscout.com/illustration/premium/thumb/empty-box-2130356-1800917.png" width="150" class="mb-3">
                                <p class="text-muted">Ups! Belum ada produk yang ditemukan.</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4 d-flex justify-content-center">
                {!! $product->links() !!}
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
<style>
    /* Custom Styling untuk membuat tampilan lebih mewah */
    .custom-table thead th {
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: #6c757d;
        padding: 15px;
    }
    .custom-table tbody td {
        vertical-align: middle !important;
        padding: 15px;
        color: #495057;
    }
    .product-img-wrapper {
        width: 60px;
        height: 60px;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f8f9fa;
    }
    .badge-soft-info {
        background-color: #e0f2f1;
        color: #00796b;
    }
    .btn-white {
        background: white;
        border: none;
    }
    .btn-white:hover {
        background: #f8f9fa;
    }
    .shadow-xs {
        box-shadow: 0 .125rem .25rem rgba(0,0,0,.075)!important;
    }
    .pagination .page-link {
        border-radius: 5px;
        margin: 0 2px;
        color: #007bff;
        border: none;
        box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    }
    .pagination .page-item.active .page-link {
        background-color: #007bff;
        color: white;
    }
</style>
@stop

@section('js')
    <script> console.log('QuantumMart Dashboard UI Loaded'); </script>
@stop