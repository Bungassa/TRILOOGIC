# Ekky Family Refleksi

Sistem Informasi Manajemen dan Pemesanan Layanan untuk Ekky Family Refleksi. Aplikasi ini dibangun menggunakan framework Laravel untuk mengelola pemesanan layanan pijat/refleksi baik secara datang langsung (Walk-in/Di Tempat) maupun panggilan ke rumah (Home Service).

## Fitur Utama

- **Pemesanan Layanan**: Pelanggan dapat memesan layanan secara online dengan validasi jadwal real-time berdasarkan perhitungan durasi layanan.
- **Manajemen Kapasitas & Jadwal**: Sistem otomatis memvalidasi jam operasional dan bentrok kapasitas pesanan secara konkuren (maksimal 4 layanan bersamaan per jenis kelamin).
- **Home Service & Map Picker**: Mendukung layanan panggilan ke rumah dengan fitur pemilihan lokasi (Map Picker) menggunakan integrasi Google Maps/Leaflet.
- **Manajemen Transaksi (Admin & Owner)**: Pengelolaan pesanan dan status pengerjaan yang berubah secara otomatis (menunggu -> proses -> selesai) berdasarkan durasi layanan, dilengkapi fitur *sorting* datatable.
- **Dashboard Analitik & Laporan (Owner)**: Visualisasi grafik tren pendapatan bulanan dan fitur cetak laporan operasional secara spesifik.
- **Manajemen Karyawan & Absensi**: Pengelolaan data terapis aktif/nonaktif serta absensi karyawan.
- **Penggajian**: Sistem perhitungan gaji karyawan (terapis) berdasarkan sistem bagi hasil layanan yang diselesaikan.
- **Sistem Notifikasi**: Peringatan otomatis (*alert*) jika slot waktu, kapasitas layanan penuh, atau pesanan melampaui jam operasional.
- **Autentikasi Lanjutan**: Mendukung login instan menggunakan akun Google (OAuth) serta pemulihan password via kode OTP yang dikirimkan ke email.

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
   Salin file `.env.example` menjadi `.env` lalu sesuaikan konfigurasi database Anda. Pastikan untuk mengisi konfigurasi SMTP dan Google Client ID untuk mengaktifkan fitur autentikasi.
   ```bash
   cp .env.example .env
   ```
   **Tambahan untuk `.env`:**
   ```env
   # Setup Email (untuk OTP)
   MAIL_MAILER=smtp
   MAIL_HOST=smtp.gmail.com
   MAIL_PORT=465
   MAIL_USERNAME=email_anda@gmail.com
   MAIL_PASSWORD=password_aplikasi_gmail
   MAIL_ENCRYPTION=ssl
   MAIL_FROM_ADDRESS=email_anda@gmail.com
   MAIL_FROM_NAME="${APP_NAME}"

   # Setup Google Login
   GOOGLE_CLIENT_ID=client_id_dari_gcp
   GOOGLE_CLIENT_SECRET=client_secret_dari_gcp
   GOOGLE_REDIRECT_URI=http://localhost:8000/auth/google/callback
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