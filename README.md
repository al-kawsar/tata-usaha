# Panduan Setup Proyek PHP Native

## Persyaratan
- PHP versi 8.2.17 atau lebih baru
- MySQL
- Server web Apache XAMPP

## Langkah Instalasi

1. **Kloning Repository**
```bash
git clone https://github.com/al-kawsar/tata-usaha.git
```

2. **Pindah ke Direktori Proyek**
```bash
cd tata-usaha
```

3. **Konfigurasi Database**
- Buat database baru di MySQL.
- Import file `database.sql` yang ada di folder proyek ke database.
- Ubah konfigurasi koneksi database pada file `config.php`:
```php
<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'password');
define('DB_NAME', 'tata_usaha');
?>
```

4. **Jalankan Proyek**
- Jika menggunakan server bawaan PHP, jalankan perintah berikut:
```bash
php -S localhost:8000
```
- Akses aplikasi melalui browser di `http://localhost:8000`.

## Struktur Direktori
- `index.php`: File utama untuk aplikasi.
- `config.php`: Konfigurasi koneksi database.
- `assets/`: Folder untuk file statis seperti CSS, JS, dan gambar.
- `includes/`: Folder untuk file yang sering digunakan seperti header dan footer.
- `database.sql`: File SQL untuk membuat tabel dan mengisi data awal.