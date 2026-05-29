<!-- Admin Sidebar -->
<div class="h-full flex flex-col">
    <!-- Logo -->
    <div class="flex items-center justify-center h-20 px-6 bg-gradient-to-r from-[#825449] to-[#825449] border-b border-white/10">
        <div class="text-center">
            <h1 class="text-2xl font-bold text-white tracking-tight">Ekky Family Refleksi</h1>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 px-4 py-6 space-y-2">
        <div class="space-y-1">
            <a href="{{ route('admin.dashboard') }}" 
               class="flex items-center px-4 py-3 text-sm font-medium {{ request()->is('admin/dashboard') || request()->is('admin') ? 'text-white bg-gradient-to-r from-[#e1bdb5] to-[#825449] rounded-xl shadow-lg shadow-[#825449]/30' : 'text-gray-300 rounded-xl hover:bg-white/10 hover:text-white' }} transition-all duration-200 {{ request()->is('admin/dashboard') || request()->is('admin') ? 'hover:shadow-xl hover:shadow-[#825449]/40' : '' }}">
                <svg class="mr-3 h-5 w-5 {{ request()->is('admin/dashboard') || request()->is('admin') ? 'text-white' : 'text-gray-400 group-hover:text-white transition-colors' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                Dashboard
            </a>

            <a href="{{ route('admin.pesanan') }}" 
               class="flex items-center px-4 py-3 text-sm font-medium {{ request()->is('admin/pesanan*') ? 'text-white bg-gradient-to-r from-[#e1bdb5] to-[#825449] rounded-xl shadow-lg shadow-[#825449]/30' : 'text-gray-300 rounded-xl hover:bg-white/10 hover:text-white' }} transition-all duration-200 {{ request()->is('admin/pesanan*') ? 'hover:shadow-xl hover:shadow-[#825449]/40' : '' }} group">
                <svg class="mr-3 h-5 w-5 {{ request()->is('admin/pesanan*') ? 'text-white' : 'text-gray-400 group-hover:text-white transition-colors' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                </svg>
                Daftar Pesanan
            </a>

            <a href="{{ route('admin.transaksi') }}" 
               class="flex items-center px-4 py-3 text-sm font-medium {{ request()->is('admin/transaksi*') ? 'text-white bg-gradient-to-r from-[#e1bdb5] to-[#825449] rounded-xl shadow-lg shadow-[#825449]/30' : 'text-gray-300 rounded-xl hover:bg-white/10 hover:text-white' }} transition-all duration-200 {{ request()->is('admin/transaksi*') ? 'hover:shadow-xl hover:shadow-[#825449]/40' : '' }} group">
                <svg class="mr-3 h-5 w-5 {{ request()->is('admin/transaksi*') ? 'text-white' : 'text-gray-400 group-hover:text-white transition-colors' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                </svg>
                Data Transaksi
            </a>

            <a href="{{ route('admin.bed') }}" 
               class="flex items-center px-4 py-3 text-sm font-medium {{ request()->is('admin/bed*') ? 'text-white bg-gradient-to-r from-[#e1bdb5] to-[#825449] rounded-xl shadow-lg shadow-[#825449]/30' : 'text-gray-300 rounded-xl hover:bg-white/10 hover:text-white' }} transition-all duration-200 {{ request()->is('admin/bed*') ? 'hover:shadow-xl hover:shadow-[#825449]/40' : '' }} group">
                <svg class="mr-3 h-5 w-5 {{ request()->is('admin/bed*') ? 'text-white' : 'text-gray-400 group-hover:text-white transition-colors' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                </svg>
                
                Manajemen Bed
            </a>

            <a href="{{ route('admin.layanan') }}" 
               class="flex items-center px-4 py-3 text-sm font-medium {{ request()->is('admin/layanan*') ? 'text-white bg-gradient-to-r from-[#e1bdb5] to-[#825449] rounded-xl shadow-lg shadow-[#825449]/30' : 'text-gray-300 rounded-xl hover:bg-white/10 hover:text-white' }} transition-all duration-200 {{ request()->is('admin/layanan*') ? 'hover:shadow-xl hover:shadow-[#825449]/40' : '' }} group">
                <svg class="mr-3 h-5 w-5 {{ request()->is('admin/layanan*') ? 'text-white' : 'text-gray-400 group-hover:text-white transition-colors' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                </svg>
                Data Layanan
            </a>

            <a href="{{ route('admin.karyawan') }}" 
               class="flex items-center px-4 py-3 text-sm font-medium {{ request()->is('admin/karyawan*') ? 'text-white bg-gradient-to-r from-[#e1bdb5] to-[#825449] rounded-xl shadow-lg shadow-[#825449]/30' : 'text-gray-300 rounded-xl hover:bg-white/10 hover:text-white' }} transition-all duration-200 {{ request()->is('admin/karyawan*') ? 'hover:shadow-xl hover:shadow-[#825449]/40' : '' }} group">
                <svg class="mr-3 h-5 w-5 {{ request()->is('admin/karyawan*') ? 'text-white' : 'text-gray-400 group-hover:text-white transition-colors' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
                Data Karyawan
            </a>

            <a href="{{ route('admin.absensi') }}" 
               class="flex items-center px-4 py-3 text-sm font-medium {{ request()->is('admin/absensi*') ? 'text-white bg-gradient-to-r from-[#e1bdb5] to-[#825449] rounded-xl shadow-lg shadow-[#825449]/30' : 'text-gray-300 rounded-xl hover:bg-white/10 hover:text-white' }} transition-all duration-200 {{ request()->is('admin/absensi*') ? 'hover:shadow-xl hover:shadow-[#825449]/40' : '' }} group">
                <svg class="mr-3 h-5 w-5 {{ request()->is('admin/absensi*') ? 'text-white' : 'text-gray-400 group-hover:text-white transition-colors' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                </svg>
                Absensi Karyawan
            </a>

            <a href="{{ route('admin.laporan') }}" 
               class="flex items-center px-4 py-3 text-sm font-medium {{ request()->is('admin/laporan') ? 'text-white bg-gradient-to-r from-[#e1bdb5] to-[#825449] rounded-xl shadow-lg shadow-[#825449]/30' : 'text-gray-300 rounded-xl hover:bg-white/10 hover:text-white' }} transition-all duration-200 {{ request()->is('admin/laporan') ? 'hover:shadow-xl hover:shadow-[#825449]/40' : '' }} group">
                <svg class="mr-3 h-5 w-5 {{ request()->is('admin/laporan') ? 'text-white' : 'text-gray-400 group-hover:text-white transition-colors' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                Laporan Transaksi
            </a>

            <a href="{{ route('admin.aktivitas') }}" 
               class="flex items-center px-4 py-3 text-sm font-medium {{ request()->is('admin/aktivitas*') ? 'text-white bg-gradient-to-r from-[#e1bdb5] to-[#825449] rounded-xl shadow-lg shadow-[#825449]/30' : 'text-gray-300 rounded-xl hover:bg-white/10 hover:text-white' }} transition-all duration-200 {{ request()->is('admin/aktivitas*') ? 'hover:shadow-xl hover:shadow-[#825449]/40' : '' }} group">
                <svg class="mr-3 h-5 w-5 {{ request()->is('admin/aktivitas*') ? 'text-white' : 'text-gray-400 group-hover:text-white transition-colors' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                Log Aktivitas
            </a>
            
        </div>

        <!-- Logout -->
        <div class="pt-6 mt-6 border-t border-white/10">
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
               class="flex items-center w-full px-4 py-3 text-sm font-medium text-gray-300 rounded-xl hover:bg-red-500/20 hover:text-red-400 transition-all duration-200 group">
                <svg class="mr-3 h-5 w-5 text-gray-400 group-hover:text-red-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                </svg>
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                @csrf
            </form>
        </div>
    </nav>
</div>
