# Skenario Pengujian Black Box (Black Box Testing)

Dokumen ini berisi skenario pengujian *Black Box* (menguji fungsionalitas sistem tanpa melihat struktur kode di dalamnya). Pengujian ini berfokus pada *input* dan *output* dari fitur-fitur utama di aplikasi **Ekky Family Refleksi**.

## 1. Modul Autentikasi (Login & Register)

| No | Skenario Pengujian | Input (Data Uji) | Hasil yang Diharapkan (*Expected Result*) | Hasil Pengujian | Status |
|:---|:---|:---|:---|:---|:---:|
| 1.1 | Login dengan kredensial valid | Email: `admin@gmail.com`<br>Password: `password123` | Sistem mengarahkan user ke halaman Dashboard sesuai *role* (Admin/Owner/Pelanggan). | Sistem berhasil mengautentikasi dan melakukan *redirect*. | [PASS] |
| 1.2 | Login dengan email yang salah | Email: `salah@gmail.com`<br>Password: `password123` | Sistem menolak akses dan menampilkan pesan error "Kredensial tidak valid". | Sistem menolak akses dan memberikan error pada kolom *email*. | [PASS] |
| 1.3 | Login dengan password kosong | Email: `admin@gmail.com`<br>Password: *(kosong)* | Sistem menampilkan validasi *required* pada kolom password. | Muncul error validasi wajib isi pada kolom *password*. | [PASS] |
| 1.4 | Registrasi akun baru (Valid) | Nama, Email, Telepon, Jenis Kelamin, dan Password diisi dengan benar. | Akun berhasil dibuat dan user diarahkan ke halaman Login/Dashboard dengan pesan sukses. | Akun baru masuk ke dalam database dan di-*redirect*. | [PASS] |
| 1.5 | Registrasi dengan email yang sudah ada | Email: menggunakan email yang sudah terdaftar. | Sistem menolak registrasi dan menampilkan pesan "Email sudah digunakan". | Form dikembalikan dengan error *unique* pada email. | [PASS] |

## 2. Modul Pemesanan Layanan (Pelanggan)

| No | Skenario Pengujian | Input (Data Uji) | Hasil yang Diharapkan (*Expected Result*) | Hasil Pengujian | Status |
|:---|:---|:---|:---|:---|:---:|
| 2.1 | Pemesanan "Di Tempat" (Valid) | Memilih layanan, tanggal (hari ini), dan jam (dalam jam operasional). | Ringkasan pesanan muncul dengan harga normal. Pesanan berhasil disimpan. | Test otomatis berhasil melewati proses submit, namun data tidak tersimpan. Terdapat masalah validasi (kemungkinan perlu penyesuaian parameter test/form). | [FAIL] |
| 2.2 | Pemesanan "Di Rumah" (Valid) | Memilih "Di Rumah", memilih koordinat dari Peta, dan mengisi alamat. | Ringkasan pesanan bertambah biaya Ongkir (Rp 20.000). Titik koordinat tersimpan. | *(Akan diuji manual)* | [ ] |
| 2.3 | Pemesanan dengan Waktu di luar Jam Operasional | Jam: `07:00` atau `23:30` (Operasional: 09:00 - 23:00) | Sistem secara otomatis menolak input / me-reset jam dan memberi peringatan. | *(Akan diuji manual)* | [ ] |
| 2.4 | Pemesanan dengan Waktu yang sudah lewat (Hari Ini) | Memilih tanggal hari ini, namun jamnya lebih kecil dari jam saat ini. | Sistem otomatis mengubah jam minimum menjadi jam saat ini, mencegah input masa lalu. | *(Akan diuji manual)* | [ ] |
| 2.5 | Form gagal divalidasi *(Repopulation)* | Mengosongkan layanan namun mengisi nama dan alamat, lalu klik *Submit*. | Sistem mengembalikan form (nama dan alamat tetap terisi, tidak hilang/reset). | *(Akan diuji manual)* | [ ] |
| 2.6 | Checkbox "Pemesan adalah pelanggan" | Mencentang *checkbox* | Data profil pelanggan (Nama, No. Telp, Jenis Kelamin) otomatis masuk ke dalam form, input jenis kelamin tetap aktif dipilih. | *(Akan diuji manual)* | [ ] |

## 3. Modul Kelola Transaksi (Admin)

| No | Skenario Pengujian | Input (Data Uji) | Hasil yang Diharapkan (*Expected Result*) | Hasil Pengujian | Status |
|:---|:---|:---|:---|:---|:---:|
| 3.1 | Tambah Transaksi Offline (Walk-in) | Mengisi data pelanggan, layanan, dan karyawan. | Transaksi baru berhasil ditambahkan dan masuk ke daftar antrean. | *(Akan diuji manual)* | [ ] |
| 3.2 | Update Status ke "Dikerjakan" | Memilih transaksi, klik tombol *Update Status* ke "Dikerjakan". | Status berubah menjadi "Dikerjakan", warna *badge* berubah menjadi proses. | *(Akan diuji manual)* | [ ] |
| 3.3 | Update Status ke "Selesai" dan Lunas | Memilih transaksi, klik tombol selesai & bayar lunas. | Sistem otomatis menghitung komisi/gaji karyawan dan menambahkannya ke data Penggajian. | *(Akan diuji manual)* | [ ] |
| 3.4 | Lihat Detail Lokasi Pemesanan "Di Rumah" | Mengklik ikon Map/Detail pada transaksi *Home Service*. | Detail alamat lengkap muncul beserta tombol arah navigasi Google Maps sesuai titik *lat/lng*. | *(Akan diuji manual)* | [ ] |

## 4. Modul Laporan & Penggajian (Owner)

| No | Skenario Pengujian | Input (Data Uji) | Hasil yang Diharapkan (*Expected Result*) | Hasil Pengujian | Status |
|:---|:---|:---|:---|:---|:---:|
| 4.1 | Melihat Dashboard Owner | Membuka halaman `/owner/dashboard` | Menampilkan total layanan, total karyawan, transaksi hari ini, dan total pendapatan owner. | *(Akan diuji manual)* | [ ] |
| 4.2 | Potongan Pajak pada Layanan *Full Body* | Transaksi layanan *Full Body* diselesaikan dengan harga misal Rp 100.000 | Total harga dipotong 10.000 terlebih dahulu. Gaji karyawan dan owner dibagi dari sisa 90.000 (Masing-masing 45.000). | *(Akan diuji manual)* | [ ] |
| 4.3 | Filter Laporan Pendapatan | Memasukkan filter Bulan dan Tahun tertentu. | Tabel dan grafik hanya menampilkan pendapatan pada bulan dan tahun tersebut. | *(Akan diuji manual)* | [ ] |
| 4.4 | Pembayaran Gaji Karyawan | Owner menekan tombol "Bayar Gaji" pada karyawan X. | Status pembayaran di database berubah dari "pending" menjadi "lunas", tercatat tanggal bayarnya. | *(Akan diuji manual)* | [ ] |
| 4.5 | Manajemen Akun Admin | Menambah email dan password untuk akun Admin baru. | Akun admin baru berhasil masuk ke database, dan bisa digunakan untuk Login. | *(Akan diuji manual)* | [ ] |

---
**Catatan Pengujian:**
1. Kolom **Hasil Pengujian** dapat diisi dengan kondisi sebenarnya yang terjadi saat dites (misal: *"Sesuai dengan ekspektasi"*, *"Gagal, muncul error 500"*, dll).
2. Kolom **Status** dapat dicentang `[x]` atau diisi **PASS** / **FAIL**.
