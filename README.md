![Kuncir v3 logo](/kuncirv3.png)
# kuncir-v3
## Table of Contents
- [About](#about)
- [What's Included](#whats-included)
  - [Admin](#admin)
  - [API](#api)
  - [KUNCIR](#kuncir)
- [Requirements](#requirements)
  - [Admin](#admin-1)
  - [API](#api=1)
  - [KUNCIR](#kuncir-1)
- [Installations](#installations)
  - [Software Installation](#software-installation)
  - [Hardware Installation](#hardware-installation)
  - [Installations](#installations-1)
- [Usage](#usage)
- [Credit](#credit)
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
├── kuncirv3.png
├── Schema-Raspi-LCD-Potentio.jpg
├── Schema-Raspi-LCD.jpg
└── Schema-Raspi-Servo.png
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
Untuk memudahkan proses instalasi, kami memecah menjadi 2 bagian. Instalasi _Software_ dan Instalasi _Hardware_

## Software Installation

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
4. Masukkan semua isi folder Admin kedalam web server (untuk kedepannya ini disebut server)

### Kuncir
1. Install _packages_ python (**Adafruit_Python_CharLCD**, **RPi.GPIO**, **OpenCV2**, dan **Numpy**) dengan pip (pada bagian numpy tidak direkomendasikan untuk menggunakan `sudo pip` karena akan menimbulkan error):
```bash
sudo pip install Adafruit_CharLCD
sudo pip install RPi.GPIO
sudo pip install cv2
pip install --user numpy
```
2. Dalam file kuncir.py terdapat isi sebagai berikut:
```python
...
def check_nrp(nrp): # Fungsi untuk mengecek NRP terdaftar ke DB melalui API
	req = requests.get('http://192.168.36.13:8000/kuncir/%s' %nrp)
	result = json.loads(req.text)
	if result['status'] == "success":
		return True;
	else:
		return False;

def check_pin(nrp,pin):  # Fungsi untuk mengecek PIN dari NRP terdaftar ke DB melalui API
	req = requests.get('http://192.168.36.13:8000/kuncir/%s/%s' %(nrp,pin))
	result = json.loads(req.text)
	if result['status'] == "success":
		return True;
	else:
		return False;

def input_nrp(): # Fungsi untuk menginput NRP
	lcd.message("INPUT NRP")
	nrp = raw_input("Input NRP : ")
	return nrp

def input_pin(): # Fungsi untuk menginput PIN
	lcd.message("INPUT PIN")
	pin = raw_input("Input PIN : ")
	return pin

def capture(): # Fungsi untuk mengcapture foto dari webcam
	camera_port = 0
	camera = cv2.VideoCapture(camera_port)
	time.sleep(0.2)  # If you don't wait, the image will be dark
	return_value, image = camera.read()
	return_value, buffer = cv2.imencode('.jpg', image)
	jpg_as_text = base64.b64encode(buffer)
	print len(jpg_as_text)
	del(camera)  # so that others can use the camera as soon as possible
	return jpg_as_text

def inputData(nrp, image): # Fungsi untuk memasukan data log saat proses peminjaman kunci dengan method POST
	now = str(datetime.datetime.now())
	r=requests.post('http://192.168.36.13:8000/kuncir/login', data={'waktu_pinjam': now, 'peminjam_terdaftar_NRP': nrp, 'picture': image})

def updateData(): # Fungsi untuk menambahkan data log saat proses pengembalian kunci dengan method PUT
	now = str(datetime.datetime.now())
	r=requests.put('http://192.168.36.13:8000/kuncir/logout', data={'waktu_kembali' : now})
...
```
Ganti alamat IP (dalam source code ini adalah `192.168.36.13:8000`) yang ada pada _source code_ menjadi alamat IP PC yang dijadikan server. Untuk memperjelas lihat kutipan code dibawah:
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
1. Install _packages_ python (**RESTFUL API**, **Flask**, dan **SQL ALCHEMY**) dengan pip:
```bash
pip install flask
pip install flask-restful
pip install sqlalchemy
```
2. Pada source code API.py line 5 terdapat code:
```python
e = create_engine('mysql://kuncir:terserah@10.151.36.5/kuncir')  # membuat koneksi ke db kuncir
```
Ganti alamat IP (dalam source code ini adalah `192.168.36.5`) yang ada pada _source code_ menjadi alamat IP PC yang dijadikan penyimpanan database (server).

> Pada line terakhir dapat dilihat kutipan code sebagai berikut:
> ```python
> app.run(host='0.0.0.0', port='8000')
> ```
> Anda dapat mengganti port API (default `8000`) sesuai selera anda

Setelah ketiga komponen perangkat lunak (_software_) sudah ter-_setting_, maka dilanjutkan dengan pemasangan perangkat keras (_hardware_)

## Hardware Installation
1. Seluruh source code (__kuncir__ dan __API__) dimasukkan ke microSD (untuk __API__ bersifat optional karena peletakkan source code tidak harus dalam microSD) dan masukkan microSD kedalam slot pada __raspberry pi__
2. Untuk source code __Admin__ masukkan pada pc yang digunakan untuk log peminjaman dan registrasi user baru
3. Rangkai __jumper wire__ ke __raspberry pi__, __LCD 16x2__, dan __potensiometer__ seperti berikut.
![LCD](/Schema-Raspi-LCD.png)
![Potensiometer](/Schema-Raspi-LCD-Potentio.jpg)
4. Rangkai __Servo__ ke __raspberry pi__ seperti berikut.
![Servo](/Schema-Raspi-Servo.png)

> Jika terdapat __jumper wire__ yang bertabrakan (contoh dalam kasus ini pada bagian 5v). Gunakan __Breadboard__ untuk __jumper wire__ yang bertabrakan
>> gunakan __Breadboard__ untuk merapikan pemasangan __jumper wire__

## Installations
Jika kedua _hardware_ dan _software_ sudah ter-_install_, lakukan sebagai berikut.
1. Jalankan script __API.py__.
2. Jalankan script __kuncir.py__.
3. pada webserver, jalankan __Admin__.
4. Selamat mencoba.

## Usage
Alur penggunaan untuk kuncir v3 adalah sebagai berikut.
1. Registrasi dengan input NRP, nomor HP, tahun angkatan, dan PIN.
2. Masukkan NRP dan PIN pada keypad kotak kuncir.
3. jika NRP dan PIN benar, kunci keluar

> Jika NRP dan / atau PIN salah, maka user diminta mengisi NRP / PIN kembali

4. Gunakan kunci dan kembalikan dengan cara memasukkan kunci kedalam lubang kunci pada kotak kuncir
5. masukkan NRP dan PIN kembali untuk menkonfirmasikan bahwa user yang mengembalikan adalah user yang meminjam kunci tersebut
6. Jika NRP dan PIN benar, maka kunci tersimpan dalam kotak penyimpanan kunci dan kembali ke alur ke-1

> Jika NRP dan / atau PIN salah, maka kunci kembali keluar dan melakukan autentikasi ulang kembali dengan user yang seharusnya