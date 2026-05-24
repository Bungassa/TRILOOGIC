@extends('admin.layouts.app')

@section('content')
<div class="space-y-8">
    <!-- Page Header -->
    <div class="bg-white/80 backdrop-blur-xl rounded-2xl shadow-lg p-6 border border-gray-100">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-4">
                <a href="{{ route('admin.transaksi') }}" class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-600 rounded-xl flex items-center gap-2 font-semibold transition-colors">
                    <i class="fa-solid fa-arrow-left"></i> Kembali
                </a>
                <div>
                    <h1 class="text-3xl font-bold text-gray-800 tracking-tight">Detail Transaksi <span class="text-[#C48989]">#{{ $transaksi->id }}</span></h1>
                    <p class="text-gray-500 mt-1">Informasi lengkap transaksi pelanggan</p>
                </div>
            </div>
            <div>
                <span class="px-4 py-2 rounded-full text-sm font-bold shadow-sm
                    @if($transaksi->status === 'pending') bg-yellow-100 text-yellow-700
                    @elseif($transaksi->status === 'dikerjakan') bg-blue-100 text-blue-700
                    @elseif($transaksi->status === 'selesai') bg-green-100 text-green-700
                    @endif">
                    Status: {{ $transaksi->status == 'pending' ? 'Menunggu' : ($transaksi->status == 'dikerjakan' ? 'Proses' : 'Selesai') }}
                </span>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Informasi Utama -->
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white/80 backdrop-blur-xl rounded-2xl shadow-lg p-8 border border-gray-100">
                <h3 class="text-lg font-bold text-gray-800 mb-6 flex items-center gap-2">
                    <i class="fa-regular fa-user text-[#C48989]"></i> Data Pelanggan & Layanan
                </h3>
                
                <div class="grid grid-cols-2 gap-y-6 gap-x-8">
                    <div>
                        <p class="text-sm font-semibold text-gray-500 mb-1">Nama Pelanggan</p>
                        <p class="text-base font-bold text-gray-800">{{ $transaksi->nama }}</p>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-gray-500 mb-1">No. Telepon</p>
                        <p class="text-base font-bold text-gray-800">{{ $transaksi->telepon }}</p>
                    </div>
                    
                    <div class="col-span-2 border-t border-gray-100 my-2"></div>
                    
                    <div>
                        <p class="text-sm font-semibold text-gray-500 mb-1">Layanan</p>
                        <p class="text-base font-bold text-gray-800">{{ $transaksi->layanan ? $transaksi->layanan->nama : 'Walk-in' }}</p>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-gray-500 mb-1">Karyawan</p>
                        <p class="text-base font-bold text-gray-800">{{ $transaksi->karyawan ? $transaksi->karyawan->nama : '-' }}</p>
                    </div>

                    <div class="col-span-2 border-t border-gray-100 my-2"></div>

                    <div>
                        <p class="text-sm font-semibold text-gray-500 mb-1">Tanggal</p>
                        <p class="text-base font-bold text-gray-800">{{ \Carbon\Carbon::parse($transaksi->tanggal)->format('d F Y') }}</p>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-gray-500 mb-1">Jam</p>
                        <p class="text-base font-bold text-gray-800">{{ $transaksi->jam }}</p>
                    </div>
                </div>
            </div>

            <!-- Detail Lokasi -->
            <div class="bg-white/80 backdrop-blur-xl rounded-2xl shadow-lg p-8 border border-gray-100">
                <h3 class="text-lg font-bold text-gray-800 mb-6 flex items-center gap-2">
                    <i class="fa-solid fa-location-dot text-[#C48989]"></i> Detail Lokasi
                </h3>
                
                <div class="space-y-4">
                    <div>
                        <p class="text-sm font-semibold text-gray-500 mb-1">Tipe Layanan</p>
                        <p class="text-base font-bold text-gray-800">
                            @if($transaksi->lokasi === 'tempat')
                                <span class="inline-flex items-center gap-2"><i class="fa-solid fa-shop text-gray-400"></i> Di Tempat</span>
                            @else
                                <span class="inline-flex items-center gap-2"><i class="fa-solid fa-house text-gray-400"></i> Di Rumah (Home Service)</span>
                            @endif
                        </p>
                    </div>

                    @if($transaksi->lokasi === 'rumah' && $transaksi->alamat)
                        <div class="bg-gray-50 rounded-xl p-5 border border-gray-100 mt-4">
                            <p class="text-sm font-semibold text-gray-500 mb-2">Alamat Lengkap</p>
                            <p class="text-base text-gray-800 mb-4">{{ $transaksi->alamat }}</p>
                            
                            @if($transaksi->lat && $transaksi->lng)
                                <a href="https://www.google.com/maps?q={{ $transaksi->lat }},{{ $transaksi->lng }}" target="_blank" class="inline-flex items-center gap-2 px-4 py-2 bg-blue-50 text-blue-600 rounded-lg text-sm font-bold hover:bg-blue-100 transition-colors mt-2">
                                    <i class="fa-solid fa-map-location-dot"></i> Buka di Google Maps
                                </a>
                            @else
                                <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($transaksi->alamat) }}" target="_blank" class="inline-flex items-center gap-2 px-4 py-2 bg-blue-50 text-blue-600 rounded-lg text-sm font-bold hover:bg-blue-100 transition-colors mt-2">
                                    <i class="fa-solid fa-map-location-dot"></i> Cari di Google Maps
                                </a>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
            
            @if($transaksi->catatan)
            <div class="bg-white/80 backdrop-blur-xl rounded-2xl shadow-lg p-8 border border-gray-100">
                <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center gap-2">
                    <i class="fa-regular fa-note-sticky text-[#C48989]"></i> Catatan
                </h3>
                <p class="text-gray-700 bg-yellow-50/50 p-4 rounded-xl border border-yellow-100/50">{{ $transaksi->catatan }}</p>
            </div>
            @endif
        </div>

        <!-- Ringkasan Pembayaran -->
        <div class="space-y-6">
            <div class="bg-white/80 backdrop-blur-xl rounded-2xl shadow-lg p-8 border border-gray-100 sticky top-8">
                <h3 class="text-lg font-bold text-gray-800 mb-6 flex items-center gap-2">
                    <i class="fa-solid fa-wallet text-[#C48989]"></i> Ringkasan Pembayaran
                </h3>

                <div class="space-y-4 mb-6">
                    <div class="flex justify-between items-center">
                        <p class="text-sm text-gray-500">Harga Layanan</p>
                        <p class="text-sm font-bold text-gray-800">Rp {{ number_format($transaksi->layanan ? $transaksi->layanan->harga : 0, 0, ',', '.') }}</p>
                    </div>
                    @if($transaksi->lokasi === 'rumah')
                    <div class="flex justify-between items-center">
                        <p class="text-sm text-gray-500">Ongkos Home Service</p>
                        <p class="text-sm font-bold text-gray-800">Rp 20.000</p>
                    </div>
                    @endif
                </div>

                <div class="pt-4 border-t border-gray-200">
                    <div class="flex justify-between items-center mb-6">
                        <p class="text-base font-bold text-gray-800">Total</p>
                        <p class="text-2xl font-black text-[#AB6F6E]">Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</p>
                    </div>

                    <div class="space-y-3">
                        <p class="text-sm font-semibold text-gray-500 mb-2">Status Pembayaran:</p>
                        @if($transaksi->status_pembayaran === 'belum_bayar')
                            <div class="w-full text-center px-4 py-3 bg-red-50 text-red-600 rounded-xl font-bold border border-red-100">
                                Belum Bayar
                            </div>
                        @else
                            <div class="w-full text-center px-4 py-3 bg-green-50 text-green-600 rounded-xl font-bold border border-green-100">
                                <i class="fa-solid fa-circle-check me-2"></i> Lunas
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
