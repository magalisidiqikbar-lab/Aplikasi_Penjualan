<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Import Model agar controller bisa mengambil data dari database
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        // Memastikan hanya user yang sudah login bisa masuk ke dashboard
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     */
    public function index()
    {
        // 1. Menghitung jumlah data asli dari masing-masing tabel database
        $products_count = Product::count();
        $categories_count = Category::count();
        $orders_count = Order::count();

        // 2. Mengirim data tersebut ke file resources/views/dashboard.blade.php
        return view('dashboard', compact(
            'products_count', 
            'categories_count', 
            'orders_count'
        ));
    }
}