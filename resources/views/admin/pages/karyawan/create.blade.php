@extends('admin.layouts.app')

@section('content')
<div class="space-y-8">
    <!-- Page Header -->
    <div class="bg-white/80 backdrop-blur-xl rounded-2xl shadow-lg p-6 border border-gray-100">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <a href="{{ route('admin.karyawan') }}" class="text-gray-500 hover:text-gray-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                </a>
                <div>
                    <h1 class="text-3xl font-bold text-gray-800 tracking-tight">Tambah Karyawan</h1>
                    <p class="text-gray-500 mt-1">Isi data karyawan baru</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Form Card -->
    <div class="bg-white/80 backdrop-blur-xl rounded-2xl shadow-lg p-8 border border-gray-100">
        <form action="{{ route('admin.karyawan.store') }}" method="POST" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- NIK -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">NIK</label>
                    <input type="text" name="nik" required
                           class="w-full px-4 py-3 border border-[#E6B6B5] rounded-xl bg-white/80 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-[#C48989]/50 focus:border-[#C48989] transition-all duration-200"
                           placeholder="Masukkan NIK">
                </div>

                <!-- Nama Lengkap -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                    <input type="text" name="nama" required
                           class="w-full px-4 py-3 border border-[#E6B6B5] rounded-xl bg-white/80 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-[#C48989]/50 focus:border-[#C48989] transition-all duration-200"
                           placeholder="Masukkan nama lengkap">
                </div>

                <!-- Gaji Pokok -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Gaji Pokok</label>
                    <input type="number" name="gaji_pokok" required
                           class="w-full px-4 py-3 border border-[#E6B6B5] rounded-xl bg-white/80 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-[#C48989]/50 focus:border-[#C48989] transition-all duration-200"
                           placeholder="Masukkan gaji pokok">
                </div>

                <!-- Tanggal -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Bergabung</label>
                    <input type="date" name="tanggal" required
                           class="w-full px-4 py-3 border border-[#E6B6B5] rounded-xl bg-white/80 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-[#C48989]/50 focus:border-[#C48989] transition-all duration-200">
                </div>

                <!-- Status -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                    <select name="status" required
                            class="w-full px-4 py-3 border border-[#E6B6B5] rounded-xl bg-white/80 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-[#C48989]/50 focus:border-[#C48989] transition-all duration-200">
                        <option value="">Pilih status</option>
                        <option value="aktif">Aktif</option>
                        <option value="non-aktif">Non-Aktif</option>
                        <option value="proses">Proses</option>
                        <option value="selesai">Selesai</option>
                    </select>
                </div>

                <!-- Terapi yang Dilakukan -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Terapi yang Dilakukan (Opsional)</label>
                    <textarea name="terapi_yang_dilakukan" rows="3" required
                              class="w-full px-4 py-3 border border-[#E6B6B5] rounded-xl bg-white/80 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-[#C48989]/50 focus:border-[#C48989] transition-all duration-200 resize-none"
                              placeholder="Masukkan terapi yang dilakukan"></textarea>
                </div>
            </div>

            <!-- Submit Buttons -->
            <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200">
                <a href="{{ route('admin.karyawan') }}"
                   class="px-6 py-3 text-sm font-medium text-gray-600 hover:text-gray-800 rounded-xl hover:bg-gray-100 transition-all duration-200">
                    Batal
                </a>
                <button type="submit"
                        class="px-6 py-3 bg-gradient-to-r from-[#AB6F6E] to-[#C48989] text-white text-sm font-semibold rounded-xl shadow-lg shadow-[#AB6F6E]/30 hover:shadow-xl hover:shadow-[#AB6F6E]/40 transition-all duration-200">
                    Simpan Karyawan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
