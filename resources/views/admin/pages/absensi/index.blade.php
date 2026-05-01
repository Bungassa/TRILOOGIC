@extends('admin.layouts.app')

@section('content')
<div class="space-y-8">
    <!-- Page Header -->
    <div class="bg-white/80 backdrop-blur-xl rounded-2xl shadow-lg p-6 border border-gray-100">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-800 tracking-tight">Input Absensi</h1>
                <p class="text-gray-500 mt-1">Kelola kehadiran harian karyawan</p>
            </div>
            <div class="flex items-center space-x-3">
                <form action="{{ route('admin.absensi') }}" method="GET" class="flex items-center space-x-2">
                    <input type="date" name="tanggal" value="{{ $tanggal }}" 
                           class="px-4 py-2 bg-white border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#AB6F6E]/50"
                           onchange="this.form.submit()">
                </form>
            </div>
        </div>
    </div>

    <!-- Absensi Form -->
    <div class="bg-white/80 backdrop-blur-xl rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
        <form action="{{ route('admin.absensi.store') }}" method="POST">
            @csrf
            <input type="hidden" name="tanggal" value="{{ $tanggal }}">
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
                                <th class="text-left py-4 px-4 text-sm font-semibold text-gray-700">Karyawan</th>
                                <th class="text-left py-4 px-4 text-sm font-semibold text-gray-700">NIK</th>
                                <th class="text-center py-4 px-4 text-sm font-semibold text-gray-700">Status Kehadiran</th>
                                <th class="text-center py-4 px-4 text-sm font-semibold text-gray-700">Lembur (Jam)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($karyawans as $karyawan)
                            @php
                                $currentAbsensi = $absensis->get($karyawan->id);
                            @endphp
                            <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                                <td class="py-4 px-4">
                                    <div class="font-medium text-gray-800">{{ $karyawan->nama }}</div>
                                </td>
                                <td class="py-4 px-4">
                                    <div class="text-sm text-gray-500">{{ $karyawan->nik ?? '-' }}</div>
                                </td>
                                <td class="py-4 px-4">
                                    <div class="flex items-center justify-center space-x-4">
                                        @foreach(['hadir', 'sakit', 'izin', 'alpa'] as $status)
                                        <label class="flex flex-col items-center cursor-pointer group">
                                            <input type="radio" name="absensi[{{ $karyawan->id }}][status]" value="{{ $status }}" 
                                                   {{ (old("absensi.$karyawan->id.status") ?? ($currentAbsensi->status ?? 'hadir')) === $status ? 'checked' : '' }}
                                                   class="sr-only peer">
                                            <div class="w-10 h-10 flex items-center justify-center rounded-xl border-2 border-gray-100 peer-checked:border-[#AB6F6E] peer-checked:bg-[#AB6F6E]/5 text-gray-400 peer-checked:text-[#AB6F6E] transition-all group-hover:border-gray-200">
                                                <span class="text-[10px] font-bold uppercase">{{ substr($status, 0, 1) }}</span>
                                            </div>
                                            <span class="text-[10px] mt-1 text-gray-400 group-hover:text-gray-600 capitalize">{{ $status }}</span>
                                        </label>
                                        @endforeach
                                    </div>
                                </td>
                                <td class="py-4 px-4">
                                    <div class="flex justify-center">
                                        <input type="number" name="absensi[{{ $karyawan->id }}][lembur_jam]" 
                                               value="{{ old("absensi.$karyawan->id.lembur_jam") ?? ($currentAbsensi->lembur_jam ?? 0) }}"
                                               min="0" class="w-20 px-3 py-2 text-center border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#AB6F6E]/50">
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-8 flex justify-end">
                    <button type="submit" class="px-8 py-3 bg-gradient-to-r from-[#AB6F6E] to-[#C48989] text-white font-bold rounded-xl shadow-lg shadow-[#AB6F6E]/30 hover:shadow-xl hover:shadow-[#AB6F6E]/40 transition-all duration-200">
                        Simpan Absensi Hari Ini
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
