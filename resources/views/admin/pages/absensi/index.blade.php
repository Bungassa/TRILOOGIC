@extends('admin.layouts.app')

@section('content')
<div class="space-y-8">
    <!-- Page Header -->
    <div class="bg-white/80 backdrop-blur-xl rounded-2xl shadow-lg p-6 border border-gray-100">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-800 tracking-tight">Absensi Karyawan</h1>
                <p class="text-gray-500 mt-1">Kelola kehadiran harian karyawan dan data treatment yang dikerjakan</p>
            </div>
            <div class="flex items-center space-x-3">
                <a href="{{ route('admin.absensi.create') }}" 
                   class="px-4 py-2 bg-gradient-to-r from-[#AB6F6E] to-[#C48989] text-white text-sm font-semibold rounded-xl shadow-lg shadow-[#AB6F6E]/30 hover:shadow-xl hover:shadow-[#AB6F6E]/40 transition-all duration-200">
                    + Input Absensi
                </a>
            </div>
        </div>
    </div>

    <!-- Filters -->
    <div class="bg-white/80 backdrop-blur-xl rounded-2xl shadow-lg p-6 border border-gray-100">
        <form action="{{ route('admin.absensi') }}" method="GET" class="flex items-center space-x-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal</label>
                <input type="date" name="tanggal" value="{{ $tanggal }}" 
                       class="px-4 py-2 bg-white border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#AB6F6E]/50"
                       onchange="this.form.submit()">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Karyawan</label>
                <select name="karyawan_id" class="px-4 py-2 bg-white border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#AB6F6E]/50"
                        onchange="this.form.submit()">
                    <option value="">Semua Karyawan</option>
                    @foreach($karyawans as $karyawan)
                        <option value="{{ $karyawan->id }}" {{ $karyawanId == $karyawan->id ? 'selected' : '' }}>
                            {{ $karyawan->nama }}
                        </option>
                    @endforeach
                </select>
            </div>
        </form>
    </div>

    <!-- Absensi Table -->
    <div class="bg-white/80 backdrop-blur-xl rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
        @if(session('success'))
            <div class="px-6 py-4 bg-green-100 border-b border-green-200 text-green-700">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="px-6 py-4 bg-red-100 border-b border-red-200 text-red-700">
                {{ session('error') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-gray-200">
                        <th class="text-left py-4 px-4 text-sm font-semibold text-gray-700">ID</th>
                        <th class="text-left py-4 px-4 text-sm font-semibold text-gray-700">Nama Karyawan</th>
                        <th class="text-left py-4 px-4 text-sm font-semibold text-gray-700">Tanggal Kehadiran</th>
                        <th class="text-left py-4 px-4 text-sm font-semibold text-gray-700">Treatment yang Dikerjakan</th>
                        <th class="text-left py-4 px-4 text-sm font-semibold text-gray-700">Total Transaksi</th>
                        <th class="text-left py-4 px-4 text-sm font-semibold text-gray-700">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($absensis as $absensi)
                    <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                        <td class="py-4 px-4 text-sm text-gray-800">{{ $absensi->id }}</td>
                        <td class="py-4 px-4 text-sm font-medium text-gray-800">{{ $absensi->karyawan->nama }}</td>
                        <td class="py-4 px-4 text-sm text-gray-600">{{ date('d F Y', strtotime($absensi->tanggal)) }}</td>
                        <td class="py-4 px-4 text-sm text-gray-600">
                            @if($absensi->transaksi_data && $absensi->transaksi_data->count() > 0)
                                <div class="space-y-1">
                                    @foreach($absensi->transaksi_data as $transaksi)
                                        <div class="text-xs">
                                            <span class="font-medium">{{ $transaksi->layanan->nama }}</span>
                                            <span class="text-gray-400">- {{ date('H:i', strtotime($transaksi->jam)) }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <span class="text-gray-400">Tidak ada treatment</span>
                            @endif
                        </td>
                        <td class="py-4 px-4 text-sm text-gray-600">{{ $absensi->total_transaksi ?? 0 }} transaksi</td>
                        <td class="py-4 px-4">
                            <div class="flex items-center space-x-2">
                                <a href="{{ route('admin.absensi.edit', $absensi->id) }}" class="p-2 text-[#AB6F6E] hover:bg-[#F0D2D1] rounded-lg transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </a>
                                <form action="{{ route('admin.absensi.destroy', $absensi->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus absensi ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="py-12 text-center text-gray-500">
                            Tidak ada data absensi pada tanggal ini
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
6