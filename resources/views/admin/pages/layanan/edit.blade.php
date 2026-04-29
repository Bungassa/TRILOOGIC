@extends('admin.layouts.app')

@section('content')
<div class="space-y-8">
    <!-- Page Header -->
    <div class="bg-white/80 backdrop-blur-xl rounded-2xl shadow-lg p-6 border border-gray-100">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <a href="{{ route('admin.layanan') }}" class="text-gray-500 hover:text-gray-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                </a>
                <div>
                    <h1 class="text-3xl font-bold text-gray-800 tracking-tight">Edit Layanan</h1>
                    <p class="text-gray-500 mt-1">Edit data layanan</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Form Card -->
    <div class="bg-white/80 backdrop-blur-xl rounded-2xl shadow-lg p-8 border border-gray-100">
        <form action="{{ route('admin.layanan.update', $layanan->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Nama Layanan -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nama Layanan</label>
                    <input type="text" name="nama" value="{{ $layanan->nama }}" required
                           class="w-full px-4 py-3 border border-[#E6B6B5] rounded-xl bg-white/80 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-[#C48989]/50 focus:border-[#C48989] transition-all duration-200"
                           placeholder="Masukkan nama layanan">
                </div>

                <!-- Deskripsi -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                    <textarea name="deskripsi" rows="3" required
                              class="w-full px-4 py-3 border border-[#E6B6B5] rounded-xl bg-white/80 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-[#C48989]/50 focus:border-[#C48989] transition-all duration-200 resize-none"
                              placeholder="Masukkan deskripsi layanan">{{ $layanan->deskripsi }}</textarea>
                </div>

                <!-- Harga -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Harga</label>
                    <input type="number" name="harga" step="0.01" value="{{ $layanan->harga }}" required
                           class="w-full px-4 py-3 border border-[#E6B6B5] rounded-xl bg-white/80 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-[#C48989]/50 focus:border-[#C48989] transition-all duration-200"
                           placeholder="Masukkan harga">
                </div>

                <!-- Gambar (Opsional) -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Gambar (Opsional)</label>
                    <input type="file" name="gambar" accept="image/*"
                           class="w-full px-4 py-3 border border-[#E6B6B5] rounded-xl bg-white/80 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-[#C48989]/50 focus:border-[#C48989] transition-all duration-200">
                    @if($layanan->gambar)
                        <p class="mt-2 text-sm text-gray-500">Gambar saat ini: <span class="text-[#AB6F6E]">{{ $layanan->gambar }}</span></p>
                    @endif
                </div>
            </div>

            <!-- Submit Buttons -->
            <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200">
                <a href="{{ route('admin.layanan') }}"
                   class="px-6 py-3 text-sm font-medium text-gray-600 hover:text-gray-800 rounded-xl hover:bg-gray-100 transition-all duration-200">
                    Batal
                </a>
                <button type="submit"
                        class="px-6 py-3 bg-gradient-to-r from-[#AB6F6E] to-[#C48989] text-white text-sm font-semibold rounded-xl shadow-lg shadow-[#AB6F6E]/30 hover:shadow-xl hover:shadow-[#AB6F6E]/40 transition-all duration-200">
                    Update Layanan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
