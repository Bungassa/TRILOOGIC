<!-- Owner Header -->
<div class="flex-shrink-0 flex h-16 bg-[#F0D2D1]/50 backdrop-blur-xl shadow-lg border-b border-[#E6B6B5]">
    <div class="flex-1 px-6 flex justify-between items-center">
        <div class="flex items-center space-x-4">
            <!-- Mobile Toggle Button -->
            <button onclick="toggleSidebar()" class="lg:hidden p-2 rounded-xl text-gray-700 hover:bg-[#E6B6B5]/50 transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
            <h1 class="text-xl font-bold text-gray-800 tracking-tight">{{ $title ?? 'Dashboard' }}</h1>
            <span class="px-3 py-1 bg-gradient-to-r from-[#AB6F6E] to-[#C48989] text-white text-xs font-semibold rounded-full shadow-md">Owner</span>
        </div>

        <div class="flex items-center space-x-6">
            <!-- User Profile -->
            <div class="relative flex items-center space-x-3 pl-4 border-l border-gray-200">
                <div class="h-10 w-10 rounded-xl bg-gradient-to-br from-[#AB6F6E] to-[#C48989] flex items-center justify-center shadow-lg shadow-[#AB6F6E]/30">
                    <span class="text-white font-semibold text-sm">{{ substr(Auth::user()->name, 0, 1) }}</span>
                </div>
                <div class="hidden md:block">
                    <p class="text-sm font-semibold text-gray-800">{{ Auth::user()->name }}</p>
                    <p class="text-xs text-gray-500 capitalize">{{ Auth::user()->role }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
