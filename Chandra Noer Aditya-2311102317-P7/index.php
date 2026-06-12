<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $jurusan = $_POST['jurusan'];

    mysqli_query($koneksi, "INSERT INTO mahasiswa (nama, nim, jurusan) VALUES ('$nama', '$nim', '$jurusan')");
    header("Location: index.php");
}

$data = mysqli_query($koneksi, "SELECT * FROM mahasiswa");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Website Data Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            padding: 30px;
        }

        .container {
            width: 850px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
        }

        h2 {
            text-align: center;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 12px;
        }

        button {
            padding: 10px 15px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
        }

        table {
            width: 100%;
            margin-top: 25px;
            border-collapse: collapse;
        }

        th {
            background: #007bff;
            color: white;
            padding: 10px;
        }

        td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        .hapus {
            background: #dc3545;
            color: white;
            padding: 7px 10px;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Website Data Mahasiswa</h2>

    <form method="POST">
        <label>Nama</label>
        <input type="text" name="nama" required>

        <label>NIM</label>
        <input type="text" name="nim" required>

        <label>Jurusan</label>
        <input type="text" name="jurusan" required>

        <button type="submit" name="simpan">Simpan Data</button>
    </form>

    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Jurusan</th>
            <th>Aksi</th>
        </tr>

        <?php
        $no = 1;
        while ($row = mysqli_fetch_assoc($data)) {
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $row['nama']; ?></td>
            <td><?= $row['nim']; ?></td>
            <td><?= $row['jurusan']; ?></td>
            <td>
                <a class="hapus" href="hapus.php?id=<?= $row['id']; ?>" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>

</body>
</html>