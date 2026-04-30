@extends('owner.layouts.app')

@section('content')
<div class="space-y-8">
    <!-- Page Header -->
    <div class="bg-white/80 backdrop-blur-xl rounded-2xl shadow-lg p-6 border border-gray-100">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-800 tracking-tight">Dashboard Owner</h1>
                <p class="text-gray-500 mt-1">Selamat datang kembali, {{ Auth::user()->name }}! Berikut ringkasan performa bisnis hari ini</p>
            </div>
            <div class="flex items-center space-x-3">
                <span class="px-4 py-2 bg-gradient-to-r from-[#AB6F6E] to-[#C48989] text-white text-sm font-semibold rounded-xl shadow-lg shadow-[#AB6F6E]/30">
                    Today: {{ date('F j, Y') }}
                </span>
            </div>
        </div>
    </div>

    <!-- Metrics Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Total Pendapatan -->
        <div class="bg-white/80 backdrop-blur-xl rounded-2xl shadow-lg p-6 border border-gray-100 hover:shadow-xl transition-all duration-300 group">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 mb-1">Total Pendapatan</p>
                    <p class="text-2xl font-bold text-green-600">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</p>
                    <p class="text-sm text-gray-400 mt-2 flex items-center">
                        Dari transaksi lunas
                    </p>
                </div>
                <div class="bg-gradient-to-br from-[#28a745] to-[#2ecc71] rounded-2xl p-4 shadow-lg shadow-green-200 group-hover:scale-110 transition-transform duration-300">
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
                        Pesanan terdaftar
                    </p>
                </div>
                <div class="bg-gradient-to-br from-[#AB6F6E] to-[#C48989] rounded-2xl p-4 shadow-lg shadow-[#AB6F6E]/30 group-hover:scale-110 transition-transform duration-300">
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
                        Layanan tersedia
                    </p>
                </div>
                <div class="bg-gradient-to-br from-[#D79F9E] to-[#C48989] rounded-2xl p-4 shadow-lg shadow-[#D79F9E]/30 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Transaksi Hari Ini -->
        <div class="bg-white/80 backdrop-blur-xl rounded-2xl shadow-lg p-6 border border-gray-100 hover:shadow-xl transition-all duration-300 group">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 mb-1">Transaksi Hari Ini</p>
                    <p class="text-3xl font-bold text-gray-800">{{ number_format($transaksiHariIni) }}</p>
                    <p class="text-sm text-blue-600 mt-2 flex items-center">
                        Aktif hari ini
                    </p>
                </div>
                <div class="bg-gradient-to-br from-[#E6B6B5] to-[#D79F9E] rounded-2xl p-4 shadow-lg shadow-[#E6B6B5]/30 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Transactions -->
    <div class="bg-white/80 backdrop-blur-xl rounded-2xl shadow-lg border border-gray-100">
        <div class="px-6 py-5 border-b border-gray-100 flex items-center justify-between">
            <h3 class="text-xl font-bold text-gray-800">Riwayat Transaksi Terbaru</h3>
            <a href="{{ route('owner.laporan') }}" class="px-4 py-2 text-sm font-medium text-[#AB6F6E] hover:bg-[#F0D2D1] rounded-xl transition-colors">Lihat Laporan</a>
        </div>
        <div class="p-6">
            <div class="space-y-4">
                @forelse($recentTransactions as $transaksi)
                <div class="flex items-center space-x-4 p-4 rounded-xl hover:bg-gray-50 transition-colors group">
                    <div class="w-12 h-12 bg-gradient-to-br from-[#AB6F6E] to-[#C48989] rounded-xl flex items-center justify-center shadow-lg shadow-[#AB6F6E]/30">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center justify-between">
                            <p class="text-sm font-semibold text-gray-800">{{ $transaksi->nama }}</p>
                            <p class="text-sm font-bold text-gray-800">Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</p>
                        </div>
                        <p class="text-xs text-gray-500">{{ $transaksi->layanan->nama }} • {{ $transaksi->created_at->format('d M Y, H:i') }}</p>
                    </div>
                    <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider
                        @if($transaksi->status_pembayaran === 'lunas') bg-green-100 text-green-700
                        @else bg-red-100 text-red-700
                        @endif">
                        {{ $transaksi->status_pembayaran == 'lunas' ? 'Paid' : 'Unpaid' }}
                    </span>
                </div>
                @empty
                <div class="text-center py-12">
                    <p class="text-gray-500 italic">Belum ada riwayat transaksi.</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
