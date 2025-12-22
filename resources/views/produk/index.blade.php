@extends('layouts.layout')

@section('main')
<div class="container-fluid mt-4">
    <div class="card shadow-sm border-0" style="border-radius: 15px;">
        <div class="card-header bg-white border-0 mt-3">
            <h3 class="font-weight-bold text-dark">📊 Laporan Pendapatan</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>Invoice</th>
                            <th>Pelanggan</th>
                            <th>Subtotal</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $row)
                        <tr>
                            <td><strong>#{{ $row->invoice }}</strong></td>
                            <td>{{ $row->customer_name }}</td>
                            <td>Rp {{ number_format($row->subtotal) }}</td>
                            <td><span class="badge badge-success">Selesai</span></td>
                            <td>{{ $row->created_at->format('d M Y') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection