@extends('admin.layouts.app')

@section('content')
<div class="space-y-8">
    <!-- Page Header -->
    <div class="bg-white/80 backdrop-blur-xl rounded-2xl shadow-lg p-6 border border-gray-100">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-800 tracking-tight">Dashboard</h1>
                <p class="text-gray-500 mt-1">Selamat datang kembali, Admin! Berikut ringkasan aktivitas layanan refleksi hari ini</p>
            </div>
            <div class="flex items-center space-x-3">
                <span class="px-4 py-2 bg-gradient-to-r from-[#825449] to-[#825449] text-white text-sm font-semibold rounded-xl shadow-lg shadow-[#825449]/30">
                    Today: {{ date('F j, Y') }}
                </span>
            </div>
        </div>
    </div>

    <!-- Metrics Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6">
        <!-- Total Pendapatan -->
        <div class="bg-white/80 backdrop-blur-xl rounded-2xl shadow-lg p-6 border border-gray-100 hover:shadow-xl transition-all duration-300 group">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 mb-1">Total Pendapatan</p>
                    <p class="text-xl font-bold text-green-600">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</p>
                    <p class="text-xs text-gray-400 mt-2">Status: Lunas</p>
                </div>
                <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-2xl p-4 shadow-lg shadow-green-200 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Total Transaksi -->
        <div class="bg-white/80 backdrop-blur-xl rounded-2xl shadow-lg p-6 border border-gray-100 hover:shadow-xl transition-all duration-300 group">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 mb-1">Total Transaksi</p>
                    <p class="text-3xl font-bold text-gray-800">{{ number_format($totalTransaksi) }}</p>
                    <p class="text-sm text-green-600 mt-2 flex items-center">
                        Pesanan
                    </p>
                </div>
                <div class="bg-gradient-to-br from-[#825449] to-[#825449] rounded-2xl p-4 shadow-lg shadow-[#825449]/30 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Total Layanan -->
        <div class="bg-white/80 backdrop-blur-xl rounded-2xl shadow-lg p-6 border border-gray-100 hover:shadow-xl transition-all duration-300 group">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 mb-1">Total Layanan</p>
                    <p class="text-3xl font-bold text-gray-800">{{ $totalLayanan }}</p>
                    <p class="text-sm text-green-600 mt-2 flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                        Layanan tersedia
                    </p>
                </div>
                <div class="bg-gradient-to-br from-[#e1bdb5] to-[#825449] rounded-2xl p-4 shadow-lg shadow-[#e1bdb5]/30 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Total Karyawan -->
        <div class="bg-white/80 backdrop-blur-xl rounded-2xl shadow-lg p-6 border border-gray-100 hover:shadow-xl transition-all duration-300 group">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 mb-1">Total Karyawan</p>
                    <p class="text-3xl font-bold text-gray-800">{{ $totalKaryawan }}</p>
                    <p class="text-sm text-green-600 mt-2 flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                        Karyawan terdaftar
                    </p>
                </div>
                <div class="bg-gradient-to-br from-[#825449] to-[#825449] rounded-2xl p-4 shadow-lg shadow-[#825449]/30 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Aktivitas Hari Ini -->
        <div class="bg-white/80 backdrop-blur-xl rounded-2xl shadow-lg p-6 border border-gray-100 hover:shadow-xl transition-all duration-300 group">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 mb-1">Transaksi Hari Ini</p>
                    <p class="text-3xl font-bold text-gray-800">{{ number_format($transaksiHariIni) }}</p>
                    <p class="text-sm text-blue-600 mt-2 flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Aktif sekarang
                    </p>
                </div>
                <div class="bg-gradient-to-br from-[#e1bdb5] to-[#e1bdb5] rounded-2xl p-4 shadow-lg shadow-[#e1bdb5]/30 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="bg-white/80 backdrop-blur-xl rounded-2xl shadow-lg border border-gray-100">
        <div class="px-6 py-5 border-b border-gray-100 flex items-center justify-between">
            <h3 class="text-xl font-bold text-gray-800">Aktivitas Terbaru</h3>
            <a href="{{ route('admin.aktivitas') }}" class="px-4 py-2 text-sm font-medium text-[#825449] hover:bg-[#e1bdb5] rounded-xl transition-colors">Lihat Semua</a>
        </div>
        <div class="p-6">
            <div class="space-y-4">
                @forelse($recentTransactions as $transaksi)
                <div class="flex items-center space-x-4 p-4 rounded-xl hover:bg-gray-50 transition-colors group">
                    <div class="w-12 h-12 bg-gradient-to-br from-[#825449] to-[#825449] rounded-xl flex items-center justify-center shadow-lg shadow-[#825449]/30">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-semibold text-gray-800">Transaksi: {{ $transaksi->nama }}</p>
                        <p class="text-xs text-gray-500">{{ $transaksi->created_at->diffForHumans() }}</p>
                    </div>
                    <span class="px-3 py-1 bg-[#e1bdb5] text-[#825449] text-xs font-semibold rounded-full">{{ ucfirst($transaksi->status) }}</span>
                </div>
                @empty
                <div class="text-center py-6">
                    <p class="text-gray-500 italic">Belum ada aktivitas transaksi terbaru.</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
