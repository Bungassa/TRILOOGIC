@extends('admin.layouts.app')

@section('content')
<div class="space-y-8">
    <!-- Page Header -->
    <div class="bg-white/80 backdrop-blur-xl rounded-2xl shadow-lg p-6 border border-gray-100">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-800 tracking-tight">Manajemen Bed</h1>
                <p class="text-gray-500 mt-1">Pantau dan kelola penempatan pelanggan di bed</p>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif
    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        
        <!-- Ruang Laki-laki -->
        <div class="bg-white/80 backdrop-blur-xl rounded-2xl shadow-lg p-6 border border-blue-100">
            <h2 class="text-xl font-bold text-blue-800 mb-6 flex items-center">
                <i class="fa-solid fa-mars mr-2"></i> Ruangan Laki-laki (4 Bed)
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @for($i = 1; $i <= 4; $i++)
                    @php $occupied = $occupiedBeds->get($i); @endphp
                    <div class="p-4 rounded-xl border {{ $occupied ? 'bg-red-50 border-red-200' : 'bg-green-50 border-green-200' }}">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="font-bold text-gray-800">Bed {{ $i }}</h3>
                            <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $occupied ? 'bg-red-100 text-red-700' : 'bg-green-100 text-green-700' }}">
                                {{ $occupied ? 'Terisi' : 'Kosong' }}
                            </span>
                        </div>
                        
                        @if($occupied)
                            <div class="text-sm text-gray-600 mb-4 space-y-1">
                                <p><span class="font-semibold">Pelanggan:</span> {{ $occupied->nama }}</p>
                                <p><span class="font-semibold">Jam:</span> {{ \Carbon\Carbon::parse($occupied->jam)->format('H:i') }}</p>
                                <p><span class="font-semibold">Layanan:</span> {{ $occupied->layanan ? $occupied->layanan->nama : 'Walk-in' }}</p>
                                <p><span class="font-semibold">Karyawan:</span> {{ $occupied->karyawan ? $occupied->karyawan->nama : '-' }}</p>
                            </div>
                            <form action="{{ route('admin.bed.release', $occupied->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin mengosongkan bed ini?');">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="w-full px-3 py-2 bg-red-100 text-red-700 rounded-lg text-sm font-semibold hover:bg-red-200 transition-colors">
                                    Kosongkan Bed
                                </button>
                            </form>
                        @else
                            <button onclick="openAssignModal('{{ $i }}', 'L')" class="w-full px-3 py-2 mt-4 bg-green-100 text-green-700 rounded-lg text-sm font-semibold hover:bg-green-200 transition-colors">
                                Isi Bed
                            </button>
                        @endif
                    </div>
                @endfor
            </div>
        </div>

        <!-- Ruang Perempuan -->
        <div class="bg-white/80 backdrop-blur-xl rounded-2xl shadow-lg p-6 border-pink-100">
            <h2 class="text-xl font-bold text-pink-800 mb-6 flex items-center">
                <i class="fa-solid fa-venus mr-2"></i> Ruangan Perempuan (4 Bed)
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @for($i = 5; $i <= 8; $i++)
                    @php $occupied = $occupiedBeds->get($i); @endphp
                    <div class="p-4 rounded-xl border {{ $occupied ? 'bg-red-50 border-red-200' : 'bg-green-50 border-green-200' }}">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="font-bold text-gray-800">Bed {{ $i }}</h3>
                            <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $occupied ? 'bg-red-100 text-red-700' : 'bg-green-100 text-green-700' }}">
                                {{ $occupied ? 'Terisi' : 'Kosong' }}
                            </span>
                        </div>
                        
                        @if($occupied)
                            <div class="text-sm text-gray-600 mb-4 space-y-1">
                                <p><span class="font-semibold">Pelanggan:</span> {{ $occupied->nama }}</p>
                                <p><span class="font-semibold">Jam:</span> {{ \Carbon\Carbon::parse($occupied->jam)->format('H:i') }}</p>
                                <p><span class="font-semibold">Layanan:</span> {{ $occupied->layanan ? $occupied->layanan->nama : 'Walk-in' }}</p>
                                <p><span class="font-semibold">Karyawan:</span> {{ $occupied->karyawan ? $occupied->karyawan->nama : '-' }}</p>
                            </div>
                            <form action="{{ route('admin.bed.release', $occupied->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin mengosongkan bed ini?');">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="w-full px-3 py-2 bg-red-100 text-red-700 rounded-lg text-sm font-semibold hover:bg-red-200 transition-colors">
                                    Kosongkan Bed
                                </button>
                            </form>
                        @else
                            <button onclick="openAssignModal('{{ $i }}', 'P')" class="w-full px-3 py-2 mt-4 bg-green-100 text-green-700 rounded-lg text-sm font-semibold hover:bg-green-200 transition-colors">
                                Isi Bed
                            </button>
                        @endif
                    </div>
                @endfor
            </div>
        </div>

    </div>
</div>

<!-- Modal Isi Bed -->
<div id="assignModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm hidden items-center justify-center z-50">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md mx-4">
        <div class="p-6 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-bold text-gray-800" id="modalTitle">Isi Bed</h2>
                <button onclick="closeAssignModal()" class="text-gray-500 hover:text-gray-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
        <form id="assignForm" method="POST" class="p-6 space-y-4">
            @csrf
            @method('PUT')
            
            <div id="maleSelectContainer" class="hidden">
                <label class="block text-sm font-medium text-gray-700 mb-2">Pilih Pelanggan (Laki-laki)</label>
                <select name="transaksi_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#825449]">
                    <option value="">Pilih Pesanan Aktif</option>
                    @foreach($maleTransactions as $tr)
                        <option value="{{ $tr->id }}">{{ $tr->nama }} - Jam {{ \Carbon\Carbon::parse($tr->jam)->format('H:i') }} ({{ $tr->layanan ? $tr->layanan->nama : 'Walk-in' }})</option>
                    @endforeach
                </select>
            </div>

            <div id="femaleSelectContainer" class="hidden">
                <label class="block text-sm font-medium text-gray-700 mb-2">Pilih Pelanggan (Perempuan)</label>
                <select name="transaksi_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#825449]">
                    <option value="">Pilih Pesanan Aktif Hari Ini</option>
                    @foreach($femaleTransactions as $tr)
                        <option value="{{ $tr->id }}">{{ $tr->nama }} - Jam {{ \Carbon\Carbon::parse($tr->jam)->format('H:i') }} ({{ $tr->layanan ? $tr->layanan->nama : 'Walk-in' }})</option>
                    @endforeach
                </select>
            </div>

            <div class="flex justify-end space-x-3 pt-4">
                <button type="button" onclick="closeAssignModal()" class="px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50">Batal</button>
                <button type="submit" class="px-4 py-2 bg-gradient-to-r from-[#825449] to-[#825449] text-white rounded-lg hover:shadow-lg">Simpan</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openAssignModal(bedId, gender) {
        document.getElementById('assignModal').classList.remove('hidden');
        document.getElementById('assignModal').classList.add('flex');
        document.getElementById('modalTitle').innerText = 'Isi Bed ' + bedId;
        
        const form = document.getElementById('assignForm');
        // Disable the inputs initially so we don't submit the wrong one
        const maleSelect = document.querySelector('#maleSelectContainer select');
        const femaleSelect = document.querySelector('#femaleSelectContainer select');

        if (gender === 'L') {
            document.getElementById('maleSelectContainer').classList.remove('hidden');
            document.getElementById('femaleSelectContainer').classList.add('hidden');
            maleSelect.disabled = false;
            femaleSelect.disabled = true;
        } else {
            document.getElementById('femaleSelectContainer').classList.remove('hidden');
            document.getElementById('maleSelectContainer').classList.add('hidden');
            femaleSelect.disabled = false;
            maleSelect.disabled = true;
        }

        form.action = `/admin/bed/${bedId}/assign`;
    }

    function closeAssignModal() {
        document.getElementById('assignModal').classList.add('hidden');
        document.getElementById('assignModal').classList.remove('flex');
    }
</script>
@endsection
