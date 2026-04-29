<!-- Admin Header -->
<div class="flex-shrink-0 flex h-16 bg-[#F0D2D1]/50 backdrop-blur-xl shadow-lg border-b border-[#E6B6B5]">
    <div class="flex-1 px-6 flex justify-between items-center">
        <div class="flex items-center space-x-4">
            <h1 class="text-xl font-bold text-gray-800 tracking-tight">Dashboard</h1>
            <span class="px-3 py-1 bg-gradient-to-r from-[#AB6F6E] to-[#C48989] text-white text-xs font-semibold rounded-full shadow-md">Admin</span>
        </div>

        <div class="flex items-center space-x-6">
            <!-- Search -->
            <div class="hidden md:block">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input id="search" 
                           name="search" 
                           class="block w-72 pl-10 pr-4 py-2.5 border border-[#E6B6B5] rounded-xl leading-5 bg-white/80 backdrop-blur-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#C48989]/50 focus:border-[#C48989] sm:text-sm transition-all duration-200 shadow-sm" 
                           placeholder="Pencarian..." 
                           type="search">
                </div>
            </div>

            <!-- Notifications -->
            <button class="relative p-2 rounded-xl text-gray-500 hover:text-gray-700 hover:bg-gray-100 transition-all duration-200">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                </svg>
                <span class="absolute top-1 right-1 h-2 w-2 bg-red-500 rounded-full animate-pulse"></span>
            </button>

            <!-- User Profile -->
            <div class="relative flex items-center space-x-3 pl-4 border-l border-gray-200">
                <div class="h-10 w-10 rounded-xl bg-gradient-to-br from-[#AB6F6E] to-[#C48989] flex items-center justify-center shadow-lg shadow-[#AB6F6E]/30">
                    <span class="text-white font-semibold text-sm">A</span>
                </div>
                <div class="hidden md:block">
                    <p class="text-sm font-semibold text-gray-800">Admin</p>
                    <p class="text-xs text-gray-500">Administrator</p>
                </div>
            </div>
        </div>
    </div>
</div>
