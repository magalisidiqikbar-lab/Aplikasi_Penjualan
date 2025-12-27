Aplikasi Penjualan ini merupakan sistem E-Commerce berbasis web yang dikembangkan untuk mendukung pengelolaan data penjualan secara terintegrasi. Sistem ini membantu proses pengaturan produk, pengelompokan kategori, serta pencatatan transaksi pelanggan agar berjalan lebih efektif dan terstruktur.

🚀 Fungsionalitas Utama
Customer

Membuat akun dan melakukan autentikasi login.

Melihat daftar produk yang tersedia.

Menelusuri produk berdasarkan kategori.

Melakukan pemesanan produk dan menerima invoice secara otomatis.

Admin

Pengelolaan Kategori
Mengatur kategori dan sub-kategori produk.

Pengelolaan Produk
Menambahkan, memperbarui, dan menghapus produk, termasuk pengaturan stok, harga, deskripsi, dan gambar.

Pengelolaan Transaksi
Memeriksa pesanan masuk, memvalidasi pembayaran, memperbarui status pesanan, serta menghasilkan laporan penjualan.

📊 Desain Database

Aplikasi ini menggunakan database relasional dengan struktur tabel utama sebagai berikut:

Admins – Menyimpan data akun administrator.

Categories – Mengelola klasifikasi produk dengan hubungan hierarki.

Products – Menyimpan informasi detail produk.

Customers – Menyimpan data pelanggan beserta alamat.

Orders dan Order Details – Menyimpan informasi transaksi, invoice, jumlah pembelian, dan harga transaksi.

🛠️ Tools & Teknologi

Backend: PHP (Laravel Framework)

Frontend Template: Blade

Database Management System: MySQL

User Interface: Bootstrap & CSS

⚙️ Panduan Instalasi

Unduh repositori:

git clone https://github.com/magalisidiqikbar-lab/Aplikasi_Penjualan.git


Masuk ke folder aplikasi:

cd Aplikasi_Penjualan


Pasang dependency:

composer install


Siapkan file environment:

cp .env.example .env


Buat application key:

php artisan key:generate


Sesuaikan konfigurasi database pada file .env

Jalankan migrasi:

php artisan migrate


Jalankan server lokal:

php artisan serve


Akses aplikasi:

http://localhost:8000
