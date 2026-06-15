<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enterprise Inventory - @yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
</head>
<body>

@auth
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom py-3 mb-4">
    <div class="container">

        <a class="navbar-brand fw-bold fs-4" href="#">
            📦 Enterprise Inventory
        </a>

        <div class="ms-auto d-flex align-items-center">
            <span class="me-3 small">
                Welcome,
                <strong>{{ Auth::user()->name }}</strong>
            </span>

            <a href="{{ route('logout') }}"
               class="btn btn-outline-light btn-sm rounded-pill px-3">
                Logout
            </a>
        </div>

    </div>
</nav>
@endauth

<div class="container pb-5">
    @yield('content')
</div>

</body>
</html>