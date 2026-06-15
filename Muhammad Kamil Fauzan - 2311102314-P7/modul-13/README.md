# Praktikum Aplikasi Berbasis Platform - Modul 13

## Identitas

<strong>Nama:</strong> Muhammad Kamil Fauzan <strong>NIM:</strong> 2311102314 <strong>Kelas:</strong> SI1F-11-04

---

## Judul Project

Implementasi Login, Session, Middleware, dan Relasi Produk dengan Varian Menggunakan Laravel

---

## Deskripsi Project

Project ini merupakan aplikasi web berbasis Laravel yang menerapkan sistem login sederhana, session, middleware, dan relasi database antara produk dan varian.

Pada project ini, pengguna harus melakukan login terlebih dahulu sebelum dapat mengakses halaman manajemen produk. Setelah login berhasil, sistem akan menampilkan nama pengguna yang sedang login dan halaman manajemen produk serta varian.

Project ini juga menerapkan konsep relasi One-to-Many, yaitu satu produk dapat memiliki beberapa varian. Data produk dan varian disimpan ke dalam database MySQL.

---

## Tujuan Praktikum

Tujuan dari praktikum ini adalah:

1. Memahami penggunaan authentication sederhana pada Laravel.
2. Memahami penggunaan session untuk menyimpan status login pengguna.
3. Menerapkan middleware untuk membatasi akses halaman tertentu.
4. Memahami relasi One-to-Many antara produk dan varian.
5. Menghubungkan aplikasi Laravel dengan database MySQL.
6. Menampilkan halaman produk hanya setelah pengguna berhasil login.

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

## Struktur Folder Project

Project Laravel untuk modul 13 berada pada folder:

```text
E:\kamilfauzan\Pertemuan-7\Muhammad Kamil Fauzan - 2311102314\modul-13\laravel-modul13
```

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

1. `app/` digunakan untuk menyimpan model, controller, dan logic aplikasi.
2. `database/` digunakan untuk menyimpan migration database.
3. `resources/views/` digunakan untuk menyimpan tampilan halaman login dan produk.
4. `routes/web.php` digunakan untuk mengatur route aplikasi.
5. `.env` digunakan untuk konfigurasi database dan aplikasi.
6. `artisan` digunakan untuk menjalankan perintah Laravel.

---

## Konfigurasi Database

Database yang digunakan pada project ini adalah:

```text
ecommerce_kamil_modul13
```

Konfigurasi database pada file `.env` adalah sebagai berikut:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ecommerce_kamil_modul13
DB_USERNAME=root
DB_PASSWORD=
```

Database dibuat melalui phpMyAdmin dengan menjalankan XAMPP terlebih dahulu, yaitu mengaktifkan Apache dan MySQL.

---

## Langkah Pengerjaan

### 1. Masuk ke Folder Project

Pertama, masuk ke folder Laravel modul 13 melalui Git Bash:

```bash
cd "/e/kamilfauzan/Pertemuan-7/Muhammad Kamil Fauzan - 2311102314/modul-13/laravel-modul13"
```

---

### 2. Mengecek Versi PHP

Project dijalankan menggunakan PHP 8.3.31. Untuk memastikan versi PHP yang digunakan, dijalankan perintah:

```bash
php -v
```

Hasilnya menunjukkan bahwa PHP yang aktif adalah:

```text
PHP 8.3.31
```

---

### 3. Install Dependency Laravel

Dependency Laravel diinstall menggunakan Composer dengan perintah:

```bash
composer install
```

Perintah ini digunakan untuk mengunduh dependency yang dibutuhkan Laravel dan menghasilkan folder `vendor/`.

---

### 4. Membuat File Environment

File `.env` dibuat dari file `.env.example` dengan perintah:

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
ecommerce_kamil_modul13
```

Database ini digunakan untuk menyimpan data pengguna, produk, dan varian.

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

Halaman login dapat diakses melalui:

```text
http://127.0.0.1:8000/login
```

---

### 9. Membuat Akun Login Menggunakan Tinker

Karena data user belum tersedia di database, akun login dibuat melalui Laravel Tinker dengan perintah:

```bash
php artisan tinker
```

Kemudian dilakukan pengecekan data user:

```php
App\Models\User::all();
```

Hasil pengecekan menunjukkan bahwa data user masih kosong. Setelah itu dibuat user baru dengan data berikut:

```php
use App\Models\User;
use Illuminate\Support\Facades\Hash;

User::create([
    'name' => 'Muhammad Kamil Fauzan',
    'email' => 'kamil@example.com',
    'password' => Hash::make('password123')
]);
```

Akun tersebut digunakan untuk login ke aplikasi.

---

## Akun Login

Akun login yang digunakan untuk pengujian adalah:

```text
Email    : kamil@example.com
Password : password123
```

---

## Fitur Aplikasi

Fitur yang terdapat pada aplikasi modul 13 adalah:

1. Halaman login.
2. Validasi login pengguna.
3. Session login.
4. Middleware untuk membatasi akses halaman produk.
5. Logout.
6. Menampilkan nama user yang sedang login.
7. Menampilkan halaman manajemen produk dan varian.
8. Menerapkan relasi produk dan varian.

---

## Hasil Pengujian

Project berhasil dijalankan menggunakan perintah:

```bash
php artisan serve
```

Halaman login berhasil tampil pada browser. Setelah akun user dibuat melalui Tinker, login berhasil dilakukan menggunakan akun:

```text
Email    : kamil@example.com
Password : password123
```

Setelah login berhasil, aplikasi menampilkan halaman manajemen produk dan varian. Pada halaman tersebut muncul informasi:

```text
Login sebagai
Muhammad Kamil Fauzan
```

Halaman yang berhasil diakses setelah login adalah:

```text
http://127.0.0.1:8000/product
```

Pada halaman tersebut terdapat tabel manajemen produk dan varian dengan kolom:

```text
Nama Produk Utama
Harga (Rp)
Spesifikasi Varian Terkait
Aksi
```

Karena data produk belum ditambahkan ke database, tabel menampilkan keterangan bahwa belum ada data produk tersedia.

---

## Perbedaan Modul 12 dan Modul 13

Pada Modul 12, fokus utama project adalah CRUD produk, yaitu menambah, menampilkan, mengedit, dan menghapus data produk.

Pada Modul 13, fokus utama project adalah login, session, middleware, dan relasi antara produk dengan varian. Oleh karena itu, halaman utama modul 13 menampilkan manajemen produk dan varian setelah pengguna berhasil login.

---

## Kesimpulan

Berdasarkan hasil pengerjaan, project Modul 13 berhasil dijalankan menggunakan Laravel, PHP 8.3.31, Composer, dan database MySQL.

Aplikasi berhasil menampilkan halaman login, membuat akun user melalui Tinker, melakukan login, menyimpan session pengguna, serta menampilkan halaman manajemen produk dan varian setelah login berhasil.

Dengan demikian, pengerjaan Modul 13 untuk Muhammad Kamil Fauzan dengan NIM 2311102314 telah berhasil dilakukan.
