<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Support\Carbon;
use PDF;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['customer.district.citie.province'])
            ->orderBy('created_at', 'DESC');

        if (request()->q != '') {
            $orders = $orders->where(function($q) {
                $q->where('customer_name', 'LIKE', '%' . request()->q . '%')
                ->orWhere('invoice', 'LIKE', '%' . request()->q . '%')
                ->orWhere('customer_address', 'LIKE', '%' . request()->q . '%');
            });
        }

        if (request()->status != '') {
            $orders = $orders->where('status', request()->status);
        }

        $orders = $orders->paginate(10);
        return view('orders.index', compact('orders'));
    }

    // Tombol Selesai
    public function updateStatus($id)
    {
        $order = Order::findOrFail($id);
        $order->update(['status' => '4']); 
        return redirect(route('orders.index'))->with(['success' => 'Status Pesanan Diperbarui']);
    }

    // FIX TOMBOL HAPUS: Pastikan logika hapus relasi benar
    public function destroy($id)
    {
        $order = Order::find($id);
        if ($order) {
            // Hapus detail pesanan dulu agar tidak error foreign key
            if($order->details()) $order->details()->delete();
            // Hapus data pembayaran jika ada
            if(method_exists($order, 'payment') && $order->payment()) $order->payment()->delete();
            
            $order->delete(); // Hapus pesanan utama
        }
        return redirect(route('orders.index'))->with(['success' => 'Pesanan Berhasil Dihapus']);
    }

    public function reports()
    {
        $start = Carbon::now()->startOfMonth()->format('Y-m-d H:i:s');
        $end = Carbon::now()->endOfMonth()->format('Y-m-d H:i:s');

        if (request()->date != '') {
            $date = explode(' - ' ,request()->date);
            $start = Carbon::parse($date[0])->format('Y-m-d') . ' 00:00:01';
            $end = Carbon::parse($date[1])->format('Y-m-d') . ' 23:59:59';
        }

        $orders = Order::with(['customer.district'])
            ->whereBetween('created_at', [$start, $end])
            ->get();
        
        $total_revenue = $orders->where('status', '4')->sum('subtotal'); 
        return view('reports.index', compact('orders', 'total_revenue'));
    }
}