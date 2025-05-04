# Rimba Ananta Project Test

Proyek test interview untuk Rimba Ananta.

## Persyaratan Sistem
- PHP >= 8.1
- Composer
- MySQL/MariaDB
- Node.js & NPM

## Cara Instalasi

1. Clone repositori ini
```bash
git clone [url-repositori]
cd rimba-ananta-project-test
```

2. Install dependensi PHP menggunakan Composer
```bash
composer install
```

3. Salin file .env.example menjadi .env
```bash
cp .env.example .env
```

4. Generate application key
```bash
php artisan key:generate
```

5. Konfigurasi database di file .env
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=username
DB_PASSWORD=password
```

6. Jalankan migrasi database
```bash
php artisan migrate
```

7. Install dependensi JavaScript
```bash
npm install
```

8. Kompilasi aset
```bash
npm run dev
```

9. Jalankan server development
```bash
php artisan serve
```

Aplikasi sekarang dapat diakses di `http://localhost:8000`

## Dokumentasi API

Untuk melihat dokumentasi API, kunjungi:
```
http://localhost:8000/api/documentation
```

## Fitur

- Manajemen Pengguna (CRUD)
- API Documentation dengan Swagger
- Authentication

## Teknologi yang Digunakan

- Laravel 10
- MySQL
- Swagger/OpenAPI
- Laravel Sanctum untuk Authentication

## Lisensi

[MIT License](LICENSE)
