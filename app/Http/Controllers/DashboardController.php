<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // Pastikan ini sesuai dengan nama file di folder app/Models

class DashboardController extends Controller
{
    public function index()
    {
        // STEP 1: Kita coba paksa angkanya ke 99.
        // Jika di layar tetap 0, berarti Route di web.php belum benar-benar mengarah ke sini.
        $totalProduk = 99; 

        // STEP 2: Jika nanti angka 99 sudah berhasil muncul, 
        // silakan hapus tanda // di bawah ini dan beri tanda // pada baris di atas.
        // $totalProduk = Product::count();

        // Data dummy lainnya
        $omsetHarian = 0; 
        $pelangganBaru = 0; 
        $perluDikirim = 0;

        return view('dashboard', compact('totalProduk', 'omsetHarian', 'pelangganBaru', 'perluDikirim'));
    }
}