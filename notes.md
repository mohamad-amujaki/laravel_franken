# Setup Laravel Franken

Dokumentasi langkah-langkah instalasi dan konfigurasi proyek Laravel **laravel-franken**.

## 1. Prasyarat

Cek ketersediaan tools yang diperlukan:

```bash
php -v          # PHP 8.5.8
composer -V     # Composer 2.8.11
laravel --version  # Laravel Installer 5.22.0
npm -v          # 10.9.8
bun -v          # 1.3.9
```

Semua tools tersedia tanpa perlu instalasi tambahan.

## 2. Membuat Aplikasi Laravel

Perintah yang digunakan (mengacu pada [https://laravel.com/for/agents](https://laravel.com/for/agents)):

```bash
cd /Users/mohamadarifmujaki/Learning/php-app/php-franken
laravel new laravel-franken \
  --database=sqlite \
  --react \
  --npm \
  --no-interaction
```

### Detail konfigurasi

- **Database**: SQLite
- **Starter Kit**: React + Inertia
- **Package Manager**: npm
- **Autentikasi**: Laravel Fortify (built-in)
- **Testing**: PHPUnit

## 3. Instalasi Dependensi

Frontend dependencies otomatis diinstal oleh Laravel installer via npm.

## 4. Migrasi Database

Menjalankan migrasi awal:

- `users` table
- `cache` table
- `jobs` table
- `passkeys` table
- `two_factor_columns` (users table)

## 5. Post-Installasi

### Fix APP_URL

Terdapat duplikasi port pada `.env` (`http://localhost:8000:8000`), diperbaiki menjadi `http://localhost:8000`.

### Laravel Cloud CLI

```bash
composer global require laravel/cloud-cli
```

## 6. Menjalankan Development Server

```bash
cd laravel-franken
composer run dev
```

Server berjalan secara paralel:

- **Laravel server**: `http://localhost:8000`
- **Vite dev server**: untuk HMR (Hot Module Replacement)
- **Queue worker**: pemrosesan job antrian
- **Pail**: tailing log aplikasi

## Struktur Proyek

```text
laravel-franken/
├── app/            # Aplikasi logic
├── bootstrap/      # Bootstrap framework
├── config/         # Konfigurasi
├── database/       # Migrasi & seeder
├── public/         # Public assets (entry point)
├── resources/      # Frontend (React)
│   ├── js/         # Komponen React
│   └── css/        # Stylesheet
├── routes/         # Route definitions
├── storage/        # File storage
├── tests/          # Test files
└── vendor/         # Composer dependencies
```

## Catatan

- Aplikasi dapat diakses di **<http://localhost:8000>**
- Untuk berhenti: tekan `Ctrl+C` pada terminal yang menjalankan `composer run dev`
- Jalankan di terminal terpisah agar bisa lanjut bekerja
