@extends('layout.layout')

@section('content')
<x-header pageTitle="Profil Saya" breadcrumbItem="{{ $user->name }}" />

<style>
    .profile-wrapper {
        background-color: #f4f7f6;
        padding: 60px 0;
        min-height: 80vh;
    }

    .profile-sidebar {
        background: white;
        border-radius: 15px;
        padding: 30px 20px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
        height: 100%;
    }

    .profile-nav-link {
        display: flex;
        align-items: center;
        padding: 12px 20px;
        color: #555;
        text-decoration: none;
        border-radius: 10px;
        margin-bottom: 8px;
        transition: all 0.3s ease;
        font-weight: 500;
    }

    .profile-nav-link:hover,
    .profile-nav-link.active {
        background-color: #825449;
        color: white;
    }

    .profile-nav-link i {
        margin-right: 15px;
        width: 20px;
        text-align: center;
    }

    .profile-content-card {
        background: white;
        border-radius: 15px;
        padding: 40px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
        margin-bottom: 30px;
    }

    .profile-avatar-wrapper {
        display: flex;
        align-items: center;
        margin-bottom: 40px;
    }

    .profile-avatar {
        width: 80px;
        height: 80px;
        background: #eee;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 32px;
        color: #999;
        margin-right: 25px;
    }

    .profile-info h4 {
        margin-bottom: 5px;
        font-weight: 700;
        color: #333;
    }

    .profile-info p {
        margin-bottom: 0;
        color: #777;
        font-size: 14px;
    }

    .section-title {
        font-size: 20px;
        font-weight: 700;
        margin-bottom: 30px;
        padding-bottom: 15px;
        border-bottom: 1px solid #eee;
        color: #333;
    }

    .form-label {
        font-weight: 600;
        font-size: 14px;
        color: #555;
        margin-bottom: 10px;
    }

    .form-control {
        border-radius: 10px;
        padding: 12px 15px;
        border: 1px solid #ddd;
        font-size: 14px;
    }

    .form-control:focus {
        border-color: #825449;
        box-shadow: 0 0 0 0.2rem rgba(196, 137, 137, 0.25);
    }

    .btn-save {
        background-color: #825449;
        border: none;
        padding: 12px 30px;
        border-radius: 10px;
        color: white;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-save:hover {
        background-color: #825449;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(196, 137, 137, 0.3);
        color: white;
    }

    .order-history-table {
        width: 100%;
    }

    .order-history-table th {
        background-color: #f8f9fa;
        padding: 15px;
        font-size: 13px;
        text-transform: uppercase;
        color: #777;
        border-bottom: 2px solid #eee;
    }

    .order-history-table td {
        padding: 15px;
        border-bottom: 1px solid #eee;
        font-size: 14px;
        vertical-align: middle;
    }

    .status-badge {
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 700;
    }

    .status-pending {
        background: #fff3cd;
        color: #856404;
    }

    .status-dikerjakan {
        background: #cce5ff;
        color: #004085;
    }

    .status-selesai {
        background: #d4edda;
        color: #155724;
    }

    .address-card {
        border: 1px solid #eee;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 15px;
        transition: all 0.3s ease;
    }

    .address-card:hover {
        border-color: #825449;
        background-color: rgba(196, 137, 137, 0.02);
    }

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
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
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
        /* Let clicks pass through to the map */
    }

    .center-marker i {
        font-size: 40px;
        color: #825449;
        text-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    }

    /* Bounce animation when map moves */
    .center-marker.moving {
        transform: translate(-50%, -120%);
        transition: transform 0.2s ease-out;
    }
</style>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<div class="profile-wrapper">
    <div class="container">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-lg-3 mb-4">
                <div class="profile-sidebar">
                    <div class="text-center mb-4 pb-4 border-bottom">
                        <div class="profile-avatar mx-auto mb-3">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <h5 class="fw-bold mb-1">{{ $user->name }}</h5>
                        <p class="text-muted small mb-1">{{ $user->email }}</p>
                        <p class="text-accent small mb-0 fw-medium">
                            <i class="fa-brands fa-whatsapp me-1"></i> {{ $user->phone ?? 'Belum ada nomor' }}
                        </p>
                    </div>
                    <nav class="profile-nav">
                        <a href="#info" class="profile-nav-link active" data-tab="info">
                            <i class="fa-solid fa-id-card"></i> Informasi Profil
                        </a>
                        <a href="#edit" class="profile-nav-link" data-tab="edit">
                            <i class="fa-solid fa-user-edit"></i> Edit Profil
                        </a>
                        <a href="#orders" class="profile-nav-link" data-tab="orders">
                            <i class="fa-solid fa-history"></i> Riwayat Pesanan
                        </a>
                        <a href="#address" class="profile-nav-link" data-tab="address">
                            <i class="fa-solid fa-location-dot"></i> Alamat Saya
                        </a>
                    </nav>
                </div>
            </div>

            <!-- Content Area -->
            <div class="col-lg-9">
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" role="alert" style="border-radius: 10px;">
                    <i class="fa-solid fa-check-circle me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm mb-4" role="alert" style="border-radius: 10px;">
                    <i class="fa-solid fa-circle-exclamation me-2"></i> {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                @php
                $pendingTestimonis = $transaksis->where('status', 'selesai')->filter(function($t) {
                return !$t->testimoni;
                });
                @endphp

                @if($pendingTestimonis->count() > 0)
                <div class="alert alert-warning border-0 shadow-sm mb-4 d-flex align-items-center" role="alert" style="border-radius: 15px; background-color: #fff3cd; color: #856404;">
                    <div class="me-3 fs-3">
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold mb-1">Testimoni Wajib!</h6>
                        <p class="small mb-0">Anda memiliki <strong>{{ $pendingTestimonis->count() }}</strong> pesanan yang telah selesai. Silahkan berikan testimoni Anda untuk membantu kami meningkatkan layanan.</p>
                        <button class="btn btn-sm btn-warning mt-2 fw-bold" onclick="switchTab('orders')" style="border-radius: 8px;">Berikan Testimoni Sekarang</button>
                    </div>
                </div>
                @endif

                <!-- Informasi Profil Section -->
                <div id="section-info" class="profile-content-card">
                    <h3 class="section-title">Informasi Profil</h3>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="text-muted small d-block mb-1">Nama Lengkap</label>
                            <p class="fw-bold text-dark">{{ $user->name }}</p>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="text-muted small d-block mb-1">Email</label>
                            <p class="fw-bold text-dark">{{ $user->email }}</p>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="text-muted small d-block mb-1">No WhatsApp</label>
                            <p class="fw-bold text-dark">{{ $user->phone ?? '-' }}</p>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="text-muted small d-block mb-1">Alamat Utama</label>
                            <p class="fw-bold text-dark">{{ $user->address ?? '-' }}</p>
                        </div>
                    </div>
                    <button class="btn btn-save mt-2" onclick="switchTab('edit')">
                        <i class="fa-solid fa-edit me-2"></i> Edit Profil
                    </button>
                </div>

                <!-- Edit Profil Section -->
                <div id="section-edit" class="profile-content-card" style="display: none;">
                    <h3 class="section-title">Edit Profil</h3>
                    <form action="{{ route('profile.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">No WhatsApp</label>
                                <input type="text" name="phone" class="form-control" value="{{ old('phone', $user->phone) }}" placeholder="08123456789">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Alamat</label>
                                <div class="input-group">
                                    <input type="text" name="address" id="main_profile_address" class="form-control" value="{{ old('address', $user->address) }}" placeholder="Subang">
                                    <button class="btn btn-outline-primary" type="button" data-bs-toggle="modal" data-bs-target="#modalMap" style="border-color: #ddd; color: #825449;">
                                        <i class="fa-solid fa-map-location-dot"></i>
                                    </button>
                                </div>
                                <input type="hidden" name="lat" id="main_profile_lat" value="{{ old('lat', $user->lat) }}">
                                <input type="hidden" name="lng" id="main_profile_lng" value="{{ old('lng', $user->lng) }}">
                            </div>
                            <div class="col-md-12 mb-4 mt-3">
                                <div class="p-3 bg-light rounded-3">
                                    <p class="small text-muted mb-3"><i class="fa-solid fa-info-circle me-1"></i> Kosongkan jika tidak ingin mengubah password</p>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Password Baru</label>
                                            <input type="password" name="password" class="form-control">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Konfirmasi Password</label>
                                            <input type="password" name="password_confirmation" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
<<<<<<< HEAD
                            <div class="col-12">
                                <button type="submit" class="btn btn-save">
                                    <i class="fa-solid fa-save me-2"></i> Simpan Perubahan
=======
                        </form>
                    </div>

                    <!-- Riwayat Pesanan Section -->
                    <div id="section-orders" class="profile-content-card" style="display: none;">
                        <h3 class="section-title">Riwayat Pesanan</h3>
                        @if($transaksis && $transaksis->count() > 0)
                            <div class="table-responsive">
                                <table class="order-history-table">
                                    <thead>
                                        <tr>
                                            <th>Layanan</th>
                                            <th>Tanggal</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($transaksis as $t)
                                            <tr>
                                                <td><span class="fw-bold">{{ $t->layanan->nama }}</span></td>
                                                <td>{{ \Carbon\Carbon::parse($t->tanggal)->translatedFormat('d M Y') }}</td>
                                                <td>
                                                    <span class="status-badge status-{{ $t->status }}">
                                                        {{ $t->status == 'pending' ? 'Menunggu' : ($t->status == 'dikerjakan' ? 'Diproses' : 'Selesai') }}
                                                    </span>
                                                </td>
                                                 <td>
                                                    <a href="{{ route('pemesanan.pembayaran', $t->id) }}" class="btn btn-sm btn-outline-secondary" style="border-radius: 20px; font-size: 11px;">
                                                        Lihat Detail
                                                    </a>
                                                    @if($t->status == 'selesai')
                                                        @if(!$t->testimoni)
                                                            <button type="button" class="btn btn-sm btn-primary ms-1 btn-testimoni" 
                                                                    data-bs-toggle="modal" 
                                                                    data-bs-target="#modalTestimoni" 
                                                                    data-toggle="modal" 
                                                                    data-target="#modalTestimoni" 
                                                                    data-id="{{ $t->id }}"
                                                                    data-layanan="{{ $t->layanan->nama }}"
                                                                    style="border-radius: 20px; font-size: 11px; background-color: #825449; border-color: #825449;">
                                                                Berikan Testimoni
                                                            </button>
                                                        @else
                                                            <span class="badge bg-light text-dark ms-1" style="border-radius: 20px; font-size: 10px; border: 1px solid #ddd;">
                                                                <i class="fa-solid fa-star text-warning me-1"></i> Sudah Dinilai
                                                            </span>
                                                        @endif
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="text-center py-4">
                                <i class="fa-solid fa-receipt fs-1 text-muted mb-3 d-block"></i>
                                <p class="text-muted">Belum ada riwayat pesanan.</p>
                                <a href="{{ route('pemesanan') }}" class="btn btn-save btn-sm">Pesan Sekarang</a>
                            </div>
                        @endif
                    </div>

                    <!-- Alamat Saya Section -->
                    <div id="section-address" class="profile-content-card" style="display: none;">
                        <h3 class="section-title">Alamat Saya</h3>
                        @if($user->address)
                            <div class="address-card">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <h6 class="fw-bold mb-0">Alamat Utama</h6>
                                    <span class="badge bg-success small">Default</span>
                                </div>
                                <p class="text-muted small mb-3">
                                    <i class="fa-solid fa-location-dot me-2"></i>
                                    {{ $user->address }}
                                </p>
                                <div class="d-flex gap-2">
                                    <button class="btn btn-sm btn-outline-primary" style="border-radius: 8px; padding: 8px 20px; font-weight: 600; color: #825449; border-color: #825449;" data-bs-toggle="modal" data-bs-target="#modalMap">
                                        <i class="fa-solid fa-edit me-1"></i> Edit Alamat
                                    </button>
                                    <form id="formDeleteAddress" action="{{ route('profile.update') }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="name" value="{{ $user->name }}">
                                        <input type="hidden" name="email" value="{{ $user->email }}">
                                        <input type="hidden" name="phone" value="{{ $user->phone }}">
                                        <input type="hidden" name="address" value="">
                                        <input type="hidden" name="lat" value="">
                                        <input type="hidden" name="lng" value="">
                                        <button type="button" class="btn btn-sm btn-outline-danger" style="border-radius: 8px; padding: 8px 20px; font-weight: 600;" onclick="confirmDeleteAddress()">
                                            <i class="fa-solid fa-trash me-1"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @else
                            <div class="text-center py-4">
                                <i class="fa-solid fa-location-dot fs-1 text-muted mb-3 d-block"></i>
                                <p class="text-muted">Belum ada alamat yang ditambahkan.</p>
                                <button class="btn btn-save" data-bs-toggle="modal" data-bs-target="#modalMap">
                                    <i class="fa-solid fa-plus me-2"></i> Tambah Alamat
>>>>>>> bara/main
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Riwayat Pesanan Section -->
                <div id="section-orders" class="profile-content-card" style="display: none;">
                    <h3 class="section-title">Riwayat Pesanan</h3>
                    @if($transaksis && $transaksis->count() > 0)
                    <div class="table-responsive">
                        <table class="order-history-table">
                            <thead>
                                <tr>
                                    <th>Layanan</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transaksis as $t)
                                <tr>
                                    <td><span class="fw-bold">{{ $t->layanan->nama }}</span></td>
                                    <td>{{ \Carbon\Carbon::parse($t->tanggal)->translatedFormat('d M Y') }}</td>
                                    <td>
                                        <span class="status-badge status-{{ $t->status }}">
                                            {{ $t->status == 'pending' ? 'Menunggu' : ($t->status == 'dikerjakan' ? 'Diproses' : 'Selesai') }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('pemesanan.pembayaran', $t->id) }}" class="btn btn-sm btn-outline-secondary" style="border-radius: 20px; font-size: 11px;">
                                            Lihat Detail
                                        </a>
                                        @if($t->status == 'selesai')
                                        @if(!$t->testimoni)
                                        <button type="button" class="btn btn-sm btn-primary ms-1 btn-testimoni"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modalTestimoni"
                                            data-toggle="modal"
                                            data-target="#modalTestimoni"
                                            data-id="{{ $t->id }}"
                                            data-layanan="{{ $t->layanan->nama }}"
                                            style="border-radius: 20px; font-size: 11px; background-color: #825449; border-color: #825449;">
                                            Berikan Testimoni
                                        </button>
                                        @else
                                        <span class="badge bg-light text-dark ms-1" style="border-radius: 20px; font-size: 10px; border: 1px solid #ddd;">
                                            <i class="fa-solid fa-star text-warning me-1"></i> Sudah Dinilai
                                        </span>
                                        @endif
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <div class="text-center py-4">
                        <i class="fa-solid fa-receipt fs-1 text-muted mb-3 d-block"></i>
                        <p class="text-muted">Belum ada riwayat pesanan.</p>
                        <a href="{{ route('pemesanan') }}" class="btn btn-save btn-sm">Pesan Sekarang</a>
                    </div>
                    @endif
                </div>

                <!-- Alamat Saya Section -->
                <div id="section-address" class="profile-content-card" style="display: none;">
                    <h3 class="section-title">Alamat Saya</h3>
                    @if($user->address)
                    <div class="address-card">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h6 class="fw-bold mb-0">Alamat Utama</h6>
                            <span class="badge bg-success small">Default</span>
                        </div>
                        <p class="text-muted small mb-3">
                            <i class="fa-solid fa-location-dot me-2"></i>
                            {{ $user->address }}
                        </p>
                        <div class="d-flex gap-2">
                            <button class="btn btn-sm btn-outline-primary" style="border-radius: 8px; padding: 8px 20px; font-weight: 600; color: #825449; border-color: #825449;" data-bs-toggle="modal" data-bs-target="#modalMap">
                                <i class="fa-solid fa-edit me-1"></i> Edit Alamat
                            </button>
                            <form id="formDeleteAddress" action="{{ route('profile.update') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="name" value="{{ $user->name }}">
                                <input type="hidden" name="email" value="{{ $user->email }}">
                                <input type="hidden" name="phone" value="{{ $user->phone }}">
                                <input type="hidden" name="address" value="">
                                <input type="hidden" name="lat" value="">
                                <input type="hidden" name="lng" value="">
                                <button type="button" class="btn btn-sm btn-outline-danger" style="border-radius: 8px; padding: 8px 20px; font-weight: 600;" onclick="confirmDeleteAddress()">
                                    <i class="fa-solid fa-trash me-1"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                    @else
                    <div class="text-center py-4">
                        <i class="fa-solid fa-location-dot fs-1 text-muted mb-3 d-block"></i>
                        <p class="text-muted">Belum ada alamat yang ditambahkan.</p>
                        <button class="btn btn-save" data-bs-toggle="modal" data-bs-target="#modalMap">
                            <i class="fa-solid fa-plus me-2"></i> Tambah Alamat
                        </button>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Testimoni -->
<div class="modal fade" id="modalTestimoni" tabindex="-1" aria-labelledby="modalTestimoniLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius: 20px; border: none; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
            <div class="modal-header border-0 pb-0 pt-4 px-4">
                <h5 class="modal-title fw-bold" id="modalTestimoniLabel">Berikan Testimoni</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('testimoni.store') }}" method="POST">
                @csrf
                <input type="hidden" name="transaksi_id" id="modal_transaksi_id">
                <div class="modal-body p-4">
                    <div class="mb-4 text-center">
                        <p class="text-muted mb-2">Bagaimana pengalaman Anda dengan layanan</p>
                        <h6 id="modal_layanan_nama" class="fw-bold text-dark mb-3">Layanan Name</h6>
                        <div class="rating-stars mb-2">
                            <input type="hidden" name="rating" id="input_rating" value="5">
                            <div class="d-flex justify-content-center gap-2">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="fa-solid fa-star star-icon fs-2 text-warning cursor-pointer" data-value="{{ $i }}" style="cursor: pointer;"></i>
                                    @endfor
                            </div>
                        </div>
                        <span id="rating_text" class="small fw-bold text-muted">Sangat Puas</span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Ceritakan pengalaman Anda</label>
                        <textarea name="pesan" class="form-control" rows="4" placeholder="Tulis pesan testimoni Anda di sini..." required style="border-radius: 12px; resize: none;"></textarea>
                    </div>
                </div>
                <div class="modal-footer border-0 p-4 pt-0">
                    <button type="button" class="btn btn-light px-4 py-2" data-bs-dismiss="modal" style="border-radius: 10px; font-weight: 600;">Batal</button>
                    <button type="submit" class="btn btn-primary px-4 py-2" style="border-radius: 10px; font-weight: 600; background-color: #825449; border-color: #825449;">Kirim Testimoni</button>
                </div>
            </form>
        </div>
    </div>
</div>

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
                    <p id="selected-address-text" class="small fw-medium mb-0">{{ $user->address ?? 'Geser pin untuk memilih lokasi...' }}</p>
                </div>

                <form id="formSaveAddress" action="{{ route('profile.update') }}" method="POST" style="display: none;">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="name" value="{{ $user->name }}">
                    <input type="hidden" name="email" value="{{ $user->email }}">
                    <input type="hidden" name="phone" value="{{ $user->phone }}">
                    <input type="hidden" name="address" id="hidden_address_input" value="{{ $user->address }}">
                    <input type="hidden" name="lat" id="hidden_lat_input" value="{{ $user->lat }}">
                    <input type="hidden" name="lng" id="hidden_lng_input" value="{{ $user->lng }}">
                </form>
            </div>
            <div class="modal-footer border-0 p-4 pt-0">
                <button type="button" class="btn btn-light px-4 py-2" data-bs-dismiss="modal" style="border-radius: 10px; font-weight: 600;">Batal</button>
                <button type="button" id="btnConfirmAddress" class="btn btn-primary px-4 py-2" style="border-radius: 10px; font-weight: 600; background-color: #825449; border-color: #825449;">Simpan Alamat Ini</button>
            </div>
        </div>
    </div>
</div>

<script>
    function switchTab(tab) {
        console.log('Switching to tab:', tab);
        // Hide all sections
        const cards = document.querySelectorAll('.profile-content-card');
        cards.forEach(card => {
            card.style.display = 'none';
        });

        // Show selected section
        const targetSection = document.getElementById('section-' + tab);
        if (targetSection) {
            targetSection.style.display = 'block';
        }

        // Update active link
        document.querySelectorAll('.profile-nav-link').forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('data-tab') === tab) {
                link.classList.add('active');
            }
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        // Sidebar tab links
        document.querySelectorAll('.profile-nav-link[data-tab]').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const tab = this.getAttribute('data-tab');
                switchTab(tab);
                window.location.hash = tab;
            });
        });

        // Handle hash in URL
        const hash = window.location.hash.substring(1);
        if (hash && ['info', 'edit', 'orders', 'address'].includes(hash)) {
            switchTab(hash);
        }

        // Handle star rating
        const stars = document.querySelectorAll('.star-icon');
        const inputRating = document.getElementById('input_rating');
        const ratingText = document.getElementById('rating_text');
        const ratingLabels = {
            1: 'Kecewa',
            2: 'Kurang Puas',
            3: 'Cukup',
            4: 'Puas',
            5: 'Sangat Puas'
        };

        stars.forEach(star => {
            star.addEventListener('click', function() {
                const value = this.getAttribute('data-value');
                inputRating.value = value;
                ratingText.innerText = ratingLabels[value];

                // Reset all stars
                stars.forEach(s => {
                    s.classList.remove('text-warning');
                    s.classList.add('text-muted');
                });

                // Highlight stars up to selected value
                for (let i = 0; i < value; i++) {
                    stars[i].classList.remove('text-muted');
                    stars[i].classList.add('text-warning');
                }
            });
        });

        // Handle modal data (supporting both BS4 and BS5)
        const modalTestimoni = document.getElementById('modalTestimoni');
        if (modalTestimoni) {
            // For Bootstrap 5
            modalTestimoni.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                populateModal(button);
            });

            // For Bootstrap 4 (jQuery)
            if (typeof jQuery !== 'undefined') {
                jQuery('#modalTestimoni').on('show.bs.modal', function(event) {
                    const button = event.relatedTarget;
                    populateModal(button);
                });
            }
        }

        function populateModal(button) {
            if (!button) return;
            const id = button.getAttribute('data-id');
            const layanan = button.getAttribute('data-layanan');

            const idInput = document.getElementById('modal_transaksi_id');
            const nameDisplay = document.getElementById('modal_layanan_nama');

            if (idInput) idInput.value = id;
            if (nameDisplay) nameDisplay.innerText = layanan;

            // Reset to 5 stars on open
            if (inputRating) inputRating.value = 5;
            if (ratingText) ratingText.innerText = ratingLabels[5];
            stars.forEach(s => {
                s.classList.remove('text-muted');
                s.classList.add('text-warning');
            });
        }

        // Leaflet Maps Implementation
        let map, marker;
        const defaultLocation = [-6.560198, 107.761402]; // Subang

        function initLeafletMap() {
            if (map) return; // Already initialized

            map = L.map('map-container', {
                zoomControl: true
            }).setView(defaultLocation, 15);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);

            const centerPin = document.getElementById('center-pin');

            // Map move events
            map.on('movestart', function() {
                centerPin.classList.add('moving');
            });

            map.on('move', function() {
                // Marker is fixed by CSS, but we can do things here if needed
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
                    // Restricted to Subang region using viewbox (107.50,-6.84, 107.96,-6.21)
                    fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${query}&viewbox=107.50,-6.21,107.96,-6.84&bounded=1&limit=5`)
                        .then(response => response.json())
                        .then(data => {
                            searchResults.innerHTML = '';
                            if (data.length > 0) {
                                data.forEach(item => {
                                    // Extra check to ensure "Subang" is in the display name
                                    if (!item.display_name.toLowerCase().includes('subang')) return;

                                    const div = document.createElement('div');
                                    div.className = 'search-result-item';
                                    div.innerText = item.display_name;
                                    div.onclick = function() {
                                        const lat = parseFloat(item.lat);
                                        const lon = parseFloat(item.lon);
                                        map.setView([lat, lon], 17);
                                        marker.setLatLng([lat, lon]);
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

            // Close search results on click outside
            document.addEventListener('click', function(e) {
                if (e.target !== searchInput) {
                    searchResults.style.display = 'none';
                }
            });
        }

        function updateAddressInfo(lat, lng) {
            // Store coordinates in hidden modal form
            document.getElementById('hidden_lat_input').value = lat;
            document.getElementById('hidden_lng_input').value = lng;

            // Also update the main profile form
            const mainLatInput = document.getElementById('main_profile_lat');
            const mainLngInput = document.getElementById('main_profile_lng');
            if (mainLatInput) mainLatInput.value = lat;
            if (mainLngInput) mainLngInput.value = lng;

            fetch(`https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${lat}&lon=${lng}`)
                .then(response => response.json())
                .then(data => {
                    if (data && data.display_name) {
                        const address = data.display_name;

                        // Check if the address is within Subang
                        if (!address.toLowerCase().includes('subang')) {
                            document.getElementById('selected-address-text').innerHTML = '<span class="text-danger"><i class="fa-solid fa-triangle-exclamation"></i> Maaf, saat ini layanan kami hanya tersedia di wilayah Subang saja.</span>';
                            document.getElementById('hidden_address_input').value = '';
                            return;
                        }

                        document.getElementById('selected-address-text').innerText = address;
                        document.getElementById('hidden_address_input').value = address;

                        // Also update the input in edit profil tab for consistency
                        const mainAddressInput = document.getElementById('main_profile_address');
                        if (mainAddressInput) mainAddressInput.value = address;
                    }
                });
        }

        // Load Leaflet Script
        const leafletScript = document.createElement('script');
        leafletScript.src = "https://unpkg.com/leaflet@1.9.4/dist/leaflet.js";
        leafletScript.onload = function() {
            // Initial map setup if needed, but we do it on modal show
        };
        document.head.appendChild(leafletScript);

        // Load SweetAlert2 Script
        const swalScript = document.createElement('script');
        swalScript.src = "https://cdn.jsdelivr.net/npm/sweetalert2@11";
        document.head.appendChild(swalScript);

        // Confirm Address Button
        document.getElementById('btnConfirmAddress').addEventListener('click', function() {
            const address = document.getElementById('hidden_address_input').value;
            if (address && address !== 'Alamat belum diatur') {
                document.getElementById('formSaveAddress').submit();
            } else {
                Swal.fire({
                    icon: 'warning',
                    title: 'Oops...',
                    text: 'Silahkan pilih lokasi terlebih dahulu di peta!',
                    confirmButtonColor: '#825449'
                });
            }
        });

        window.confirmDeleteAddress = function() {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Alamat Anda akan dihapus permanen dari profil.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#aaa',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('formDeleteAddress').submit();
                }
            });
        };

        // Re-center map when modal opens
        const modalMap = document.getElementById('modalMap');
        if (modalMap) {
            modalMap.addEventListener('shown.bs.modal', function() {
                initLeafletMap();
                if (map) {
                    map.invalidateSize();

                    const savedLat = document.getElementById('hidden_lat_input').value;
                    const savedLng = document.getElementById('hidden_lng_input').value;

                    if (savedLat && savedLng) {
                        // Priority 1: Use saved coordinates
                        map.setView([savedLat, savedLng], 15);
                    } else {
                        // Priority 2: Use saved address string
                        const currentAddress = document.getElementById('hidden_address_input').value;
                        if (currentAddress && currentAddress !== 'Alamat belum diatur' && currentAddress !== 'Subang') {
                            fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${currentAddress}&limit=1`)
                                .then(response => response.json())
                                .then(data => {
                                    if (data.length > 0) {
                                        const lat = parseFloat(data[0].lat);
                                        const lon = parseFloat(data[0].lon);
                                        map.setView([lat, lon], 15);
                                    }
                                });
                        } else {
                            // Priority 3: Use default
                            map.setView(defaultLocation, 15);
                        }
                    }
                }
            });
        }
    });
</script>
@endsection