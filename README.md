# Praktikum Laravel

## Tentang Praktikum Ini

Praktikum ini membahas penggunaan framework Laravel untuk membangun aplikasi web dengan struktur kode yang terorganisasi menggunakan konsep Model-View-Controller (MVC).

### Teknologi yang Digunakan

- PHP
- Laravel 12
- Composer
- Node.js
- NPM
- Git
- MySQL / SQLite

## Persyaratan

Sebelum menjalankan proyek, pastikan perangkat lunak berikut sudah terpasang:

- PHP
- Composer
- Node.js dan NPM
- Git
- XAMPP atau Laragon (opsional, untuk lingkungan pengembangan lokal)

## Pengembangan Terbaru

### Sistem Informasi Manajemen Surat — Surat Masuk dan Surat Keluar

**Pertemuan ke-3 | 15 Oktober 2026**

Proyek ini merupakan aplikasi sederhana untuk menampilkan informasi surat masuk dan surat keluar menggunakan framework Laravel.

### Fitur Utama

- **Dashboard:** Halaman utama aplikasi yang menyediakan navigasi ke menu surat masuk dan surat keluar.
- **Surat Masuk:** Menampilkan daftar surat masuk beserta informasi detail berdasarkan ID.
- **Surat Keluar:** Menampilkan daftar surat keluar beserta informasi detail berdasarkan ID.
- **Dynamic Routing:** Menggunakan parameter ID untuk mengakses halaman detail surat.
- **Master Layout:** Menggunakan satu layout utama untuk menjaga konsistensi tampilan halaman.
- **Named Routes:** Menggunakan nama route untuk mempermudah navigasi antarhalaman.

Data surat pada tahap praktikum ini menggunakan *dummy data* berupa array di dalam controller dan belum menggunakan database untuk penyimpanan data surat.

## Struktur Komponen dan Alur Kerja MVC

MVC merupakan singkatan dari **Model-View-Controller**, yaitu pola arsitektur yang memisahkan aplikasi menjadi beberapa bagian berdasarkan tanggung jawabnya.

### 1. Routing (`routes/web.php`)

File ini mengatur URL aplikasi dan menghubungkannya dengan controller atau halaman yang sesuai.

Route yang digunakan:

| HTTP Method | URL | Fungsi |
|---|---|---|
| GET | `/` | Menampilkan Dashboard |
| GET | `/surat-masuk` | Menampilkan daftar surat masuk |
| GET | `/surat-masuk/{id}` | Menampilkan detail surat masuk |
| GET | `/surat-keluar` | Menampilkan daftar surat keluar |
| GET | `/surat-keluar/{id}` | Menampilkan detail surat keluar |

Parameter `{id}` digunakan untuk menentukan surat yang akan ditampilkan pada halaman detail.

### 2. Controller (`app/Http/Controllers/`)

Controller bertugas memproses data dan mengirimkannya ke halaman View.

- **`SuratMasukController.php`**: Mengelola daftar dan detail surat masuk.
- **`SuratKeluarController.php`**: Mengelola daftar dan detail surat keluar.

Pada tahap ini, data surat disimpan dalam array sebagai data simulasi (*dummy data*).

### 3. View dan Layout (`resources/views/`)

View bertugas menampilkan informasi kepada pengguna menggunakan Blade Template Engine.

Struktur file tampilan:

```text
resources/views/
├── dashboard.blade.php
├── welcome.blade.php
├── layout/
│   └── app.blade.php
├── surat-masuk/
│   ├── index.blade.php
│   └── show.blade.php
└── surat-keluar/
    ├── create.blade.php
    ├── index.blade.php
    └── show.blade.php
```

Keterangan:

- **`dashboard.blade.php`**: Halaman utama aplikasi.
- **`layout/app.blade.php`**: Master layout yang berisi struktur HTML utama, navigasi, dan area konten.
- **`surat-masuk/index.blade.php`**: Halaman daftar surat masuk.
- **`surat-masuk/show.blade.php`**: Halaman detail surat masuk.
- **`surat-keluar/index.blade.php`**: Halaman daftar surat keluar.
- **`surat-keluar/show.blade.php`**: Halaman detail surat keluar.
- **`surat-keluar/create.blade.php`**: Halaman formulir untuk penambahan surat keluar jika fitur tersebut digunakan.

Halaman yang menggunakan master layout memanggilnya melalui:

```php
@extends('layout.app')
```

Konten setiap halaman ditempatkan di dalam bagian:

```php
@section('content')
    {{-- Konten halaman --}}
@endsection
```

### 4. Alur Kerja Aplikasi

1. Pengguna membuka URL aplikasi.
2. Laravel mencocokkan URL dengan route yang tersedia.
3. Route memanggil controller yang sesuai.
4. Controller memproses data dan mengirimkannya ke View.
5. View menampilkan data menggunakan Blade dan master layout.

## Cara Menjalankan Proyek Secara Lokal

### 1. Clone Repository

```bash
git clone https://github.com/putra201225/praktikum-laravel.git
```

### 2. Masuk ke Direktori Proyek

```bash
cd praktikum-laravel
```

### 3. Install Dependensi

```bash
composer install
```

### 4. Siapkan File Environment

Salin file `.env.example` menjadi `.env`.

Pada Windows PowerShell, gunakan:

```powershell
Copy-Item .env.example .env
```

### 5. Generate Application Key

```bash
php artisan key:generate
```

### 6. Jalankan Server Lokal

```bash
php artisan serve
```

### 7. Buka Aplikasi

Buka browser dan akses:

```text
http://127.0.0.1:8000
```

## Tentang Pengembangan

Proyek ini akan terus dikembangkan sesuai dengan materi praktikum dan tugas pada mata kuliah.

Pengembangan selanjutnya dapat mencakup penggunaan database, fitur tambah dan edit surat, penghapusan data, serta validasi formulir.