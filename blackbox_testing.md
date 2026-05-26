# Skenario Pengujian Black Box (Black Box Testing) Lengkap

Dokumen ini berisi skenario pengujian *Black Box* (menguji fungsionalitas sistem berdasarkan *input* dan *output* tanpa melihat struktur kode) secara komprehensif untuk seluruh fitur utama di aplikasi **Ekky Family Refleksi**.

## 1. Modul Autentikasi & Akun

| No | Skenario Pengujian | Input (Data Uji) | Hasil yang Diharapkan (*Expected Result*) | Hasil Pengujian | Status |
|:---|:---|:---|:---|:---|:---:|
| 1.1 | Login dengan kredensial valid | Email: `admin@gmail.com`, Password: `password123` | Sistem berhasil mengautentikasi dan mengarahkan user ke Dashboard sesuai *role* (Admin/Owner/Pelanggan). | Sistem berhasil mengautentikasi dan melakukan *redirect*. | [PASS] |
| 1.2 | Login dengan email yang tidak terdaftar | Email: `salah@gmail.com`, Password: `password123` | Sistem menolak akses dan menampilkan error "Kredensial tidak valid" pada bahasa lokal. | Sistem menolak akses dan memberikan error pada kolom *email*. | [PASS] |
| 1.3 | Login dengan password salah | Email: `admin@gmail.com`, Password: `passwordsalah` | Sistem menolak akses dan menampilkan error kredensial tidak cocok. | Sistem menolak akses dan memberikan pesan error. | [PASS] |
| 1.4 | Login dengan input kosong | Email: *(kosong)*, Password: *(kosong)* | Sistem memunculkan error validasi *wajib isi* pada kedua kolom. | Muncul error validasi wajib isi. | [PASS] |
| 1.5 | Registrasi akun baru (Semua Valid) | Nama: `Budi`, Email: `budi@gmail.com`, Telp: `0811`, JK: `L`, Pass: `pass123`, Confirm: `pass123` | Akun dibuat, role otomatis menjadi `user`/pelanggan, dan sukses login/redirect. | Akun baru masuk ke dalam database. | [PASS] |
| 1.6 | Registrasi dengan email duplikat | Menggunakan email yang sudah terdaftar di sistem. | Sistem menolak dengan alasan "Email sudah digunakan". | Form dikembalikan dengan error *unique*. | [PASS] |
| 1.7 | Registrasi dengan konfirmasi password berbeda | Pass: `pass123`, Confirm: `pass321` | Sistem menolak dengan error konfirmasi password tidak cocok. | Error *password confirmation does not match* muncul. | [PASS] |
| 1.8 | Fitur Lupa Password (Valid) | Mengisi email yang terdaftar untuk link reset. | Sistem mengirimkan *link* reset ke email terkait. | *(Akan diuji manual)* | [ ] |
| 1.9 | Logout | Menekan tombol Logout di *sidebar* atau menu *dropdown*. | Sesi dihancurkan, *user* diarahkan kembali ke halaman Login/Utama. | *(Akan diuji manual)* | [ ] |

## 2. Modul Pemesanan Layanan (Pelanggan)

| No | Skenario Pengujian | Input (Data Uji) | Hasil yang Diharapkan (*Expected Result*) | Hasil Pengujian | Status |
|:---|:---|:---|:---|:---|:---:|
| 2.1 | Cek Repopulasi Data Profil Otomatis | Klik checkbox "Pemesan adalah saya (Pelanggan)". | Form (Nama, No. Telp, Jenis Kelamin) terisi otomatis dengan data akun yang sedang login. | *(Akan diuji manual)* | [ ] |
| 2.2 | Pemesanan "Di Tempat" (Walk-in) | Pilih Layanan, Lokasi = "Di Tempat", Jam & Tanggal valid. | Total Harga normal tanpa tambahan ongkir. Pesanan dibuat dengan status *pending*. | Test otomatis berhasil men-submit form, namun data gagal masuk (Validasi Gagal). | [FAIL] |
| 2.3 | Pemesanan "Di Rumah" (Home Service) | Pilih Lokasi = "Di Rumah", isi alamat lengkap dan pilih titik *Maps*. | Muncul rincian biaya Ongkir (Rp 20.000) pada Total Harga. Koordinat latitude & longitude wajib tersimpan. | *(Akan diuji manual)* | [ ] |
| 2.4 | Validasi Jam Operasional (Terlalu Pagi) | Pilih Tanggal esok, Jam: `07:00`. | Input ditolak/di-*reset* atau muncul error "Jam operasional 09:00 - 23:00". | *(Akan diuji manual)* | [ ] |
| 2.5 | Validasi Jam Operasional (Masa Lalu) | Pilih Tanggal hari ini, Jam: (lebih kecil dari waktu sekarang). | Input ditolak/di-*reset*. *Minimum time* bergeser menjadi waktu saat ini. | *(Akan diuji manual)* | [ ] |
| 2.6 | Pengujian *Form Recovery* jika gagal validasi | Sengaja mengosongkan Nomor HP, namun sudah mengisi Alamat dan Layanan. | Halaman *reload* memunculkan error No HP, namun input Alamat dan Titik Koordinat Peta tidak hilang. | *(Akan diuji manual)* | [ ] |
| 2.7 | Pembatalan Pesanan Belum Dibayar | Buka detail pesanan *pending*, klik tombol Batal. | Status transaksi berubah menjadi `dibatalkan`. | *(Akan diuji manual)* | [ ] |

## 3. Modul Kelola Transaksi & Layanan (Admin)

| No | Skenario Pengujian | Input (Data Uji) | Hasil yang Diharapkan (*Expected Result*) | Hasil Pengujian | Status |
|:---|:---|:---|:---|:---|:---:|
| 3.1 | Penambahan Transaksi Manual (Admin) | Pilih Pelanggan (atau tambah baru), Pilih Layanan, Tentukan Karyawan Terapis. | Transaksi tersimpan ke *database* dan masuk ke daftar *list* Admin. | *(Akan diuji manual)* | [ ] |
| 3.2 | Update Status: Pending ke Dikerjakan | Klik tombol status "Proses / Dikerjakan" pada transaksi. | Status *database* dan tampilan UI berubah (misal dari abu-abu menjadi biru/kuning). | *(Akan diuji manual)* | [ ] |
| 3.3 | Update Status: Dikerjakan ke Selesai | Klik tombol "Selesai", pastikan status pembayaran = Lunas. | Transaksi tertutup, nominal terhitung, riwayat terekam. | *(Akan diuji manual)* | [ ] |
| 3.4 | Cek Detail Koordinat Pelanggan | Membuka detail transaksi "Di Rumah" (Home Service). | Muncul data alamat detail dan tombol navigasi G-Maps dengan titik latitude & longitude akurat. | *(Akan diuji manual)* | [ ] |
| 3.5 | Tambah Layanan Baru | Nama: `Pijat Batu`, Harga: `150000`, Deskripsi: `Pijat hangat`. | Layanan baru bertambah ke menu pelanggan dan daftar master data Admin. | *(Akan diuji manual)* | [ ] |
| 3.6 | Edit Harga Layanan | Mengubah harga `Pijat Batu` menjadi `170000`. | Harga baru berlaku untuk transaksi *berikutnya* (transaksi lama tidak terpengaruh). | *(Akan diuji manual)* | [ ] |
| 3.7 | Tambah Data Karyawan | Input Nama, Posisi (Terapis/Kasir), Kontak. | Karyawan baru bisa dipilih saat membuat atau di-_assign_ pada transaksi. | *(Akan diuji manual)* | [ ] |

## 4. Modul Laporan, Penggajian, & Pajak (Owner)

| No | Skenario Pengujian | Input (Data Uji) | Hasil yang Diharapkan (*Expected Result*) | Hasil Pengujian | Status |
|:---|:---|:---|:---|:---|:---:|
| 4.1 | Perhitungan Pajak Layanan Khusus | Transaksi Layanan *Full Body* (cth: Rp 100.000) diselesaikan. | Sistem memotong Rp 10.000 pajak untuk Owner. Sisa Rp 90.000 dibagi dua rata (Komisi Karyawan: 45.000, Bersih Owner: 45.000). | *(Akan diuji manual)* | [ ] |
| 4.2 | Perhitungan Layanan Biasa (Tanpa Pajak) | Transaksi Layanan *Biasa* (cth: Rp 100.000) diselesaikan. | Tidak ada potongan awal. Komisi Karyawan: Rp 50.000, Bersih Owner: Rp 50.000. | *(Akan diuji manual)* | [ ] |
| 4.3 | Tampilan Dashboard Owner | Memuat halaman `/owner/dashboard`. | Kartu Ringkasan (Total Pemasukan, Total Karyawan, Jumlah Pesanan Hari Ini) tampil secara akurat (*Real-Time*). | *(Akan diuji manual)* | [ ] |
| 4.4 | Cetak / Filter Laporan Pemasukan | Pilih bulan spesifik (misal: Mei 2026). | Tabel laporan hanya menampilkan transaksi yang `selesai` pada bulan tersebut beserta total akhir. | *(Akan diuji manual)* | [ ] |
| 4.5 | Proses Pembayaran Gaji Karyawan | Buka modul Penggajian, klik "Bayar" pada saldo komisi Terapis X. | Status komisi berubah dari `Pending` ke `Lunas`, waktu pembayaran (timestamp) tercatat. | *(Akan diuji manual)* | [ ] |
| 4.6 | Manajemen Akun Admin/Terapis | Owner menambah akun `admin2@gmail.com`. | Akun baru dapat *login* sebagai Admin dan tidak bisa mengakses halaman Owner. | *(Akan diuji manual)* | [ ] |

## 5. Modul Profil Pelanggan & Testimoni

| No | Skenario Pengujian | Input (Data Uji) | Hasil yang Diharapkan (*Expected Result*) | Hasil Pengujian | Status |
|:---|:---|:---|:---|:---|:---:|
| 5.1 | Update Profil Pengguna | Mengganti nama dan nomor telepon pada menu Profil. | Data ter-update, transaksi selanjutnya akan mengambil data baru ini. | *(Akan diuji manual)* | [ ] |
| 5.2 | Simpan Titik Lokasi Rumah (My Address) | Memilih koordinat rumah di fitur profil agar tidak perlu isi manual terus. | Koordinat tersimpan di profil, dan otomatis teraplikasikan saat pemesanan "Di Rumah". | *(Akan diuji manual)* | [ ] |
| 5.3 | Pemberitahuan Wajib Testimoni | Pelanggan memiliki transaksi yang statusnya `Selesai` namun belum di-review. | Muncul notifikasi / *alert sticky* di sudut layar mengingatkan "Ada X pesanan belum diberi ulasan". | *(Akan diuji manual)* | [ ] |
| 5.4 | Pengisian Testimoni & Bintang | Memberi Bintang 5 dan komentar "Sangat enak". | Ulasan tersimpan, alert testimoni menghilang, dan testimoni masuk ke antrean *Landing Page*. | *(Akan diuji manual)* | [ ] |

---
**Petunjuk Eksekusi Manual (Bagi QA / Dosen / Penguji):**
- Pastikan untuk menguji menggunakan setidaknya 3 *role* berbeda secara berurutan: **Pelanggan** (buat pesanan) -> **Admin** (proses pesanan) -> **Owner** (cek mutasi/pajak).
- Kolom **Hasil Pengujian** diisi dengan respon sistem (misal: "Pop-up sukses muncul", "Terjadi 500 Server Error").
- Centang `[x]` atau tulis **PASS / FAIL** pada kolom status.
