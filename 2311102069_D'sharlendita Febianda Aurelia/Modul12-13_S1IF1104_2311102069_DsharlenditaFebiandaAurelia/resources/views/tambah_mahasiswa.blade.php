<!DOCTYPE html>
<html>
<head>
    <title>Tambah Mahasiswa</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="bg-animation"></div>

<div class="navbar navbar-right">
    <button type="button" class="back-btn" onclick="window.location.href='/'">
        Kembali
    </button>
</div>
<main class="page-wrapper">

    <section class="hero">
        <h1>Tambah Data</h1>
        <p>Masukkan data mahasiswa baru</p>
    </section>

    <section class="form-section">
        <div class="form-card">

            @if ($errors->any())
                <div class="error-box">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="/store-mahasiswa" method="POST">
                @csrf

                <div class="form-group">
                    <label for="nama">Nama Mahasiswa</label>
                    <input type="text" id="nama" name="nama" placeholder="Masukkan nama mahasiswa" required>
                </div>

                <div class="form-group">
                    <label for="nim">NIM</label>
                    <input type="text" id="nim" name="nim" placeholder="Masukkan NIM" required>
                </div>

                <div class="form-group">
                    <label for="jurusan">Jurusan</label>
                    <input type="text" id="jurusan" name="jurusan" placeholder="Masukkan jurusan" required>
                </div>

                <div class="button-group">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" onclick="window.location.href='/'">
                        Batal
                    </button>
                </div>

            </form>

        </div>
    </section>

</main>

</body>
</html>