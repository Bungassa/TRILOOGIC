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
            <button onclick="openModal()" class="px-4 py-2 bg-[#825449] text-white text-sm font-semibold rounded-xl shadow-lg">
                + Tambah Admin
            </button>
        </div>
    </div>

    @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                background: '#ffffff',
                iconColor: '#825449',
                customClass: {
                    popup: 'rounded-2xl shadow-xl border border-gray-100',
                    title: 'text-gray-800 font-bold',
                    htmlContainer: 'text-gray-600'
                }
            });
        </script>
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
                            <form id="delete-form-{{ $admin->id }}" action="{{ route('owner.admins.destroy', $admin->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" 
                                        onclick="confirmDelete('{{ $admin->id }}', '{{ addslashes($admin->name) }}')" 
                                        class="text-red-600 hover:text-red-800 text-sm font-bold transition-all hover:scale-105">
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
    <div id="adminModal" class="fixed inset-0 bg-black/60 backdrop-blur-md hidden items-center justify-center z-50 transition-all duration-300 opacity-0">
        <div id="modalContent" class="bg-white rounded-3xl shadow-2xl w-full max-w-md mx-4 transform scale-90 transition-all duration-300 opacity-0 border border-white/20">
            <div class="p-8 border-b border-gray-100 flex justify-between items-center bg-gradient-to-r from-gray-50 to-white rounded-t-3xl">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">Tambah Admin Baru</h2>
                    <p class="text-sm text-gray-500 mt-1">Berikan hak akses sistem ke pengguna baru</p>
                </div>
                <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
            <form action="{{ route('owner.admins.store') }}" method="POST" class="p-8 space-y-6">
                @csrf
                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700">Nama Lengkap</label>
                    <div class="relative">
                        <input type="text" name="name" required placeholder="Masukkan nama lengkap" 
                               class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-[#825449]/10 focus:border-[#825449] transition-all outline-none">
                    </div>
                </div>
                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700">Email Address</label>
                    <div class="relative">
                        <input type="email" name="email" required placeholder="admin@ekkyfamily.com" 
                               class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-[#825449]/10 focus:border-[#825449] transition-all outline-none">
                    </div>
                </div>
                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700">Password</label>
                    <div class="relative">
                        <input type="password" name="password" required placeholder="••••••••" 
                               class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-[#825449]/10 focus:border-[#825449] transition-all outline-none">
                    </div>
                </div>
                <div class="flex flex-col sm:flex-row gap-3 pt-4">
                    <button type="button" onclick="closeModal()" 
                            class="flex-1 px-6 py-3.5 text-gray-600 font-semibold hover:bg-gray-100 rounded-2xl transition-all">
                        Batal
                    </button>
                    <button type="submit" 
                            class="flex-1 px-6 py-3.5 bg-gradient-to-r from-[#825449] to-[#825449] text-white font-bold rounded-2xl shadow-lg shadow-[#825449]/30 hover:shadow-xl hover:-translate-y-0.5 transition-all">
                        Simpan Admin
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openModal() {
            const modal = document.getElementById('adminModal');
            const content = document.getElementById('modalContent');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            setTimeout(() => {
                modal.classList.remove('opacity-0');
                content.classList.remove('opacity-0', 'scale-90');
            }, 10);
        }
        function closeModal() {
            const modal = document.getElementById('adminModal');
            const content = document.getElementById('modalContent');
            modal.classList.add('opacity-0');
            content.classList.add('opacity-0', 'scale-90');
            setTimeout(() => {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            }, 300);
        }

        function confirmDelete(id, name) {
            Swal.fire({
                title: 'Cabut Akses Admin?',
                text: `Apakah Anda yakin ingin menghapus hak akses admin untuk "${name}"?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#825449',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Cabut!',
                cancelButtonText: 'Batal',
                background: '#ffffff',
                borderRadius: '1.25rem',
                customClass: {
                    popup: 'rounded-2xl shadow-2xl border border-gray-100',
                    title: 'text-gray-800 font-bold',
                    htmlContainer: 'text-gray-600',
                    confirmButton: 'rounded-xl px-6 py-2.5 font-semibold',
                    cancelButton: 'rounded-xl px-6 py-2.5 font-semibold'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }
    </script>
</div>
@endsection
