@extends('admin.layouts.app')

@section('content')
<div class="space-y-8">
    <!-- Page Header -->
    <div class="bg-white/80 backdrop-blur-xl rounded-2xl shadow-lg p-6 border border-gray-100">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-800 tracking-tight">Input Absensi Karyawan</h1>
                <p class="text-gray-500 mt-1">Tambah data kehadiran karyawan</p>
            </div>
            <a href="{{ route('admin.absensi') }}" 
               class="px-4 py-2 text-sm font-medium text-gray-600 hover:text-gray-800 rounded-xl hover:bg-gray-100 transition-all duration-200">
                Kembali
            </a>
        </div>
    </div>

    <!-- Form Card -->
    <div class="bg-white/80 backdrop-blur-xl rounded-2xl shadow-lg p-8 border border-gray-100">
        <form action="{{ route('admin.absensi.store') }}" method="POST" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Nama Karyawan -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nama Karyawan</label>
                    <select name="karyawan_id" required
                            class="w-full px-4 py-3 border border-[#E6B6B5] rounded-xl bg-white/80 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-[#C48989]/50 focus:border-[#C48989] transition-all duration-200">
                        <option value="">Pilih Karyawan</option>
                        @foreach($karyawans as $karyawan)
                            <option value="{{ $karyawan->id }}">{{ $karyawan->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Tanggal -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Kehadiran</label>
                    <input type="date" name="tanggal" required
                           class="w-full px-4 py-3 border border-[#E6B6B5] rounded-xl bg-white/80 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-[#C48989]/50 focus:border-[#C48989] transition-all duration-200">
                </div>
            </div>

            <!-- Submit Buttons -->
            <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200">
                <a href="{{ route('admin.absensi') }}"
                   class="px-6 py-3 text-sm font-medium text-gray-600 hover:text-gray-800 rounded-xl hover:bg-gray-100 transition-all duration-200">
                    Batal
                </a>
                <button type="submit"
                        class="px-6 py-3 bg-gradient-to-r from-[#AB6F6E] to-[#C48989] text-white text-sm font-semibold rounded-xl shadow-lg shadow-[#AB6F6E]/30 hover:shadow-xl hover:shadow-[#AB6F6E]/40 transition-all duration-200">
                    Simpan Absensi
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
