# Sistem Informasi Surat (SIM Surat)

Aplikasi berbasis web untuk mengelola surat masuk dan surat keluar menggunakan Laravel.

## Identitas Mahasiswa

- **Nama:** Putra Ganda Prayoga
- **NIM:** 2410651057
- **Program Studi:** Teknik Informatika
- **Kelas:** C
- **Universitas:** Universitas Muhammadiyah Jember

## Deskripsi

Sistem Informasi Surat (SIM Surat) merupakan aplikasi berbasis web yang digunakan untuk membantu proses pengelolaan data surat masuk dan surat keluar secara terstruktur.

Aplikasi ini dilengkapi dengan fitur kategori surat, pencarian, filter data, pagination, upload lampiran, serta pembagian hak akses pengguna.

## Fitur Aplikasi

### 1. Dashboard
- Menampilkan halaman utama aplikasi.
- Navigasi menuju Surat Masuk dan Surat Keluar.

### 2. Surat Masuk
- Menambahkan data surat masuk.
- Melihat detail surat.
- Mengubah data surat.
- Menghapus data surat.
- Mengelola kategori surat.
- Upload lampiran surat.

### 3. Surat Keluar
- Menambahkan data surat keluar.
- Melihat detail surat.
- Mengubah data surat.
- Menghapus data surat.
- Mengelola kategori surat.
- Upload lampiran surat.

### 4. Pencarian dan Filter
- Pencarian berdasarkan nomor surat, pengirim atau tujuan, dan perihal.
- Filter berdasarkan kategori surat.
- Pagination untuk membagi tampilan data.

### 5. Hak Akses Pengguna
- **Petugas:** dapat mengelola data surat.
- **Pembaca:** hanya dapat melihat data surat.

### 6. Lampiran Surat
- Mendukung file PDF, JPG, JPEG, dan PNG.
- Ukuran maksimal file 2 MB.
- Lampiran dapat dilihat atau diunduh.

## Teknologi yang Digunakan

- PHP
- Laravel
- MySQL
- Tailwind CSS
- JavaScript
- Vite
- HTML

## Persyaratan

- PHP
- Composer
- Node.js dan NPM
- MySQL / XAMPP

## Cara Instalasi dan Menjalankan

1. Clone repository:

   ```bash
   git clone https://github.com/putra201225/praktikum-laravel.git
   ```

2. Masuk ke folder proyek:

   ```bash
   cd praktikum-laravel
   ```

3. Install dependensi Laravel:

   ```bash
   composer install
   ```

4. Install dependensi frontend:

   ```bash
   npm install
   ```

5. Salin file konfigurasi:

   ```bash
   copy .env.example .env
   ```

6. Generate application key:

   ```bash
   php artisan key:generate
   ```

7. Atur konfigurasi database pada file `.env`.

8. Jalankan migration:

   ```bash
   php artisan migrate
   ```

9. Buat symbolic link untuk lampiran:

   ```bash
   php artisan storage:link
   ```

10. Jalankan aplikasi:

    ```bash
    php artisan serve
    ```

11. Jalankan Vite pada terminal terpisah:

    ```bash
    npm run dev
    ```

12. Buka aplikasi melalui:

    ```text
    http://127.0.0.1:8000
    ```

## Pengembang

**Putra Ganda Prayoga**  
Teknik Informatika  
Universitas Muhammadiyah Jember  
2026