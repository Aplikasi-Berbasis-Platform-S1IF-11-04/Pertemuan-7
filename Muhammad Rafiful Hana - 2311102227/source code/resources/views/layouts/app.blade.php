{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>InventarisKu - @yield('title', 'Manajemen Produk')</title>
    <link href="https://fonts.googleapis.com/css2?family=Space+Mono:wght@400;700&family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #ece8e0;
            font-family: 'Space Mono', 'Inter', monospace;
            min-height: 100vh;
        }

        .navbar-brutal {
            background: #0a0a0a;
            border-bottom: 5px solid #c0392b;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .navbar-brutal .brand {
            color: #ffffff;
            font-size: 1.8rem;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: -2px;
            text-decoration: none;
        }

        .navbar-brutal .brand span {
            color: #c0392b;
            border-left: 4px solid #c0392b;
            padding-left: 0.8rem;
            margin-left: 0.5rem;
        }

        .navbar-brutal .nav-links {
            display: flex;
            gap: 1.5rem;
            align-items: center;
            flex-wrap: wrap;
        }

        .navbar-brutal .nav-links a {
            color: #f1c40f;
            text-decoration: none;
            font-weight: 700;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 0.3rem 0.8rem;
            border-left: 3px solid transparent;
            transition: 0.1s linear;
        }

        .navbar-brutal .nav-links a:hover {
            border-left-color: #c0392b;
            color: #ffffff;
        }

        .navbar-brutal .user-info {
            color: #facc15;
            font-size: 0.8rem;
            background: #1a1a1a;
            padding: 0.3rem 1rem;
            border-left: 3px solid #c0392b;
        }

        .container-brutal {
            max-width: 1400px;
            margin: 0 auto;
            padding: 2rem;
        }

        .card-brutal {
            background: #ffffff;
            border: 3px solid #0a0a0a;
            box-shadow: 10px 10px 0 #c0392b;
            padding: 1.8rem;
            margin-bottom: 2rem;
            transition: 0.1s linear;
        }

        .card-brutal:hover {
            transform: translate(2px, 2px);
            box-shadow: 6px 6px 0 #c0392b;
        }

        .card-header-brutal {
            border-bottom: 3px solid #c0392b;
            padding-bottom: 1rem;
            margin-bottom: 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .card-header-brutal h5 {
            font-size: 1.2rem;
            font-weight: 800;
            text-transform: uppercase;
        }

        .btn-brutal {
            background: #0a0a0a;
            border: 2px solid #0a0a0a;
            color: white;
            padding: 0.7rem 1.8rem;
            font-family: 'Space Mono', monospace;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 1px;
            cursor: pointer;
            transition: 0.1s linear;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
        }

        .btn-brutal:hover {
            background: #c0392b;
            border-color: #0a0a0a;
            transform: scale(0.96);
            color: white;
            text-decoration: none;
        }

        .btn-brutal-primary {
            background: #c0392b;
            border-color: #0a0a0a;
        }

        .btn-brutal-primary:hover {
            background: #a93226;
        }

        .btn-brutal-success {
            background: #27ae60;
            border-color: #0a0a0a;
        }

        .btn-brutal-success:hover {
            background: #1e8449;
        }

        .btn-brutal-warning {
            background: #f39c12;
            border-color: #0a0a0a;
            color: #0a0a0a;
        }

        .btn-brutal-warning:hover {
            background: #d68910;
            color: #0a0a0a;
        }

        .btn-brutal-danger {
            background: #0a0a0a;
            border-color: #c0392b;
        }

        .btn-brutal-danger:hover {
            background: #c0392b;
            color: white;
        }

        .btn-brutal-sm {
            padding: 0.3rem 1rem;
            font-size: 0.7rem;
        }

        .form-control-brutal {
            background: #ffffff;
            border: 2px solid #0a0a0a;
            padding: 0.7rem 1rem;
            font-family: 'Space Mono', monospace;
            font-size: 0.9rem;
            width: 100%;
            transition: 0.1s;
            outline: none;
            border-radius: 0;
        }

        .form-control-brutal:focus {
            border-color: #c0392b;
            box-shadow: 3px 3px 0 #c0392b40;
        }

        .table-brutal {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.85rem;
        }

        .table-brutal thead {
            background: #0a0a0a;
            color: white;
        }

        .table-brutal th {
            padding: 1rem 0.8rem;
            text-align: left;
            text-transform: uppercase;
            font-size: 0.7rem;
            letter-spacing: 1px;
        }

        .table-brutal td {
            padding: 0.8rem;
            border-bottom: 2px solid #e0dbd2;
            vertical-align: middle;
        }

        .table-brutal tbody tr:hover {
            background: #f5f0e8;
        }

        .alert-brutal {
            padding: 1rem 1.5rem;
            border-left: 5px solid #27ae60;
            background: #0a0a0a;
            color: #f1c40f;
            margin-bottom: 1.5rem;
            font-weight: 700;
        }

        .alert-brutal-danger {
            border-left-color: #c0392b;
            color: #c0392b;
        }

        .badge-brutal {
            display: inline-block;
            padding: 0.2rem 0.8rem;
            font-weight: 700;
            font-size: 0.7rem;
            text-transform: uppercase;
            border: 1px solid #0a0a0a;
        }

        .badge-brutal-success {
            background: #27ae60;
            color: white;
        }

        .badge-brutal-danger {
            background: #c0392b;
            color: white;
        }

        .empty-state {
            text-align: center;
            padding: 3rem;
            color: #666;
            font-weight: 600;
        }

        .empty-state i {
            font-size: 3rem;
            display: block;
            margin-bottom: 1rem;
            color: #ccc;
        }

        .footer-brutal {
            background: #0a0a0a;
            padding: 1rem;
            text-align: center;
            border-top: 3px solid #c0392b;
            color: #facc15;
            font-size: 0.7rem;
            letter-spacing: 1px;
            margin-top: 2rem;
        }

        @media (max-width: 768px) {
            .navbar-brutal {
                flex-direction: column;
                align-items: stretch;
                padding: 1rem;
            }
            .navbar-brutal .nav-links {
                flex-direction: column;
                align-items: stretch;
            }
            .container-brutal {
                padding: 1rem;
            }
            .card-brutal {
                padding: 1rem;
            }
            .table-brutal {
                font-size: 0.7rem;
            }
            .table-brutal th, .table-brutal td {
                padding: 0.5rem;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar-brutal">
        <a href="{{ route('products.index') }}" class="brand">
            <i class="fas fa-box"></i> INVENTARIS<span>KU</span>
        </a>
        <div class="nav-links">
            @auth
                <a href="{{ route('products.index') }}"><i class="fas fa-list"></i> Produk</a>
                <a href="{{ route('products.create') }}"><i class="fas fa-plus"></i> Tambah</a>
                <a href="{{ route('profile.edit') }}"><i class="fas fa-user"></i> Profile</a>
                <span class="user-info"><i class="fas fa-user-circle"></i> {{ Auth::user()->name }}</span>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn-brutal btn-brutal-danger btn-brutal-sm">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> Login</a>
                <a href="{{ route('register') }}"><i class="fas fa-user-plus"></i> Register</a>
            @endauth
        </div>
    </nav>

    <div class="container-brutal">
        @yield('content')
    </div>

    <footer class="footer-brutal">
        <i class="fas fa-cubes"></i> INVENTARISKU · MANAJEMEN PRODUK & PENGGUNA | MUHAMMAD RAFIFUL HANA (2311102227)
    </footer>
</body>
</html>