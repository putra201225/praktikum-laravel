## Tentang Praktikum Ini

Praktikum ini membahas penggunaan teknologi web menggunakan framework Laravel, mulai dari pengelolaan route, controller, view, hingga integrasi database menggunakan Eloquent ORM, Migration, dan Seeder.

Teknologi yang digunakan:

- PHP
- Laravel 12
- Composer
- Node.js
- NPM
- Git
- MySQL

## Persyaratan

Sebelum menjalankan project, pastikan sudah menginstal:

- PHP
- Composer
- Node.js
- NPM
- Git
- MySQL / XAMPP / Laragon

# Pengembangan Terbaru

# Sistem Informasi Manajemen Surat (Database, Seeder, Migration & Model) — 22/10/2026 — Pertemuan Ke-4

## Perubahan Saat Ini

- **Database MySQL:** Menggunakan database `db_sim_surat` untuk menyimpan data surat masuk dan surat keluar.
- **Model Surat Masuk:** Model `IncommingLetter` untuk merepresentasikan data surat masuk.
- **Model Surat Keluar:** Model `OutgoingLetter` untuk merepresentasikan data surat keluar.
- **Migration:** Mengatur struktur tabel surat masuk dan surat keluar melalui folder `database/migrations`.
- **Seeder:** Mengisi tabel surat masuk dan surat keluar dengan data awal untuk pengujian.
- **Controller:** Mengambil data surat dari database dan mengirimkannya ke halaman Blade.
- **Halaman Surat:** Menampilkan daftar dan detail surat masuk maupun surat keluar.

### Database (`.env`)

Buat database MySQL menggunakan XAMPP atau Laragon dengan nama `db_sim_surat`. Kemudian, atur konfigurasi koneksi database pada file `.env`.

Contoh konfigurasi:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_sim_surat
DB_USERNAME=root
DB_PASSWORD=
```

Sesuaikan `DB_USERNAME` dan `DB_PASSWORD` dengan konfigurasi MySQL di komputer masing-masing.

### Model (`app/Models/`)

Model merupakan representasi tabel database dalam bentuk class PHP menggunakan Eloquent ORM. Model memungkinkan aplikasi berinteraksi dengan database melalui objek Laravel.

- **`IncommingLetter.php`**: Model untuk data surat masuk pada tabel `incomming_letters`.
- **`OutgoingLetter.php`**: Model untuk data surat keluar pada tabel `outgoing_letters`.

Perintah membuat model:

```bash
php artisan make:model IncommingLetter -m
php artisan make:model OutgoingLetter -m
```

### Migration (`database/migrations/`)

Migration digunakan untuk mengatur struktur tabel database melalui kode PHP.

File migration yang digunakan:

- `2026_10_22_052517_create_incomming_letters_table.php`: Membuat tabel surat masuk.
- `2026_10_22_055909_add_keterangan_to_incomming_letters_table.php`: Menambahkan kolom keterangan pada surat masuk jika belum tersedia.
- `2026_10_22_060342_add_letter_columns_to_incomming_letters_table.php`: Menambahkan kolom nomor surat, tanggal, pengirim, dan perihal jika belum tersedia.
- `2026_10_22_063644_create_outgoing_letters_table.php`: Membuat tabel surat keluar.

Menjalankan migration:

```bash
php artisan migrate
```

### Seeder (`database/seeders/`)

Seeder digunakan untuk memasukkan data awal ke database secara otomatis.

- **`IncommingSeeder.php`**: Mengisi data awal surat masuk.
- **`OutgoingSeeder.php`**: Mengisi data awal surat keluar.

Menjalankan seeder surat masuk:

```bash
php artisan db:seed --class=IncommingSeeder
```

Menjalankan seeder surat keluar:

```bash
php artisan db:seed --class=OutgoingSeeder
```

**Catatan:** Seeder di atas dijalankan secara terpisah. Hindari menjalankan seeder berulang kali jika belum dirancang untuk mencegah data duplikat.

# Sistem Informasi Manajemen Surat (Surat Masuk & Surat Keluar) — 15/10/2026 — Pertemuan Ke-3

## Fitur Utama

- **Dashboard Utama:** Halaman awal aplikasi.
- **Modul Surat Masuk:** Menampilkan daftar surat masuk dan detail surat berdasarkan ID.
- **Modul Surat Keluar:** Menampilkan daftar surat keluar dan detail surat berdasarkan ID.
- **Sistem Layouting Global:** Menggunakan master layout untuk menjaga konsistensi tampilan halaman.
- **Named Routes:** Menggunakan nama route untuk memudahkan navigasi ant halaman.
- **Integrasi Database:** Data surat diambil dari database menggunakan model Eloquent.

---

## Struktur Komponen dan Alur Kerja (MVC)

MVC merupakan singkatan dari **Model-View-Controller**, yaitu pola arsitektur yang memisahkan kode aplikasi berdasarkan tanggung jawabnya agar lebih terstruktur dan mudah dikembangkan.

### 1. Rute Aplikasi (`routes/web.php`)

Mengatur URL dan menghubungkan permintaan pengguna dengan controller yang sesuai.

- `GET /surat-masuk` → Menampilkan daftar surat masuk.
- `GET /surat-masuk/{id}` → Menampilkan detail surat masuk.
- `GET /surat-keluar` → Menampilkan daftar surat keluar.
- `GET /surat-keluar/{id}` → Menampilkan detail surat keluar.

### 2. Pengendali Logika (`app/Http/Controllers/`)

Controller menangani permintaan pengguna, mengambil data dari model, lalu mengirimkan data ke view.

- **`SuratMasukController.php`**: Mengambil data surat masuk dan menampilkan detail surat berdasarkan ID.
- **`SuratKeluarController.php`**: Mengambil data surat keluar dan menampilkan detail surat berdasarkan ID.

### 3. Model (`app/Models/`)

Model menghubungkan aplikasi dengan tabel database menggunakan Eloquent ORM.

- **`IncommingLetter.php`**: Mengelola data surat masuk.
- **`OutgoingLetter.php`**: Mengelola data surat keluar.

### 4. Tampilan dan Tata Letak Induk (`resources/views/`)

Tampilan aplikasi menggunakan Blade Template Engine untuk menyusun halaman web.

- **`layout/app.blade.php`**: Master layout yang menjadi kerangka utama halaman aplikasi.
- **`surat-masuk/index.blade.php`**: Menampilkan daftar surat masuk.
- **`surat-masuk/show.blade.php`**: Menampilkan detail surat masuk.
- **`surat-keluar/index.blade.php`**: Menampilkan daftar surat keluar.
- **`surat-keluar/show.blade.php`**: Menampilkan detail surat keluar.

Halaman surat menggunakan `@extends('layout.app')` untuk memakai master layout dan `@section('content')` untuk menampilkan konten masing-masing halaman.

## Cara Menjalankan Proyek Secara Lokal

1. **Clone repository:**

   ```bash
   git clone https://github.com/putra201225/praktikum-laravel.git
   ```

2. **Masuk ke direktori proyek:**

   ```bash
   cd praktikum-laravel
   ```

3. **Instal dependensi PHP:**

   ```bash
   composer install
   ```

4. **Salin file konfigurasi environment di Windows:**

   ```powershell
   Copy-Item .env.example .env
   ```

5. **Buat application key:**

   ```bash
   php artisan key:generate
   ```

6. **Buat database MySQL dengan nama `db_sim_surat`**, lalu sesuaikan konfigurasi database di file `.env`.

7. **Jalankan migration:**

   ```bash
   php artisan migrate
   ```

8. **Masukkan data contoh jika diperlukan:**

   ```bash
   php artisan db:seed --class=IncommingSeeder
   php artisan db:seed --class=OutgoingSeeder
   ```

9. **Jalankan server Laravel:**

   ```bash
   php artisan serve
   ```

10. **Buka aplikasi di browser:**

    - Halaman Surat Masuk: `http://127.0.0.1:8000/surat-masuk`
    - Halaman Surat Keluar: `http://127.0.0.1:8000/surat-keluar`

## Repository GitHub

https://github.com/putra201225/praktikum-laravel