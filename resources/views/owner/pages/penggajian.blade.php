@extends('owner.layouts.app')

@section('content')
<div class="space-y-8">
    <!-- Page Header -->
    <div class="bg-white/80 backdrop-blur-xl rounded-2xl shadow-lg p-6 border border-gray-100">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-800 tracking-tight">Persetujuan Gaji</h1>
                <p class="text-gray-500 mt-1">Tinjau dan setujui gaji yang diajukan oleh Admin</p>
            </div>
            <div class="flex items-center space-x-3">
                <form action="{{ route('owner.penggajian') }}" method="GET" class="flex items-center space-x-3">
                    <select name="bulan" class="px-4 py-2 bg-white border border-gray-200 rounded-xl text-sm focus:outline-none">
                        @foreach(range(1, 12) as $m)
                            <option value="{{ sprintf('%02d', $m) }}" {{ $bulan == sprintf('%02d', $m) ? 'selected' : '' }}>
                                {{ Carbon\Carbon::create()->month($m)->translatedFormat('F') }}
                            </option>
                        @endforeach
                    </select>
                    <select name="tahun" class="px-4 py-2 bg-white border border-gray-200 rounded-xl text-sm focus:outline-none">
                        @foreach(range(date('Y')-2, date('Y')+1) as $y)
                            <option value="{{ $y }}" {{ $tahun == $y ? 'selected' : '' }}>{{ $y }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="px-4 py-2 bg-[#AB6F6E] text-white text-sm font-semibold rounded-xl shadow-lg">Filter</button>
                </form>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="px-6 py-4 bg-green-100 border border-green-200 text-green-700 rounded-2xl shadow-sm">
            <i class="fa-solid fa-check-circle me-2"></i> {{ session('success') }}
        </div>
    @endif

    <!-- Penggajian Table -->
    <div class="bg-white/80 backdrop-blur-xl rounded-2xl shadow-lg p-6 border border-gray-100">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-gray-200">
                        <th class="text-left py-4 px-4 font-semibold text-gray-700">Karyawan</th>
                        <th class="text-right py-4 px-4 font-semibold text-gray-700">Gaji Pokok</th>
                        <th class="text-right py-4 px-4 font-semibold text-gray-700">Bonus</th>
                        <th class="text-right py-4 px-4 font-semibold text-gray-700">Potongan</th>
                        <th class="text-right py-4 px-4 font-semibold text-gray-700">Total Netto</th>
                        <th class="text-center py-4 px-4 font-semibold text-gray-700">Status</th>
                        <th class="text-center py-4 px-4 font-semibold text-gray-700">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($penggajians as $gaji)
                        <tr class="border-b border-gray-100 hover:bg-gray-50/50 transition-colors">
                            <td class="py-4 px-4">
                                <div class="font-medium text-gray-800">{{ $gaji->karyawan->nama }}</div>
                                <div class="text-xs text-gray-500">NIK: {{ $gaji->karyawan->nik }}</div>
                            </td>
                            <td class="py-4 px-4 text-right text-gray-600">Rp {{ number_format($gaji->gaji_pokok, 0, ',', '.') }}</td>
                            <td class="py-4 px-4 text-right text-green-600 font-medium">+ Rp {{ number_format($gaji->bonus, 0, ',', '.') }}</td>
                            <td class="py-4 px-4 text-right text-red-600 font-medium">- Rp {{ number_format($gaji->potongan, 0, ',', '.') }}</td>
                            <td class="py-4 px-4 text-right font-bold text-gray-800">Rp {{ number_format($gaji->total_gaji, 0, ',', '.') }}</td>
                            <td class="py-4 px-4 text-center">
                                <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider
                                    @if($gaji->status_pembayaran === 'dibayar') bg-green-100 text-green-700
                                    @else bg-yellow-100 text-yellow-700
                                    @endif">
                                    {{ $gaji->status_pembayaran }}
                                </span>
                            </td>
                            <td class="py-4 px-4 text-center">
                                @if($gaji->status_pembayaran === 'pending')
                                    <form action="{{ route('owner.penggajian.approve', $gaji->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white text-xs font-bold rounded-xl shadow-md transition-all">
                                            Setujui & Bayar
                                        </button>
                                    </form>
                                @else
                                    <span class="text-xs text-gray-400 italic">Diterima: {{ $gaji->tanggal_bayar }}</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-12 text-center text-gray-500 italic">
                                Belum ada data pengajuan gaji untuk periode ini.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
