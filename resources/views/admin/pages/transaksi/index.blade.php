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
            <div class="flex items-center space-x-3">
                <button onclick="openModal()" class="px-4 py-2 bg-gradient-to-r from-[#825449] to-[#825449] text-white text-sm font-semibold rounded-xl shadow-lg shadow-[#825449]/30">
                    + Tambah Transaksi
                </button>
            </div>
        </div>
    </div>

    <!-- Transaksi Table -->
    <div class="bg-white/80 backdrop-blur-xl rounded-2xl shadow-lg p-6 border border-gray-100">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-gray-200">
                        <th class="text-left py-4 px-4 font-semibold text-gray-700">Nama</th>
                        <th class="text-left py-4 px-4 font-semibold text-gray-700">Layanan</th>
                        <th class="text-left py-4 px-4 font-semibold text-gray-700">Lokasi</th>
                        <th class="text-left py-4 px-4 font-semibold text-gray-700">Tanggal</th>
                        <th class="text-left py-4 px-4 font-semibold text-gray-700">Status Pesanan</th>
                        <th class="text-left py-4 px-4 font-semibold text-gray-700">Pembayaran</th>
                        <th class="text-left py-4 px-4 font-semibold text-gray-700">Aksi</th>
                        <th class="text-left py-4 px-4 font-semibold text-gray-700">Karyawan</th>
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
                            <td class="py-4 px-4 text-gray-600">
                                @if($transaksi->lokasi === 'tempat')
                                    <span class="font-medium text-gray-800">Di Tempat</span>
                                @else
                                    <span class="font-medium text-gray-800">Di Rumah</span>
                                @endif
                            </td>
                            <td class="py-4 px-4 text-gray-600">
                                {{ \Carbon\Carbon::parse($transaksi->tanggal)->format('d/m/Y') }}
                            </td>
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
                                <form action="{{ route('admin.transaksi.update', $transaksi->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <select name="status_pembayaran" onchange="this.form.submit()" class="w-full px-3 py-1.5 bg-gray-50/50 border border-gray-200 rounded-xl text-xs font-medium focus:outline-none focus:ring-2 focus:ring-[#825449]/20 focus:border-[#825449] transition-all cursor-pointer hover:bg-white
                                        @if($transaksi->status_pembayaran === 'belum_bayar') text-red-700 font-bold @else text-green-700 font-bold @endif">
                                        <option value="belum_bayar" {{ $transaksi->status_pembayaran === 'belum_bayar' ? 'selected' : '' }}>Belum Bayar</option>
                                        <option value="lunas" {{ $transaksi->status_pembayaran === 'lunas' ? 'selected' : '' }}>Lunas</option>
                                    </select>
                                </form>
                            </td>
                            <td class="py-4 px-4">
                                <form action="{{ route('admin.transaksi.update', $transaksi->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <select name="status" onchange="this.form.submit()" {{ $transaksi->status === 'selesai' ? 'disabled' : '' }} class="w-full px-3 py-1.5 bg-gray-50/50 border border-gray-200 rounded-xl text-xs font-medium text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#825449]/20 focus:border-[#825449] transition-all cursor-pointer hover:bg-white disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:bg-gray-50/50">
                                        <option value="pending" {{ $transaksi->status === 'pending' ? 'selected' : '' }}>Menunggu</option>
                                        <option value="dikerjakan" {{ $transaksi->status === 'dikerjakan' ? 'selected' : '' }}>Proses</option>
                                        <option value="selesai" {{ $transaksi->status === 'selesai' ? 'selected' : '' }}>Selesai</option>
                                    </select>
                                </form>
                                <a href="{{ route('admin.transaksi.show', $transaksi->id) }}" class="inline-block mt-2 w-full px-3 py-1.5 bg-blue-50 text-blue-600 border border-blue-200 rounded-xl text-xs font-bold hover:bg-blue-100 transition-colors text-center">
                                    <i class="fa-solid fa-circle-info me-1"></i> Detail
                                </a>
                            </td>
                            <td class="py-4 px-4 text-gray-600">
                                <form action="{{ route('admin.transaksi.update', $transaksi->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <select name="karyawan_id" onchange="this.form.submit()" class="w-full px-3 py-1.5 bg-gray-50/50 border border-gray-200 rounded-xl text-xs font-medium text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#825449]/20 focus:border-[#825449] transition-all cursor-pointer hover:bg-white">
                                        <option value="">Pilih Karyawan</option>
                                        @foreach(\App\Models\Karyawan::all() as $karyawan)
                                            <option value="{{ $karyawan->id }}"
                                                {{ $transaksi->karyawan_id == $karyawan->id ? 'selected' : '' }}>
                                                {{ $karyawan->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </form>
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

    <!-- Modal Tambah Transaksi -->
    <div id="transaksiModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm hidden items-center justify-center z-50">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-2xl mx-4 max-h-[90vh] overflow-y-auto">
            <div class="p-6 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <h2 class="text-2xl font-bold text-gray-800">Tambah Transaksi</h2>
                    <button onclick="closeModal()" class="text-gray-500 hover:text-gray-700">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
            <form action="{{ route('admin.transaksi.store') }}" method="POST" class="p-6 space-y-4">
                @csrf
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nama</label>
                        <input type="text" name="nama" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#825449]">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Jenis Kelamin</label>
                        <select name="jenis_kelamin" required class="w-full px-4 py-2 bg-gray-50/50 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#825449]/20 focus:border-[#825449] transition-all cursor-pointer">
                            <option value="">-- Pilih --</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">No. Telepon</label>
                        <input type="tel" name="telepon" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#825449]">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Layanan</label>
                        <select name="layanan_id" required class="w-full px-4 py-2 bg-gray-50/50 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#825449]/20 focus:border-[#825449] transition-all cursor-pointer">
                            <option value="">-- Pilih Layanan --</option>
                            @foreach(\App\Models\Layanan::all() as $layanan)
                                <option value="{{ $layanan->id }}">{{ $layanan->nama }} - Rp {{ number_format($layanan->harga, 0, ',', '.') }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Karyawan</label>
                        <select name="karyawan_id" required class="w-full px-4 py-2 bg-gray-50/50 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#825449]/20 focus:border-[#825449] transition-all cursor-pointer">
                            <option value="">-- Pilih Karyawan --</option>
                            @foreach(\App\Models\Karyawan::all() as $karyawan)
                                <option value="{{ $karyawan->id }}">
                                    {{ $karyawan->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <input type="hidden" name="lokasi" value="tempat">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Jam</label>
                        <input type="time" name="jam" id="jam_input" onchange="validateTime()" required min="09:00" max="23:00" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#825449]">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal</label>
                        <input type="date" name="tanggal" id="tanggal_input" onchange="validateTime()" required min="{{ date('Y-m-d') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#825449]">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Catatan</label>
                    <textarea name="catatan" rows="2" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#825449]" placeholder="Catatan tambahan (opsional)"></textarea>
                </div>
                <div class="flex justify-end space-x-3 pt-4">
                    <button type="button" onclick="closeModal()" class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50">Batal</button>
                    <button type="submit" class="px-6 py-2 bg-gradient-to-r from-[#825449] to-[#825449] text-white rounded-lg hover:shadow-lg">Simpan</button>
                </div>
            </form>
        </div>
    </div>



    <script>
        function openModal() {
            document.getElementById('transaksiModal').classList.remove('hidden');
            document.getElementById('transaksiModal').classList.add('flex');
        }

        function closeModal() {
            document.getElementById('transaksiModal').classList.add('hidden');
            document.getElementById('transaksiModal').classList.remove('flex');
        }



        function validateTime() {
            const tanggalInput = document.getElementById('tanggal_input');
            const jamInput = document.getElementById('jam_input');
            const today = new Date().toISOString().split('T')[0];
            const now = new Date();
            const currentHour = String(now.getHours()).padStart(2, '0');
            const currentMinute = String(now.getMinutes()).padStart(2, '0');
            const currentTime = `${currentHour}:${currentMinute}`;
            
            if (tanggalInput.value === today) {
                const minTime = currentTime > '09:00' ? currentTime : '09:00';
                jamInput.min = minTime;

                if (jamInput.value && jamInput.value < minTime) {
                    jamInput.value = '';
                }
            } else {
                jamInput.min = '09:00';
                if (jamInput.value && jamInput.value < '09:00') {
                    jamInput.value = '';
                }
            }

            if (jamInput.value && jamInput.value > '23:00') {
                jamInput.value = '';
            }
        }
    </script>
</div>
@endsection
