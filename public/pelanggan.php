<?php
// File Final Anti-Gagal untuk Tubes
require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$response = $kernel->handle($request = Illuminate\Http\Request::capture());

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

try {
    DB::transaction(function () {
        // 1. Input ke tabel Customers (Lengkap)
        $customerId = DB::table('customers')->insertGetId([
            'name'        => 'PELANGGAN TUBES',
            'email'       => 'tubes_'.rand(1,999).'@gmail.com',
            'password'    => bcrypt('password123'), // Fix image_c21705.png
            'address'     => 'Bandung, Jawa Barat',
            'district_id' => 1,
            'citie_id'    => 1, // Fix image_c21b5e.png
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now(),
        ]);

        // 2. Input ke tabel Orders (LENGKAP SESUAI SEMUA ERROR)
        DB::table('orders')->insert([
            'invoice'          => 'INV-' . strtoupper(Str::random(5)),
            'customer_id'      => $customerId,
            'customer_name'    => ' Pasha',
            'customer_phone'   => '08123456789', // Fix image_c21343.png
            'customer_address' => 'Bandung, Jawa Barat',
            'district_id'      => 1,             // Fix image_c222e0.png
            'citie_id'         => 1,             // FIX ERROR TERAKHIR image_c226e6.png
            'subtotal'         => 120000,
            'status'           => '4',           // Status Selesai agar masuk Laporan
            'created_at'       => Carbon::now(),
            'updated_at'       => Carbon::now(),
        ]);
    });

    echo "<h1 style='color:green; font-family:sans-serif;'>✅ BERHASIL! DATA SUDAH MASUK!</h1>";
    echo "<p>Buka Dashboard Admin sekarang, angka 'Total Pesanan' pasti bertambah.</p>";
    echo "<a href='/home' style='display:inline-block; padding:10px 20px; background:purple; color:white; text-decoration:none; border-radius:5px;'>Ke Dashboard Admin</a>";

} catch (\Exception $e) {
    echo "<h1 style='color:red; font-family:sans-serif;'>❌ GAGAL LAGI</h1>";
    echo "<div style='background:#f8d7da; padding:15px; border:1px solid red; font-family:monospace;'>" . $e->getMessage() . "</div>";
}