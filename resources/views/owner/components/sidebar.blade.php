<!-- Owner Sidebar -->
<div class="h-full flex flex-col">
    <!-- Logo -->
    <div class="flex items-center justify-center h-20 px-6 bg-gradient-to-r from-[#AB6F6E] to-[#C48989] border-b border-white/10">
        <div class="text-center">
            <h1 class="text-2xl font-bold text-white tracking-tight">Ekky Family Refleksi</h1>
            <p class="text-[10px] text-white/70 uppercase tracking-widest">Owner Panel</p>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 px-4 py-6 space-y-2">
        <div class="space-y-1">
            <a href="{{ route('owner.dashboard') }}" 
               class="flex items-center px-4 py-3 text-sm font-medium {{ request()->is('owner/dashboard') || request()->is('owner') ? 'text-white bg-gradient-to-r from-[#D79F9E] to-[#C48989] rounded-xl shadow-lg shadow-[#AB6F6E]/30' : 'text-gray-300 rounded-xl hover:bg-white/10 hover:text-white' }} transition-all duration-200">
                <svg class="mr-3 h-5 w-5 {{ request()->is('owner/dashboard') ? 'text-white' : 'text-gray-400 group-hover:text-white transition-colors' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                Dashboard
            </a>

            <a href="{{ route('owner.laporan') }}" 
               class="flex items-center px-4 py-3 text-sm font-medium {{ request()->is('owner/laporan*') ? 'text-white bg-gradient-to-r from-[#D79F9E] to-[#C48989] rounded-xl shadow-lg shadow-[#AB6F6E]/30' : 'text-gray-300 rounded-xl hover:bg-white/10 hover:text-white' }} transition-all duration-200 group">
                <svg class="mr-3 h-5 w-5 {{ request()->is('owner/laporan*') ? 'text-white' : 'text-gray-400 group-hover:text-white transition-colors' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                Laporan Pendapatan
            </a>
        </div>

        <!-- Logout -->
        <div class="pt-6 mt-6 border-t border-white/10">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="flex items-center w-full px-4 py-3 text-sm font-medium text-gray-300 rounded-xl hover:bg-red-500/20 hover:text-red-400 transition-all duration-200 group">
                    <svg class="mr-3 h-5 w-5 text-gray-400 group-hover:text-red-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                    Logout
                </button>
            </form>
        </div>
    </nav>
</div>
