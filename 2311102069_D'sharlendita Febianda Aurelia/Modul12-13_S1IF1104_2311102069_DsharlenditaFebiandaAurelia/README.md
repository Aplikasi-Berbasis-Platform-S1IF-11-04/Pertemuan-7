<h3 align="center">LAPORAN PRAKTIKUM</h3>
<h3 align="center">APLIKASI BERBASIS PLATFORM</h3>
<h3 align="center">Modul 12 & 13 </h3>

<br>
<p align="center">
  <img src="screenshot/logo telkom university.png" width="150"/>
</p>
<br>

<p align="center">
Disusun oleh:
<br><br>
D’SHARLENDITA FEBIANDA AURELIA  
<br>
2311102069  
<br>
S1 IF-11-04  
</p>

<br>

<p align="center">
Dosen Pengampu:
<br>
Cahyo Prihantoro, S.Kom., M.Eng  
</p>

<br><br>

<p align="center">
PROGRAM STUDI S1 INFORMATIKA  
<br>
FAKULTAS INFORMATIKA  
<br>
TELKOM UNIVERSITY PURWOKERTO  
<br>
2026  
</p>

---

<h3 align="center">Guided</h3>

# Modul 12 - Laravel Database 1

Modul 12 membahas penggunaan database pada Laravel melalui pembuatan aplikasi CRUD produk. CRUD terdiri dari Create, Read, Update, dan Delete.
Materi yang dipelajari pada modul ini meliputi konfigurasi database, migration, model, controller, view, route resource, templating, dan validasi form.

## Konfigurasi Database

Koneksi database diatur pada file `.env`.
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ecommerce
DB_USERNAME=root
DB_PASSWORD=
```
Kode tersebut digunakan agar Laravel dapat terhubung dengan database MySQL bernama ecommerce.

## Migration Product
Migration digunakan untuk membuat struktur tabel database.
```
Schema::create('products', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->integer('price');
    $table->timestamps();
});
```
Kode tersebut membuat tabel products dengan kolom id, name, price, created_at, dan updated_at.

## Model Product
```php
class Product extends Model
{
    protected $fillable = ['name', 'price'];
}
```
Model digunakan untuk menghubungkan Laravel dengan tabel database. Properti $fillable menentukan kolom yang boleh diisi.

# Controller dan Route
Controller dibuat menggunakan perintah:
```bash
php artisan make:controller ProductController --resource
```

Route resource digunakan untuk membuat route CRUD secara otomatis.
```php
Route::resource('product', ProductController::class);
```
Route tersebut otomatis menyediakan fitur untuk menampilkan, menambah, mengedit, memperbarui, dan menghapus data produk.

## Validasi Form
```php
$validated = $request->validate([
    'name' => 'required|min:4',
    'price' => 'required|integer|min:1000000',
]);
```
Validasi digunakan untuk memastikan input user sesuai aturan. Nama produk wajib diisi minimal 4 karakter, sedangkan harga wajib berupa angka minimal 1000000.

## Output Modul 12

Program menghasilkan aplikasi CRUD produk dengan fitur:

- Menampilkan daftar produk
- Menambah produk
- Mengedit produk
- Menghapus produk
- Menampilkan pesan validasi jika input salah

# Modul 13 - Laravel Database 2

Modul 13 membahas fitur lanjutan Laravel, yaitu session, middleware, autentikasi, dan relasi model.

## Session
Session digunakan untuk menyimpan data sementara user pada server.

```php
session()->put('email', $u->email);
session()->put('name', $u->name);
```
Kode tersebut menyimpan email dan nama user ke dalam session setelah login berhasil.

Untuk logout, session dapat dihapus dengan:
```php
session()->flush();
```

## Middleware

Middleware digunakan untuk membatasi akses halaman tertentu.
```php
Route::resource('product', ProductController::class)->middleware('auth');
```
Kode tersebut membuat halaman product hanya dapat diakses oleh user yang sudah login.

## Auth Laravel

Laravel menyediakan fitur Auth untuk proses login dan logout.
```php
if (Auth::attempt(['email' => $req->em, 'password' => $req->pwd])) {
    return redirect('/product');
}
```
Kode tersebut mengecek apakah email dan password sesuai dengan data user. Jika benar, user diarahkan ke halaman product.

## Directive @auth

```php
@auth
    {{ Auth::user()->name }}
    <a href="/logout">Logout</a>
@endauth
```

Directive @auth digunakan untuk menampilkan bagian tertentu hanya jika user sudah login.

## Relasi Model

Pada Modul 13, contoh relasi yang digunakan adalah relasi antara Product dan Variant.

Satu Product dapat memiliki banyak Variant.

```php
public function variants()
{
    return $this->hasMany(Variant::class);
}
```

Setiap Variant dimiliki oleh satu Product.
```php
public function product()
{
    return $this->belongsTo(Product::class);
}
```

## Output Modul 13

Program menghasilkan fitur:

- Login
- Logout
- Pembatasan akses menggunakan middleware
- Menampilkan data user yang sedang login
- Relasi antara Product dan Variant

---

<div align="center">
  <h3>Unguided</h3>
  <p>Tugas Pertemuan 8</p>
</div>

<hr>

# Git Branch

Git branch adalah fitur Git untuk membuat cabang pengembangan dari project utama. Branch digunakan agar developer dapat mengerjakan fitur, perbaikan, atau percobaan baru tanpa langsung mengubah branch utama seperti `main` atau `master`.

Dengan branch, pekerjaan menjadi lebih aman karena perubahan dilakukan secara terpisah. Setelah selesai, branch dapat digabungkan kembali ke branch utama menggunakan `merge`.

Contoh branch:

```bash
main
fitur-login
fitur-tambah-data
perbaikan-tampilan
```

## Fungsi Git Branch
Fungsi Git branch antara lain:
- Memisahkan pekerjaan berdasarkan fitur atau bagian project
- Menjaga branch utama tetap aman dari perubahan yang belum selesai.
- Memudahkan kerja sama tim.
- Memudahkan percobaan fitur baru.
- Memudahkan proses penggabungan kode ke branch utama.

## Keuntungan Git Branch
Keuntungan menggunakan Git branch yaitu:
- Project lebih rapi dan teratur.
- Branch utama tetap stabil.
- Cocok untuk kerja tim.
- Perubahan lebih mudah dilacak.
- Bisa mengembangkan beberapa fitur sekaligus.

### Perintah Git Branch
## Melihat Branch
```bash
git branch
```
Output:
```bash
* main
  fitur-tambah-data
```
Tanda * menunjukkan branch yang sedang digunakan.

## Membuat Branch Baru
```bash
git branch fitur-tambah-data
```
## Membuat dan Langsung Pindah Branch
```bash
git checkout -b fitur-edit-data
```

Output:
```bash
Switched to a new branch 'fitur-edit-data'
```

## Berpindah Branch
```bash
git checkout fitur-tambah-data
```

## Upload Branch ke GitHub
```bash
git push -u origin fitur-edit-data
```

## Menggabungkan Branch
```bash
git checkout main
git merge fitur-edit-data
```

## Menghapus Branch
```
git branch -d fitur-edit-data
```

### Contoh Penerapan
Pada project website Data Mahasiswa, branch dapat digunakan untuk membagi pekerjaan.
Contoh branch:
```bash
main
dsharlendita
RioCandra62
fitur-tambah-mahasiswa
fitur-edit-mahasiswa
fitur-delete-mahasiswa
```
Branch main digunakan sebagai branch utama. Branch lain digunakan untuk mengerjakan fitur atau bagian tertentu secara terpisah.

## Penjelasan Tugas 2
Program yang dibuat adalah **website CRUD Data Mahasiswa berbasis Laravel** yang terhubung dengan database lokal.
Fitur utamanya:

* Menampilkan data mahasiswa
* Menambah data mahasiswa
* Mengedit data mahasiswa
* Menghapus data mahasiswa

Program ini menggunakan konsep **MVC Laravel**, yaitu model untuk database, controller untuk proses data, dan view untuk tampilan website. Data ditampilkan menggunakan **AJAX** agar halaman dapat mengambil data dari server.

## Screenshot

### Gambar 1. Tampilan Halaman Utama Data Mahasiswa
![Tampilan Halaman Utama Data Mahasiswa](screenshot/Tampilan%20Halaman%20Utama%20Data%20Mahasiswa.png)

### Gambar 2. Tampilan Halaman Tambah Data Mahasiswa
![Tampilan Halaman Tambah Data Mahasiswa](screenshot/Tampilan%20Halaman%20Tambah%20Data%20Mahasiswa.png)

### Gambar 3. Tampilan Halaman Edit Data Mahasiswa
![Tampilan Halaman Edit Data Mahasiswa](screenshot/Tampilan%20Halaman%20Edit%20Data%20Mahasiswa.png)

### Gambar 4. Tampilan Konfirmasi Hapus Data Mahasiswa
![Tampilan Konfirmasi Hapus Data Mahasiswa](screenshot/Tampilan%20Konfirmasi%20Hapus%20Data%20Mahasiswa.png)

### Gambar 5. Tampilan Database Tabel Mahasiswa pada HeidiSQL
![Tampilan Database Tabel Mahasiswa pada HeidiSQL](screenshot/Tampilan%20Database%20Tabel%20Mahasiswa%20pada%20HeidiSQL.png)
