@extends('layout.layout')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/pembayaran.css') }}">

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

    <section class="pembayaran-wrapper">
      <div class="container">
        <div class="text-center cs_mb_60">
          <h2 class="pembayaran-main-title">Pembayaran Pesanan Ekky Refleksi Family</h2>
          <p class="pembayaran-subtitle">Silahkan lakukan pembayaran menggunakan QRIS</p>
        </div>

        <div class="row g-4 justify-content-center">
          <div class="col-lg-5">
            <div class="pembayaran-card">
              <h3 class="pembayaran-card-title">Detail Pesanan</h3>
              <div class="detail-item">
                <span class="detail-label">Nama Pelanggan</span>
                <span class="detail-value">: {{ $transaksi->nama }}</span>
              </div>
              <div class="detail-item">
                <span class="detail-label">Lokasi</span>
                <span class="detail-value">: {{ $transaksi->lokasi === 'tempat' ? 'Di Tempat' : 'Di Rumah' }}</span>
              </div>
              <div class="detail-item">
                <span class="detail-label">Layanan</span>
                <span class="detail-value">: {{ $transaksi->layanan->nama }}</span>
              </div>
              <div class="detail-item">
                <span class="detail-label">Tanggal</span>
                <span class="detail-value">: {{ \Carbon\Carbon::parse($transaksi->tanggal)->translatedFormat('d F Y') }}</span>
              </div>
              <div class="detail-item">
                <span class="detail-label">Jam</span>
                <span class="detail-value">: {{ $transaksi->jam }}</span>
              </div>
              @if($transaksi->lokasi === 'rumah')
              <div class="detail-item">
                <span class="detail-label">Alamat</span>
                <span class="detail-value">: {{ $transaksi->alamat }}</span>
              </div>
              @endif
              <div class="detail-item">
                <span class="detail-label">Ongkir</span>
                <span class="detail-value">: {{ $transaksi->lokasi === 'rumah' ? 'Rp 20.000' : 'Gratis' }}</span>
              </div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="pembayaran-card">
              <h3 class="pembayaran-card-title">Ringkasan Pembayaran</h3>
              <div class="summary-item">
                <span class="summary-label">Biaya Layanan</span>
                <span class="summary-value">Rp {{ number_format($transaksi->layanan->harga, 0, ',', '.') }}</span>
              </div>
              <div class="summary-item">
                <span class="summary-label">Biaya Layanan Tambahan</span>
                <span class="summary-value">Rp {{ $transaksi->lokasi === 'rumah' ? '20.000' : '0' }}</span>
              </div>
              <div class="summary-divider"></div>
              <div class="summary-total">
                <span class="total-label">Total Harga</span>
                <span class="total-value">Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</span>
              </div>
              <div class="cs_mt_30">
                <button id="checkPaymentBtn" class="cs_btn cs_style_1 cs_fs_16 cs_rounded_10 w-100">Bayar Sekarang</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer Start -->
    <footer class="cs_footer cs_style_1 cs_accent_bg text-white">
      <div class="container">
        <div class="row py-5">
          <div class="col-lg-4">
            <h3 class="text-white cs_fs_24 mb-4">Ekky Family Refleksi</h3>
            <p class="cs_fs_14 opacity-75">Layanan refleksi keluarga profesional untuk kesehatan dan relaksasi Anda di wilayah Subang.</p>
          </div>
          <div class="col-lg-4">
            <h4 class="text-white cs_fs_18 mb-3">Jam Operasional</h4>
            <p class="cs_fs_14">Setiap hari : 09.00 - 23.00</p>
          </div>
          <div class="col-lg-4 text-lg-end">
            <h4 class="text-white cs_fs_18 mb-3">Ikuti Kami</h4>
            <div class="d-flex justify-content-center justify-content-lg-end gap-3">
              <a href="#" class="text-white"><i class="fab fa-instagram cs_fs_24"></i></a>
              <a href="#" class="text-white"><i class="fab fa-tiktok cs_fs_24"></i></a>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <!-- Custom Notification UI -->
    <div id="custom-notification" class="notification-container" style="display: none;">
      <div class="notification-content">
        <div class="notification-icon">
          <i id="notification-icon-class" class="fas fa-check-circle"></i>
        </div>
        <div class="notification-text">
          <h4 id="notification-title">Berhasil!</h4>
          <p id="notification-message">Pembayaran Anda telah diterima.</p>
        </div>
      </div>
      <div class="notification-progress"></div>
    </div>

    <style>
      .notification-container {
        position: fixed;
        top: 30px;
        right: 30px;
        z-index: 9999;
        min-width: 320px;
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        border-left: 5px solid #C48989;
        overflow: hidden;
        animation: slideIn 0.5s ease forwards;
      }

      .notification-content {
        padding: 20px;
        display: flex;
        align-items: center;
        gap: 15px;
      }

      .notification-icon {
        font-size: 28px;
        color: #C48989;
      }

      .notification-text h4 {
        margin: 0;
        font-size: 16px;
        font-weight: 700;
        color: #333;
      }

      .notification-text p {
        margin: 5px 0 0;
        font-size: 14px;
        color: #666;
      }

      .notification-progress {
        height: 3px;
        background: #C48989;
        width: 100%;
        animation: progress 3s linear forwards;
      }

      @keyframes slideIn {
        from { transform: translateX(100%); opacity: 0; }
        to { transform: translateX(0); opacity: 1; }
      }

      @keyframes progress {
        from { width: 100%; }
        to { width: 0%; }
      }

      .notification-success { border-left-color: #28a745; }
      .notification-success .notification-icon { color: #28a745; }
      .notification-success .notification-progress { background: #28a745; }

      .notification-pending { border-left-color: #ffc107; }
      .notification-pending .notification-icon { color: #ffc107; }
      .notification-pending .notification-progress { background: #ffc107; }

      .notification-error { border-left-color: #dc3545; }
      .notification-error .notification-icon { color: #dc3545; }
      .notification-error .notification-progress { background: #dc3545; }
    </style>

    <!-- Midtrans Snap Script -->
    @if(config('services.midtrans.is_production'))
        <script src="https://app.midtrans.com/snap/snap.js" data-client-key="{{ config('services.midtrans.client_key') }}"></script>
    @else
        <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('services.midtrans.client_key') }}"></script>
    @endif
    <script>
      function showNotification(title, message, type) {
        const notify = document.getElementById('custom-notification');
        const notifyTitle = document.getElementById('notification-title');
        const notifyMsg = document.getElementById('notification-message');
        const notifyIcon = document.getElementById('notification-icon-class');
        
        notify.className = 'notification-container notification-' + type;
        notifyTitle.textContent = title;
        notifyMsg.textContent = message;
        
        if(type === 'success') notifyIcon.className = 'fas fa-check-circle';
        if(type === 'pending') notifyIcon.className = 'fas fa-clock';
        if(type === 'error') notifyIcon.className = 'fas fa-exclamation-circle';

        notify.style.display = 'block';
      }

      document.getElementById('checkPaymentBtn').addEventListener('click', function() {
        const snapToken = "{{ $transaksi->snap_token }}";
        
        if (!snapToken) {
            showNotification('Error', 'Token pembayaran tidak ditemukan. Silahkan hubungi admin.', 'error');
            return;
        }

        window.snap.pay(snapToken, {
          onSuccess: function(result) {
            showNotification('Berhasil!', 'Pembayaran Anda telah sukses. Memperbarui sistem...', 'success');
            
            // Fallback untuk localhost: Update status via AJAX karena Webhook tidak bisa menjangkau localhost
            fetch("{{ route('pembayaran.konfirmasi', $transaksi->id) }}", {
              method: 'POST',
              headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
              }
            }).then(() => {
              setTimeout(() => {
                window.location.href = "{{ url('/riwayat') }}?telepon={{ $transaksi->telepon }}";
              }, 2000);
            });
          },
          onPending: function(result) {
            showNotification('Menunggu', 'Silahkan selesaikan pembayaran Anda.', 'pending');
            setTimeout(() => {
              window.location.href = "{{ url('/riwayat') }}?telepon={{ $transaksi->telepon }}";
            }, 3000);
          },
          onError: function(result) {
            showNotification('Gagal', 'Pembayaran gagal dilakukan. Silahkan coba lagi.', 'error');
          },
          onClose: function() {
            showNotification('Info', 'Anda menutup jendela pembayaran sebelum selesai.', 'pending');
          }
        });
      });
    </script>
@endsection
