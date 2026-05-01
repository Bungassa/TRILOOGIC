@extends('layout.layout')

@section('content')
    <x-header pageTitle="Profil Saya" breadcrumbItem="Profil" />

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
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
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
        .profile-nav-link:hover, .profile-nav-link.active {
            background-color: #C48989;
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
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
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
            border-color: #C48989;
            box-shadow: 0 0 0 0.2rem rgba(196, 137, 137, 0.25);
        }
        .btn-save {
            background-color: #C48989;
            border: none;
            padding: 12px 30px;
            border-radius: 10px;
            color: white;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-save:hover {
            background-color: #AB6F6E;
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
        .status-pending { background: #fff3cd; color: #856404; }
        .status-dikerjakan { background: #cce5ff; color: #004085; }
        .status-selesai { background: #d4edda; color: #155724; }
        
        .address-card {
            border: 1px solid #eee;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 15px;
            transition: all 0.3s ease;
        }
        .address-card:hover {
            border-color: #C48989;
            background-color: rgba(196, 137, 137, 0.02);
        }
    </style>

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
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="profile-nav-link w-100 border-0 bg-transparent text-start">
                                    <i class="fa-solid fa-sign-out-alt"></i> Logout
                                </button>
                            </form>
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
                                    <input type="text" name="address" class="form-control" value="{{ old('address', $user->address) }}" placeholder="Subang">
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
                                <div class="col-12">
                                    <button type="submit" class="btn btn-save">
                                        <i class="fa-solid fa-save me-2"></i> Simpan Perubahan
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
                                            <th>ID</th>
                                            <th>Layanan</th>
                                            <th>Tanggal</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($transaksis as $t)
                                            <tr>
                                                <td><span class="text-muted small">#{{ str_pad($t->id, 3, '0', STR_PAD_LEFT) }}</span></td>
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
                        <div class="address-card">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h6 class="fw-bold mb-0">Alamat Utama</h6>
                                <span class="badge bg-success small">Default</span>
                            </div>
                            <p class="text-muted small mb-3">
                                <i class="fa-solid fa-location-dot me-2"></i>
                                {{ $user->address ?? 'Alamat belum diatur' }}
                            </p>
                            <div class="d-flex gap-2">
                                <button class="btn btn-sm btn-outline-secondary" style="border-radius: 8px;" onclick="switchTab('edit')">
                                    <i class="fa-solid fa-edit me-1"></i> Edit Alamat
                                </button>
                                <button class="btn btn-sm btn-outline-primary" style="border-radius: 8px; color: #C48989; border-color: #C48989;">
                                    <i class="fa-solid fa-plus me-1"></i> Tambah Alamat
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function switchTab(tab) {
            // Hide all sections
            document.querySelectorAll('.profile-content-card').forEach(card => {
                card.style.display = 'none';
            });
            // Show selected section
            document.getElementById('section-' + tab).style.display = 'block';
            
            // Update active link
            document.querySelectorAll('.profile-nav-link').forEach(link => {
                link.classList.remove('active');
                if(link.getAttribute('data-tab') === tab) {
                    link.classList.add('active');
                }
            });
        }

        document.querySelectorAll('.profile-nav-link[data-tab]').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const tab = this.getAttribute('data-tab');
                switchTab(tab);
                window.location.hash = tab;
            });
        });

        // Handle hash in URL
        window.addEventListener('load', () => {
            const hash = window.location.hash.substring(1);
            if(hash && ['info', 'edit', 'orders', 'address'].includes(hash)) {
                switchTab(hash);
            }
        });
    </script>
@endsection
