@extends('owner.layouts.app')

@section('content')
<div class="space-y-8">
    <!-- Page Header -->
    <div class="bg-white/80 backdrop-blur-xl rounded-2xl shadow-lg p-6 border border-gray-100">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-800 tracking-tight">Data Transaksi</h1>
                <p class="text-gray-500 mt-1">Pantau seluruh data transaksi pemesanan</p>
            </div>
        </div>
    </div>

    <!-- Transaksi Table -->
    <div class="bg-white/80 backdrop-blur-xl rounded-2xl shadow-lg p-6 border border-gray-100">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-gray-200">
                        <th class="text-left py-4 px-4 font-semibold text-gray-700">ID</th>
                        <th class="text-left py-4 px-4 font-semibold text-gray-700">Nama</th>
                        <th class="text-left py-4 px-4 font-semibold text-gray-700">Layanan</th>
                        <th class="text-left py-4 px-4 font-semibold text-gray-700">Lokasi</th>
                        <th class="text-left py-4 px-4 font-semibold text-gray-700">Tanggal & Jam</th>
                        <th class="text-left py-4 px-4 font-semibold text-gray-700">Total Harga</th>
                        <th class="text-left py-4 px-4 font-semibold text-gray-700">Status Pesanan</th>
                        <th class="text-left py-4 px-4 font-semibold text-gray-700">Pembayaran</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($transaksis as $transaksi)
                        <tr class="border-b border-gray-100 hover:bg-gray-50/50 transition-colors">
                            <td class="py-4 px-4 text-gray-600">#{{ $transaksi->id }}</td>
                            <td class="py-4 px-4">
                                <div class="font-medium text-gray-800">{{ $transaksi->nama }}</div>
                                <div class="text-sm text-gray-500">{{ $transaksi->telepon }}</div>
                            </td>
                            <td class="py-4 px-4 text-gray-600">
                                @if($transaksi->layanan_id)
                                    {{ $transaksi->layanan->nama }}
                                @else
                                    Walk-in
                                @endif
                            </td>
                            <td class="py-4 px-4 text-gray-600 capitalize">
                                {{ $transaksi->lokasi }}
                            </td>
                            <td class="py-4 px-4 text-gray-600">
                                {{ \Carbon\Carbon::parse($transaksi->tanggal)->format('d/m/Y') }}<br>
                                <span class="text-sm">{{ $transaksi->jam }}</span>
                            </td>
                            <td class="py-4 px-4 font-semibold text-gray-800">Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</td>
                            <td class="py-4 px-4">
                                <span class="px-3 py-1 rounded-full text-xs font-semibold
                                    @if($transaksi->status === 'pending') bg-yellow-100 text-yellow-700
                                    @elseif($transaksi->status === 'dikerjakan') bg-blue-100 text-blue-700
                                    @elseif($transaksi->status === 'selesai') bg-green-100 text-green-700
                                    @endif">
                                    {{ $transaksi->status == 'pending' ? 'Menunggu' : ($transaksi->status == 'dikerjakan' ? 'Proses' : 'Selesai') }}
                                </span>
                            </td>
                            <td class="py-4 px-4">
                                <span class="px-3 py-1 rounded-full text-xs font-semibold
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
                                Belum ada data transaksi
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
