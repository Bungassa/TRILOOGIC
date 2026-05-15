@extends('owner.layouts.app')

@section('content')
<div class="space-y-8 animate-fade-in pb-10">
    <!-- Page Header -->
    <div class="bg-white/80 backdrop-blur-xl rounded-3xl shadow-xl p-8 border border-white/20">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div>
                <h1 class="text-4xl font-extrabold text-gray-900 tracking-tight">Laporan Penggajian</h1>
                <p class="text-gray-500 mt-2 text-lg">Ringkasan upah karyawan periode {{ Carbon\Carbon::create()->month($bulan)->translatedFormat('F') }} {{ $tahun }}</p>
            </div>
            <div class="flex items-center">
                <form action="{{ route('owner.penggajian') }}" method="GET" class="flex flex-wrap items-center gap-3">
                    <select name="bulan" onchange="this.form.submit()" class="px-6 py-3 bg-white border border-gray-200 rounded-2xl text-sm font-semibold focus:ring-4 focus:ring-[#AB6F6E]/10 focus:border-[#AB6F6E] outline-none transition-all shadow-sm">
                        @foreach(range(1, 12) as $m)
                            <option value="{{ sprintf('%02d', $m) }}" {{ $bulan == sprintf('%02d', $m) ? 'selected' : '' }}>
                                {{ Carbon\Carbon::create()->month($m)->translatedFormat('F') }}
                            </option>
                        @endforeach
                    </select>
                    <select name="tahun" onchange="this.form.submit()" class="px-6 py-3 bg-white border border-gray-200 rounded-2xl text-sm font-semibold focus:ring-4 focus:ring-[#AB6F6E]/10 focus:border-[#AB6F6E] outline-none transition-all shadow-sm">
                        @foreach(range(date('Y')-2, date('Y')+1) as $y)
                            <option value="{{ $y }}" {{ $tahun == $y ? 'selected' : '' }}>{{ $y }}</option>
                        @endforeach
                    </select>
                </form>
            </div>
        </div>
    </div>

    @php
        $flatPenggajians = $penggajians->flatten();
        $totalOmzet = $flatPenggajians->sum(fn($g) => $g->upah_karyawan + $g->pendapatan_owner);
        $totalGaji = $flatPenggajians->sum('upah_karyawan');
    @endphp

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-gradient-to-br from-indigo-600 to-blue-700 rounded-3xl p-8 text-white shadow-xl relative overflow-hidden group">
            <div class="absolute -right-4 -top-4 w-24 h-24 bg-white/10 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-500"></div>
            <p class="text-blue-100 font-medium tracking-wide uppercase text-xs">Total Omzet Bulan Ini</p>
            <h3 class="text-4xl font-black mt-2">Rp {{ number_format($totalOmzet, 0, ',', '.') }}</h3>
        </div>
        <div class="bg-gradient-to-br from-[#AB6F6E] to-[#8D5857] rounded-3xl p-8 text-white shadow-xl relative overflow-hidden group">
            <div class="absolute -right-4 -top-4 w-24 h-24 bg-white/10 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-500"></div>
            <p class="text-[#fcecec] font-medium tracking-wide uppercase text-xs">Total Gaji Seluruh Karyawan</p>
            <h3 class="text-4xl font-black mt-2">Rp {{ number_format($totalGaji, 0, ',', '.') }}</h3>
        </div>
    </div>

    <!-- Employee Summary Table -->
    <div class="bg-white/80 backdrop-blur-xl rounded-[2.5rem] shadow-2xl border border-white/20 overflow-hidden">
        <div class="p-8 border-b border-gray-100 flex justify-between items-center">
            <h2 class="text-xl font-black text-gray-800 uppercase tracking-widest">Daftar Gaji Karyawan</h2>
            <span class="px-4 py-2 bg-gray-100 text-gray-500 text-[10px] font-black rounded-full uppercase">{{ $penggajians->count() }} Orang</span>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-gray-50/50">
                        <th class="py-6 px-10 font-bold text-gray-600 uppercase text-[10px] tracking-widest border-b border-gray-100">Karyawan</th>
                        <th class="py-6 px-10 font-bold text-gray-600 uppercase text-[10px] tracking-widest border-b border-gray-100 text-center">Jumlah Treatment</th>
                        <th class="py-6 px-10 font-bold text-[#AB6F6E] uppercase text-[10px] tracking-widest border-b border-gray-100 text-right">Total Gaji</th>
                        <th class="py-6 px-10 font-bold text-gray-600 uppercase text-[10px] tracking-widest border-b border-gray-100 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($penggajians as $karyawanId => $records)
                        @php $firstRecord = $records->first(); @endphp
                        <tr class="hover:bg-gray-50/50 transition-colors group">
                            <td class="py-6 px-10">
                                <div class="flex items-center">
                                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-[#AB6F6E] to-[#C48989] flex items-center justify-center text-white text-xl font-black shadow-md mr-4 group-hover:rotate-6 transition-transform">
                                        {{ strtoupper(substr($firstRecord->karyawan->nama ?? '?', 0, 1)) }}
                                    </div>
                                    <div>
                                        <div class="font-black text-gray-900 text-lg group-hover:text-[#AB6F6E] transition-colors">
                                            {{ $firstRecord->karyawan->nama ?? 'Unknown' }}
                                        </div>
                                        <div class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">NIK: {{ $firstRecord->karyawan->nik ?? '-' }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="py-6 px-10 text-center">
                                <span class="px-4 py-2 bg-blue-50 text-blue-600 rounded-xl text-sm font-black">
                                    {{ $records->count() }} Selesai
                                </span>
                            </td>
                            <td class="py-6 px-10 text-right">
                                <div class="text-xl font-black text-gray-900 group-hover:text-[#AB6F6E] transition-colors">
                                    Rp {{ number_format($records->sum('upah_karyawan'), 0, ',', '.') }}
                                </div>
                                <div class="text-[9px] text-gray-400 font-bold uppercase">Sudah Termasuk Bagi Hasil 50%</div>
                            </td>
                            <td class="py-6 px-10 text-center flex items-center justify-center gap-3">
                                <a href="{{ route('owner.penggajian.detail', ['id' => $karyawanId, 'bulan' => $bulan, 'tahun' => $tahun]) }}" 
                                   class="inline-flex items-center px-5 py-3 bg-blue-600 text-white text-xs font-black rounded-2xl shadow-lg shadow-blue-600/20 hover:shadow-xl hover:-translate-y-0.5 transition-all">
                                    Detail
                                </a>

                                @php 
                                    $pendingCount = $records->where('status_pembayaran', 'pending')->count();
                                    $totalGajiFormatted = number_format($records->sum('upah_karyawan'), 0, ',', '.');
                                    $karyawanNamaEscaped = addslashes($firstRecord->karyawan->nama);
                                    $confirmMsg = "Bayar total gaji Rp $totalGajiFormatted untuk $karyawanNamaEscaped?";
                                @endphp

                                @if($pendingCount > 0)
                                    <form action="{{ route('owner.penggajian.approve', $karyawanId) }}" method="POST" class="inline">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="bulan" value="{{ $bulan }}">
                                        <input type="hidden" name="tahun" value="{{ $tahun }}">
                                        <button type="submit" 
                                                onclick="return confirm('{{ $confirmMsg }}')" 
                                                class="inline-flex items-center px-5 py-3 bg-[#AB6F6E] text-white text-xs font-black rounded-2xl shadow-lg shadow-[#AB6F6E]/20 hover:shadow-xl hover:-translate-y-0.5 transition-all">
                                            Bayar Gaji
                                        </button>
                                    </form>
                                @else
                                    <span class="inline-flex items-center px-5 py-3 bg-emerald-50 text-emerald-600 text-xs font-black rounded-2xl border border-emerald-100">
                                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                        Lunas
                                    </span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="py-24 text-center">
                                <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-6">
                                    <svg class="w-10 h-10 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </div>
                                <h3 class="text-2xl font-black text-gray-800 uppercase tracking-widest">Tidak Ada Data</h3>
                                <p class="text-gray-500 mt-2">Belum ada aktivitas penggajian untuk periode ini.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in {
        animation: fadeIn 0.5s ease-out forwards;
    }
</style>
@endsection
