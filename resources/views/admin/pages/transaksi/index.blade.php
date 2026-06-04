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
            <button onclick="openTambahModal()" class="px-4 py-2 bg-[#825449] text-white text-sm font-semibold rounded-xl hover:bg-[#6a443b] transition-colors flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Tambah Transaksi
            </button>
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

<!-- Modal Tambah Transaksi -->
<div id="tambahModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm hidden items-center justify-center z-50">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-2xl mx-4 max-h-[90vh] overflow-y-auto">
        <div class="p-6 border-b border-gray-200 flex items-center justify-between sticky top-0 bg-white z-10">
            <h3 class="text-xl font-bold text-gray-800">Tambah Transaksi</h3>
            <button onclick="closeTambahModal()" class="text-gray-400 hover:text-gray-600 transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>
        <form action="{{ route('admin.transaksi.store') }}" method="POST" class="p-6 space-y-4">
            @csrf
            <input type="hidden" name="user_id" id="input_user_id">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="relative">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Pelanggan</label>
                    <input type="text" name="nama" id="input_nama" autocomplete="off" required class="w-full px-4 py-2 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#825449] focus:border-transparent transition-all">
                    
                    <!-- Autocomplete dropdown -->
                    <div id="autocomplete_list" class="absolute z-50 w-full bg-white border border-gray-200 rounded-xl shadow-lg mt-1 hidden max-h-60 overflow-y-auto">
                        <!-- Items rendered by JS -->
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">No. WhatsApp</label>
                    <input type="text" name="telepon" id="input_telepon" required class="w-full px-4 py-2 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#825449] focus:border-transparent transition-all">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="input_jenis_kelamin" required class="w-full px-4 py-2 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#825449] focus:border-transparent transition-all">
                        <option value="P">Perempuan</option>
                        <option value="L">Laki-laki</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Layanan</label>
                    <select name="layanan_id" required class="w-full px-4 py-2 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#825449] focus:border-transparent transition-all">
                        @foreach($layanans as $l)
                            <option value="{{ $l->id }}">{{ $l->nama }} - Rp {{ number_format($l->harga, 0, ',', '.') }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Karyawan (Terapis)</label>
                    <select name="karyawan_id" id="input_karyawan" required class="w-full px-4 py-2 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#825449] focus:border-transparent transition-all">
                        <option value="">Pilih Karyawan</option>
                        @foreach($karyawans as $k)
                            <option value="{{ $k->id }}" data-gender="{{ $k->jenis_kelamin }}">{{ $k->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <input type="hidden" name="lokasi" value="tempat">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal</label>
                    <input type="date" name="tanggal" required min="{{ date('Y-m-d') }}" class="w-full px-4 py-2 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#825449] focus:border-transparent transition-all">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Jam (09:00 - 23:00)</label>
                    <input type="time" name="jam" required min="09:00" max="23:00" class="w-full px-4 py-2 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#825449] focus:border-transparent transition-all">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Catatan Tambahan (Opsional)</label>
                    <textarea name="catatan" rows="2" class="w-full px-4 py-2 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#825449] focus:border-transparent transition-all"></textarea>
                </div>
            </div>
            <div class="pt-4 flex gap-3">
                <button type="button" onclick="closeTambahModal()" class="flex-1 px-4 py-2 bg-gray-100 text-gray-700 rounded-xl font-semibold hover:bg-gray-200 transition-colors">Batal</button>
                <button type="submit" class="flex-1 px-4 py-2 bg-[#825449] text-white rounded-xl font-semibold hover:bg-[#6a443b] transition-colors">Simpan Pesanan</button>
            </div>
        </form>
    </div>
</div>

    <div id="users_data" data-users="{{ json_encode($users) }}" class="hidden"></div>
<script>
    function openTambahModal() {
        document.getElementById('tambahModal').classList.remove('hidden');
        document.getElementById('tambahModal').classList.add('flex');
    }
    function closeTambahModal() {
        document.getElementById('tambahModal').classList.add('hidden');
        document.getElementById('tambahModal').classList.remove('flex');
    }

    // Validasi jam operasional
    const inputJam = document.querySelector('input[name="jam"]');
    if (inputJam) {
        inputJam.addEventListener('change', function() {
            const time = this.value;
            if (time < '09:00' || time > '23:00') {
                this.value = '';
                Swal.fire({
                    icon: 'error',
                    title: 'Waktu Tidak Valid',
                    text: 'Jam operasional kami adalah 09:00 - 23:00',
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true
                });
            }
        });
    }

    // Data user dari controller lewat tag html
    const usersDataElement = document.getElementById('users_data');
    const usersData = usersDataElement ? JSON.parse(usersDataElement.getAttribute('data-users')) : [];
    const inputNama = document.getElementById('input_nama');
    const autocompleteList = document.getElementById('autocomplete_list');
    const inputJenisKelamin = document.getElementById('input_jenis_kelamin');
    const inputKaryawan = document.getElementById('input_karyawan');
    
    function filterKaryawan() {
        const gender = inputJenisKelamin.value;
        const options = inputKaryawan.options;
        for (let i = 1; i < options.length; i++) {
            if (options[i].getAttribute('data-gender') === gender) {
                options[i].style.display = '';
                options[i].disabled = false;
            } else {
                options[i].style.display = 'none';
                options[i].disabled = true;
            }
        }
        inputKaryawan.value = '';
    }

    inputJenisKelamin.addEventListener('change', filterKaryawan);

    inputNama.addEventListener('input', function() {
        let val = this.value;
        autocompleteList.innerHTML = '';
        
        // Cek syarat minimal 3 huruf
        if (!val || val.length < 3) {
            autocompleteList.classList.add('hidden');
            document.getElementById('input_user_id').value = '';
            return;
        }
        
        // Filter nama yang cocok
        const matches = usersData.filter(user => user.name.toLowerCase().includes(val.toLowerCase()));
        
        if (matches.length > 0) {
            autocompleteList.classList.remove('hidden');
            
            matches.forEach(user => {
                let item = document.createElement('div');
                item.className = 'px-4 py-2 cursor-pointer hover:bg-gray-100 border-b border-gray-100 text-sm';
                item.innerHTML = `<div class="font-medium text-gray-800">${user.name}</div><div class="text-xs text-gray-500">${user.phone || '-'}</div>`;
                
                item.addEventListener('click', function() {
                    inputNama.value = user.name;
                    document.getElementById('input_telepon').value = user.phone || '';
                    if (user.jenis_kelamin) {
                        inputJenisKelamin.value = user.jenis_kelamin;
                        filterKaryawan();
                    }
                    document.getElementById('input_user_id').value = user.id;
                    autocompleteList.classList.add('hidden');
                });
                
                autocompleteList.appendChild(item);
            });
        } else {
            autocompleteList.classList.add('hidden');
            document.getElementById('input_user_id').value = '';
        }
    });

    // Sembunyikan list saat klik di luar
    document.addEventListener('click', function(e) {
        if (e.target !== inputNama && e.target !== autocompleteList) {
            autocompleteList.classList.add('hidden');
        }
    });
    
    // Inisialisasi filter awal
    filterKaryawan();
</script>
@endsection
