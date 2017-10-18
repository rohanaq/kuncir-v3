<?php 
	include "config.php";
	session_start();
	$_SESSION['message'] = '';

//    mysql real_escale_string = Escape special character in a string for use in an SQL statement
	$nama = $mysqli->real_escape_string($_POST['nama']);
	$nrp = $mysqli->real_escape_string($_POST['nrp']);
	$pin = $mysqli->real_escape_string($_POST['pin']);
	$nohp = $mysqli->real_escape_string($_POST['nohp']);
	$angkatan = $mysqli->real_escape_string($_POST['angkatan']);

//	memasukkan data registrasi
	$sql = "INSERT INTO peminjam_terdaftar_v3 (nama, nrp, pin, nohp, angkatan)"."VALUES('$nama', '$nrp', '$pin', '$nohp', '$angkatan')";
//	jika query $sql bernilai benar (terisi semua), maka diarahkan ke laman index.php. jika tidak akan dikembalikan kembali ke nambah.php
	if ($mysqli->query($sql) ===  true) {
		header("location: index.php");
	}
	else {
		header("location: nambah.php");
	}
?>
