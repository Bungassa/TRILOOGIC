@extends('admin.layouts.app')

@section('content')
<div class="space-y-8">
    <!-- Page Header -->
    <div class="bg-white/80 backdrop-blur-xl rounded-2xl shadow-lg p-6 border border-gray-100">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-800 tracking-tight">Data Transaksi</h1>
                <p class="text-gray-500 mt-1">Kelola data transaksi pemesanan layanan</p>
            </div>
            </div>
        </div>
    </div>

    <!-- Transaksi Table -->
    <div class="bg-white/80 backdrop-blur-xl rounded-2xl shadow-lg p-6 border border-gray-100">
        <div class="overflow-x-auto">
            <table id="transaksiTable" class="w-full text-sm text-left">
                <thead>
                    <tr class="border-b border-gray-200">
                        <th class="text-left py-4 px-4 font-semibold text-gray-700">Nama</th>
                        <th class="text-left py-4 px-4 font-semibold text-gray-700">Lokasi</th>
                        <th class="text-left py-4 px-4 font-semibold text-gray-700">Tanggal</th>
                        <th class="text-left py-4 px-4 font-semibold text-gray-700">Pembayaran</th>
                        <th class="text-left py-4 px-4 font-semibold text-gray-700">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($transaksis as $transaksi)
                        <tr class="border-b border-gray-100 hover:bg-gray-50/50 transition-colors">
                            <td class="py-4 px-4">
                                <div class="font-medium text-gray-800">{{ $transaksi->nama }}</div>
                            </td>
                            <td class="py-4 px-4 text-gray-600">
                                @if($transaksi->lokasi === 'tempat')
                                    <span class="font-medium text-gray-800">Di Tempat</span>
                                @else
                                    <span class="font-medium text-gray-800">Di Rumah</span>
                                @endif
                            </td>
                            <td class="py-4 px-4 text-gray-600">
                                <time datetime="{{ \Carbon\Carbon::parse($transaksi->tanggal)->format('Y-m-d') }}">{{ \Carbon\Carbon::parse($transaksi->tanggal)->format('d/m/Y') }}</time>
                            </td>
                            <td class="py-4 px-4">
                                <form action="{{ route('admin.transaksi.update', $transaksi->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <select name="status_pembayaran" onchange="this.form.submit()" {{ $transaksi->status_pembayaran === 'lunas' ? 'disabled' : '' }} class="w-full px-3 py-1.5 bg-gray-50/50 border border-gray-200 rounded-xl text-xs font-medium focus:outline-none focus:ring-2 focus:ring-[#825449]/20 focus:border-[#825449] transition-all cursor-pointer hover:bg-white disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:bg-gray-50/50
                                        @if($transaksi->status_pembayaran === 'belum_bayar') text-red-700 font-bold @else text-green-700 font-bold @endif">
                                        <option value="belum_bayar" {{ $transaksi->status_pembayaran === 'belum_bayar' ? 'selected' : '' }}>Belum Bayar</option>
                                        <option value="lunas" {{ $transaksi->status_pembayaran === 'lunas' ? 'selected' : '' }}>Lunas</option>
                                    </select>
                                </form>
                            </td>
                            <td class="py-4 px-4">
                                <a href="{{ route('admin.transaksi.show', $transaksi->id) }}" class="inline-block mt-2 w-full px-3 py-1.5 bg-blue-50 text-blue-600 border border-blue-200 rounded-xl text-xs font-bold hover:bg-blue-100 transition-colors text-center">
                                    <i class="fa-solid fa-circle-info me-1"></i> Detail
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-12 text-center text-gray-500">
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
            if (document.getElementById("transaksiTable")) {
                new simpleDatatables.DataTable("#transaksiTable", {
                    searchable: false,
                    fixedHeight: true,
                    perPage: 10,
                    perPageSelect: false,
                    columns: [
                        { select: 0, sortable: false },
                        { select: 1, sortable: false },
                        { select: 2, type: "date", format: "DD/MM/YYYY" },
                        { select: 4, sortable: false }
                    ],
                    labels: {
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
