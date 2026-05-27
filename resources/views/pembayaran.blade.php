@extends('layout.layout')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/pembayaran.css') }}">

<x-header pageTitle="Pembayaran" breadcrumbItem="Pembayaran" />

<section class="pembayaran-wrapper">
  <div class="container">
    <div class="text-center cs_mb_60">
      <h2 class="pembayaran-main-title">Pembayaran Pesanan Ekky Family Refleksi</h2>
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
            @if($transaksi->status_pembayaran === 'lunas')
              <div class="text-center p-3" style="background-color: #d4edda; color: #155724; border-radius: 10px; font-weight: bold;">
                <i class="fas fa-check-circle me-2"></i>Pesanan Sudah Lunas
              </div>
            @else
              <button id="checkPaymentBtn" class="cs_btn cs_style_1 cs_fs_16 cs_rounded_10 w-100">Bayar Sekarang</button>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

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
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    border-left: 5px solid #825449;
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
    color: #825449;
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
    background: #825449;
    width: 100%;
    animation: progress 3s linear forwards;
  }

  @keyframes slideIn {
    from {
      transform: translateX(100%);
      opacity: 0;
    }

    to {
      transform: translateX(0);
      opacity: 1;
    }
  }

  @keyframes progress {
    from {
      width: 100%;
    }

    to {
      width: 0%;
    }
  }

  .notification-success {
    border-left-color: #28a745;
  }

  .notification-success .notification-icon {
    color: #28a745;
  }

  .notification-success .notification-progress {
    background: #28a745;
  }

  .notification-pending {
    border-left-color: #ffc107;
  }

  .notification-pending .notification-icon {
    color: #ffc107;
  }

  .notification-pending .notification-progress {
    background: #ffc107;
  }

  .notification-error {
    border-left-color: #dc3545;
  }

  .notification-error .notification-icon {
    color: #dc3545;
  }

  .notification-error .notification-progress {
    background: #dc3545;
  }
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

    if (type === 'success') notifyIcon.className = 'fas fa-check-circle';
    if (type === 'pending') notifyIcon.className = 'fas fa-clock';
    if (type === 'error') notifyIcon.className = 'fas fa-exclamation-circle';

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
            window.location.href = "{{ url('/') }}";
          }, 2000);
        });
      },
      onPending: function(result) {
        showNotification('Menunggu', 'Silahkan selesaikan pembayaran Anda.', 'pending');
        setTimeout(() => {
          window.location.href = "{{ url('/') }}";
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