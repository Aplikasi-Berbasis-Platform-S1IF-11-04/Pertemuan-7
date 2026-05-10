<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pixora Studio Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light" style="width: 95%; margin: 0 auto;">

    @auth
        <div class="row justify-content-end mt-4 mb-2">
            <div class="col-md-4 text-end">
                <span class="fw-bold me-3 text-secondary">
                    Selamat datang, {{ Auth::user()->name }}
                </span>
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-danger shadow-sm">Logout Keamanan</button>
                </form>
            </div>
        </div>
    @endauth

    <div class="row justify-content-center mt-3">
        @yield('content')
    </div>

</body>
</html>
