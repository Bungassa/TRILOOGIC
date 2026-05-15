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
                    <h1 class="text-3xl font-bold text-gray-800 tracking-tight">Edit Karyawan</h1>
                    <p class="text-gray-500 mt-1">Ubah data karyawan: {{ $karyawan->nama }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Form Card -->
    <div class="bg-white/80 backdrop-blur-xl rounded-2xl shadow-lg p-8 border border-gray-100">
        <form action="{{ route('admin.karyawan.update', $karyawan->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Nama Lengkap -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                    <input type="text" name="nama" value="{{ old('nama', $karyawan->nama) }}" required
                           class="w-full px-4 py-3 border @error('nama') border-red-500 @else border-[#E6B6B5] @enderror rounded-xl bg-white/80 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-[#C48989]/50 focus:border-[#C48989] transition-all duration-200"
                           placeholder="Masukkan nama lengkap">
                    @error('nama')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Umur -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Umur</label>
                    <input type="number" name="umur" value="{{ old('umur', $karyawan->umur) }}" required min="1"
                           class="w-full px-4 py-3 border @error('umur') border-red-500 @else border-[#E6B6B5] @enderror rounded-xl bg-white/80 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-[#C48989]/50 focus:border-[#C48989] transition-all duration-200"
                           placeholder="Masukkan umur">
                    @error('umur')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Jenis Kelamin -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Jenis Kelamin</label>
                    <select name="jenis_kelamin" required
                            class="w-full px-4 py-3 border @error('jenis_kelamin') border-red-500 @else border-[#E6B6B5] @enderror rounded-xl bg-white/80 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-[#C48989]/50 focus:border-[#C48989] transition-all duration-200">
                        <option value="">Pilih jenis kelamin</option>
                        <option value="L" {{ (old('jenis_kelamin') ?? $karyawan->jenis_kelamin) === 'L' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="P" {{ (old('jenis_kelamin') ?? $karyawan->jenis_kelamin) === 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Status -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                    <select name="status" required
                            class="w-full px-4 py-3 border @error('status') border-red-500 @else border-[#E6B6B5] @enderror rounded-xl bg-white/80 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-[#C48989]/50 focus:border-[#C48989] transition-all duration-200">
                        <option value="aktif" {{ (old('status') ?? $karyawan->status) === 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="nonaktif" {{ (old('status') ?? $karyawan->status) === 'nonaktif' || (old('status') ?? $karyawan->status) === 'non-aktif' ? 'selected' : '' }}>Non-Aktif</option>
                    </select>
                    @error('status')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
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
                    Update Karyawan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
