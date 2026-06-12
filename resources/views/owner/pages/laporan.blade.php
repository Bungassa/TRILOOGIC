@extends('owner.layouts.app')

@section('content')
<div class="space-y-8 no-print animate-fade-in pb-10">
    <!-- Page Header & Filters -->
    <div class="bg-white/80 backdrop-blur-xl rounded-3xl shadow-xl p-8 border border-white/20">
        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6">
            <div>
                <h1 class="text-4xl font-extrabold text-gray-900 tracking-tight">Laporan Penggajian Karyawan</h1>
                <p class="text-gray-500 mt-2 text-lg">Saring dan cetak laporan upah karyawan suku Anda</p>
            </div>
            
            <div class="flex flex-wrap items-center gap-4">
                <!-- Filter Form -->
                <form id="filter-form" action="{{ route('owner.laporan') }}" method="GET" class="flex flex-wrap items-center gap-3">
                    <!-- Month Selection -->
                    <select name="bulan" onchange="this.form.submit()" 
                            class="px-5 py-3 bg-white border border-gray-200 rounded-2xl text-xs font-bold focus:ring-4 focus:ring-[#825449]/10 focus:border-[#825449] outline-none transition-all shadow-sm">
                        @foreach(range(1, 12) as $m)
                            <option value="{{ sprintf('%02d', $m) }}" {{ $bulan == sprintf('%02d', $m) ? 'selected' : '' }}>
                                {{ Carbon\Carbon::create()->month($m)->translatedFormat('F') }}
                            </option>
                        @endforeach
                    </select>

                    <!-- Year Selection -->
                    <select name="tahun" onchange="this.form.submit()" 
                            class="px-5 py-3 bg-white border border-gray-200 rounded-2xl text-xs font-bold focus:ring-4 focus:ring-[#825449]/10 focus:border-[#825449] outline-none transition-all shadow-sm">
                        @foreach(range(date('Y')-2, date('Y')+1) as $y)
                            <option value="{{ $y }}" {{ $tahun == $y ? 'selected' : '' }}>{{ $y }}</option>
                        @endforeach
                    </select>
                </form>

                <!-- Print Button -->
                <button onclick="window.print()" 
                        class="px-6 py-3 bg-gradient-to-r from-[#825449] to-[#825449] text-white text-xs font-black uppercase tracking-wider rounded-2xl shadow-lg shadow-[#825449]/30 hover:shadow-xl hover:-translate-y-0.5 transition-all">
                    Cetak Laporan
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Printable Area (This is the clean layout for screen and paper print) -->
<div class="printable-area bg-white rounded-[2.5rem] shadow-2xl border border-gray-100 overflow-hidden">
    <div class="p-10 md:p-16">
        <!-- Report Header -->
        <div class="text-center mb-10 pb-4">
            <h1 class="text-3xl font-black text-gray-900 tracking-wider uppercase">Ekky Family Refleksi</h1>
            <p class="text-gray-500 mt-2 text-sm font-black uppercase tracking-[0.2em] text-[#825449]">Data Penggajian Karyawan</p>
            <p class="text-gray-400 text-xs font-bold mt-1.5 uppercase tracking-widest">Periode: {{ Carbon\Carbon::create($tahun, $bulan, 1)->translatedFormat('F Y') }}</p>
        </div>

        <!-- Laporan Penggajian Table -->
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead>
                    <tr class="bg-gray-50 border-y border-gray-200">
                        <th class="py-5 px-6 font-black text-gray-700 uppercase tracking-widest text-[10px]">No</th>
                        <th class="py-5 px-6 font-black text-gray-700 uppercase tracking-widest text-[10px]">Karyawan</th>
                        <th class="py-5 px-6 font-black text-gray-700 uppercase tracking-widest text-[10px] text-center">Jumlah Treatment</th>
                        <th class="py-5 px-6 font-black text-gray-700 uppercase tracking-widest text-[10px] text-right">Total Nilai Kerja</th>
                        <th class="py-5 px-6 font-black text-gray-700 uppercase tracking-widest text-[10px] text-right">Gaji Bersih (50%)</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @php $totalGajiSeluruhnya = 0; @endphp
                    @forelse($penggajians as $index => $records)
                        @php
                            $firstRecord = $records->first();
                            $karyawanNama = $firstRecord->karyawan->nama ?? 'Unknown';
                            $karyawanNik = $firstRecord->karyawan->nik ?? '-';
                            $jumlahTreatment = $records->count();
                            $totalOmzet = $records->sum(fn($g) => $g->upah_karyawan + $g->pendapatan_owner);
                            $gajiBersih = $records->sum('upah_karyawan');
                            $pendingCount = $records->where('status_pembayaran', 'pending')->count();
                            $status = $pendingCount > 0 ? 'PENDING' : 'LUNAS';
                            $totalGajiSeluruhnya += $gajiBersih;
                        @endphp
                        <tr class="hover:bg-gray-50/50 transition-colors">
                            <td class="py-5 px-6 text-gray-500 font-bold">{{ $loop->iteration }}</td>
                            <td class="py-5 px-6">
                                <div class="font-black text-gray-900 text-base">{{ $karyawanNama }}</div>
                                <div class="text-[9px] text-gray-400 font-bold uppercase tracking-wider">NIK: {{ $karyawanNik }}</div>
                            </td>
                            <td class="py-5 px-6 text-center font-black text-gray-800">
                                {{ $jumlahTreatment }} Treatment
                            </td>
                            <td class="py-5 px-6 text-right font-bold text-gray-800">
                                Rp {{ number_format($totalOmzet, 0, ',', '.') }}
                            </td>
                            <td class="py-5 px-6 text-right font-black text-gray-900 text-base">
                                Rp {{ number_format($gajiBersih, 0, ',', '.') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-16 text-center text-gray-400 italic font-medium">
                                Belum ada data penggajian untuk periode ini.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr class="bg-gray-50 font-black border-y border-gray-200">
                        <td colspan="4" class="py-5 px-6 text-right text-gray-700 uppercase tracking-widest text-xs">TOTAL PENGELUARAN GAJI</td>
                        <td class="py-5 px-6 text-right text-[#825449] text-xl font-black">
                            Rp {{ number_format($totalGajiSeluruhnya, 0, ',', '.') }}
                        </td>
                    </tr>
                </tfoot>
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

    @media print {
        @page {
            size: A4 portrait;
            margin: 15mm 10mm 15mm 10mm;
        }
        
        body {
            background: white !important;
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
        }

        /* General print rules */
        body * {
            visibility: hidden;
        }
        
        /* Set printable area visible */
        .printable-area, .printable-area * {
            visibility: visible;
        }

        .printable-area {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            border: none !important;
            box-shadow: none !important;
            padding: 0 !important;
            margin: 0 !important;
            background: white !important;
        }

        /* Remove the screen container padding during print to maximize width */
        .printable-area > div {
            padding: 0 !important;
        }

        /* Hiding non-print components */
        .no-print, nav, header, sidebar, button, form {
            display: none !important;
            height: 0 !important;
            width: 0 !important;
            overflow: hidden !important;
            margin: 0 !important;
            padding: 0 !important;
        }

        /* Perfect spacing for tables on paper */
        table {
            page-break-inside: auto;
            width: 100% !important;
            table-layout: auto !important;
        }
        tr {
            page-break-inside: avoid;
            page-break-after: auto;
        }
        thead {
            display: table-header-group;
        }
        tfoot {
            display: table-row-group !important;
        }
        
        /* Premium print table styling */
        th {
            background-color: #f3f4f6 !important;
            color: #1f2937 !important;
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
        }
        
        td, th {
            padding: 8px 10px !important;
            font-size: 11px !important;
            border-bottom: 1px solid #e5e7eb !important;
        }
    }
</style>
@endsection
