@extends('layout.layout')

@section('content')

    <link rel="stylesheet" href="{{ asset('assets/css/pemesanan.css') }}">

    <x-header pageTitle="Pemesanan Layanan" breadcrumbItem="Pemesanan" />

    <!-- Start Penawaran Section -->
    <section class="pemesanan-section pemesanan-wrapper">
      <div class="container">
        <div class="cs_section_heading cs_style_1 text-center cs_mb_60 cs_mb_lg_40">
          <div class="cs_section_heading_in">
            <h2 class="pemesanan-main-title">Pemesanan Layanan Ekky Family Refleksi</h2>
            <br/>
             <h3 class="pemesanan-section-title fw-normal cs_lh_base wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">Silahkan Pilih Layanan atau Paket Refleksi Yang Dibutuhkan</h3>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="pemesanan-form-card">
              <form action="{{ route('pemesanan.submit') }}" method="POST">
                @csrf

                @if($errors->any())
                  <div class="alert alert-danger mb-4" style="background: #f8d7da; color: #721c24; padding: 15px; border-radius: 8px; border: 1px solid #f5c6cb;">
                    <ul class="mb-0">
                      @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                @endif

                @if(session('success'))
                  <div class="alert alert-success mb-4" style="background: #d4edda; color: #155724; padding: 15px; border-radius: 8px; border: 1px solid #c3e6cb;">
                    {{ session('success') }}
                  </div>
                @endif

                <!-- Nama Pemesan -->
                <div class="pemesanan-form-group">
                  <label class="pemesanan-label">Nama Pemesan</label>
                  <input type="text" name="nama_pemesan" readonly
                         class="pemesanan-input" style="background-color: #f8f9fa;"
                         value="{{ auth()->check() ? auth()->user()->name : '' }}">
                </div>

                <!-- Data Pelanggan -->
                <div class="pemesanan-form-group" style="padding: 20px; border: 1px solid #eee; border-radius: 8px; background-color: #fafafa;">
                  <label class="pemesanan-label" style="font-size: 18px; margin-bottom: 15px;">Data Pelanggan</label>
                  
                  <div id="nama_pelanggan_container" style="margin-bottom: 15px;">
                    <label class="pemesanan-label" style="font-size: 14px; font-weight: normal; color: #666;">Nama Pelanggan 1</label>
                    <input type="text" name="nama" id="nama_pelanggan" required
                           class="pemesanan-input"
                           placeholder="Masukkan nama pelanggan 1">
                  </div>

                  <div>
                    <label style="display: flex; align-items: center; gap: 10px; cursor: pointer; color: #555; margin-bottom: 0;">
                      <input type="checkbox" id="pemesan_adalah_pelanggan" onchange="toggleNamaPelanggan()" style="width: 18px; height: 18px; accent-color: #C48989;">
                      <span>Pemesan adalah pelanggan</span>
                    </label>
                  </div>
                </div>

                <!-- Jenis Kelamin -->
                <div class="pemesanan-form-group">
                  <label class="pemesanan-label">Jenis Kelamin</label>
                  <select name="jenis_kelamin" required
                          class="pemesanan-select">
                    <option value="">-- Pilih Jenis Kelamin --</option>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                  </select>
                </div>

                <!-- No. Telepon -->
                <div class="pemesanan-form-group">
                  <label class="pemesanan-label">No. Telepon</label>
                  <input type="tel" name="telepon" required
                         class="pemesanan-input"
                         placeholder="Masukkan nomor telepon">
                </div>

                <!-- Layanan -->
                <div class="pemesanan-form-group">
                  <label class="pemesanan-label">Pilih Layanan</label>
                  <select name="layanan" id="layanan_select" required
                          class="pemesanan-select" onchange="updateSummary()">
                    <option value="">-- Pilih Layanan --</option>
                    @isset($layanans)
                      @foreach($layanans as $layanan)
                        <option value="{{ $layanan->id }}" data-harga="{{ $layanan->harga }}" data-nama="{{ $layanan->nama }}">{{ $layanan->nama }} - Rp {{ number_format($layanan->harga, 0, ',', '.') }}</option>
                      @endforeach
                    @endisset
                  </select>
                </div>

                <!-- Lokasi -->
                <div class="pemesanan-form-group">
                  <label class="pemesanan-label">Lokasi Layanan</label>
                  <div class="pemesanan-radio-group">
                    <label class="pemesanan-radio-option">
                      <input type="radio" name="lokasi" value="tempat" id="lokasi_tempat" checked onchange="toggleAlamat(); updateSummary()">
                      <span>Di Tempat (Service Center)</span>
                    </label>
                    <label class="pemesanan-radio-option">
                      <input type="radio" name="lokasi" value="rumah" id="lokasi_rumah" onchange="toggleAlamat(); updateSummary()">
                      <span>Di Rumah (Home Service)</span>
                    </label>
                  </div>
                </div>

                <!-- Alamat (Dropdown jika pilih di rumah) -->
                <div id="alamat_section" class="pemesanan-form-group pemesanan-hidden">
                  <label class="pemesanan-label">Alamat Lengkap</label>
                  <textarea name="alamat" rows="3"
                            class="pemesanan-textarea"
                            placeholder="Masukkan alamat lengkap untuk home service"></textarea>
                </div>

                <!-- Tanggal -->
                <div class="pemesanan-form-group">
                  <label class="pemesanan-label">Tanggal yang Diinginkan</label>
                  <input type="date" name="tanggal" id="tanggal_input" required
                         min="{{ date('Y-m-d') }}"
                         class="pemesanan-input" onchange="updateSummary(); validateTime()">
                </div>

                <!-- Jam -->
                <div class="pemesanan-form-group">
                  <label class="pemesanan-label">Jam yang Diinginkan</label>
                  <input type="time" name="jam" id="jam_input" required
                         class="pemesanan-input" onchange="updateSummary(); validateTime()">
                </div>

                <!-- Catatan -->
                <div class="pemesanan-form-group">
                  <label class="pemesanan-label">Catatan Tambahan (Opsional)</label>
                  <textarea name="catatan" rows="3"
                            class="pemesanan-textarea"
                            placeholder="Masukkan catatan tambahan jika ada"></textarea>
                </div>

                <!-- Ringkasan Pemesanan -->
                <div class="pemesanan-form-group">
                  <label class="pemesanan-label">Ringkasan Pemesanan</label>
                  <div class="pemesanan-summary" style="background: rgba(196, 137, 137, 0.1); padding: 20px; border-radius: 12px; border: 2px solid #E6B6B5;">
                    <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                      <span style="color: #666; font-size: 14px;">Layanan:</span>
                      <span id="summary_layanan" style="color: #18191d; font-weight: 600; font-size: 14px;">-</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                      <span style="color: #666; font-size: 14px;">Harga Layanan:</span>
                      <span id="summary_harga" style="color: #18191d; font-weight: 600; font-size: 14px;">Rp 0</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                      <span style="color: #666; font-size: 14px;">Lokasi:</span>
                      <span id="summary_lokasi" style="color: #18191d; font-weight: 600; font-size: 14px;">Di Tempat (Service Center)</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                      <span style="color: #666; font-size: 14px;">Tanggal:</span>
                      <span id="summary_tanggal" style="color: #18191d; font-weight: 600; font-size: 14px;">-</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                      <span style="color: #666; font-size: 14px;">Jam:</span>
                      <span id="summary_jam" style="color: #18191d; font-weight: 600; font-size: 14px;">-</span>
                    </div>
                    <div id="biaya_tambahan_row" style="display: flex; justify-content: space-between; margin-bottom: 10px; display: none;">
                      <span style="color: #666; font-size: 14px;">Biaya Home Service:</span>
                      <span style="color: #C48989; font-weight: 600; font-size: 14px;">Rp 20.000</span>
                    </div>
                    <div style="border-top: 2px solid #E6B6B5; margin: 15px 0;"></div>
                    <div style="display: flex; justify-content: space-between;">
                      <span style="color: #18191d; font-weight: 700; font-size: 16px;">Total:</span>
                      <span id="summary_total" style="color: #C48989; font-weight: 700; font-size: 18px;">Rp 0</span>
                    </div>
                  </div>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                        class="pemesanan-submit-btn">
                  Buat Pemesanan
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Penawaran Section -->

    <script>
      function toggleNamaPelanggan() {
        const isChecked = document.getElementById('pemesan_adalah_pelanggan').checked;
        const inputNama = document.getElementById('nama_pelanggan');
        const inputNamaPemesan = document.querySelector('input[name="nama_pemesan"]');

        if (isChecked) {
          inputNama.value = inputNamaPemesan ? inputNamaPemesan.value : '';
          inputNama.setAttribute('readonly', 'readonly');
          inputNama.style.backgroundColor = '#f8f9fa';
        } else {
          inputNama.value = '';
          inputNama.removeAttribute('readonly');
          inputNama.style.backgroundColor = '';
        }
      }

      function toggleAlamat() {
        const lokasiRumah = document.getElementById('lokasi_rumah');
        const alamatSection = document.getElementById('alamat_section');

        if (lokasiRumah.checked) {
          alamatSection.classList.remove('pemesanan-hidden');
          alamatSection.classList.add('pemesanan-visible');
        } else {
          alamatSection.classList.remove('pemesanan-visible');
          alamatSection.classList.add('pemesanan-hidden');
        }
      }

      function updateSummary() {
        const layananSelect = document.getElementById('layanan_select');
        const lokasiTempat = document.getElementById('lokasi_tempat');
        const lokasiRumah = document.getElementById('lokasi_rumah');
        const tanggalInput = document.getElementById('tanggal_input');
        const jamInput = document.getElementById('jam_input');

        const summaryLayanan = document.getElementById('summary_layanan');
        const summaryHarga = document.getElementById('summary_harga');
        const summaryLokasi = document.getElementById('summary_lokasi');
        const summaryTanggal = document.getElementById('summary_tanggal');
        const summaryJam = document.getElementById('summary_jam');
        const biayaTambahanRow = document.getElementById('biaya_tambahan_row');
        const summaryTotal = document.getElementById('summary_total');

        // Get selected service
        const selectedOption = layananSelect.options[layananSelect.selectedIndex];
        let hargaLayanan = 0;
        let namaLayanan = '-';

        if (selectedOption) {
          hargaLayanan = parseInt(selectedOption.getAttribute('data-harga')) || 0;
          namaLayanan = selectedOption.getAttribute('data-nama') || '-';
        }

        // Get location
        let lokasiText = 'Di Tempat (Service Center)';
        let biayaTambahan = 0;

        if (lokasiRumah.checked) {
          lokasiText = 'Di Rumah (Home Service)';
          biayaTambahan = 20000;
        }

        // Get tanggal and jam
        let tanggalText = tanggalInput.value || '-';
        let jamText = jamInput.value || '-';

        // Format tanggal for display
        if (tanggalText !== '-') {
          const tanggalObj = new Date(tanggalText);
          const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
          tanggalText = tanggalObj.toLocaleDateString('id-ID', options);
        }

        // Calculate total
        const total = hargaLayanan + biayaTambahan;

        // Update summary display
        summaryLayanan.textContent = namaLayanan;
        summaryHarga.textContent = 'Rp ' + hargaLayanan.toLocaleString('id-ID');
        summaryLokasi.textContent = lokasiText;
        summaryTanggal.textContent = tanggalText;
        summaryJam.textContent = jamText;

        // Show/hide additional cost row
        if (biayaTambahan > 0) {
          biayaTambahanRow.style.display = 'flex';
        } else {
          biayaTambahanRow.style.display = 'none';
        }

        // Update total
        summaryTotal.textContent = 'Rp ' + total.toLocaleString('id-ID');
      }

      function validateTime() {
        const tanggalInput = document.getElementById('tanggal_input');
        const jamInput = document.getElementById('jam_input');
        
        // Dapatkan waktu sekarang di perangkat user
        const now = new Date();
        const year = now.getFullYear();
        const month = String(now.getMonth() + 1).padStart(2, '0');
        const day = String(now.getDate()).padStart(2, '0');
        const todayStr = `${year}-${month}-${day}`;
        const currentTimeStr = now.toTimeString().split(' ')[0].substring(0, 5); // HH:mm

        // Set min tanggal secara dinamis jika belum ada atau berubah hari
        tanggalInput.setAttribute('min', todayStr);

        if (!tanggalInput.value) return;

        const selectedDate = tanggalInput.value;

        // Jika user memilih hari ini
        if (selectedDate === todayStr) {
          jamInput.setAttribute('min', currentTimeStr);
          
          // Jika jam yang sudah dipilih sebelumnya ternyata lebih kecil dari jam sekarang
          if (jamInput.value && jamInput.value < currentTimeStr) {
            jamInput.value = '';
          }
        } else if (selectedDate < todayStr) {
          // Jika user entah bagaimana memilih tanggal kemarin (misal copy-paste)
          tanggalInput.value = todayStr;
          jamInput.setAttribute('min', currentTimeStr);
        } else {
          // Jika memilih hari esok atau nanti, hapus batasan jam minimal
          jamInput.removeAttribute('min');
        }
      }

      // Jalankan saat pertama kali load dan setiap kali ada interaksi
      document.addEventListener('DOMContentLoaded', function() {
        updateSummary();
        validateTime();
        
        // Interval pengecekan setiap 1 menit untuk update min-time jika user standby lama di halaman
        setInterval(validateTime, 60000);
      });
    </script>

@endsection
