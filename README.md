# Artjuna Admin

## Apa itu Artjuna Admin

Artjuna admin adalah website yang dibangun untuk digunakan admin Artjuna untuk mengelola user dan admin dari sanggar untuk mengelola profil sanggar, produk transaksi dan berkomunikasi dengan pelanggannya.

### Fitur Admin Artjuna

* Mengelola User Sanggar
* Mengelola User Pelanggan
* Mengelola publish budaya
* Setting Akun

### Fitur Admin Sanggar

* Mengelola Profil Sanggar
* Mengelola Produk Sanggar
* Mengelola Kontrak Pelanggan
* Pesan

## ScreenShoots

### Admin Artjuna

| ![login](ss/Login.png) | ![Beranda](ss/Dashboard%20Admin%20Artjuna.png) | ![Screenshot 2](ss/CRUD%20Sanggar.png) | ![Screenshot 2](ss/CRUD%20Pengguna.png) | ![Screenshot 2](ss/Setting%20Admin.png) |
|------------------------|------------------------------------------------|----------------------------------------|-----------------------------------------|-----------------------------------------|
| Login                  | Tampilan Beranda Admin Artjuna                 | Halaman Sanggar                        | Halaman Pengguna                        | Halaman Setting Admin                   |

### Admin Sanggar

| ![Beranda](ss/Profil%20Sanggar.png) | ![Screenshot 2](ss/CRUD%20Produk.png) | ![Screenshot 2](ss/CRUD%20Transaksi.png) | ![Screenshot 2](ss/Daftar%20Pesan.png) | ![Screenshot 2](ss/Pesan.png) | ![Screenshot 2](ss/Setting%20Sanggar.png) |
|-------------------------------------|---------------------------------------|------------------------------------------|----------------------------------------|-------------------------------|-------------------------------------------|
| Tampilan Beranda Profil Sanggar     | Halaman Produk                        | Halaman Transaksi                        | Halaman Daftar Pesan                   | Halaman Pesan                 | Halaman Setting Sanggar                   |


## Setup

Copy `env` to `.env` and tailor for your app, specifically the baseURL
and any database settings.

## Important Change with index.php

`index.php` is no longer in the root of the project! It has been moved inside the *public* folder,
for better security and separation of components.

This means that you should configure your web server to "point" to your project's *public* folder, and
not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter *public/...*, as the rest of your logic and the
framework are exposed.

**Please** read the user guide for a better explanation of how CI4 works!

## Repository Management

We use GitHub issues, in our main repository, to track **BUGS** and to track approved **DEVELOPMENT** work packages.
We use our [forum](http://forum.codeigniter.com) to provide SUPPORT and to discuss
FEATURE REQUESTS.

This repository is a "distribution" one, built by our release preparation script.
Problems with it can be raised on our forum, or as issues in the main repository.

## Server Requirements

PHP version 7.4 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) if you plan to use MySQL
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library
