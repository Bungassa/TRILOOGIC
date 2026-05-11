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
                <!-- Manual input removed since it's automated -->
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
                        <th class="text-left py-4 px-4 text-sm font-semibold text-gray-700">Nama Karyawan</th>
                        <th class="text-left py-4 px-4 text-sm font-semibold text-gray-700">Tanggal Kehadiran</th>
                        <th class="text-left py-4 px-4 text-sm font-semibold text-gray-700">Treatment yang Dikerjakan</th>
                        <th class="text-left py-4 px-4 text-sm font-semibold text-gray-700">Total Transaksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($absensis as $absensi)
                    <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                        <td class="py-4 px-4 text-sm font-medium text-gray-800">{{ $absensi->karyawan->nama }}</td>
                        <td class="py-4 px-4 text-sm text-gray-600">{{ date('d F Y', strtotime($absensi->tanggal)) }}</td>
                        <td class="py-4 px-4 text-sm text-gray-600">
                            @if(isset($absensi->transaksi_data) && $absensi->transaksi_data->count() > 0)
                                <div class="space-y-1">
                                    @foreach($absensi->transaksi_data as $transaksi)
                                        <div class="text-xs flex items-center gap-2">
                                            <span class="w-1.5 h-1.5 rounded-full bg-[#C48989]"></span>
                                            <span class="font-medium text-gray-700">{{ $transaksi->layanan->nama ?? 'Walk-in' }}</span>
                                            <span class="text-gray-400 text-[10px]">({{ date('H:i', strtotime($transaksi->jam)) }})</span>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <span class="text-gray-400">Tidak ada treatment</span>
                            @endif
                        </td>
                        <td class="py-4 px-4 text-sm text-gray-600">
                            <span class="px-3 py-1 bg-gray-100 rounded-full font-semibold text-gray-700">
                                {{ $absensi->total_transaksi ?? 0 }} Transaksi
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="py-12 text-center text-gray-500">
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