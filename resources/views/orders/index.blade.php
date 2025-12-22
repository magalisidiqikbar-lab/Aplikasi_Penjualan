@extends('adminlte::page')

@section('title', 'Daftar Pesanan')

@section('content_header')
    <h1>Pesanan</h1>
@stop

@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Orders</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card shadow-sm">
                        <div class="card-header bg-purple text-white">
                            <h4 class="card-title">Daftar Pesanan</h4>
                        </div>
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show">
                                    {{ session('success') }}
                                    <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                                </div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger alert-dismissible fade show">
                                    {{ session('error') }}
                                    <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                                </div>
                            @endif

                            <form action="{{ route('orders.index') }}" method="get">
                                <div class="input-group mb-3 col-md-6 float-right px-0">
                                    <select name="status" class="form-control mr-1">
                                        <option value="">Semua Status</option>
                                        <option value="0" {{ request()->status == '0' ? 'selected':'' }}>Baru</option>
                                        <option value="1" {{ request()->status == '1' ? 'selected':'' }}>Dikonfirmasi</option>
                                        <option value="2" {{ request()->status == '2' ? 'selected':'' }}>Proses</option>
                                        <option value="3" {{ request()->status == '3' ? 'selected':'' }}>Dikirim</option>
                                        <option value="4" {{ request()->status == '4' ? 'selected':'' }}>Selesai</option>
                                    </select>
                                    <input type="text" name="q" class="form-control" placeholder="Cari Nama/Invoice..." value="{{ request()->q }}">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i> Cari</button>
                                    </div>
                                </div>
                            </form>

                            <div class="table-responsive">
                                <table class="table table-hover table-bordered text-sm">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Invoice</th>
                                            <th>Pelanggan</th>
                                            <th>Subtotal</th>
                                            <th>Tanggal</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($orders as $row)
                                        <tr>
                                            <td><strong>#{{ $row->invoice }}</strong></td>
                                            <td>
                                                <strong>{{ $row->customer_name }}</strong><br>
                                                <small class="text-muted">Telp: {{ $row->customer_phone }}</small><br>
                                                <small class="text-muted">Alamat: {{ $row->customer_address }}</small>
                                            </td>
                                            <td>Rp {{ number_format($row->subtotal) }}</td>
                                            <td>{{ $row->created_at->format('d-m-Y') }}</td>
                                            <td>
                                                @if ($row->status == 0)
                                                    <span class="badge badge-secondary">Baru</span>
                                                @elseif ($row->status == 1)
                                                    <span class="badge badge-primary">Dikonfirmasi</span>
                                                @elseif ($row->status == 2)
                                                    <span class="badge badge-info">Proses</span>
                                                @elseif ($row->status == 3)
                                                    <span class="badge badge-warning">Dikirim</span>
                                                @elseif ($row->status == 4)
                                                    <span class="badge badge-success">Selesai</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($row->status == 0)
                                                    <a class="btn btn-danger btn-sm mb-1" href="/customer/pdf/{{$row->id}}" target="_blank">View Invoice</a>
                                                @elseif ($row->status == 1)
                                                    <form action="{{ route('orders.updateStatus', $row->id) }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="status" value="2">
                                                        <button class="btn btn-success btn-sm mb-1" type="submit">Update ke Proses</button>
                                                    </form>
                                                @elseif ($row->status == 2)
                                                    <form action="{{ route('orders.updateStatus', $row->id) }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="status" value="3">
                                                        <button class="btn btn-info btn-sm mb-1" type="submit">Update ke Dikirim</button>
                                                    </form>
                                                @elseif ($row->status == 3)
                                                    <button class="btn btn-outline-secondary btn-sm mb-1" disabled>Menunggu Pelanggan</button>
                                                @elseif ($row->status == 4)
                                                    <form action="{{ route('orders.destroy', $row->id) }}" method="post" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-success btn-sm mb-1" disabled>Selesai</button>
                                                        <button class="btn btn-danger btn-sm mb-1" type="submit">Hapus</button>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="6" class="text-center">Tidak ada data pesanan.</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-3">
                                {!! $orders->appends(request()->all())->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection