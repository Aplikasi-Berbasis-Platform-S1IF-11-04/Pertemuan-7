# Tugas 8 - Aplikasi CRUD Suku Cadang Yamaha

## Identitas

<strong>Nama:</strong> Muhammad Kamil Fauzan <strong>NIM:</strong> 2311102314 <strong>Kelas:</strong> SI1F-11-04

---

## Judul Project

Aplikasi Manajemen Suku Cadang Yamaha Menggunakan Laravel

---

## Deskripsi Project

Project ini merupakan aplikasi web berbasis Laravel yang digunakan untuk mengelola data suku cadang Yamaha. Aplikasi ini menerapkan sistem autentikasi pengguna serta fitur CRUD, yaitu menambahkan, menampilkan, mengedit, dan menghapus data suku cadang.

Pengguna harus melakukan register atau login terlebih dahulu sebelum dapat mengakses halaman manajemen produk. Setelah login berhasil, pengguna dapat mengelola data suku cadang Yamaha melalui halaman product.

Data yang dikelola meliputi part number, nama suku cadang, kategori, harga, stok awal, link gambar, serta deskripsi atau spesifikasi produk.

---

## Tujuan Pengerjaan

Tujuan dari pengerjaan tugas ini adalah:

1. Memahami penggunaan Laravel untuk membuat aplikasi berbasis database.
2. Menerapkan sistem autentikasi register, login, dan logout.
3. Menggunakan middleware untuk membatasi akses halaman tertentu.
4. Menerapkan fitur CRUD pada data suku cadang.
5. Menghubungkan Laravel dengan database MySQL.
6. Menjalankan migration untuk membuat tabel pada database.
7. Menyesuaikan isi project dengan identitas Muhammad Kamil Fauzan.

---

## Teknologi yang Digunakan

1. PHP 8.3.31
2. Laravel
3. Composer
4. MySQL
5. XAMPP
6. phpMyAdmin
7. Node.js dan NPM
8. Vite
9. Tailwind CSS
10. Visual Studio Code
11. Git Bash

---

## Lokasi Project

Project dikerjakan pada folder:

```text
E:\kamilfauzan\Pertemuan-7\Muhammad Kamil Fauzan - 2311102314\modul-13\tugas-8
```

Untuk masuk ke folder project melalui Git Bash digunakan perintah:

```bash
cd "/e/kamilfauzan/Pertemuan-7/Muhammad Kamil Fauzan - 2311102314/modul-13/tugas-8"
```

---

## Konfigurasi Database

Database yang digunakan pada project ini adalah:

```text
tugas8_kamil
```

Konfigurasi database pada file `.env` adalah sebagai berikut:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tugas8_kamil
DB_USERNAME=root
DB_PASSWORD=
```

Database dibuat melalui phpMyAdmin dengan menjalankan Apache dan MySQL pada XAMPP.

---

## Langkah Pengerjaan

### 1. Mengecek Versi PHP

Project dijalankan menggunakan PHP 8.3.31. Untuk mengecek versi PHP digunakan perintah:

```bash
php -v
```

Jika Git Bash masih menggunakan PHP 8.2, maka PHP 8.3 diaktifkan terlebih dahulu dengan perintah:

```bash
export PATH="/e/download/php83/php-8.3.31-Win32-vs16-x64:$PATH"
```

---

### 2. Install Dependency Laravel

Dependency Laravel diinstall menggunakan Composer dengan perintah:

```bash
composer install
```

Perintah ini digunakan untuk mengunduh dependency Laravel dan menghasilkan folder `vendor`.

---

### 3. Membuat File Environment

File `.env` dibuat dari file `.env.example` menggunakan perintah:

```bash
cp .env.example .env
```

---

### 4. Generate Application Key

Application key Laravel dibuat menggunakan perintah:

```bash
php artisan key:generate
```

---

### 5. Mengatur Konfigurasi Database

File `.env` dibuka dan disesuaikan dengan database yang digunakan, yaitu `tugas8_kamil`.

```bash
code .env
```

Setelah konfigurasi selesai, cache konfigurasi dibersihkan dengan perintah:

```bash
php artisan config:clear
```

---

### 6. Menjalankan Migration

Setelah database `tugas8_kamil` dibuat melalui phpMyAdmin, migration dijalankan dengan perintah:

```bash
php artisan migrate
```

Migration digunakan untuk membuat tabel yang dibutuhkan aplikasi, seperti tabel `users` dan `products`.

---

### 7. Menjalankan Frontend Asset

Karena project menggunakan Vite dan Tailwind CSS, dependency frontend dijalankan menggunakan NPM.

```bash
npm install
```

Kemudian menjalankan Vite dengan perintah:

```bash
npm run dev
```

Terminal untuk `npm run dev` dibiarkan tetap berjalan.

---

### 8. Menjalankan Server Laravel

Project dijalankan menggunakan perintah:

```bash
php artisan serve --port=8002
```

Aplikasi kemudian dapat diakses melalui browser pada alamat:

```text
http://127.0.0.1:8002
```

---

## Cara Login dan Menggunakan Aplikasi

### 1. Register Akun

Halaman register dapat diakses melalui:

```text
http://127.0.0.1:8002/register
```

Data akun yang digunakan:

```text
Name     : Muhammad Kamil Fauzan
Email    : kamil@example.com
Password : password123
```

---

### 2. Login Akun

Halaman login dapat diakses melalui:

```text
http://127.0.0.1:8002/login
```

Akun yang digunakan untuk login:

```text
Email    : kamil@example.com
Password : password123
```

---

### 3. Mengakses Halaman Product

Setelah login berhasil, halaman product dapat diakses melalui:

```text
http://127.0.0.1:8002/product
```

Pada halaman ini pengguna dapat mengelola data suku cadang Yamaha.

---

## Fitur Aplikasi

Fitur yang terdapat pada aplikasi ini adalah:

1. Register akun pengguna.
2. Login pengguna.
3. Logout pengguna.
4. Menampilkan daftar suku cadang.
5. Menambahkan data suku cadang.
6. Mengedit data suku cadang.
7. Menghapus data suku cadang.
8. Menyimpan data suku cadang ke database MySQL.

---

## Contoh Data Pengujian

Contoh data suku cadang Yamaha yang ditambahkan pada aplikasi:

```text
Part Number       : YMH-NMX-CVT-001
Nama Suku Cadang  : V-Belt Yamaha NMAX
Kategori          : Transmisi
Harga             : 185000
Stok Awal         : 20
Link Gambar       : https://example.com/vbelt-yamaha-nmax.jpg
Deskripsi         : V-Belt untuk Yamaha NMAX, berfungsi sebagai komponen transmisi CVT. Cocok untuk penggantian suku cadang berkala agar tarikan motor tetap halus dan responsif.
```

---

## Hasil Pengujian

Project berhasil dijalankan menggunakan perintah:

```bash
php artisan serve --port=8002
```

Aplikasi berhasil menampilkan halaman website. Pengguna dapat melakukan register dan login. Setelah login berhasil, pengguna dapat mengakses halaman product untuk mengelola data suku cadang Yamaha.

Fitur tambah data berhasil digunakan untuk menambahkan data suku cadang Yamaha. Data yang telah ditambahkan dapat ditampilkan pada halaman product dan dapat dikelola melalui fitur edit serta hapus.

---

## Kesimpulan

Berdasarkan hasil pengerjaan, aplikasi Tugas 8 berhasil dijalankan menggunakan Laravel, PHP 8.3.31, Composer, MySQL, dan Vite.

Aplikasi berhasil menerapkan fitur autentikasi pengguna serta CRUD data suku cadang Yamaha. Project juga telah disesuaikan dengan identitas Muhammad Kamil Fauzan dengan NIM 2311102314.

Dengan demikian, pengerjaan Tugas 8 untuk Muhammad Kamil Fauzan telah berhasil dilakukan.
