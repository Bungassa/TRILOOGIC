@extends('owner.layouts.app')

@section('content')
<div class="space-y-8">
    <!-- Page Header -->
    <div class="bg-white/80 backdrop-blur-xl rounded-2xl shadow-lg p-6 border border-gray-100">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-800 tracking-tight">Laporan Transaksi</h1>
                <p class="text-gray-500 mt-1">Lihat dan unduh laporan transaksi</p>
            </div>
            <div class="flex items-center space-x-3">
                <button onclick="window.print()" class="px-4 py-2 bg-gradient-to-r from-[#AB6F6E] to-[#C48989] text-white text-sm font-semibold rounded-xl shadow-lg shadow-[#AB6F6E]/30">
                    Cetak Laporan
                </button>
            </div>
        </div>
    </div>

    <!-- Report Table -->
    <div class="bg-white/80 backdrop-blur-xl rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="p-8">
            <div class="text-center mb-10">
                <h2 class="text-2xl font-bold text-gray-800 uppercase tracking-wider">Laporan Pendapatan Layanan</h2>
                <p class="text-gray-500">Rekapitulasi transaksi lunas per tanggal {{ date('d F Y') }}</p>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-gray-50 border-y border-gray-200">
                            <th class="py-4 px-4 text-left font-bold text-gray-700">No</th>
                            <th class="py-4 px-4 text-left font-bold text-gray-700">Pelanggan</th>
                            <th class="py-4 px-4 text-left font-bold text-gray-700">Layanan</th>
                            <th class="py-4 px-4 text-left font-bold text-gray-700">Tanggal</th>
                            <th class="py-4 px-4 text-right font-bold text-gray-700">Total Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($transaksis as $index => $transaksi)
                        <tr class="border-b border-gray-100 hover:bg-gray-50/50 transition-colors">
                            <td class="py-4 px-4 text-gray-600">{{ $index + 1 }}</td>
                            <td class="py-4 px-4 font-medium text-gray-800">{{ $transaksi->nama }}</td>
                            <td class="py-4 px-4 text-gray-600">{{ $transaksi->layanan->nama }}</td>
                            <td class="py-4 px-4 text-gray-500">{{ $transaksi->created_at->format('d/m/Y H:i') }}</td>
                            <td class="py-4 px-4 text-right font-bold text-gray-800">Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="py-12 text-center text-gray-500 italic">Belum ada transaksi lunas untuk dilaporkan.</td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr class="bg-gray-50 font-bold">
                            <td colspan="4" class="py-4 px-4 text-right text-gray-700">TOTAL PENDAPATAN</td>
                            <td class="py-4 px-4 text-right text-[#AB6F6E] text-lg">Rp {{ number_format($transaksis->sum('total_harga'), 0, ',', '.') }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div class="mt-16 flex justify-between px-10">
                <div class="text-center">
                    <p class="mb-20 text-sm text-gray-500">Mengetahui,</p>
                    <p class="font-bold border-t border-gray-800 pt-2 w-48 mx-auto text-gray-800">OWNER</p>
                </div>
                <div class="text-center">
                    <p class="mb-20 text-sm text-gray-500">Dicetak pada {{ date('d/m/Y') }}</p>
                    <p class="font-bold border-t border-gray-800 pt-2 w-48 mx-auto text-gray-800">ADMIN KEUANGAN</p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    @media print {
        body * { visibility: hidden; }
        .bg-white\/80 { background: white !important; box-shadow: none !important; border: none !important; }
        .rounded-2xl { border-radius: 0 !important; }
        .shadow-lg { box-shadow: none !important; }
        .p-8 { padding: 0 !important; }
        .mt-16 { margin-top: 50px !important; }
        .overflow-hidden { overflow: visible !important; }
        
        /* Show only the report table section */
        .bg-white\/80:last-child, .bg-white\/80:last-child * { visibility: visible; }
        .bg-white\/80:last-child { position: absolute; left: 0; top: 0; width: 100%; }
        
        /* Hide buttons and header */
        .page-header, button { display: none !important; }
    }
</style>
@endsection
