@extends('admin.layouts.app')

@section('content')
<div class="space-y-8">
    <!-- Page Header -->
    <div class="bg-white/80 backdrop-blur-xl rounded-2xl shadow-lg p-6 border border-gray-100">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-800 tracking-tight">Daftar Pesanan</h1>
                <p class="text-gray-500 mt-1">Kelola data transaksi pemesanan layanan</p>
            </div>
            <div class="flex items-center space-x-3">
                <form action="{{ route('admin.pesanan') }}" method="GET" class="flex items-center">
                    <input type="date" name="date" value="{{ $selectedDate ?? \Carbon\Carbon::today()->toDateString() }}" class="px-4 py-2 border border-gray-200 rounded-xl focus:ring-[#825449] focus:border-[#825449] text-sm" onchange="this.form.submit()">
                </form>
            </div>
        </div>
    </div>

    <!-- Transaksi Table -->
    <div class="bg-white/80 backdrop-blur-xl rounded-2xl shadow-lg p-6 border border-gray-100">
        <div class="overflow-x-auto">
            <table id="transaksiAktifTable" class="w-full text-sm text-left">
                <thead>
                    <tr class="border-b border-gray-200">
                        <th class="py-4 px-4 text-left font-semibold text-gray-600">Pelanggan</th>
                        <th class="py-4 px-4 text-left font-semibold text-gray-600">Layanan</th>
                        <th class="py-4 px-4 text-left font-semibold text-gray-600">Status Pesanan</th>
                        <th class="py-4 px-4 text-left font-semibold text-gray-600">Pilih Karyawan</th>
                        <th class="py-4 px-4 text-center font-semibold text-gray-600">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($transaksis as $transaksi)
                        <tr class="border-b border-gray-100 hover:bg-gray-50/50 transition-colors">
                            <td class="py-4 px-4">
                                <div class="font-medium text-gray-800">{{ $transaksi->nama }}</div>
                            </td>
                            <td class="py-4 px-4 text-gray-600">
                                @if($transaksi->layanan_id)
                                    {{ $transaksi->layanan->nama }}
                                    @else
                                    Walk-in
                                    @endif
                            </td>
                            <td class="py-4 px-4">
                                <span class="px-3 py-1 rounded-full text-xs font-semibold
                                    @if($transaksi->status === 'menunggu') bg-yellow-100 text-yellow-700
                                    @elseif($transaksi->status === 'proses') bg-blue-100 text-blue-700
                                    @elseif($transaksi->status === 'selesai') bg-green-100 text-green-700
                                    @elseif($transaksi->status === 'dibatalkan') bg-red-100 text-red-700
                                    @endif">
                                    {{ $transaksi->status == 'menunggu' ? 'Menunggu' : ($transaksi->status == 'proses' ? 'Proses' : ($transaksi->status == 'selesai' ? 'Selesai' : 'Dibatalkan')) }}
                                </span>
                            </td>
                            <td class="py-4 px-4 text-gray-600">
                                <form action="{{ route('admin.transaksi.update', $transaksi->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <select name="karyawan_id" onchange="this.form.submit()" class="w-full px-3 py-1.5 bg-gray-50/50 border border-gray-200 rounded-xl text-xs font-medium text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#825449]/20 focus:border-[#825449] transition-all cursor-pointer hover:bg-white" {{ in_array($transaksi->status, ['proses', 'selesai']) ? 'disabled' : '' }}>
                                        <option value="">Pilih Karyawan</option>
                                        @foreach(\App\Models\Karyawan::where('jenis_kelamin', $transaksi->jenis_kelamin)->whereDoesntHave('transaksis', function($q) use ($transaksi) { $q->where('tanggal', $transaksi->tanggal)->where('jam', $transaksi->jam)->whereNotIn('status', ['dibatalkan', 'selesai'])->where('id', '!=', $transaksi->id); })->get() as $karyawan)
                                            <option value="{{ $karyawan->id }}"
                                                {{ $transaksi->karyawan_id == $karyawan->id ? 'selected' : '' }}>
                                                {{ $karyawan->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </form>
                            </td>
                            <td class="py-4 px-4 text-center">
                                <a href="{{ route('admin.transaksi.show', $transaksi->id) }}" class="inline-block w-full px-3 py-1.5 bg-blue-50 text-blue-600 border border-blue-200 rounded-xl text-xs font-bold hover:bg-blue-100 transition-colors text-center">
                                    <i class="fa-solid fa-circle-info me-1"></i> Detail
                                </a>
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


    
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" type="text/javascript"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            if (document.getElementById("transaksiAktifTable")) {
                new simpleDatatables.DataTable("#transaksiAktifTable", {
                    searchable: false,
                    fixedHeight: true,
                    perPage: 10,
                    perPageSelect: false,
                    labels: {
                        placeholder: "Cari...",
                        perPage: "data per halaman",
                        noRows: "Data tidak ditemukan",
                        info: "Menampilkan {start} sampai {end} dari {rows} data",
                    }
                });
            }
        });
    </script>
    <style>
        .dataTable-wrapper {
            font-family: 'Inter', sans-serif;
        }
        .dataTable-input {
            border-radius: 0.5rem;
            border-color: #e5e7eb;
            padding: 0.5rem 1rem;
        }
        .dataTable-selector {
            border-radius: 0.5rem;
            border-color: #e5e7eb;
            padding: 0.5rem 2rem 0.5rem 1rem;
        }
        .dataTable-table > thead > tr > th {
            border-bottom: 1px solid #e5e7eb;
        }
        .dataTable-sorter::before, .dataTable-sorter::after {
            opacity: 0.4;
        }
    </style>
</div>
@endsection
