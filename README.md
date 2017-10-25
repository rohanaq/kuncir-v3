![Kuncir v3 logo](/kuncirv3.png)
# kuncir-v3
## Table of Contents
- [About](#about)
- [What's Included](#whats-included)
  - [Admin](#admin)
  - [API](#api)
  - [KUNCIR](#kuncir)
- [Requirements](#requirements)
  - [Admin](#admin)
  - [API](#api)
  - [KUNCIR](#kuncir)
- [Installations](#installations)

## About
Kuncir _version_ 3.0 (Kuncir v3) adalah sebuah project dari laboratorium Arsitektur dan Jaringan Komputer (AJK) yang merupakan pengembangan dari kuncir sebelumnya. Project ini bermula dengan ketetapan pihak jurusan yang memberlakukan penutupan gerbang parkir sepeda motor di jam malam namun masih banyaknya mahasiswa yang menggunakan akses gerbang parkir. Project kuncir ini ditujukan untuk mahasiswa Informatika ITS yang kerap kesusahan saat meminjamkan kunci gerbang parkir depan. Dengan pengembangan kuncir ini diharapkan dapat menyelesaikan problematika mahasiswa Informatika saat ini.

Berbeda dari versi sebelumnya, model kuncir v3 yang menyerupai _vending machine_ diharapkan untuk menjadikan kuncir lebih _user-friendly_, lebih ergonomis, dan lebih modern.

## What's Included
Kuncir memiliki 3 sub bagian untuk menjadi sebuah kuncir yang fungsional, yakni Admin, API, dan script kuncir.
```
kuncir-v3/
├── Admin/
│   ├── css/
│   │   ├── bootstrap.css
│   │   ├── bootstrap.css.map
│   │   ├── bootstrap.min.css
│   │   ├── bootstrap.min.css.map
│   │   ├── bootstrap-grid.css
│   │   ├── bootstrap-grid.css.map
│   │   ├── bootstrap-grid.min.css
│   │   ├── bootstrap-grid.min.css.map
│   │   ├── bootstrap-reboot.css
│   │   ├── bootstrap-reboot.css.map
│   │   ├── bootstrap-reboot.min.css
│   │   └── bootstrap-reboot.min.css.map
│   ├── img/
│   │   ├── bg.png
│   │   └── bosan.png
│   ├── js/
│   │   ├── bootstrap.js
│   │   ├── bootstrap.min.js
│   │   ├── jquery-3.2.1.min.js
│   │   └── popper.min.js
│   ├── README.md
│   ├── add.php
│   ├── admin.php
│   ├── config.php
│   ├── delete.php
│   ├── edit.php
│   ├── index.php
│   ├── kuncir.sql
│   ├── logged.php
│   ├── login.php
│   ├── masuk.php
│   ├── metu.php
│   ├── nambah.php
│   └── style.css
├── API.py
├── kuncir.py
└── kuncirv3.png 
```
### Admin
Admin adalah aplikasi web yang digunakan untuk menampilkan log peminjaman kunci serta registrasi peminjam baru. Pada bagian web admin kami menggunakan framework frontend **Bootstrap** dengan bantuan popper.js

### API
API digunakan sebagai jembatan perantara antara script kuncir dan database kuncir. Pada bagian API kami menggunakan **RESTFUL API**, **Flask**, dan **SQL ALCHEMY**. Untuk Database kami menggunakan **mySQL** (untuk jenis database lain dapat diganti dengan perubahan source code). Untuk petunjuk instalasi dan penggunaan dapat dilihat di bagian selanjutnya.

### KUNCIR
Script KUNCIR ini digunakan sebagai script utama penggerak kuncir. Pada bagian kuncir kami menggunakan **Adafruit_Python_CharLCD**, **RPi.GPIO**, **OpenCV2**, dan **Numpy**. untuk petunjuk instalasi dan penggunaan dapat dilihat di bagian selanjutnya.

## Requirements
1. Raspberry Pi 2
2. Servo
3. LCD 16x2
4. Jumper wire
5. Breadboard
6. Potentiometer
7. 1 PC sebagai server
8. Kotak _vending machine_ (desain bebas, menyesuaikan hardware yang akan dimasukkan)

## Installations
Untuk memudahkan proses instalasi, kami memecah menjadi tiga komponen utama kuncir.
### Admin
1. Buatlah database baru dengan cara import dari file kuncir.sql
2. Masukkan isi folder Admin kedalam folder web server
3. Dalam file config.php terdapat isi sebagai berikut:
```php
<?php
	$databaseHost = 'localhost'; #host database
	$databaseName = 'kuncir'; #nama database
	$databaseUsername = 'root'; #username database
	$databasePassword = ''; #database password
	
	$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); #connect mysqli
?>

```
   Gantilah `$databaseHost`, `$databaseName`, `$databaseUsername`, `$databasePassword` dengan variabel yang sesuai dengan database yang sudah dibuat (contoh dalam file tersebut adalah database kuncir terdapat dalam host `localhost` dengan nama database `kuncir` dengan user `root` dan tidak memiliki password)
### Kuncir
```
1. Install NumPy
2. Install OpenCV
3. Install RPi.GPIO
4. Apa lagi?
```
   Setelah melakukan instalasi _package-package_ yang diperlukan, ganti alamat IP yang ada pada _source code_ menjadi alamat IP komputer yang dijadikan server.
```python
def check_nrp(nrp): # Fungsi untuk mengecek NRP terdaftar ke DB melalui API
	req = requests.get('http://192.168.36.13:8000/kuncir/%s' %nrp)
	result = json.loads(req.text)
	if result['status'] == "success":
		return True;
	else:
return False;
```
   Pada contoh fungsi _check_nrp_ di atas 192.168.36.13 merupakan IP Komputer yang dijadikan server, ubah IP ini sesuai IP Komputer yang anda jadikan server.
### API
```
1. Install Flask
2. Install SQLAlchemy
3. Apa lagi?
```
   ...