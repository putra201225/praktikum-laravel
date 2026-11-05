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

Fitur pengelolaan data surat keluar yang meliputi:

- Menampilkan daftar surat keluar.
- Menambahkan data surat keluar.
- Melihat detail surat keluar.
- Mengedit data surat keluar.
- Menghapus data surat keluar.
- Validasi input pada form.

Data surat keluar terdiri dari:

- Nomor Surat
- Tanggal
- Tujuan
- Perihal
- Keterangan

### 4. Authentication (Login dan Logout)

Fitur autentikasi digunakan untuk mengatur pengguna yang dapat mengakses aplikasi.

- Login menggunakan email dan password.
- Logout untuk mengakhiri sesi pengguna.
- Validasi email dan password.
- Pengguna yang belum login diarahkan ke halaman login.

### 5. Authorization (Hak Akses Pengguna)

Aplikasi memiliki dua jenis role pengguna, yaitu:

**Petugas**
- Dapat melihat daftar dan detail surat.
- Dapat menambahkan surat.
- Dapat mengedit surat.
- Dapat menghapus surat.

**Pembaca**
- Dapat melihat daftar surat masuk dan surat keluar.
- Dapat melihat detail surat.
- Tidak dapat menambahkan surat.
- Tidak dapat mengedit surat.
- Tidak dapat menghapus surat.

Pembatasan hak akses diterapkan menggunakan middleware `auth` dan Gate `manage-letters`.

## Struktur Project

```text
praktikum-laravel/
│
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── Auth/
│   │       │   └── LoginController.php
│   │       ├── SuratMasukController.php
│   │       └── SuratKeluarController.php
│   │
│   ├── Models/
│   │   ├── User.php
│   │   ├── IncommingLetter.php
│   │   └── OutgoingLetter.php
│   │
│   └── Providers/
│       └── AppServiceProvider.php
│
├── database/
│   ├── migrations/
│   └── seeders/
│
├── resources/
│   └── views/
│       ├── auth/
│       │   └── login.blade.php
│       ├── layout/
│       │   └── app.blade.php
│       ├── surat-masuk/
│       │   ├── index.blade.php
│       │   ├── create.blade.php
│       │   ├── edit.blade.php
│       │   └── show.blade.php
│       ├── surat-keluar/
│       │   ├── index.blade.php
│       │   ├── create.blade.php
│       │   ├── edit.blade.php
│       │   └── show.blade.php
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
8. Jalankan migration:

```bash
php artisan migrate
```

9. Jalankan aplikasi:

```bash
php artisan serve
```

10. Buka browser dan akses:

```text
http://127.0.0.1:8000
```

## Pengujian Hak Akses

Pengujian dilakukan menggunakan dua akun dengan role berbeda:

| Role | Hak Akses |
|---|---|
| Petugas | Melihat, menambah, mengedit, dan menghapus surat |
| Pembaca | Melihat daftar dan detail surat |

Pengujian juga dilakukan untuk memastikan pengguna yang belum login diarahkan ke halaman login dan pengguna dengan role pembaca tidak dapat mengakses halaman pengelolaan surat.

## Pengembang

Project ini dibuat untuk memenuhi kegiatan Praktikum Pemrograman Web Lanjut.

## Penutup

Dengan adanya aplikasi Sistem Informasi Surat, diharapkan pengelolaan data surat masuk dan surat keluar dapat dilakukan dengan lebih mudah dan terstruktur. Project ini juga menjadi sarana pembelajaran dalam memahami penggunaan Laravel, pengelolaan database MySQL, routing, controller, model, view, CRUD, validasi data, authentication, dan authorization.