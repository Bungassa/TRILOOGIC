@extends('admin.layouts.app')

@section('content')
<!-- Auto refresh every 10 seconds -->
<meta http-equiv="refresh" content="10">

<div class="space-y-8">
    <!-- Page Header -->
    <div class="bg-white/80 backdrop-blur-xl rounded-2xl shadow-lg p-6 border border-gray-100">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-800 tracking-tight">Log Aktivitas</h1>
                <p class="text-gray-500 mt-1">Riwayat aktivitas sistem (Update otomatis setiap 10 detik)</p>
            </div>
            <div class="flex items-center space-x-3">
                <span class="flex h-3 w-3 relative">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-3 w-3 bg-green-500"></span>
                </span>
                <span class="text-xs font-medium text-green-600 uppercase tracking-wider">Live Monitoring</span>
            </div>
        </div>
    </div>

    <!-- Activity Table -->
    <div class="bg-white/80 backdrop-blur-xl rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-gray-200">
                        <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Waktu</th>
                        <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">User</th>
                        <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Aktivitas</th>
                        <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Keterangan</th>
                        <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">IP Address</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($logs as $log)
                    <tr class="border-b border-gray-50 hover:bg-gray-50/50 transition-colors">
                        <td class="py-4 px-6 text-sm text-gray-600">
                            {{ $log->created_at->format('d/m/Y H:i') }}
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex items-center space-x-2">
                                <span class="w-2 h-2 rounded-full bg-[#C48989]"></span>
                                <span class="text-sm font-medium text-gray-800">{{ $log->user->name ?? 'System' }}</span>
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <span class="text-xs font-bold uppercase tracking-widest
                                @if(str_contains(strtolower($log->activity), 'tambah')) text-green-600
                                @elseif(str_contains(strtolower($log->activity), 'update')) text-blue-600
                                @elseif(str_contains(strtolower($log->activity), 'login')) text-purple-600
                                @else text-gray-600
                                @endif">
                                {{ $log->activity }}
                            </span>
                        </td>
                        <td class="py-4 px-6 text-sm text-gray-600 italic">
                            "{{ $log->description }}"
                        </td>
                        <td class="py-4 px-6 text-xs text-gray-400 font-mono">
                            {{ $log->ip_address }}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="py-20 text-center">
                            <div class="w-16 h-16 bg-gray-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                                <svg class="w-8 h-8 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-gray-400 font-medium">Belum ada riwayat aktivitas</h3>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($logs->hasPages())
            <div class="px-6 py-4 bg-gray-50/50 border-t border-gray-100">
                {{ $logs->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
