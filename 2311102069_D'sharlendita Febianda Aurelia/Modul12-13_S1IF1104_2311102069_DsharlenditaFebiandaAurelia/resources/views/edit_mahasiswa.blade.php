<!DOCTYPE html>
<html>
<head>
    <title>Edit Mahasiswa</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<div class="bg-animation"></div>

<div class="navbar">
    <button type="button" class="back-btn" onclick="window.location.href='/'">
        Kembali
    </button>
</div>

<main class="page-wrapper">

    <section class="hero">
        <h1>Edit Data</h1>
        <p>Perbarui informasi mahasiswa</p>
    </section>

    <section class="form-section">
        <div class="form-card">

            <form action="/update-mahasiswa/{{ $mhs->id }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="nama">Nama Mahasiswa</label>
                    <input 
                        type="text" 
                        id="nama" 
                        name="nama" 
                        value="{{ $mhs->nama }}" 
                        required 
                        placeholder="Masukkan nama mahasiswa"
                    >
                </div>

                <div class="form-group">
                    <label for="nim">NIM</label>
                    <input 
                        type="text" 
                        id="nim" 
                        name="nim" 
                        value="{{ $mhs->nim }}" 
                        required 
                        placeholder="Masukkan NIM"
                    >
                </div>

                <div class="form-group">
                    <label for="jurusan">Jurusan</label>
                    <input 
                        type="text" 
                        id="jurusan" 
                        name="jurusan" 
                        value="{{ $mhs->jurusan }}" 
                        required 
                        placeholder="Masukkan jurusan"
                    >
                </div>

                <div class="button-group">
                    <button type="submit" class="btn btn-primary">
                        Update
                    </button>

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