Proyek ini merupakan aplikasi web pinjaman berbasis Laravel. Untuk menginstal dan menjalankan proyek ini di perangkat Anda, ikuti langkah-langkah berikut:

Langkah-langkah Instalasi
Kloning Repositori: Unduh proyek dari GitHub dengan menggunakan perintah git clone di terminal atau CMD Anda. Ganti <URL_REPOSITORI> dengan URL proyek yang sesuai.

Bash

git clone <URL_REPOSITORI>
Navigasi ke Direktori Proyek: Masuk ke folder proyek yang baru saja diunduh menggunakan perintah cd.

Bash

cd loan_web
Instalasi Dependensi: Jalankan composer install untuk menginstal semua dependensi PHP yang dibutuhkan oleh proyek.

Konfigurasi Lingkungan: Salin file .env.example ke .env untuk membuat berkas konfigurasi lingkungan.

Bash

cp .env.example .env
Impor Basis Data: Impor file loan_web.sql ke MySQL Anda (bisa menggunakan phpMyAdmin, Laragon, XAMPP, atau lainnya).

Sesuaikan .env: Buka file .env dan perbarui detail basis data sesuai dengan konfigurasi Anda. Pastikan DB_DATABASE diatur ke loan_web, dan sesuaikan DB_USERNAME serta DB_PASSWORD dengan pengaturan lokal Anda.

Generate Kunci Aplikasi: Jalankan perintah ini untuk membuat kunci aplikasi yang unik.

Bash

php artisan key:generate
Jalankan Migrasi: Lakukan migrasi basis data untuk membuat tabel yang diperlukan.

Bash

php artisan migrate
Jalankan Server: Mulai server pengembangan Laravel dengan perintah berikut.

Bash

php artisan serve
Setelah server berjalan, Anda akan mendapatkan tautan di terminal. Salin tautan tersebut dan tempelkan di peramban web Anda untuk mengakses aplikasi.

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
