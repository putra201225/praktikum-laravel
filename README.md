# SISTEM INFORMASI SURAT

## Deskripsi Project

Sistem Informasi Surat merupakan aplikasi berbasis web yang dibuat menggunakan framework Laravel. Aplikasi ini digunakan untuk membantu pengelolaan data surat masuk dan surat keluar agar proses pencatatan dan penyimpanan data menjadi lebih terstruktur.

Project ini dikembangkan sebagai bagian dari kegiatan Praktikum Pemrograman Web Lanjut.

## Teknologi yang Digunakan

- PHP 8.2
- Laravel 12
- MySQL
- HTML
- CSS
- Bootstrap (jika digunakan pada halaman tertentu)
- XAMPP
- Visual Studio Code

## Fitur Aplikasi

### 1. Dashboard
Menampilkan halaman utama aplikasi Sistem Informasi Surat.

### 2. Surat Masuk
Fitur pengelolaan data surat masuk yang meliputi:
- Menampilkan daftar surat masuk.
- Menambahkan data surat masuk.
- Melihat detail surat masuk.
- Mengedit data surat masuk.
- Menghapus data surat masuk.
- Validasi input pada form.

Data surat masuk terdiri dari:
- Nomor Surat
- Tanggal Surat
- Pengirim
- Perihal
- Keterangan

### 3. Surat Keluar
Fitur untuk menampilkan data surat keluar dan melihat detail surat berdasarkan ID.

## Struktur Project

```text
praktikum-laravel/
│
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── SuratMasukController.php
│   │       └── SuratKeluarController.php
│   │
│   └── Models/
│       └── IncommingLetter.php
│
├── resources/
│   └── views/
│       ├── layout/
│       │   └── app.blade.php
│       │
│       ├── surat-masuk/
│       │   ├── index.blade.php
│       │   ├── create.blade.php
│       │   ├── edit.blade.php
│       │   └── show.blade.php
│       │
│       ├── surat-keluar/
│       │   ├── index.blade.php
│       │   ├── create.blade.php
│       │   └── show.blade.php
│       │
│       └── dashboard.blade.php
│
├── routes/
│   └── web.php
│
├── .env
└── README.md
```

## Konfigurasi Database

Aplikasi menggunakan database MySQL dengan nama:

`db_sim_surat`

Konfigurasi database dilakukan melalui file `.env`.

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_sim_surat
DB_USERNAME=root
DB_PASSWORD=
```

## Cara Menjalankan Aplikasi

1. Pastikan XAMPP sudah terpasang.
2. Jalankan Apache dan MySQL melalui XAMPP.
3. Buka terminal pada folder project.
4. Jalankan perintah berikut:

```bash
composer install
```

5. Salin file `.env.example` menjadi `.env` jika file `.env` belum tersedia.
6. Buat application key:

```bash
php artisan key:generate
```

7. Pastikan konfigurasi database sudah sesuai.
8. Jalankan aplikasi:

```bash
php artisan serve
```

9. Buka browser dan akses:

```text
http://127.0.0.1:8000
```

## Pengembang

Project ini dibuat untuk memenuhi kegiatan Praktikum Pemrograman Web Lanjut.

## Penutup

Dengan adanya aplikasi Sistem Informasi Surat, diharapkan pengelolaan data surat masuk dan surat keluar dapat dilakukan dengan lebih mudah dan terstruktur. Project ini juga menjadi sarana pembelajaran dalam memahami penggunaan Laravel, pengelolaan database MySQL, routing, controller, model, view, serta penerapan CRUD dan validasi data.