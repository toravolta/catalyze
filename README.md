<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

# Instalasi

Berikut langkah instalasi program:

-   clone repository dengan menjalankan command berikut "git clone https://github.com/toravolta/catalyze.git".
-   Install dependency dengan menjalankan command berikut "composer install".
-   buat environment file dengan menjalankan command "cp .env.example .env"
-   konfigurasi env file dengan database.
-   Buat App Key dengan command berikut "php artisan key:generate".
-   Jalankan migration dan seeder sebagai default data yang akan digunakan "php artisan migrate:refresh --seed"
-   run aplikasi "php artisan serve".

# Eksekusi

Untuk mengakses dan mengelola CMS artikel, dapat diakukan dengan langkah berikut ini:

-   akses url " localhost://article "
-   login dengan menggunakan default user dari seeder "email: admin@gmail.com/ pass: admin"
-   kelola table untuk insert data baru, edit maupun hapus.
-   untuk menampilkan gambar pada Carousel Artikel di homepage, bisa dilakukan dengan cara mengupdate data dummy dan menambahkan gambar pada form image.

Artikel yang dikelola melalui CMS diatas, akan tampil pada homepage carousel. untuk melihat detail artikel, dapat dilakukan dengan cara sbb:

-   hover artike image untuk melihat sekilas isi dari artikel tersebut.
-   klik artikel text untuk melihat detail artikel
