#!/usr/bin/python

from Adafruit_CharLCD import Adafruit_CharLCD
from time import sleep, strftime
from datetime import datetime
import RPi.GPIO as GPIO
import time
import sys
import base64
import json
import requests
import getch
import os
import datetime
import time
import cv2
import numpy

GPIO.setup(4, GPIO.OUT)
p = GPIO.PWM(4, 50)
p.start(7.5)

#Initialize LCD (must specify pinout and dimensions)
lcd = Adafruit_CharLCD(rs=26, en=19, d4=13, d5=6, d6=5, d7=11, cols=16, lines=2)

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

try:
	while True:	# Infinite loop untuk proses yang berulang - ulang
		while True:
			p.ChangeDutyCycle(7.5)
			lcd.clear()
			nrp = input_nrp()
			if check_nrp(nrp):
				while 1:
					lcd.clear()
					pin = input_pin()
					if check_pin(nrp, pin):
						lcd.clear()
						lcd.message("Halo %s" %nrp)
						break
					else:
						lcd.clear()
						lcd.message("PIN Salah.")
						sleep(2)
				break
			else:
				lcd.clear()
				lcd.message(nrp+"\nTidak Terdaftar.")
				sleep(2)
		lcd.clear()
		image=capture()
		inputData(nrp, image)
		lcd.message("selesai\ninput data")
		print "selesai input data"
		p.ChangeDutyCycle(2.5)
		sleep(2)
		p.ChangeDutyCycle(7.5)
		while True:
			lcd.clear()
			lcd.message("Tekan enter\nuntuk kembali")
			choice = raw_input("Apakah kunci kembali? (Y/N)")
		       	if choice == '':
				lcd.clear()
				lcd.message("Masukkan NRP\nuntuk verifikasi")
				nrpCek = raw_input("Masukkan NRP\nuntuk verifikasi")
				if nrp == nrpCek:
					lcd.clear()
					lcd.message("Masukkan PIN\n untuk verifikasi")
					pinCek = raw_input("Masukkan PIN\nuntuk verifikasi")
					if pin == pinCek:
						lcd.clear()
						lcd.message("Autentikasi\nberhasil")
						print ("Autentiksai berhasil")
				               	updateData()
						sleep(2)
						break
					else:
						lcd.clear()
						lcd.message("PIN anda salah")
						print("PIN anda salah")
						p.ChangeDutyCycle(2.5)
               					sleep(2)
               					p.ChangeDutyCycle(7.5)

				else:
					lcd.clear()
					lcd.message("NRP anda salah")
					print ("NRP anda salah")
					p.ChangeDutyCycle(2.5)
			                sleep(2)
               				p.ChangeDutyCycle(7.5)

except KeyboardInterrupt:
    p.ChangeDutyCycle(7.5)
    sleep(2)
    print('\nCTRL-C pressed.  Program exiting...')

finally:
    lcd.clear()
    GPIO.setwarnings(False)
