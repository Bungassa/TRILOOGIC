# Ekky Family Refleksi

Sistem Informasi Manajemen dan Pemesanan Layanan untuk Ekky Family Refleksi. Aplikasi ini dibangun menggunakan framework Laravel untuk mengelola pemesanan layanan pijat/refleksi baik secara datang langsung (Walk-in/Di Tempat) maupun panggilan ke rumah (Home Service).

## Fitur Utama

- **Pemesanan Layanan**: Pelanggan dapat memesan layanan secara online dengan validasi jadwal real-time.
- **Manajemen Bed (Admin)**: Sistem alokasi pelanggan pada 8 bed yang terbagi berdasarkan jenis kelamin (Ruang Laki-laki & Perempuan) dengan pencegahan overbooking otomatis.
- **Home Service & Map Picker**: Mendukung layanan panggilan ke rumah dengan fitur pemilihan lokasi (Map Picker) menggunakan integrasi Google Maps/Leaflet.
- **Manajemen Transaksi (Admin & Owner)**: Pengelolaan pesanan, status pengerjaan, dan status pembayaran dengan fitur *sorting* datatable tingkat lanjut.
- **Dashboard Analitik & Laporan (Owner)**: Visualisasi grafik tren pendapatan bulanan dan fitur cetak laporan operasional secara spesifik.
- **Manajemen Karyawan & Absensi**: Pengelolaan data terapis aktif/nonaktif serta absensi karyawan.
- **Penggajian**: Sistem perhitungan gaji karyawan (terapis) berdasarkan sistem bagi hasil layanan yang diselesaikan.
- **Sistem Notifikasi**: Peringatan otomatis (*alert*) jika slot waktu atau kapasitas bed sudah penuh.

## Kebutuhan Sistem

- PHP >= 8.1
- Composer
- Database MySQL / MariaDB
- Node.js & NPM (untuk kompilasi asset)

## Instalasi

1. **Clone repositori** atau ekstrak kode sumber ke dalam folder server lokal (misalnya `htdocs` atau `www`).
2. **Install dependensi PHP** menggunakan Composer:
   ```bash
   composer install
   ```
3. **Install dependensi JavaScript**:
   ```bash
   npm install
   npm run build
   ```
4. **Konfigurasi Environment**:
   Salin file `.env.example` menjadi `.env` lalu sesuaikan konfigurasi database Anda.
   ```bash
   cp .env.example .env
   ```
5. **Generate Application Key**:
   ```bash
   php artisan key:generate
   ```
6. **Migrasi Database**:
   Jalankan migrasi untuk membuat struktur tabel.
   ```bash
   php artisan migrate
   ```
   *(Opsional)* Jalankan seeder jika tersedia untuk data dummy/awal:
   ```bash
   php artisan db:seed
   ```
7. **Jalankan Aplikasi**:
   ```bash
   php artisan serve
   ```
   Aplikasi dapat diakses melalui `http://localhost:8000`.

## Catatan Keamanan
Pastikan file `.env` tidak pernah dibagikan secara publik. Konfigurasi kredensial database, API Key pembayaran (Payment Gateway), dan informasi sensitif lainnya harus disimpan dengan aman dan disesuaikan untuk lingkungan *production*.

## Lisensi
Aplikasi ini bersifat tertutup (*closed-source*) dan dikembangkan khusus untuk keperluan internal operasional Ekky Family Refleksi.