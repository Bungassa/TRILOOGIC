@extends('layout.layout')

@section('content')

    <link rel="stylesheet" href="{{ asset('assets/css/pemesanan.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    
    <style>
        /* Leaflet custom search results */
        #search-results {
            position: absolute;
            z-index: 1000;
            width: 100%;
            background: white;
            border: 1px solid #ddd;
            border-top: none;
            border-radius: 0 0 12px 12px;
            max-height: 200px;
            overflow-y: auto;
            display: none;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .search-result-item {
            padding: 10px 15px;
            cursor: pointer;
            font-size: 13px;
            border-bottom: 1px solid #f0f0f0;
        }
        .search-result-item:hover {
            background-color: #f8f9fa;
        }
        /* Fixed Center Marker */
        .map-picker-container {
            position: relative;
        }
        .center-marker {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -100%);
            z-index: 1000;
            pointer-events: none;
        }
        .center-marker i {
            font-size: 40px;
            color: #C48989;
            text-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }
        .center-marker.moving {
            transform: translate(-50%, -120%);
            transition: transform 0.2s ease-out;
        }
    </style>

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
                           placeholder="Masukkan nama pelanggan 1" value="{{ old('nama') }}">
                  </div>

                  <div>
                    <label style="display: flex; align-items: center; gap: 10px; cursor: pointer; color: #555; margin-bottom: 0;">
                      <input type="checkbox" id="pemesan_adalah_pelanggan" onchange="toggleNamaPelanggan()" style="width: 18px; height: 18px; accent-color: #C48989;">
                      <span>Pemesan adalah pelanggan</span>
                    </label>
                  </div>
                  
                  @auth
                  <div id="user-data-store" class="hidden" 
                       data-user="{{ json_encode([
                         'name' => Auth::user()->name,
                         'jenis_kelamin' => Auth::user()->jenis_kelamin,
                         'phone' => Auth::user()->phone
                       ]) }}"
                       data-address="{{ Auth::user()->address }}"
                       data-lat="{{ Auth::user()->lat }}"
                       data-lng="{{ Auth::user()->lng }}">
                  </div>
                  @endauth
                </div>

                <!-- Jenis Kelamin -->
                <div class="pemesanan-form-group">
                  <label class="pemesanan-label">Jenis Kelamin</label>
                  <select name="jenis_kelamin" id="jenis_kelamin_pelanggan" required
                          class="pemesanan-select">
                    <option value="">-- Pilih Jenis Kelamin --</option>
                    <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                  </select>
                </div>

                <!-- No. Telepon -->
                <div class="pemesanan-form-group">
                  <label class="pemesanan-label">No. Telepon</label>
                  <input type="tel" name="telepon" id="telepon_pelanggan" required
                         class="pemesanan-input"
                         placeholder="Masukkan nomor telepon" value="{{ old('telepon') }}">
                </div>

                <!-- Layanan -->
                <div class="pemesanan-form-group">
                  <label class="pemesanan-label">Pilih Layanan</label>
                  <select name="layanan" id="layanan_select" required
                          class="pemesanan-select" onchange="updateSummary()">
                    <option value="">-- Pilih Layanan --</option>
                    @isset($layanans)
                      @foreach($layanans as $layanan)
                        <option value="{{ $layanan->id }}" data-harga="{{ $layanan->harga }}" data-nama="{{ $layanan->nama }}" {{ old('layanan') == $layanan->id ? 'selected' : '' }}>{{ $layanan->nama }} - Rp {{ number_format($layanan->harga, 0, ',', '.') }}</option>
                      @endforeach
                    @endisset
                  </select>
                </div>

                <!-- Lokasi -->
                <div class="pemesanan-form-group">
                  <label class="pemesanan-label">Lokasi Layanan</label>
                  <div class="pemesanan-radio-group">
                    <label class="pemesanan-radio-option">
                      <input type="radio" name="lokasi" value="tempat" id="lokasi_tempat" {{ old('lokasi', 'tempat') == 'tempat' ? 'checked' : '' }} onchange="toggleAlamat(); updateSummary()">
                      <span>Di Tempat (Service Center)</span>
                    </label>
                    <label class="pemesanan-radio-option">
                      <input type="radio" name="lokasi" value="rumah" id="lokasi_rumah" {{ old('lokasi') == 'rumah' ? 'checked' : '' }} onchange="toggleAlamat(); updateSummary()">
                      <span>Di Rumah (Home Service)</span>
                    </label>
                  </div>
                </div>

                <!-- Alamat (Dropdown jika pilih di rumah) -->
                <div id="alamat_section" class="pemesanan-form-group pemesanan-hidden">
                  <label class="pemesanan-label">Alamat Lengkap</label>
                  
                  @auth
                  <div class="pemesanan-radio-group mb-3">
                    <label class="pemesanan-radio-option">
                      <input type="radio" name="pilihan_alamat" value="profil" id="pilih_alamat_profil" {{ old('pilihan_alamat', 'profil') == 'profil' ? 'checked' : '' }} onchange="toggleTipeAlamat()">
                      <span>Alamat Saya</span>
                    </label>
                    <label class="pemesanan-radio-option">
                      <input type="radio" name="pilihan_alamat" value="baru" id="pilih_alamat_baru" {{ old('pilihan_alamat') == 'baru' ? 'checked' : '' }} onchange="toggleTipeAlamat()">
                      <span>Alamat Lain</span>
                    </label>
                  </div>

                  <div id="display_alamat_profil" class="p-3 bg-gray-50 rounded-xl border border-gray-100 mb-2">
                    <p class="text-sm text-gray-700 italic">
                      {{ Auth::user()->address ?? 'Anda belum mengatur alamat di profil.' }}
                    </p>
                    @if(!Auth::user()->address)
                      <a href="{{ route('profile') }}#address" class="text-[10px] text-blue-600 underline">Atur alamat sekarang</a>
                    @endif
                  </div>
                  @endauth

                  <div id="alamat_input_container" {!! Auth::check() ? 'style="display:none"' : '' !!}>
                    <textarea name="alamat" id="alamat_textarea" rows="3"
                              class="pemesanan-textarea mb-2"
                              placeholder="Masukkan alamat lengkap untuk home service">{{ old('alamat') }}</textarea>
                    <button type="button" class="btn btn-sm w-100" data-bs-toggle="modal" data-bs-target="#modalMap" style="background-color: #fff; border: 1px solid #C48989; color: #C48989; font-weight: 600; border-radius: 8px; padding: 10px; transition: all 0.3s;" onmouseover="this.style.backgroundColor='#C48989'; this.style.color='#fff';" onmouseout="this.style.backgroundColor='#fff'; this.style.color='#C48989';">
                        <i class="fa-solid fa-map-location-dot me-2"></i>Pilih Lokasi dari Peta
                    </button>
                    <input type="hidden" name="lat" id="hidden_lat_input" value="{{ old('lat') }}">
                    <input type="hidden" name="lng" id="hidden_lng_input" value="{{ old('lng') }}">
                    <p class="text-xs mt-2 text-gray-500"><i class="fa-solid fa-circle-info me-1"></i> Saat ini hanya melayani wilayah Subang.</p>
                  </div>
                </div>

                <!-- Tanggal -->
                <div class="pemesanan-form-group">
                  <label class="pemesanan-label">Tanggal yang Diinginkan</label>
                  <input type="date" name="tanggal" id="tanggal_input" required
                         min="{{ date('Y-m-d') }}" value="{{ old('tanggal') }}"
                         class="pemesanan-input" onchange="updateSummary(); validateTime()">
                </div>

                <!-- Jam -->
                <div class="pemesanan-form-group">
                  <label class="pemesanan-label">Jam yang Diinginkan</label>
                  <input type="time" name="jam" id="jam_input" required value="{{ old('jam') }}"
                         class="pemesanan-input" onchange="updateSummary(); validateTime()">
                </div>

                <!-- Catatan -->
                <div class="pemesanan-form-group">
                  <label class="pemesanan-label">Catatan Tambahan (Opsional)</label>
                  <textarea name="catatan" rows="3"
                            class="pemesanan-textarea"
                            placeholder="Masukkan catatan tambahan jika ada">{{ old('catatan') }}</textarea>
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
                      <span style="color: #666; font-size: 14px;">Ongkos Kirim (Home Service):</span>
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

    <!-- Modal Pilih Alamat Gmaps -->
    <div class="modal fade" id="modalMap" tabindex="-1" aria-labelledby="modalMapLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content" style="border-radius: 20px; border: none; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
                <div class="modal-header border-0 pb-0 pt-4 px-4">
                    <h5 class="modal-title fw-bold" id="modalMapLabel">Pilih Lokasi Alamat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="mb-3 position-relative">
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0" style="border-radius: 12px 0 0 12px;"><i class="fa-solid fa-magnifying-glass text-muted"></i></span>
                            <input type="text" id="pac-input" class="form-control border-start-0" placeholder="Cari lokasi atau area..." style="border-radius: 0 12px 12px 0; padding-left: 0;" autocomplete="off">
                        </div>
                        <div id="search-results"></div>
                    </div>
                    
                    <div class="map-picker-container">
                        <div id="map-container" style="width: 100%; height: 400px; border-radius: 15px; border: 1px solid #ddd; z-index: 1;"></div>
                        <div class="center-marker" id="center-pin">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                    </div>
                    
                    <div class="mt-4 p-3 bg-light rounded-3">
                        <label class="form-label small fw-bold text-muted mb-1"><i class="fa-solid fa-location-dot me-1"></i> Alamat Terpilih:</label>
                        <p id="selected-address-text" class="small fw-medium mb-0">Geser pin untuk memilih lokasi...</p>
                    </div>
                </div>
                <div class="modal-footer border-0 p-4 pt-0">
                    <button type="button" class="btn btn-light px-4 py-2" data-bs-dismiss="modal" style="border-radius: 10px; font-weight: 600;">Batal</button>
                    <button type="button" id="btnConfirmAddress" class="btn btn-primary px-4 py-2" style="border-radius: 10px; font-weight: 600; background-color: #C48989; border-color: #C48989;" data-bs-dismiss="modal">Gunakan Alamat Ini</button>
                </div>
            </div>
        </div>
    </div>

    <script>
      function toggleNamaPelanggan(isPageLoad = false) {
        const checkbox = document.getElementById('pemesan_adalah_pelanggan');
        const inputNama = document.getElementById('nama_pelanggan');
        const inputJK = document.getElementById('jenis_kelamin_pelanggan');
        const inputTelp = document.getElementById('telepon_pelanggan');
        const userStore = document.getElementById('user-data-store');

        if (checkbox && checkbox.checked && userStore) {
          try {
            const userData = JSON.parse(userStore.getAttribute('data-user'));
            if(inputNama) { inputNama.value = userData.name; inputNama.setAttribute('readonly', true); inputNama.style.backgroundColor = '#f8f9fa'; }
            if(inputJK) { inputJK.value = userData.jenis_kelamin; inputJK.style.pointerEvents = 'none'; inputJK.style.backgroundColor = '#f8f9fa'; }
            if(inputTelp) { inputTelp.value = userData.phone; inputTelp.setAttribute('readonly', true); inputTelp.style.backgroundColor = '#f8f9fa'; }
          } catch(e) {
            console.error(e);
          }
        } else {
          [inputNama, inputJK, inputTelp].forEach(el => {
            if (!isPageLoad && el) el.value = '';
            if (el) {
                el.removeAttribute('readonly');
                if(el.tagName === 'SELECT') el.style.pointerEvents = 'auto';
                el.style.backgroundColor = '';
            }
          });
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

      function toggleTipeAlamat(isPageLoad = false) {
        const profilRadio = document.getElementById('pilih_alamat_profil');
        const displayProfil = document.getElementById('display_alamat_profil');
        const containerAlamat = document.getElementById('alamat_input_container');
        const textareaAlamat = document.getElementById('alamat_textarea');
        const hiddenLat = document.getElementById('hidden_lat_input');
        const hiddenLng = document.getElementById('hidden_lng_input');

        const userStore = document.getElementById('user-data-store');

        if (profilRadio && profilRadio.checked) {
          if (displayProfil) displayProfil.style.display = 'block';
          if (containerAlamat) containerAlamat.style.display = 'none';
          if (textareaAlamat) textareaAlamat.value = userStore ? userStore.getAttribute('data-address') : '';
          if (hiddenLat) hiddenLat.value = userStore ? userStore.getAttribute('data-lat') : '';
          if (hiddenLng) hiddenLng.value = userStore ? userStore.getAttribute('data-lng') : '';
        } else {
          if (displayProfil) displayProfil.style.display = 'none';
          if (containerAlamat) containerAlamat.style.display = 'block';
          if (!isPageLoad) {
            if (textareaAlamat) textareaAlamat.value = '';
            if (hiddenLat) hiddenLat.value = '';
            if (hiddenLng) hiddenLng.value = '';
          }
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

      function validateTime(isPageLoad = false) {
        const tanggalInput = document.getElementById('tanggal_input');
        const jamInput = document.getElementById('jam_input');
        
        // Dapatkan waktu sekarang di perangkat user
        const now = new Date();
        const year = now.getFullYear();
        const month = String(now.getMonth() + 1).padStart(2, '0');
        const day = String(now.getDate()).padStart(2, '0');
        const todayStr = `${year}-${month}-${day}`;
        const currentTimeStr = now.toTimeString().split(' ')[0].substring(0, 5); // HH:mm

        // Jam Operasional
        const opStart = "09:00";
        const opEnd = "23:00";

        // Set batasan input
        tanggalInput.setAttribute('min', todayStr);
        jamInput.setAttribute('max', opEnd);

        if (!tanggalInput.value) {
          jamInput.setAttribute('min', opStart);
          return;
        }

        const selectedDate = tanggalInput.value;

        // Jika user memilih hari ini
        if (selectedDate === todayStr) {
          // Min jam adalah yang terbesar antara jam buka (09:00) dan jam sekarang
          const minTime = currentTimeStr > opStart ? currentTimeStr : opStart;
          jamInput.setAttribute('min', minTime);
          
          // Jika jam yang sudah dipilih ternyata di luar jangkauan
          if (!isPageLoad && jamInput.value && (jamInput.value < minTime || jamInput.value > opEnd)) {
            jamInput.value = '';
            updateSummary();
          }
        } else if (selectedDate < todayStr) {
          if (!isPageLoad) {
            tanggalInput.value = todayStr;
            validateTime();
          }
        } else {
          // Jika hari esok/nanti, min jam tetap 09:00
          jamInput.setAttribute('min', opStart);
          
          if (!isPageLoad && jamInput.value && (jamInput.value < opStart || jamInput.value > opEnd)) {
            jamInput.value = '';
            updateSummary();
          }
        }
      }

      // Jalankan saat pertama kali load dan setiap kali ada interaksi
      document.addEventListener('DOMContentLoaded', function() {
        toggleAlamat();
        toggleTipeAlamat(true);
        toggleNamaPelanggan(true);
        updateSummary();
        validateTime(true);
        
        // Interval pengecekan setiap 1 menit untuk update min-time jika user standby lama di halaman
        setInterval(validateTime, 60000);

        // Load Scripts
        const leafletScript = document.createElement('script');
        leafletScript.src = "https://unpkg.com/leaflet@1.9.4/dist/leaflet.js";
        document.head.appendChild(leafletScript);

        const swalScript = document.createElement('script');
        swalScript.src = "https://cdn.jsdelivr.net/npm/sweetalert2@11";
        document.head.appendChild(swalScript);

        // Leaflet Maps Initialization on modal show
        let map, marker;
        const modalMap = document.getElementById('modalMap');
        
        if (modalMap) {
            modalMap.addEventListener('shown.bs.modal', function () {
                initLeafletMap();
            });
        }

        function initLeafletMap() {
            if (map) {
                map.invalidateSize();
                return;
            }

            const defaultLocation = [-6.560198, 107.761402]; // Subang

            map = L.map('map-container', {
                zoomControl: true
            }).setView(defaultLocation, 15);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);

            const centerPin = document.getElementById('center-pin');

            map.on('movestart', function() {
                centerPin.classList.add('moving');
            });

            map.on('moveend', function() {
                centerPin.classList.remove('moving');
                const center = map.getCenter();
                updateAddressInfo(center.lat, center.lng);
            });

            // Search handling
            const searchInput = document.getElementById('pac-input');
            const searchResults = document.getElementById('search-results');
            let timeout = null;

            searchInput.addEventListener('input', function() {
                clearTimeout(timeout);
                const query = this.value;
                if (query.length < 3) {
                    searchResults.style.display = 'none';
                    return;
                }

                timeout = setTimeout(() => {
                    fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${query}&viewbox=107.50,-6.21,107.96,-6.84&bounded=1&limit=5`)
                        .then(response => response.json())
                        .then(data => {
                            searchResults.innerHTML = '';
                            if (data.length > 0) {
                                data.forEach(item => {
                                    if (!item.display_name.toLowerCase().includes('subang')) return;
                                    
                                    const div = document.createElement('div');
                                    div.className = 'search-result-item';
                                    div.innerText = item.display_name;
                                    div.onclick = function() {
                                        const lat = parseFloat(item.lat);
                                        const lon = parseFloat(item.lon);
                                        map.setView([lat, lon], 17);
                                        updateAddressInfo(lat, lon);
                                        searchResults.style.display = 'none';
                                        searchInput.value = item.display_name;
                                    };
                                    searchResults.appendChild(div);
                                });
                                searchResults.style.display = 'block';
                            } else {
                                searchResults.style.display = 'none';
                            }
                        });
                }, 500);
            });

            document.addEventListener('click', function(e) {
                if (e.target !== searchInput) {
                    searchResults.style.display = 'none';
                }
            });
        }

        let tempSelectedAddress = '';

        function updateAddressInfo(lat, lng) {
            document.getElementById('hidden_lat_input').value = lat;
            document.getElementById('hidden_lng_input').value = lng;

            fetch(`https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${lat}&lon=${lng}`)
                .then(response => response.json())
                .then(data => {
                    if (data && data.display_name) {
                        const address = data.display_name;
                        
                        if (!address.toLowerCase().includes('subang')) {
                            document.getElementById('selected-address-text').innerHTML = '<span class="text-danger"><i class="fa-solid fa-triangle-exclamation"></i> Maaf, layanan hanya di Subang.</span>';
                            tempSelectedAddress = '';
                            return;
                        }

                        document.getElementById('selected-address-text').innerText = address;
                        tempSelectedAddress = address;
                    }
                });
        }

        // Confirm Address Button
        document.getElementById('btnConfirmAddress').addEventListener('click', function() {
            if (tempSelectedAddress) {
                document.getElementById('alamat_textarea').value = tempSelectedAddress;
            } else {
                Swal.fire({
                    icon: 'warning',
                    title: 'Oops...',
                    text: 'Silahkan pilih lokasi valid di peta!',
                    confirmButtonColor: '#C48989'
                });
            }
        });
      });
    </script>

@endsection
