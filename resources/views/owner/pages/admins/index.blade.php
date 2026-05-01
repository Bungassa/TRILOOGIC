@extends('owner.layouts.app')

@section('content')
<div class="space-y-8">
    <!-- Page Header -->
    <div class="bg-white/80 backdrop-blur-xl rounded-2xl shadow-lg p-6 border border-gray-100">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-800 tracking-tight">Kelola Admin</h1>
                <p class="text-gray-500 mt-1">Kelola hak akses dan akun Admin Payroll/HR</p>
            </div>
            <button onclick="openModal()" class="px-4 py-2 bg-[#AB6F6E] text-white text-sm font-semibold rounded-xl shadow-lg">
                + Tambah Admin
            </button>
        </div>
    </div>

    @if(session('success'))
        <div class="px-6 py-4 bg-green-100 border border-green-200 text-green-700 rounded-2xl">
            {{ session('success') }}
        </div>
    @endif

    <!-- Admin Table -->
    <div class="bg-white/80 backdrop-blur-xl rounded-2xl shadow-lg border border-gray-100">
        <div class="p-6">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-gray-200">
                        <th class="text-left py-4 px-4 font-semibold text-gray-700">Nama</th>
                        <th class="text-left py-4 px-4 font-semibold text-gray-700">Email</th>
                        <th class="text-left py-4 px-4 font-semibold text-gray-700">Tanggal Terdaftar</th>
                        <th class="text-center py-4 px-4 font-semibold text-gray-700">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($admins as $admin)
                    <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                        <td class="py-4 px-4 font-medium text-gray-800">{{ $admin->name }}</td>
                        <td class="py-4 px-4 text-gray-600">{{ $admin->email }}</td>
                        <td class="py-4 px-4 text-gray-500">{{ $admin->created_at->format('d M Y') }}</td>
                        <td class="py-4 px-4 text-center">
                            @if($admin->id !== Auth::id())
                            <form action="{{ route('owner.admins.destroy', $admin->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin mencabut akses admin ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 text-sm font-bold">
                                    Cabut Akses
                                </button>
                            </form>
                            @else
                                <span class="text-gray-400 italic text-xs">Akun Anda</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Tambah Admin -->
    <div id="adminModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm hidden items-center justify-center z-50">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md mx-4">
            <div class="p-6 border-b border-gray-200">
                <h2 class="text-2xl font-bold text-gray-800">Tambah Admin Baru</h2>
            </div>
            <form action="{{ route('owner.admins.store') }}" method="POST" class="p-6 space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                    <input type="text" name="name" required class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-[#AB6F6E]">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                    <input type="email" name="email" required class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-[#AB6F6E]">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                    <input type="password" name="password" required class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-[#AB6F6E]">
                </div>
                <div class="flex justify-end space-x-3 pt-4">
                    <button type="button" onclick="closeModal()" class="px-6 py-2 text-gray-600 hover:bg-gray-50 rounded-xl">Batal</button>
                    <button type="submit" class="px-6 py-2 bg-[#AB6F6E] text-white rounded-xl shadow-lg">Simpan Admin</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openModal() {
            document.getElementById('adminModal').classList.remove('hidden');
            document.getElementById('adminModal').classList.add('flex');
        }
        function closeModal() {
            document.getElementById('adminModal').classList.add('hidden');
            document.getElementById('adminModal').classList.remove('flex');
        }
    </script>
</div>
@endsection
