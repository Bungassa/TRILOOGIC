@extends('layout.layout')

@section('content')

    <link rel="stylesheet" href="{{ asset('assets/css/pemesanan.css') }}">

    <!-- Start Header Section -->
    <header class="cs_site_header cs_style_1 cs_type_1 cs_sticky_header cs_site_header_full_width">
      <div class="cs_top_header">
        <div class="container">
          <div class="cs_top_header_in">
            <div class="cs_top_header_left">
              <ul class="cs_top_nav d-flex flex-wrap align-items-center cs_fs_12 text-white m-0 p-0">
                <li><b class="fw-medium text-white">Alamat:</b> Jl. D. I. Panjaitan No. 65, Soklat, Subang, Jawa Barat</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="cs_main_header">
        <div class="container">
          <div class="cs_main_header_in">
            <div class="cs_main_header_left">
              <div class="cs_nav cs_primary_font fw-medium">
                <ul class="cs_nav_list fw-medium text-uppercase">
                  <li><a href="{{ url('index') }}">Beranda</a></li>
                  <li><a href="{{ url('about') }}">Tentang</a></li>
                  <li><a href="{{ url('service') }}">Layanan</a></li>
                  <li><a href="{{ url('contact') }}">Kontak</a></li>
                </ul>
              </div>
            </div>
            <div class="cs_main_header_right">
              <div class="cs_toolbox">
                <div class="cs_header_search_wrap position-relative">
                  <span class="cs_header_search_btn d-flex">
                    <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M24.7628 23.6399L18.3082 17.2884C19.9984 15.452 21.037 13.0234 21.037 10.3509C21.0362 4.63387 16.3273 0 10.5181 0C4.70891 0 0 4.63387 0 10.3509C0 16.0678 4.70891 20.7017 10.5181 20.7017C13.0281 20.7017 15.3301 19.8335 17.1384 18.3902L23.618 24.7667C23.9338 25.0777 24.4463 25.0777 24.7621 24.7667C25.0785 24.4557 25.0785 23.9509 24.7628 23.6399ZM10.5181 19.1092C5.60289 19.1092 1.61836 15.1879 1.61836 10.3509C1.61836 5.51376 5.60289 1.59254 10.5181 1.59254C15.4333 1.59254 19.4178 5.51376 19.4178 10.3509C19.4178 15.1879 15.4333 19.1092 10.5181 19.1092Z" fill="currentColor"/>
                    </svg>
                  </span>
                  <form class="cs_header_search_form position-absolute bg-white cs_transition_3 cs_rounded_5 end-0 cs_pt_20 cs_pb_20 cs_pl_20 cs_pr_20">
                    <input type="text" placeholder="Type your keywork  ...">
                    <button class="cs_header_search_sumbit_btn">
                      <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M24.7628 23.6399L18.3082 17.2884C19.9984 15.452 21.037 13.0234 21.037 10.3509C21.0362 4.63387 16.3273 0 10.5181 0C4.70891 0 0 4.63387 0 10.3509C0 16.0678 4.70891 20.7017 10.5181 20.7017C13.0281 20.7017 15.3301 19.8335 17.1384 18.3902L23.618 24.7667C23.9338 25.0777 24.4463 25.0777 24.7621 24.7667C25.0785 24.4557 25.0785 23.9509 24.7628 23.6399ZM10.5181 19.1092C5.60289 19.1092 1.61836 15.1879 1.61836 10.3509C1.61836 5.51376 5.60289 1.59254 10.5181 1.59254C15.4333 1.59254 19.4178 5.51376 19.4178 10.3509C19.4178 15.1879 15.4333 19.1092 10.5181 19.1092Z" fill="currentColor"/>
                      </svg>
                    </button>
                  </form>
                </div>
                <div class="cs_header_contact">
                  <div class="cs_header_contact_icon text-accent">
                    <svg width="35" height="36" viewBox="0 0 35 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M18.1846 18.6831C18.1846 19.0607 17.8786 19.3667 17.501 19.3667C17.1234 19.3667 16.8174 19.0607 16.8174 18.6831C16.8174 18.3055 17.1234 17.9995 17.501 17.9995C17.8786 17.9995 18.1846 18.3055 18.1846 18.6831Z" fill="currentColor" />
                      <path d="M28.9669 19.1887C28.2043 18.4264 26.9696 18.425 26.2069 19.1885L23.9057 21.4892C23.4576 21.9378 22.7657 22.0294 22.2608 21.7065C21.5959 21.282 20.9029 20.7818 20.2015 20.2197C19.9067 19.9837 19.4765 20.0312 19.2404 20.3257C19.0044 20.6205 19.0519 21.0507 19.3467 21.2868C20.0861 21.879 20.8188 22.408 21.5246 22.8588C22.566 23.5242 23.9743 23.3549 24.8726 22.4558L27.1741 20.1551C27.3989 19.93 27.7672 19.9225 28.0022 20.1575L33.4626 25.5697C33.6904 25.7974 33.6901 26.1683 33.4626 26.3961L32.0615 27.7975C30.0521 29.8061 26.8756 30.3396 24.3361 29.0944C13.2881 23.6775 7.80304 13.9181 6.38512 11.0561C5.12742 8.51667 5.64999 5.44317 7.68555 3.40761L9.05487 2.03722C9.28292 1.80944 9.65382 1.80944 9.88159 2.03695L15.2964 7.45176C15.5244 7.6798 15.5247 8.04937 15.2964 8.27741L12.9954 10.5787C12.0963 11.4777 11.927 12.8858 12.5925 13.9267C13.212 14.8965 13.9687 15.9037 14.8414 16.9206C15.0873 17.2068 15.5188 17.24 15.8056 16.994C16.0919 16.7481 16.125 16.3166 15.8791 16.0298C15.0478 15.0615 14.3298 14.1064 13.7444 13.1902C13.4219 12.6858 13.5135 11.9942 13.9623 11.5453L16.2633 9.24432C17.0257 8.48195 17.0259 7.24748 16.2633 6.48511L10.8482 1.07004C10.088 0.310076 8.85006 0.309809 8.08823 1.07031L6.71837 2.44096C4.26812 4.89149 3.64167 8.59731 5.15999 11.6628C6.62625 14.6225 12.2995 24.7154 23.7342 30.322C24.8373 30.8627 26.0344 31.1383 27.2555 31.1383C29.5763 31.1383 31.8225 30.322 33.4626 28.6819L34.8637 27.2808C35.5657 26.5788 35.566 25.3849 34.8637 24.6826L29.4033 19.2704C29.1683 19.0354 28.8 19.0429 28.5752 19.268L28.9669 19.1887Z" fill="currentColor"/>
                    </svg>
                  </div>
                  <div class="cs_header_contact_right">
                    <h3 class="text-white fw-normal cs_mb_6 cs_fs_13">Butuh bantuan?  Hubungi kami:</h3>
                    <h3 class="text-white m-0 cs_fs_13">+62 823-2030-8466</h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- End Header Section -->

    <!-- Page Header -->
    <section class="cs_page_header position-relative background-filled d-flex align-items-center justify-content-between" data-src="assets/img/page_header_1.jpeg">
      <div class="container position-relative z-index-1">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb text-white cs_fs_18 cs_mb_5">
            <li class="breadcrumb-item"><a href="{{ url('index') }}">Home</a></li>
            <li class="breadcrumb-item active">Pemesanan</li>
          </ol>
        </nav>
        <h1 class="cs_fs_48 cs_fs_lg_36 text-white m-0">Pemesanan Layanan</h1>
      </div>
      <div class="position-absolute end-0 bottom-0">
        <svg width="660" height="497" viewBox="0 0 660 497" fill="none" xmlns="http://www.w3.org/2000/svg">
          <defs>
            <linearGradient id="paint0_linear_81_9510" x1="330" y1="0" x2="330" y2="497" gradientUnits="userSpaceOnUse">
              <stop offset="0" stop-color="white" stop-opacity="0"></stop>
              <stop offset="0.9999" stop-color="#D9D9D9" stop-opacity="0.35"></stop>
              <stop offset="1" stop-color="#222121" stop-opacity="0"></stop>
            </linearGradient>
          </defs>
          <path d="M240 0H660L430 497H0L240 0Z" fill="url(#paint0_linear_81_9510)"></path>
        </svg>
      </div>
    </section>

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

                <!-- Nama -->
                <div class="pemesanan-form-group">
                  <label class="pemesanan-label">Nama Lengkap</label>
                  <input type="text" name="nama" required
                         class="pemesanan-input"
                         placeholder="Masukkan nama lengkap">
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
                         class="pemesanan-input" onchange="updateSummary()">
                </div>

                <!-- Jam -->
                <div class="pemesanan-form-group">
                  <label class="pemesanan-label">Jam yang Diinginkan</label>
                  <input type="time" name="jam" id="jam_input" required
                         class="pemesanan-input" onchange="updateSummary()">
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

      // Initialize summary on page load
      document.addEventListener('DOMContentLoaded', function() {
        updateSummary();
      });
    </script>

@endsection
