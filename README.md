# Online Course Management System

## Deskripsi

Online Course Management System adalah aplikasi berbasis web yang dikembangkan menggunakan Laravel. Aplikasi ini memungkinkan pengguna untuk mengelola kursus dan materi dengan fitur CRUD (Create, Read, Update, Delete). Pengguna dapat menambahkan, mengedit, dan menghapus kursus serta materi, serta melihat daftar kursus dan materi yang tersedia.

## Fitur

### Kursus:

- Menambah kursus baru
- Melihat daftar kursus
- Mengedit informasi kursus
- Menghapus kursus

### Materi:

- Menambahkan materi ke dalam kursus
- Melihat daftar materi dalam kursus
- Mengedit informasi materi
- Menghapus materi

## Gambar Tampilan

### Halaman Kursus
![Screenshot 2024-08-11 001656](https://github.com/user-attachments/assets/3274a1b4-e176-4f8b-859a-f30f6fd28af4)

- Halaman Tambah Kursus
  ![Screenshot 2024-08-11 113249](https://github.com/user-attachments/assets/0fe17608-47eb-45f9-ae8e-b1ed6743a741)
  ![Screenshot 2024-08-11 113332](https://github.com/user-attachments/assets/19acd6d0-4f7a-410f-b03c-9c0880d86fea)

- Halaman Edit Kursus
  ![Screenshot 2024-08-11 113315](https://github.com/user-attachments/assets/659435ff-3164-44ca-9a50-6f2f4496946e)

- Halaman Hapus Kursus
  ![Screenshot 2024-08-11 113344](https://github.com/user-attachments/assets/1b785a4f-8523-4013-b860-7a2681f76207)

### Halaman Materi

- Halaman Tambah Materi
- Halaman Edit Materi
- Halaman Hapus Materi

## Prerequisites

Sebelum menjalankan aplikasi ini, pastikan bahwa Anda memiliki:

- PHP >= 8.0
- Composer
- Laravel >= 9.0
- MySQL atau database lain yang didukung

## Instalasi

1. Clone Repository:

    ```bash
    git clone https://github.com/username/repository.git
    ```

2. Masuk ke Direktori Proyek:

    ```bash
    cd repository
    ```

3. Instal Dependensi:

    ```bash
    composer install
    ```

4. Konfigurasi Environment: Salin file `.env.example` ke `.env` dan sesuaikan konfigurasi database dan lainnya:

    ```bash
    cp .env.example .env
    ```

5. Generate Key:

    ```bash
    php artisan key:generate
    ```

6. Migrasi Database:

    ```bash
    php artisan migrate
    ```

7. Jalankan Aplikasi:

    ```bash
    php artisan serve
    ```

   Akses aplikasi melalui `http://localhost:8000`.

## Penggunaan

- **Login**: Akses halaman login bisa melalui `/login` atau `localhost:8000`.
- **Dashboard**: Setelah login, akses dashboard di `/dashboard` untuk melihat dan mengelola kursus.
- **Tambah Kursus**: Klik tombol "Tambah Kursus" untuk menambahkan kursus baru.
- **Kelola Materi**: Pilih kursus dan klik "Lihat Materi" untuk mengelola materi dalam kursus tersebut.

## Lisensi

The Laravel framework is open-sourced software licensed under the MIT license.
