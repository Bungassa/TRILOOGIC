@extends('layout.layout')

@section('content')
    <x-header pageTitle="Riwayat Pemesanan" breadcrumbItem="Riwayat Pemesanan" />

    <style>
        .riwayat-wrapper {
            background-color: #f8f9fa;
            padding: 80px 0;
            min-height: 80vh;
        }
        .history-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            padding: 30px;
            margin-bottom: 20px;
            border-left: 5px solid #C48989;
            transition: transform 0.3s ease;
        }
        .history-card:hover {
            transform: translateY(-5px);
        }
        .status-badge {
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
        }
        .status-pending { background: #fff3cd; color: #856404; }
        .status-dikerjakan { background: #cce5ff; color: #004085; }
        .status-selesai { background: #d4edda; color: #155724; }
        
        .history-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .service-name {
            font-size: 20px;
            font-weight: 700;
            color: #18191d;
        }
        .order-date {
            font-size: 14px;
            color: #666;
        }
        .history-details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            padding-top: 15px;
            border-top: 1px solid #eee;
        }
        .detail-group label {
            display: block;
            font-size: 12px;
            color: #999;
            margin-bottom: 2px;
        }
        .detail-group p {
            font-size: 15px;
            font-weight: 600;
            color: #333;
            margin: 0;
        }
    </style>

    <div class="riwayat-wrapper">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-6">
                    <div class="card shadow-sm border-0 p-4" style="border-radius: 15px;">
                        <h4 class="fw-bold mb-3">Cari Riwayat Pesanan</h4>
                        <p class="text-muted small">Masukkan nomor telepon yang Anda gunakan saat memesan untuk melihat riwayat layanan Anda.</p>
                        <form action="{{ route('riwayat') }}" method="GET" class="d-flex gap-2">
                            <input type="text" name="telepon" value="{{ $telepon }}" placeholder="08123456789" class="form-control" style="border-radius: 10px; padding: 12px;" required>
                            <button type="submit" class="btn btn-primary" style="background: #C48989; border: none; border-radius: 10px; padding: 0 25px;">Cari</button>
                        </form>
                    </div>
                </div>
            </div>

            @if($telepon)
                @if($transaksis && $transaksis->count() > 0)
                    <div class="row">
                        <div class="col-lg-10 mx-auto">
                            <h5 class="mb-4">Ditemukan {{ $transaksis->count() }} pesanan untuk nomor <strong>{{ $telepon }}</strong></h5>
                            @foreach($transaksis as $t)
                                <div class="history-card">
                                    <div class="history-header">
                                        <div>
                                            <div class="service-name">{{ $t->layanan->nama }}</div>
                                            <div class="order-date">Dipesan pada: {{ $t->created_at->translatedFormat('d M Y, H:i') }}</div>
                                        </div>
                                        <div>
                                            <span class="status-badge status-{{ $t->status }}">
                                                {{ $t->status == 'pending' ? 'Menunggu' : ($t->status == 'dikerjakan' ? 'Diproses' : 'Selesai') }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="history-details">
                                        <div class="detail-group">
                                            <label>Jadwal Layanan</label>
                                            <p>{{ \Carbon\Carbon::parse($t->tanggal)->translatedFormat('d F Y') }} | {{ $t->jam }}</p>
                                        </div>
                                        <div class="detail-group">
                                            <label>Lokasi</label>
                                            <p>{{ ucfirst($t->lokasi) }}</p>
                                        </div>
                                        <div class="detail-group">
                                            <label>Total Harga</label>
                                            <p style="color: #C48989;">Rp {{ number_format($t->total_harga, 0, ',', '.') }}</p>
                                        </div>
                                        @if($t->status == 'pending')
                                        <div class="detail-group text-end">
                                            <a href="{{ route('pemesanan.pembayaran', $t->id) }}" class="btn btn-sm btn-outline-secondary" style="border-radius: 20px; font-size: 11px;">Lihat QRIS</a>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="text-center py-5">
                        <div class="mb-4">
                            <svg width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="#C48989" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="11" cy="11" r="8"></circle>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                            </svg>
                        </div>
                        <h3 class="fw-bold">Tidak Ditemukan</h3>
                        <p class="text-muted">Tidak ada pesanan yang ditemukan untuk nomor telepon <strong>{{ $telepon }}</strong>.</p>
                    </div>
                @endif
            @else
                <div class="text-center py-5">
                    <div class="mb-4">
                        <svg width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="#C48989" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                            <polyline points="14 2 14 8 20 8"></polyline>
                        </svg>
                    </div>
                    <h3 class="fw-bold">Lihat Riwayat Anda</h3>
                    <p class="text-muted">Masukkan nomor telepon Anda di atas untuk melihat status pesanan Anda.</p>
                </div>
            @endif
        </div>
    </div>
@endsection
