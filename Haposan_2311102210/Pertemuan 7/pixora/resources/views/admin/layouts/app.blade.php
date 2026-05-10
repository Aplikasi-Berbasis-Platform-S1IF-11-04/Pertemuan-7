{{-- resources/views/admin/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Panel - Pixora</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <style>
        * {
            font-family: 'Nunito', sans-serif;
        }
        
        /* Custom Modal Styles */
        .modal-modern {
            background: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(8px);
            transition: all 0.3s ease;
        }
        
        .modal-modern .modal-container {
            animation: modalSlideIn 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            transform-origin: center;
        }
        
        @keyframes modalSlideIn {
            from {
                opacity: 0;
                transform: scale(0.95) translateY(-20px);
            }
            to {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }
        
        .form-input-modern {
            transition: all 0.3s ease;
            border: 2px solid #e5e7eb;
        }
        
        .form-input-modern:focus {
            border-color: #e11d48;
            box-shadow: 0 0 0 3px rgba(225, 29, 72, 0.1);
            outline: none;
        }
        
        .form-label-modern {
            font-weight: 600;
            color: #374151;
            margin-bottom: 6px;
            display: block;
            font-size: 0.875rem;
        }
        
        /* Glassmorphism Effects */
        .glass-sidebar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-right: 1px solid rgba(255, 255, 255, 0.3);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .glass-sidebar.collapsed {
            width: 80px;
        }
        
        .glass-sidebar.collapsed .sidebar-text,
        .glass-sidebar.collapsed .logo-text,
        .glass-sidebar.collapsed .copyright {
            display: none;
        }
        
        .glass-sidebar.collapsed .sidebar-item {
            justify-content: center;
            padding: 12px;
        }
        
        .glass-sidebar.collapsed .sidebar-item i {
            margin: 0;
        }
        
        .glass-sidebar.collapsed .logo-icon {
            margin: 0 auto;
        }
        
        .main-content {
            transition: margin-left 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .main-content.expanded {
            margin-left: 80px;
        }
        
        .main-content.normal {
            margin-left: 288px;
        }
        
        .glass-card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.5);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.08);
        }
        
        .glass-header {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(8px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.5);
        }
        
        .admin-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
            background-size: 200% 200%;
            animation: gradientShift 15s ease infinite;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: -1;
        }
        
        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        .sidebar-item {
            transition: all 0.3s ease;
            border-radius: 12px;
            margin: 4px 12px;
        }
        
        .sidebar-item:hover {
            background: rgba(225, 29, 72, 0.12);
            transform: translateX(4px);
        }
        
        .sidebar-item.active {
            background: linear-gradient(135deg, #e11d48, #be123c);
            color: white;
            box-shadow: 0 4px 12px rgba(225, 29, 72, 0.3);
        }
        
        .stats-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .stats-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }
        
        .toggle-btn {
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .toggle-btn:hover {
            background: rgba(225, 29, 72, 0.1);
        }
        
        /* Modern Button */
        .btn-modern {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .btn-modern::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }
        
        .btn-modern:hover::before {
            width: 300px;
            height: 300px;
        }
        
        /* Table Styles */
        .data-table th {
            background: rgba(249, 250, 251, 0.8);
            backdrop-filter: blur(4px);
            font-weight: 700;
        }
        
        .data-table tr:hover {
            background: rgba(255, 255, 255, 0.5);
        }
        
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        
        ::-webkit-scrollbar-track {
            background: rgba(0, 0, 0, 0.05);
            border-radius: 10px;
        }
        
        ::-webkit-scrollbar-thumb {
            background: #e11d48;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="admin-bg"></div>
    
    <div class="flex">
        <!-- Sidebar -->
        <div id="sidebar" class="glass-sidebar w-72 fixed h-full z-20 overflow-y-auto">
            <div class="p-6 mb-4 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-gradient-to-r from-rose-500 to-pink-600 rounded-xl flex items-center justify-center shadow-lg logo-icon">
                        <i class="fas fa-camera text-white text-xl"></i>
                    </div>
                    <div class="logo-text">
                        <h1 class="text-2xl font-extrabold bg-gradient-to-r from-rose-600 to-pink-600 bg-clip-text text-transparent">Pixora</h1>
                        <p class="text-xs text-gray-500 font-medium">Admin Panel</p>
                    </div>
                </div>
                <button id="toggleSidebar" class="toggle-btn w-8 h-8 rounded-lg flex items-center justify-center text-gray-500 hover:text-rose-500 transition">
                    <i class="fas fa-chevron-left text-lg"></i>
                </button>
            </div>
            
            <nav class="px-3 space-y-1">
                <a href="{{ route('admin.dashboard') }}" class="sidebar-item flex items-center gap-3 px-4 py-3 text-gray-700 transition-all {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-tachometer-alt w-5 text-lg"></i>
                    <span class="sidebar-text font-semibold">Dashboard</span>
                </a>
                <a href="{{ route('admin.bookings.index') }}" class="sidebar-item flex items-center gap-3 px-4 py-3 text-gray-700 transition-all {{ request()->routeIs('admin.bookings.*') ? 'active' : '' }}">
                    <i class="fas fa-calendar-check w-5 text-lg"></i>
                    <span class="sidebar-text font-semibold">Bookings</span>
                </a>
                <a href="{{ route('admin.packages.index') }}" class="sidebar-item flex items-center gap-3 px-4 py-3 text-gray-700 transition-all {{ request()->routeIs('admin.packages.*') ? 'active' : '' }}">
                    <i class="fas fa-box w-5 text-lg"></i>
                    <span class="sidebar-text font-semibold">Paket</span>
                </a>
                <a href="{{ route('admin.reports.index') }}" class="sidebar-item flex items-center gap-3 px-4 py-3 text-gray-700 transition-all {{ request()->routeIs('admin.reports.*') ? 'active' : '' }}">
                    <i class="fas fa-chart-line w-5 text-lg"></i>
                    <span class="sidebar-text font-semibold">Laporan</span>
                </a>

                <a href="{{ route('admin.customers.index') }}" class="sidebar-item flex items-center gap-3 px-4 py-3 text-gray-700 transition-all {{ request()->routeIs('admin.customers.*') ? 'active' : '' }}">
                    <i class="fas fa-users w-5 text-lg"></i>
                    <span class="sidebar-text font-semibold">Customers</span>
                </a>
                <a href="{{ route('admin.settings.index') }}" class="sidebar-item flex items-center gap-3 px-4 py-3 text-gray-700 transition-all {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                    <i class="fas fa-sliders-h w-5 text-lg"></i>
                    <span class="sidebar-text font-semibold">Pengaturan</span>
                </a>
                <a href="{{ route('admin.landing-page.index') }}" class="sidebar-item flex items-center gap-3 px-4 py-3 text-gray-700 transition-all {{ request()->routeIs('admin.landing-page.*') ? 'active' : '' }}">
                    <i class="fas fa-palette w-5 text-lg"></i>
                    <span class="sidebar-text font-semibold">Landing Page</span>
                </a>
            </nav>
            
            <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-white/30">
                <form method="POST" action="{{ route('admin.logout') }}" id="logout-form">
                    @csrf
                    <button type="submit" class="sidebar-item flex items-center gap-3 w-full px-4 py-3 text-gray-700 hover:bg-red-50 transition-all rounded-xl">
                        <i class="fas fa-sign-out-alt w-5 text-lg"></i>
                        <span class="sidebar-text font-semibold">Logout</span>
                    </button>
                </form>
                <div class="mt-4 text-center copyright">
                    <p class="text-xs text-gray-400 font-medium">© {{ date('Y') }} Pixora Studio</p>
                </div>
            </div>
        </div>
        
        <!-- Main Content -->
        <div id="mainContent" class="main-content normal flex-1 relative z-10">
            <div class="glass-header px-8 py-4 flex justify-between items-center sticky top-0 z-10">
                <div>
                    <h2 class="text-xl font-extrabold text-gray-800">@yield('title')</h2>
                    <p class="text-sm text-gray-500 mt-0.5 font-medium">@yield('subtitle', 'Kelola data studio Anda')</p>
                </div>
                <div class="flex items-center gap-4">
                    <div class="flex items-center gap-3">
                        <div class="text-right">
                            <p class="text-sm font-bold text-gray-700">{{ Auth::user()->name ?? 'Admin' }}</p>
                            <p class="text-xs text-gray-400 font-medium">Administrator</p>
                        </div>
                        <div class="w-10 h-10 bg-gradient-to-r from-rose-500 to-pink-600 rounded-full flex items-center justify-center text-white font-bold shadow-md">
                            {{ substr(Auth::user()->name ?? 'A', 0, 1) }}
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="px-8 pt-6">
                @if(session('success'))
                <div class="glass-card rounded-xl p-4 mb-4 border-l-4 border-green-500 flex items-center gap-3">
                    <i class="fas fa-check-circle text-green-500 text-xl"></i>
                    <p class="text-green-700 font-medium">{{ session('success') }}</p>
                </div>
                @endif
                @if(session('error'))
                <div class="glass-card rounded-xl p-4 mb-4 border-l-4 border-red-500 flex items-center gap-3">
                    <i class="fas fa-exclamation-circle text-red-500 text-xl"></i>
                    <p class="text-red-700 font-medium">{{ session('error') }}</p>
                </div>
                @endif
            </div>
            
            <div class="p-8">
                @yield('content')
            </div>
        </div>
    </div>
    
    <script>
        document.getElementById('logout-form')?.addEventListener('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Yakin ingin logout?',
                text: 'Anda akan keluar dari panel admin.',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#e11d48',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Ya, Logout!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            });
        });
        
        // Fungsi konfirmasi delete umum
        function confirmDelete(action, id, name) {
            Swal.fire({
                title: 'Yakin ingin menghapus?',
                html: `Data <strong>${name}</strong> akan dihapus permanen.`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#e11d48',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(`delete-form-${id}`).submit();
                }
            });
        }
        
        // Sidebar Toggle
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('mainContent');
        const toggleBtn = document.getElementById('toggleSidebar');
        let isCollapsed = localStorage.getItem('sidebarCollapsed') === 'true';
        
        function toggleSidebar() {
            isCollapsed = !isCollapsed;
            if (isCollapsed) {
                sidebar.classList.add('collapsed');
                mainContent.classList.remove('normal');
                mainContent.classList.add('expanded');
                toggleBtn.innerHTML = '<i class="fas fa-chevron-right text-lg"></i>';
            } else {
                sidebar.classList.remove('collapsed');
                mainContent.classList.remove('expanded');
                mainContent.classList.add('normal');
                toggleBtn.innerHTML = '<i class="fas fa-chevron-left text-lg"></i>';
            }
            localStorage.setItem('sidebarCollapsed', isCollapsed);
        }
        
        toggleBtn.addEventListener('click', toggleSidebar);
        
        if (isCollapsed) {
            sidebar.classList.add('collapsed');
            mainContent.classList.remove('normal');
            mainContent.classList.add('expanded');
            toggleBtn.innerHTML = '<i class="fas fa-chevron-right text-lg"></i>';
        }
    </script>
    @stack('scripts')
</body>
</html>