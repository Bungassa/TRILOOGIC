<!-- Owner Sidebar -->
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
            <a href="{{ route('owner.dashboard') }}" 
               class="flex items-center px-4 py-3 text-sm font-medium {{ request()->is('owner/dashboard') ? 'text-white bg-gradient-to-r from-[#e1bdb5] to-[#825449] rounded-xl shadow-lg shadow-[#825449]/30' : 'text-gray-300 rounded-xl hover:bg-white/10 hover:text-white' }} transition-all duration-200">
                <svg class="mr-3 h-5 w-5 {{ request()->is('owner/dashboard') ? 'text-white' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                Dashboard
            </a>

            <a href="{{ route('owner.transaksi') }}" 
               class="flex items-center px-4 py-3 text-sm font-medium {{ request()->is('owner/transaksi*') ? 'text-white bg-gradient-to-r from-[#e1bdb5] to-[#825449] rounded-xl shadow-lg shadow-[#825449]/30' : 'text-gray-300 rounded-xl hover:bg-white/10 hover:text-white' }} transition-all duration-200">
                <svg class="mr-3 h-5 w-5 {{ request()->is('owner/transaksi*') ? 'text-white' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                </svg>
                Data Transaksi
            </a>

            <a href="{{ route('owner.penggajian') }}" 
               class="flex items-center px-4 py-3 text-sm font-medium {{ request()->is('owner/penggajian*') ? 'text-white bg-gradient-to-r from-[#e1bdb5] to-[#825449] rounded-xl shadow-lg shadow-[#825449]/30' : 'text-gray-300 rounded-xl hover:bg-white/10 hover:text-white' }} transition-all duration-200">
                <svg class="mr-3 h-5 w-5 {{ request()->is('owner/penggajian*') ? 'text-white' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
                Penggajian Karyawan
            </a>

            <a href="{{ route('owner.laporan') }}" 
               class="flex items-center px-4 py-3 text-sm font-medium {{ request()->is('owner/laporan') ? 'text-white bg-gradient-to-r from-[#e1bdb5] to-[#825449] rounded-xl shadow-lg shadow-[#825449]/30' : 'text-gray-300 rounded-xl hover:bg-white/10 hover:text-white' }} transition-all duration-200">
                <svg class="mr-3 h-5 w-5 {{ request()->is('owner/laporan') ? 'text-white' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                Laporan Penggajian
            </a>

            <a href="{{ route('owner.laporan-pendapatan') }}" 
               class="flex items-center px-4 py-3 text-sm font-medium {{ request()->is('owner/laporan-pendapatan*') ? 'text-white bg-gradient-to-r from-[#e1bdb5] to-[#825449] rounded-xl shadow-lg shadow-[#825449]/30' : 'text-gray-300 rounded-xl hover:bg-white/10 hover:text-white' }} transition-all duration-200">
                <svg class="mr-3 h-5 w-5 {{ request()->is('owner/laporan-pendapatan*') ? 'text-white' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                Laporan Pendapatan
            </a>

            <a href="{{ route('owner.admins') }}" 
               class="flex items-center px-4 py-3 text-sm font-medium {{ request()->is('owner/admins*') ? 'text-white bg-gradient-to-r from-[#e1bdb5] to-[#825449] rounded-xl shadow-lg shadow-[#825449]/30' : 'text-gray-300 rounded-xl hover:bg-white/10 hover:text-white' }} transition-all duration-200">
                <svg class="mr-3 h-5 w-5 {{ request()->is('owner/admins*') ? 'text-white' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
                Kelola Admin
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
