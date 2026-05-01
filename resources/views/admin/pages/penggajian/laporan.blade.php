@extends('admin.layouts.app')

@section('content')
<div class="space-y-8">
    <!-- Page Header -->
    <div class="bg-white/80 backdrop-blur-xl rounded-2xl shadow-lg p-6 border border-gray-100">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-800 tracking-tight">Laporan Penggajian</h1>
                <p class="text-gray-500 mt-1">Rekapitulasi gaji bulanan</p>
            </div>
            <div class="flex items-center space-x-3">
                <form action="{{ route('admin.laporan.gaji') }}" method="GET" class="flex items-center space-x-3">
                    <select name="bulan" class="px-4 py-2 bg-white border border-gray-200 rounded-xl text-sm focus:outline-none" onchange="this.form.submit()">
                        @foreach(range(1, 12) as $m)
                            <option value="{{ sprintf('%02d', $m) }}" {{ $bulan == sprintf('%02d', $m) ? 'selected' : '' }}>
                                {{ Carbon\Carbon::create()->month($m)->translatedFormat('F') }}
                            </option>
                        @endforeach
                    </select>
                    <select name="tahun" class="px-4 py-2 bg-white border border-gray-200 rounded-xl text-sm focus:outline-none" onchange="this.form.submit()">
                        @foreach(range(date('Y')-2, date('Y')+1) as $y)
                            <option value="{{ $y }}" {{ $tahun == $y ? 'selected' : '' }}>{{ $y }}</option>
                        @endforeach
                    </select>
                </form>
                <button onclick="window.print()" class="px-4 py-2 bg-gray-800 text-white text-sm font-bold rounded-xl shadow-lg hover:bg-black transition-all">
                    Print Laporan
                </button>
            </div>
        </div>
    </div>

    <!-- Report Table -->
    <div class="bg-white/80 backdrop-blur-xl rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="p-8">
            <div class="text-center mb-10">
                <h2 class="text-2xl font-bold text-gray-800">REKAPITULASI GAJI KARYAWAN</h2>
                <p class="text-gray-500">Periode: {{ Carbon\Carbon::create()->month((int)$bulan)->translatedFormat('F') }} {{ $tahun }}</p>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-gray-50 border-y border-gray-200">
                            <th class="py-4 px-4 text-left font-bold">No</th>
                            <th class="py-4 px-4 text-left font-bold">Nama Karyawan</th>
                            <th class="py-4 px-4 text-left font-bold">NIK</th>
                            <th class="py-4 px-4 text-right font-bold">Gaji Pokok</th>
                            <th class="py-4 px-4 text-right font-bold">Bonus</th>
                            <th class="py-4 px-4 text-right font-bold">Potongan</th>
                            <th class="py-4 px-4 text-right font-bold">Total Diterima</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($penggajians as $index => $gaji)
                        <tr class="border-b border-gray-100">
                            <td class="py-4 px-4">{{ $index + 1 }}</td>
                            <td class="py-4 px-4 font-medium">{{ $gaji->karyawan->nama }}</td>
                            <td class="py-4 px-4 text-gray-500">{{ $gaji->karyawan->nik }}</td>
                            <td class="py-4 px-4 text-right">Rp {{ number_format($gaji->gaji_pokok, 0, ',', '.') }}</td>
                            <td class="py-4 px-4 text-right text-green-600">Rp {{ number_format($gaji->bonus, 0, ',', '.') }}</td>
                            <td class="py-4 px-4 text-right text-red-600">Rp {{ number_format($gaji->potongan, 0, ',', '.') }}</td>
                            <td class="py-4 px-4 text-right font-bold">Rp {{ number_format($gaji->total_gaji, 0, ',', '.') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="bg-gray-50 font-bold">
                            <td colspan="6" class="py-4 px-4 text-right">TOTAL KESELURUHAN</td>
                            <td class="py-4 px-4 text-right">Rp {{ number_format($penggajians->sum('total_gaji'), 0, ',', '.') }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div class="mt-16 flex justify-between px-10">
                <div class="text-center">
                    <p class="mb-20 text-sm">Disetujui Oleh,</p>
                    <p class="font-bold border-t border-black pt-2 w-40 mx-auto">OWNER</p>
                </div>
                <div class="text-center">
                    <p class="mb-20 text-sm">Disusun Oleh,</p>
                    <p class="font-bold border-t border-black pt-2 w-40 mx-auto">ADMIN HRD</p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    @media print {
        body * { visibility: hidden; }
        .bg-white\/80 { background: white !important; }
        .rounded-2xl { border-radius: 0 !important; }
        .shadow-lg { box-shadow: none !important; }
        .profile-content-card, .profile-content-card * { visibility: visible; }
        #section-laporan, #section-laporan * { visibility: visible; }
        .profile-wrapper { padding: 0 !important; }
        .col-lg-3, .page-header { display: none !important; }
        .col-lg-9 { width: 100% !important; }
        .space-y-8 > :not(.bg-white\/80:last-child) { display: none !important; }
        .bg-white\/80:last-child { visibility: visible !important; position: absolute; left: 0; top: 0; width: 100%; }
        .bg-white\/80:last-child * { visibility: visible !important; }
    }
</style>
@endsection
