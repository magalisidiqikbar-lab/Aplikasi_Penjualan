# Aplikasi Penjualan (Plowcart) - Tugas Besar WebPro

Proyek ini adalah aplikasi E-Commerce berbasis web yang dirancang untuk mengelola penjualan produk, kategori, dan transaksi pelanggan secara efisien.

## 🚀 Fitur Utama

### Pengguna (Customer)
* Melakukan pendaftaran dan login akun.
* Menjelajahi produk berdasarkan kategori.
* Melakukan pemesanan produk dengan detail invoice otomatis.

### Admin
* Manajemen Kategori: Menambah, mengubah, dan menghapus kategori (mendukung sub-kategori).
* Manajemen Produk: Mengelola stok, harga, deskripsi, dan foto produk.
* Manajemen Pesanan: Memvalidasi pembayaran, mengubah status pesanan, dan mencetak laporan transaksi.

## 📊 Struktur Database (ERD)

Sistem ini didukung oleh database relasional dengan tabel-tabel utama sebagai berikut:
* **Admin**: Menyimpan data kredensial pengelola.
* **Categories**: Mengatur pengelompokan produk dengan fitur *parent-child*.
* **Products**: Menyimpan detail barang termasuk harga, stok, dan foto.
* **Customers**: Data identitas pembeli beserta alamat lengkap (District & City).
* **Orders & Order Details**: Mencatat transaksi, nomor invoice, jumlah barang (qty), dan harga saat transaksi dilakukan.

## 🛠️ Teknologi yang Digunakan
* **Bahasa Pemrograman**: PHP (Laravel Framework)
* **Template Engine**: Blade
* **Database**: MySQL
* **Styling**: Bootstrap / CSS

## ⚙️ Cara Instalasi
1. Clone repositori ini:
   ```bash
   git clone [https://github.com/magalisidiqikbar-lab/Aplikasi_Penjualan.git](https://github.com/magalisidiqikbar-lab/Aplikasi_Penjualan.git)
