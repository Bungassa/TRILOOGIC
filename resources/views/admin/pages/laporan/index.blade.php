@extends('admin.layouts.app')

@section('content')
<div class="space-y-8">
    <!-- Page Header -->
    <div class="bg-white/80 backdrop-blur-xl rounded-2xl shadow-lg p-6 border border-gray-100">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-800 tracking-tight">Laporan Transaksi</h1>
                <p class="text-gray-500 mt-1">Rekapitulasi transaksi bulanan</p>
            </div>
            <div class="flex items-center space-x-3">
                <form action="{{ route('admin.laporan') }}" method="GET" class="flex items-center space-x-3">
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
                <h2 class="text-2xl font-bold text-gray-800">REKAPITULASI TRANSAKSI</h2>
                <p class="text-gray-500">Periode: {{ Carbon\Carbon::create()->month((int)$bulan)->translatedFormat('F') }} {{ $tahun }}</p>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-gray-50 border-y border-gray-200">
                            <th class="py-4 px-4 text-left font-bold">No</th>
                            <th class="py-4 px-4 text-left font-bold">Tanggal</th>
                            <th class="py-4 px-4 text-left font-bold">Nama Pelanggan</th>
                            <th class="py-4 px-4 text-left font-bold">Layanan</th>
                            <th class="py-4 px-4 text-left font-bold">Lokasi</th>
                            <th class="py-4 px-4 text-right font-bold">Total Harga</th>
                            <th class="py-4 px-4 text-left font-bold">Status</th>
                            <th class="py-4 px-4 text-left font-bold">Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($transaksis as $index => $transaksi)
                        <tr class="border-b border-gray-100">
                            <td class="py-4 px-4">{{ $index + 1 }}</td>
                            <td class="py-4 px-4">{{ \Carbon\Carbon::parse($transaksi->created_at)->format('d/m/Y') }}</td>
                            <td class="py-4 px-4 font-medium">{{ $transaksi->nama }}</td>
                            <td class="py-4 px-4">
                                @if($transaksi->layanan_id)
                                    {{ $transaksi->layanan->nama }}
                                @else
                                    Walk-in
                                @endif
                            </td>
                            <td class="py-4 px-4">
                                @if($transaksi->lokasi === 'tempat')
                                    Di Tempat
                                @else
                                    Di Rumah
                                @endif
                            </td>
                            <td class="py-4 px-4 text-right">Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</td>
                            <td class="py-4 px-4">
                                <span class="px-2 py-1 rounded-full text-xs font-semibold
                                    @if($transaksi->status === 'pending') bg-yellow-100 text-yellow-700
                                    @elseif($transaksi->status === 'dikerjakan') bg-blue-100 text-blue-700
                                    @elseif($transaksi->status === 'selesai') bg-green-100 text-green-700
                                    @endif">
                                    {{ $transaksi->status == 'pending' ? 'Menunggu' : ($transaksi->status == 'dikerjakan' ? 'Proses' : 'Selesai') }}
                                </span>
                            </td>
                            <td class="py-4 px-4">
                                <span class="px-2 py-1 rounded-full text-xs font-semibold
                                    @if($transaksi->status_pembayaran === 'belum_bayar') bg-red-100 text-red-700
                                    @elseif($transaksi->status_pembayaran === 'lunas') bg-green-100 text-green-700
                                    @endif">
                                    {{ $transaksi->status_pembayaran === 'belum_bayar' ? 'Belum Bayar' : 'Lunas' }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="py-12 text-center text-gray-500">
                                Tidak ada data transaksi pada periode ini
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr class="bg-gray-50 font-bold">
                            <td colspan="5" class="py-4 px-4 text-right">TOTAL TRANSAKSI</td>
                            <td class="py-4 px-4 text-right">{{ $totalTransaksi }}</td>
                            <td colspan="2"></td>
                        </tr>
                        <tr class="bg-gray-100 font-bold">
                            <td colspan="5" class="py-4 px-4 text-right">TOTAL PENDAPATAN (LUNAS)</td>
                            <td colspan="3" class="py-4 px-4 text-right">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</td>
                        </tr>
                    </tfoot>
                </table>
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
        .bg-white\/80:last-child { visibility: visible !important; position: absolute; left: 0; top: 0; width: 100%; }
        .bg-white\/80:last-child * { visibility: visible !important; }
    }
</style>
@endsection
