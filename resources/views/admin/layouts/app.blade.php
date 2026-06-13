<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Dashboard' }} | Admin Panel</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gradient-to-br from-[#e1bdb5] via-[#e1bdb5] to-[#e1bdb5]">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <aside id="sidebar" class="fixed inset-y-0 left-0 z-50 w-72 bg-gradient-to-b from-[#825449] via-[#825449] to-[#825449] shadow-2xl transform -translate-x-full lg:translate-x-0 lg:static lg:inset-auto transition-transform duration-300 ease-in-out">
            @include('admin.components.sidebar')
        </aside>

        <!-- Overlay for mobile -->
        <div id="sidebarOverlay" class="fixed inset-0 bg-black/40 backdrop-blur-sm z-40 hidden lg:hidden" onclick="toggleSidebar()"></div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Header -->
            <header class="bg-[#e1bdb5]/80 backdrop-blur-xl shadow-lg border-b border-[#e1bdb5]">
                @include('admin.components.app-header')
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto p-8">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        // Toggle sidebar for mobile
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        }
    </script>
    @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: "{!! addslashes(session('success')) !!}",
                confirmButtonColor: '#825449',
                background: '#ffffff',
                customClass: {
                    popup: 'rounded-3xl border border-gray-100 shadow-2xl',
                    confirmButton: 'rounded-2xl px-8 py-3 font-bold uppercase text-xs tracking-widest'
                }
            });
        </script>
    @endif
    @if(session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: "{!! addslashes(session('error')) !!}",
                confirmButtonColor: '#825449',
                background: '#ffffff',
                customClass: {
                    popup: 'rounded-3xl border border-gray-100 shadow-2xl',
                    confirmButton: 'rounded-2xl px-8 py-3 font-bold uppercase text-xs tracking-widest'
                }
            });
        </script>
    @endif
    @if($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Validasi Gagal!',
                text: "{!! addslashes(implode('\n', $errors->all())) !!}",
                confirmButtonColor: '#825449',
                background: '#ffffff',
                customClass: {
                    popup: 'rounded-3xl border border-gray-100 shadow-2xl',
                    confirmButton: 'rounded-2xl px-8 py-3 font-bold uppercase text-xs tracking-widest'
                }
            });
        </script>
    @endif
</body>
</html>
