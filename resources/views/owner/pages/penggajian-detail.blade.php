@extends('owner.layouts.app')

@section('content')
<div class="space-y-8 animate-fade-in pb-10">
    <!-- Back Button & Header -->
    <div class="flex items-center justify-between">
        <a href="{{ route('owner.penggajian', ['bulan' => $bulan, 'tahun' => $tahun]) }}" class="inline-flex items-center text-gray-600 hover:text-[#AB6F6E] font-bold transition-colors group">
            <div class="w-10 h-10 rounded-full bg-white shadow-md flex items-center justify-center mr-3 group-hover:bg-[#AB6F6E] group-hover:text-white transition-all">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            </div>
            Kembali ke Ringkasan
        </a>
    </div>

    <!-- Employee Detail Header -->
    <div class="bg-white/80 backdrop-blur-xl rounded-[2.5rem] shadow-2xl p-10 border border-white/20 relative overflow-hidden">
        <div class="absolute top-0 right-0 p-8">
            <div class="bg-gray-50 px-6 py-3 rounded-2xl border border-gray-100 text-right shadow-sm">
                <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Periode Laporan</p>
                <h4 class="text-lg font-black text-gray-800">{{ Carbon\Carbon::create($tahun, $bulan, 1)->translatedFormat('F') }} {{ $tahun }}</h4>
            </div>
        </div>

        <div class="flex flex-col md:flex-row items-center gap-8">
            <div class="w-32 h-32 rounded-[2rem] bg-gradient-to-tr from-[#AB6F6E] to-[#C48989] flex items-center justify-center text-white text-5xl font-black shadow-2xl rotate-3">
                {{ strtoupper(substr($karyawan->nama, 0, 1)) }}
            </div>
            <div class="text-center md:text-left">
                <h1 class="text-4xl font-black text-gray-900 tracking-tight">{{ $karyawan->nama }}</h1>
                <div class="flex flex-wrap justify-center md:justify-start gap-4 mt-4">
                    <span class="px-4 py-2 bg-blue-50 text-blue-600 rounded-xl text-xs font-black uppercase tracking-widest">
                        NIK: {{ $karyawan->nik ?? '-' }}
                    </span>
                    <span class="px-4 py-2 bg-green-50 text-green-600 rounded-xl text-xs font-black uppercase tracking-widest">
                        {{ $records->count() }} Treatment Selesai
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Salary Breakdown Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-8 border-b-8 border-blue-500 shadow-xl">
            <p class="text-gray-400 text-[10px] font-black uppercase tracking-widest">Total Nilai Pengerjaan</p>
            <h3 class="text-3xl font-black text-gray-800 mt-2">Rp {{ number_format($records->sum(fn($r) => $r->upah_karyawan + $r->pendapatan_owner), 0, ',', '.') }}</h3>
        </div>
        <div class="bg-gradient-to-br from-[#AB6F6E] to-[#8D5857] rounded-3xl p-8 text-white shadow-xl relative overflow-hidden">
            <div class="absolute -right-4 -top-4 w-24 h-24 bg-white/10 rounded-full blur-2xl"></div>
            <p class="text-white/60 text-[10px] font-black uppercase tracking-widest">Gaji Karyawan (50%)</p>
            <h3 class="text-3xl font-black mt-2 text-white">Rp {{ number_format($records->sum('upah_karyawan'), 0, ',', '.') }}</h3>
        </div>

    </div>

    <!-- Treatment History List -->
    <div class="bg-white/80 backdrop-blur-xl rounded-[2.5rem] shadow-2xl border border-white/20 overflow-hidden">
        <div class="p-8 border-b border-gray-100 flex justify-between items-center bg-gray-50/30">
            <h2 class="text-xl font-black text-gray-800 uppercase tracking-widest">Riwayat Pengerjaan</h2>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-gray-50/50">
                        <th class="py-6 px-10 font-bold text-gray-600 uppercase text-[10px] tracking-widest border-b border-gray-100">Treatment</th>

                        <th class="py-6 px-10 font-bold text-gray-600 uppercase text-[10px] tracking-widest border-b border-gray-100">Waktu Pengerjaan</th>

                        <th class="py-6 px-10 font-bold text-[#AB6F6E] uppercase text-[10px] tracking-widest border-b border-gray-100 text-right">Upah (50%)</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($records as $record)
                        <tr class="hover:bg-gray-50/80 transition-all group">
                            <td class="py-6 px-10">
                                <div class="font-black text-gray-900 group-hover:text-[#AB6F6E] transition-colors text-lg">
                                    {{ $record->layanan->nama ?? 'Layanan' }}
                                </div>
                                <div class="text-xs text-gray-400 font-medium">Treatment Mandiri</div>
                            </td>

                            <td class="py-6 px-10">
                                <div class="text-sm font-bold text-gray-700">{{ \Carbon\Carbon::parse($record->created_at)->translatedFormat('d M Y') }}</div>
                                <div class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">{{ $record->created_at->format('H:i') }} WIB</div>
                            </td>

                            <td class="py-6 px-10 text-right">
                                <div class="text-2xl font-black text-[#AB6F6E]">Rp {{ number_format($record->upah_karyawan, 0, ',', '.') }}</div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <div class="p-10 bg-gray-50/50 border-t border-gray-100 text-center">
            <p class="text-xs text-gray-400 font-bold uppercase tracking-[0.2em]">Laporan ini dihasilkan secara otomatis oleh sistem payroll Ekky Family Refleksi</p>
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
