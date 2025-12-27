# Aplikasi Penjualan

Aplikasi Penjualan merupakan sistem E-Commerce berbasis web yang dikembangkan untuk mendukung pengelolaan data penjualan secara terintegrasi. Sistem ini membantu proses pengaturan produk, pengelompokan kategori, serta pencatatan transaksi penjualan agar berjalan lebih efektif dan terstruktur.

---

## Fungsionalitas Utama

### Customer
- Membuat akun dan melakukan autentikasi login
- Melihat daftar produk yang tersedia
- Menelusuri produk berdasarkan kategori
- Melakukan pemesanan produk
- Menerima invoice secara otomatis setelah transaksi

### Admin
- Pengelolaan Kategori  
  Mengatur kategori dan sub-kategori produk

- Pengelolaan Produk  
  Menambahkan, memperbarui, dan menghapus produk  
  Mengatur stok, harga, deskripsi, dan gambar produk

- Pengelolaan Transaksi  
  Memeriksa pesanan masuk  
  Memvalidasi pembayaran  
  Memperbarui status pesanan  
  Menghasilkan laporan penjualan

---

## Desain Database

Aplikasi ini menggunakan database relasional dengan struktur tabel utama sebagai berikut:

- Admins  
  Menyimpan data akun administrator

- Categories  
  Mengelola klasifikasi produk dengan hubungan hierarki

- Products  
  Menyimpan informasi detail produk

- Customers  
  Menyimpan data pelanggan beserta alamat

- Orders dan Order Details  
  Menyimpan informasi transaksi, invoice, jumlah pembelian, dan harga transaksi

---

## Tools dan Teknologi

- Backend: PHP (Laravel Framework)
- Frontend Template: Blade
- Database: MySQL
- User Interface: Bootstrap dan CSS
