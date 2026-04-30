@extends('owner.layouts.app')

@section('content')
<div class="space-y-8">
    <!-- Page Header -->
    <div class="bg-white/80 backdrop-blur-xl rounded-2xl shadow-lg p-6 border border-gray-100">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-800 tracking-tight">Laporan Transaksi</h1>
                <p class="text-gray-500 mt-1">Lihat dan unduh laporan transaksi</p>
            </div>
            <div class="flex items-center space-x-3">
                <button class="px-4 py-2 bg-gradient-to-r from-[#AB6F6E] to-[#C48989] text-white text-sm font-semibold rounded-xl shadow-lg shadow-[#AB6F6E]/30">
                    Download Laporan
                </button>
            </div>
        </div>
    </div>

    <!-- Content Placeholder -->
    <div class="bg-white/80 backdrop-blur-xl rounded-2xl shadow-lg p-8 border border-gray-100">
        <div class="text-center py-12">
            <div class="w-16 h-16 bg-gradient-to-br from-[#AB6F6E] to-[#C48989] rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg shadow-[#AB6F6E]/30">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
            </div>
            <h3 class="text-xl font-bold text-gray-800 mb-2">Laporan Transaksi</h3>
            <p class="text-gray-500">Halaman untuk melihat dan mengunduh laporan transaksi</p>
        </div>
    </div>
</div>
@endsection
