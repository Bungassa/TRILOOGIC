@extends('owner.layouts.app')

@section('content')
<div class="space-y-8">
    <!-- Page Header -->
    <div class="bg-white/80 backdrop-blur-xl rounded-2xl shadow-lg p-6 border border-gray-100 mb-6">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h1 class="text-3xl font-bold text-gray-800 tracking-tight">Data Transaksi</h1>
                <p class="text-gray-500 mt-1">Pantau seluruh data transaksi pemesanan</p>
            </div>
            
            <form action="{{ route('owner.transaksi') }}" method="GET" class="flex flex-wrap items-end gap-3">
                <div>
                    <label class="block text-xs font-medium text-gray-500 mb-1">Filter Tanggal</label>
                    <input type="date" name="tanggal" value="{{ $tanggal ?? '' }}" class="px-3 py-2 border border-gray-200 rounded-xl focus:ring-[#825449] focus:border-[#825449] text-sm" onchange="this.form.submit()">
                </div>
                <!-- <div class="pb-2">
                    <span class="text-xs font-medium text-gray-400">Atau</span>
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-500 mb-1">Filter Bulan</label>
                    <input type="month" name="bulan_tahun" value="{{ $bulan_tahun ?? '' }}" class="px-3 py-2 border border-gray-200 rounded-xl focus:ring-[#825449] focus:border-[#825449] text-sm" onchange="this.form.submit()">
                </div> -->
                <a href="{{ route('owner.transaksi') }}" class="px-4 py-2 bg-gray-100 text-gray-600 text-sm font-semibold rounded-xl hover:bg-gray-200 transition-colors">
                    Reset
                </a>
            </form>
        </div>
    </div>

    <!-- Transaksi Table -->
    <div class="bg-white/80 backdrop-blur-xl rounded-2xl shadow-lg p-6 border border-gray-100">
        <div class="overflow-x-auto">
            <table id="ownerTransaksiTable" class="w-full">
                <thead>
                    <tr class="border-b border-gray-200">
                        <th class="text-left py-4 px-4 font-semibold text-gray-700">Nama</th>
                        <th class="text-left py-4 px-4 font-semibold text-gray-700 cursor-pointer hover:bg-gray-50 transition-colors" onclick="sortTable('ownerTransaksiTable', 1)">
                            <div class="flex items-center">Layanan <svg class="w-4 h-4 ml-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path></svg></div>
                        </th>
                        <th class="text-left py-4 px-4 font-semibold text-gray-700">Lokasi</th>
                        <th class="text-left py-4 px-4 font-semibold text-gray-700 cursor-pointer hover:bg-gray-50 transition-colors" onclick="sortTable('ownerTransaksiTable', 3)">
                            <div class="flex items-center">Tanggal & Jam <svg class="w-4 h-4 ml-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path></svg></div>
                        </th>
                        <th class="text-left py-4 px-4 font-semibold text-gray-700">Total Harga</th>
                        <th class="text-left py-4 px-4 font-semibold text-gray-700 cursor-pointer hover:bg-gray-50 transition-colors" onclick="sortTable('ownerTransaksiTable', 5)">
                            <div class="flex items-center">Status Pesanan <svg class="w-4 h-4 ml-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path></svg></div>
                        </th>
                        <th class="text-left py-4 px-4 font-semibold text-gray-700 cursor-pointer hover:bg-gray-50 transition-colors" onclick="sortTable('ownerTransaksiTable', 6)">
                            <div class="flex items-center">Pembayaran <svg class="w-4 h-4 ml-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path></svg></div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($transaksis as $transaksi)
                        <tr class="border-b border-gray-100 hover:bg-gray-50/50 transition-colors">
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
                            <td class="py-4 px-4 text-gray-600" data-sort="{{ \Carbon\Carbon::parse($transaksi->tanggal)->format('Y-m-d') }} {{ \Carbon\Carbon::parse($transaksi->jam)->format('H:i') }}">
                                {{ \Carbon\Carbon::parse($transaksi->tanggal)->format('d/m/Y') }}<br>
                                <span class="text-sm">{{ \Carbon\Carbon::parse($transaksi->jam)->format('H:i') }}</span>
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
                            <td colspan="7" class="py-12 text-center text-gray-500">
                                Belum ada data transaksi
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <!-- Pagination -->
        <div class="mt-6">
            {{ $transaksis->links() }}
        </div>
        </div>
    </div>
</div>

<script>
function sortTable(tableId, n) {
    var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    table = document.getElementById(tableId);
    switching = true;
    dir = "asc";
    while (switching) {
        switching = false;
        rows = table.rows;
        for (i = 1; i < (rows.length - 1); i++) {
            shouldSwitch = false;
            x = rows[i].getElementsByTagName("TD")[n];
            y = rows[i + 1].getElementsByTagName("TD")[n];
            if (!x || !y) continue;
            
            let valX = (x.getAttribute('data-sort') || x.innerText).toLowerCase().trim();
            let valY = (y.getAttribute('data-sort') || y.innerText).toLowerCase().trim();
            
            if (dir == "asc") {
                if (valX > valY) {
                    shouldSwitch = true;
                    break;
                }
            } else if (dir == "desc") {
                if (valX < valY) {
                    shouldSwitch = true;
                    break;
                }
            }
        }
        if (shouldSwitch) {
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
            switchcount++;
        } else {
            if (switchcount == 0 && dir == "asc") {
                dir = "desc";
                switching = true;
            }
        }
    }
}
</script>
@endsection
