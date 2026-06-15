# Praktikum Aplikasi Berbasis Platform - Modul 12

## Identitas

<strong>Nama:</strong> Muhammad Kamil Fauzan <strong>NIM:</strong> 2311102314 <strong>Kelas:</strong> SI1F-11-04

---

## Judul Project

CRUD Data Produk Menggunakan Laravel dan Database MySQL

---

## Deskripsi Project

Project ini merupakan aplikasi web sederhana berbasis Laravel yang digunakan untuk mengelola data produk. Aplikasi ini menerapkan konsep CRUD, yaitu Create, Read, Update, dan Delete.

Data produk disimpan ke dalam database MySQL. Pengguna dapat menambahkan produk baru, melihat daftar produk, mengedit data produk, serta menghapus data produk yang sudah tersimpan.

Pada project ini, data produk yang ditampilkan terdiri dari nama produk dan harga produk.

---

## Tujuan Praktikum

Tujuan dari praktikum ini adalah:

1. Memahami penggunaan Laravel untuk membuat aplikasi berbasis database.
2. Menerapkan konsep CRUD pada data produk.
3. Menghubungkan Laravel dengan database MySQL.
4. Menjalankan migration untuk membuat tabel di database.
5. Menampilkan data produk ke halaman web.

---

## Teknologi yang Digunakan

Teknologi yang digunakan dalam project ini adalah:

1. PHP 8.3.31
2. Laravel
3. Composer
4. MySQL
5. XAMPP
6. phpMyAdmin
7. Visual Studio Code
8. Git Bash

---

## Struktur Folder Penting

Beberapa file dan folder penting dalam project ini adalah:

```text
app/
database/
resources/
routes/
public/
.env
composer.json
artisan
```

Penjelasan singkat:

1. `app/` digunakan untuk menyimpan logic aplikasi seperti model dan controller.
2. `database/` digunakan untuk menyimpan file migration.
3. `resources/views/` digunakan untuk menyimpan tampilan halaman aplikasi.
4. `routes/web.php` digunakan untuk mengatur route aplikasi.
5. `.env` digunakan untuk konfigurasi aplikasi, termasuk koneksi database.
6. `artisan` digunakan untuk menjalankan perintah Laravel.

---

## Konfigurasi Database

Database yang digunakan pada project ini adalah:

```text
ecommerce_kamil
```

Konfigurasi database pada file `.env` adalah sebagai berikut:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ecommerce_kamil
DB_USERNAME=root
DB_PASSWORD=
```

Database dibuat melalui phpMyAdmin dengan menjalankan XAMPP terlebih dahulu, yaitu mengaktifkan Apache dan MySQL.

---

## Langkah Pengerjaan

### 1. Masuk ke Folder Project

Project dikerjakan pada folder:

```text
E:\kamilfauzan\Pertemuan-7\Muhammad Kamil Fauzan - 2311102314\modul-12
```

Melalui Git Bash, masuk ke folder project dengan perintah:

```bash
cd "/e/kamilfauzan/Pertemuan-7/Muhammad Kamil Fauzan - 2311102314/modul-12"
```

---

### 2. Menyesuaikan Versi PHP

Pada saat menjalankan `composer install`, terjadi kendala karena project membutuhkan PHP versi 8.3, sedangkan versi PHP sebelumnya masih 8.2.12.

Solusi yang dilakukan adalah menggunakan PHP 8.3.31 agar sesuai dengan kebutuhan project Laravel.

Setelah PHP 8.3.31 aktif, dilakukan pengecekan versi PHP dengan perintah:

```bash
php -v
```

Hasilnya menunjukkan bahwa PHP yang digunakan adalah:

```text
PHP 8.3.31
```

---

### 3. Install Dependency Laravel

Setelah versi PHP sesuai, dependency Laravel diinstall menggunakan Composer dengan perintah:

```bash
composer install
```

Perintah ini menghasilkan folder `vendor/` yang dibutuhkan agar Laravel dapat dijalankan.

---

### 4. Membuat File Environment

File `.env` dibuat dari file `.env.example` menggunakan perintah:

```bash
cp .env.example .env
```

File `.env` kemudian disesuaikan dengan konfigurasi database MySQL yang digunakan.

---

### 5. Generate Application Key

Application key Laravel dibuat menggunakan perintah:

```bash
php artisan key:generate
```

Perintah ini digunakan agar aplikasi Laravel dapat berjalan dengan konfigurasi keamanan yang sesuai.

---

### 6. Membuat Database

Database dibuat melalui phpMyAdmin dengan nama:

```text
ecommerce_kamil
```

Database ini digunakan untuk menyimpan data produk pada aplikasi.

---

### 7. Menjalankan Migration

Setelah database dibuat, migration dijalankan dengan perintah:

```bash
php artisan migrate
```

Perintah ini digunakan untuk membuat tabel-tabel yang dibutuhkan oleh aplikasi di dalam database.

---

### 8. Menjalankan Project Laravel

Project dijalankan menggunakan perintah:

```bash
php artisan serve
```

Setelah server berjalan, aplikasi dapat diakses melalui browser pada alamat:

```text
http://127.0.0.1:8000
```

Halaman daftar produk dapat diakses melalui:

```text
http://127.0.0.1:8000/products
```

---

## Fitur Aplikasi

Fitur yang tersedia pada aplikasi ini adalah:

1. Menampilkan daftar produk.
2. Menambahkan data produk baru.
3. Mengedit data produk.
4. Menghapus data produk.
5. Menyimpan data produk ke database MySQL.

---

## Hasil Pengujian

Project berhasil dijalankan melalui perintah:

```bash
php artisan serve
```

Aplikasi berhasil menampilkan halaman daftar produk pada browser.

Pada pengujian, data produk berhasil ditambahkan dengan contoh data:

```text
Nama Produk : Handphone
Harga       : Rp 130.000.000
```

Setelah data ditambahkan, aplikasi menampilkan pesan:

```text
Produk berhasil ditambahkan.
```

Data produk juga berhasil tampil pada halaman daftar produk.

---

## Dokumentasi Tampilan

Beberapa dokumentasi tampilan pada project ini antara lain:

1. Tampilan daftar produk.
2. Tampilan tambah produk.
3. Tampilan edit produk.
4. Tampilan hapus produk.
5. Tampilan detail produk.

File gambar dokumentasi yang terdapat pada project:

```text
viewproduk.png
tambahproduk.png
editproduk.png
hapusproduk.png
viewsatu.png
```

---

## Kesimpulan

Berdasarkan hasil pengerjaan, aplikasi CRUD produk menggunakan Laravel dan MySQL berhasil dibuat dan dijalankan. Aplikasi dapat menampilkan daftar produk, menambahkan produk baru, mengedit data produk, serta menghapus data produk.

Project ini juga berhasil dikonfigurasi menggunakan PHP 8.3.31, Composer, Laravel, dan database MySQL dengan nama `ecommerce_kamil`.

Dengan demikian, pengerjaan Modul 12 untuk Muhammad Kamil Fauzan dengan NIM 2311102314 telah berhasil dilakukan.
