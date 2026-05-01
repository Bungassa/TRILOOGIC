@extends('admin.layouts.app')

@section('content')
<div class="space-y-8">
    <!-- Page Header -->
    <div class="bg-white/80 backdrop-blur-xl rounded-2xl shadow-lg p-6 border border-gray-100">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-800 tracking-tight">Data Penggajian</h1>
                <p class="text-gray-500 mt-1">Hitung dan kelola gaji karyawan</p>
            </div>
            <div class="flex items-center space-x-3">
                <form action="{{ route('admin.penggajian.generate') }}" method="POST" class="flex items-center space-x-3">
                    @csrf
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
                    <button type="submit" class="px-6 py-2 bg-gradient-to-r from-[#AB6F6E] to-[#C48989] text-white text-sm font-bold rounded-xl shadow-lg shadow-[#AB6F6E]/30">
                        Hitung Gaji
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Payroll Table -->
    <div class="bg-white/80 backdrop-blur-xl rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="p-6">
            @if(session('success'))
                <div class="mb-4 px-4 py-3 bg-green-100 border border-green-200 text-green-700 rounded-xl">
                    {{ session('success') }}
                </div>
            @endif

            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-gray-200">
                            <th class="text-left py-4 px-4 text-sm font-semibold text-gray-700">Karyawan</th>
                            <th class="text-right py-4 px-4 text-sm font-semibold text-gray-700">Gaji Pokok</th>
                            <th class="text-right py-4 px-4 text-sm font-semibold text-gray-700">Bonus</th>
                            <th class="text-right py-4 px-4 text-sm font-semibold text-gray-700">Potongan</th>
                            <th class="text-right py-4 px-4 text-sm font-semibold text-gray-700">Total Gaji</th>
                            <th class="text-center py-4 px-4 text-sm font-semibold text-gray-700">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($penggajians as $gaji)
                        <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                            <td class="py-4 px-4">
                                <div class="font-medium text-gray-800">{{ $gaji->karyawan->nama }}</div>
                                <div class="text-xs text-gray-500">{{ $gaji->karyawan->jabatan }}</div>
                            </td>
                            <td class="py-4 px-4 text-right text-sm text-gray-600">Rp {{ number_format($gaji->gaji_pokok, 0, ',', '.') }}</td>
                            <td class="py-4 px-4 text-right text-sm text-green-600">+ Rp {{ number_format($gaji->bonus, 0, ',', '.') }}</td>
                            <td class="py-4 px-4 text-right text-sm text-red-600">- Rp {{ number_format($gaji->potongan, 0, ',', '.') }}</td>
                            <td class="py-4 px-4 text-right text-sm font-bold text-gray-800">Rp {{ number_format($gaji->total_gaji, 0, ',', '.') }}</td>
                            <td class="py-4 px-4 text-center">
                                <a href="{{ route('admin.penggajian.slip', $gaji->id) }}" target="_blank" class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 text-xs font-bold rounded-lg transition-colors">
                                    Cetak Slip
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="py-12 text-center text-gray-500">
                                Belum ada data penggajian untuk periode ini. Silakan klik "Hitung Gaji".
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
