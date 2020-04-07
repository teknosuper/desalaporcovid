# Desa Lapor Covid

[![N|Solid](https://desalaporcovid.online/desalaporcovid-logo.png)](https://desalaporcovid.online/)

Aplikasi Desa Lapor Covid-19 merupakan sebuah sistem berbasis web yang berfungsi untuk melakukan pencatatan dan pemantauan data warga yang memiliki gejala covid19 ataupun warga yang datang atau pergi dari wilayah terjangkit covid19.

Aplikasi Desa Lapor Covid-19 dirancang untuk dapat digunakan dari level Desa dan nantinya datanya dapat diakses dan dipantau di level kecamatan, kabupaten / kota, dan bahkan bisa sampai level Provinsi.

Penjelasan singkat aplikasi ini sebagai berikut :
  - Warga dapat melaporkan diri sendiri atau warga lain (tetangga) yang mengalami gejala covid19 atau melapor jika anda atau warga lain baru saja datang / akan pergi dari daerah terdampak covid19 (pemudik / perantau).
  - Data laporan warga kemudian akan di verifikasi dan divalidasi oleh posko yang didirikan di setiap wilayah (misal: RT / RW / Puskesmas).
  - Admin di level Desa, Kecamatan, Kab / Kota, dan Provinsi dapat memantau data laporan warga dan memantau kondisi warga terlapor secara cepat.

# Fitur Desa Lapor Covid!

    Tipe Pengguna : Warga 
    
  [+] Pendaftaran Pengguna Baru
  
  [+] Login Pengguna
  
  [+] Laporan Warga
  
  [+] Notifikasi Status Perkembangan Laporan Warga
  
  [+] Halaman Daftar Laporan Saya
  
  [+] Mengganti Password/ Kata Sandi Sendiri
  
  [+] Logs Semua Aktifitas Pengguna  
  
  
    Tipe Pengguna : POSKO 
  [+] Login Petugas Posko
  
  [+] Mengganti Password/ Kata Sandi Sendiri
  
  [+] Notifikasi Laporan Warga
  
  [+] Validasi Laporan Warga
  
  [+] Merubah Status Laporan Warga
  
  [+] Notifikasi Laporan Warga  
  
  [+] Import/Pindah/Copy Data Dari Laporan Warga Ke Data Posko
  
  [+] Membuat Data Posko (Data Pantauan Warga Pendatang/Pemudik)
  
  [+] Merubah Status Data Posko (Data Posko)
  
  [+] Menambah/ Merubah Data Pantauan Harian
  
  [+] Mencetak PDF Data Posko Per Desa Petugas Posko
  
  [+] Mencetak PDF Detail Data Posko Per Warga Desa Petugas Posko
  
  [+] Logs Semua Aktifitas Pengguna  
  
  [ ] Statistik Data Posko 1 Desa
  
  [ ] Statistik Laporan Warga 1 Desa
  
  
      Tipe Pengguna : ADMIN DESA 
  [+] Login ADMIN DESA
  
  [+] Mengganti Password/ Kata Sandi Sendiri
  
  [+] Notifikasi Laporan Warga
  
  [+] Validasi Laporan Warga
  
  [+] Merubah Status Laporan Warga
  
  [+] Notifikasi Laporan Warga  
  
  [+] Import/Pindah/Copy Data Dari Laporan Warga Ke Data Posko
  
  [+] Membuat Data Posko (Data Pantauan Warga Pendatang/Pemudik)
  
  [+] Merubah Status Data Posko (Data Posko)
  
  [+] Menambah/ Merubah Data Pantauan Harian
  
  [+] Mencetak PDF Data Posko Per Desa Petugas Posko
  
  [+] Mencetak PDF Detail Data Posko Per Warga Desa Petugas Posko
  
  [+] Merubah Status Pengguna dari Desa Yang Sama Menjadi Tipe Posko Atau Admin
  Desa
  
  [+] Merubah Kata Sandi Pengguna dari Desa Yang Sama
  
  [+] Merubah Status Pengguna Dari Desa Yang Sama (AKTIF/DITANGGUHKAN)
  
  [+] Menghapus Data Posko
  
  [x] Menghapus Laporan Warga
  
  [x] Logs Semua Aktifitas Pengguna  
  
  [ ] Statistik Data Posko 1 Desa
  
  [ ] Statistik Laporan Warga 1 Desa
  
  
      Tipe Pengguna : PETUGAS PUSKESMAS 
  [ ] Login PETUGAS PUSKESMAS
  
  [ ] Mengganti Password/ Kata Sandi Sendiri
  
  [ ] Melihat Data Posko 1 Kecamatan
  
  [ ] Menambahkan/ Merubah Data Pantauan Harian Warga 
  

### Tech

Desa Lapor Covid uses a number of open source projects to work properly:

* [PHP](https://www.php.net/) - PHP is a popular general-purpose scripting language that is especially suited to web!
* [Twitter Bootstrap](https://getbootstrap.com/) - The most popular HTML, CSS, and JS library in the world.
* [Yii2 Framework](https://www.yiiframework.com/) - Yii is a fast, secure, and efficient PHP framework.
* [MySQL](https://www.mysql.com/) - MySQL is an open-source relational database management system (RDBMS)

### Installation

Desa Lapor Covid requires The minimum required [PHP](https://www.php.net/) version is PHP 5.4. to run.

Install the dependencies and start the server.

```sh
$ git clone https://github.com/teknosuper/desalaporcovid.git
$ composer install --ignore-platform-reqs
$ composer update
$ php yii migration
import mysql data in folder data/sql
```

For Development environments...

```sh
$ nano web/index.php 
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev')
$ nano config/db-local.php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=desalaporcovid',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    // 'enableSchemaCache' => true,
    // 'schemaCacheDuration' => 3600*24,
    // 'schemaCache' => 'cache',
];

```

For production environments...

```sh
$ nano web/index.php 
defined('YII_DEBUG') or define('YII_DEBUG', false);
defined('YII_ENV') or define('YII_ENV', 'prod')
$ nano config/db-local.php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=desalaporcovid',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    'enableSchemaCache' => true,
    'schemaCacheDuration' => 3600*24,
    'schemaCache' => 'cache',
];

```
### Development

Want to contribute? Great! 

### Todos

 - Write MORE Tests

