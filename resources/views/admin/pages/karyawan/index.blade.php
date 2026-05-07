@extends('admin.layouts.app')

@section('content')
<div class="space-y-8">
    <!-- Page Header -->
    <div class="bg-white/80 backdrop-blur-xl rounded-2xl shadow-lg p-6 border border-gray-100">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-800 tracking-tight">Data Karyawan</h1>
                <p class="text-gray-500 mt-1">Kelola data karyawan</p>
            </div>
            <div class="flex items-center space-x-3">
                <a href="{{ route('admin.karyawan.create') }}" class="px-4 py-2 bg-gradient-to-r from-[#AB6F6E] to-[#C48989] text-white text-sm font-semibold rounded-xl shadow-lg shadow-[#AB6F6E]/30">
                    + Tambah Karyawan
                </a>
            </div>
        </div>
    </div>

    <!-- Karyawan Table -->
    <div class="bg-white/80 backdrop-blur-xl rounded-2xl shadow-lg border border-gray-100">
        <div class="p-6">
            @if(session('success'))
                <div class="mb-4 px-4 py-3 bg-green-100 border border-green-200 text-green-700 rounded-xl">
                    {{ session('success') }}
                </div>
            @endif

            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-gray-200">
                            <th class="text-left py-4 px-4 text-sm font-semibold text-gray-700">No</th>
                            <th class="text-left py-4 px-4 text-sm font-semibold text-gray-700">Nama</th>
                            <th class="text-left py-4 px-4 text-sm font-semibold text-gray-700">Umur</th>
                            <th class="text-left py-4 px-4 text-sm font-semibold text-gray-700">Jenis Kelamin</th>
                            <th class="text-left py-4 px-4 text-sm font-semibold text-gray-700">Status</th>
                            <th class="text-left py-4 px-4 text-sm font-semibold text-gray-700">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($karyawans as $index => $karyawan)
                        <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                            <td class="py-4 px-4 text-sm text-gray-800">{{ $index + 1 }}</td>
                            <td class="py-4 px-4 text-sm font-medium text-gray-800">{{ $karyawan->nama }}</td>
                            <td class="py-4 px-4 text-sm text-gray-600">{{ $karyawan->umur }} tahun</td>
                            <td class="py-4 px-4 text-sm text-gray-600">{{ $karyawan->jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                            <td class="py-4 px-4">
                                <span class="px-3 py-1 text-xs font-semibold rounded-full
                                    {{ $karyawan->status === 'aktif' ? 'bg-blue-100 text-blue-700' : '' }}
                                    {{ $karyawan->status === 'non-aktif' ? 'bg-red-100 text-red-700' : '' }}">
                                    {{ $karyawan->status === 'aktif' ? 'Aktif' : 'Non-Aktif' }}
                                </span>
                            </td>
                            <td class="py-4 px-4">
                                <div class="flex items-center space-x-2">
                                    <a href="{{ route('admin.karyawan.edit', $karyawan->id) }}" class="p-2 text-[#AB6F6E] hover:bg-[#F0D2D1] rounded-lg transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                    </a>
                                    <form action="{{ route('admin.karyawan.destroy', $karyawan->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus karyawan ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="py-12 text-center">
                                <div class="w-16 h-16 bg-gradient-to-br from-[#AB6F6E] to-[#C48989] rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg shadow-[#AB6F6E]/30">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                </div>
                                <h3 class="text-xl font-bold text-gray-800 mb-2">Belum Ada Data</h3>
                                <p class="text-gray-500">Silakan tambah data karyawan baru</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
