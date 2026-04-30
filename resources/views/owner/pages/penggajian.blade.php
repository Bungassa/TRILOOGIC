@extends('owner.layouts.app')

@section('content')
<div class="space-y-8">
    <!-- Page Header -->
    <div class="bg-white/80 backdrop-blur-xl rounded-2xl shadow-lg p-6 border border-gray-100">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-800 tracking-tight">Data Penggajian</h1>
                <p class="text-gray-500 mt-1">Kelola dan pantau pengeluaran gaji karyawan</p>
            </div>
            <button onclick="openModal()" class="px-4 py-2 bg-gradient-to-r from-[#AB6F6E] to-[#C48989] text-white text-sm font-semibold rounded-xl shadow-lg shadow-[#AB6F6E]/30">
                + Input Gaji
            </button>
        </div>
    </div>

    <!-- Penggajian Table -->
    <div class="bg-white/80 backdrop-blur-xl rounded-2xl shadow-lg p-6 border border-gray-100">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-gray-200">
                        <th class="text-left py-4 px-4 font-semibold text-gray-700">Karyawan</th>
                        <th class="text-left py-4 px-4 font-semibold text-gray-700">Periode</th>
                        <th class="text-left py-4 px-4 font-semibold text-gray-700">Gaji Pokok</th>
                        <th class="text-left py-4 px-4 font-semibold text-gray-700">Bonus</th>
                        <th class="text-left py-4 px-4 font-semibold text-gray-700">Potongan</th>
                        <th class="text-left py-4 px-4 font-semibold text-gray-700">Total Diterima</th>
                        <th class="text-left py-4 px-4 font-semibold text-gray-700">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($penggajians as $gaji)
                        <tr class="border-b border-gray-100 hover:bg-gray-50/50 transition-colors">
                            <td class="py-4 px-4">
                                <div class="font-medium text-gray-800">{{ $gaji->karyawan->nama }}</div>
                                <div class="text-xs text-gray-500">{{ $gaji->karyawan->terapi_yang_dilakukan }}</div>
                            </td>
                            <td class="py-4 px-4 text-gray-600">
                                {{ $gaji->bulan }} {{ $gaji->tahun }}
                            </td>
                            <td class="py-4 px-4 text-gray-600">Rp {{ number_format($gaji->gaji_pokok, 0, ',', '.') }}</td>
                            <td class="py-4 px-4 text-green-600 font-medium">+ Rp {{ number_format($gaji->bonus, 0, ',', '.') }}</td>
                            <td class="py-4 px-4 text-red-600 font-medium">- Rp {{ number_format($gaji->potongan, 0, ',', '.') }}</td>
                            <td class="py-4 px-4 font-bold text-gray-800">Rp {{ number_format($gaji->total_gaji, 0, ',', '.') }}</td>
                            <td class="py-4 px-4">
                                <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider
                                    @if($gaji->status_pembayaran === 'dibayar') bg-green-100 text-green-700
                                    @else bg-yellow-100 text-yellow-700
                                    @endif">
                                    {{ $gaji->status_pembayaran }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-12 text-center text-gray-500">
                                Belum ada data penggajian
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Input Gaji -->
    <div id="gajiModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm hidden items-center justify-center z-50">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-xl mx-4">
            <div class="p-6 border-b border-gray-200">
                <h2 class="text-2xl font-bold text-gray-800">Input Gaji Karyawan</h2>
            </div>
            <form action="{{ route('owner.penggajian.store') }}" method="POST" class="p-6 space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Pilih Karyawan</label>
                    <select name="karyawan_id" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C48989]">
                        <option value="">-- Pilih --</option>
                        @foreach(\App\Models\Karyawan::all() as $k)
                            <option value="{{ $k->id }}">{{ $k->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Bulan</label>
                        <select name="bulan" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#C48989]">
                            @foreach(['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'] as $b)
                                <option value="{{ $b }}">{{ $b }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Tahun</label>
                        <input type="number" name="tahun" value="{{ date('Y') }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Gaji Pokok</label>
                    <input type="number" name="gaji_pokok" required class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Bonus</label>
                        <input type="number" name="bonus" value="0" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Potongan</label>
                        <input type="number" name="potongan" value="0" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                    </div>
                </div>
                <div class="flex justify-end space-x-3 pt-4">
                    <button type="button" onclick="closeModal()" class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50">Batal</button>
                    <button type="submit" class="px-6 py-2 bg-gradient-to-r from-[#AB6F6E] to-[#C48989] text-white rounded-lg">Simpan Gaji</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openModal() {
            document.getElementById('gajiModal').classList.remove('hidden');
            document.getElementById('gajiModal').classList.add('flex');
        }
        function closeModal() {
            document.getElementById('gajiModal').classList.add('hidden');
            document.getElementById('gajiModal').classList.remove('flex');
        }
    </script>
</div>
@endsection
