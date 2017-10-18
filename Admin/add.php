<?php 
	include "config.php";
	session_start();
	$_SESSION['message'] = '';

	$nama = $mysqli->real_escape_string($_POST['nama']);
	$nrp = $mysqli->real_escape_string($_POST['nrp']);
	$pin = $mysqli->real_escape_string($_POST['pin']);
	$nohp = $mysqli->real_escape_string($_POST['nohp']);
	$angkatan = $mysqli->real_escape_string($_POST['angkatan']);
	
	if (empty($_POST='nama') || empty($_POST='nrp') || empty($_POST='pin') || empty($_POST='nohp') || empty($_POST='angkatan')) {
		if(empty($_POST='name')) {
			echo "A";
		}
		if(empty($_POST='nrp')) {
			echo "B";
		}
		if(empty($_POST='pin')) {
			echo "C";
		}
		if(empty($_POST='nohp')) {
			echo "D";
		}
		if(empty($_POST='angkatan')) {
			echo "E";
		}
	}

	$sql = "INSERT INTO peminjam_terdaftar_v3 (nama, nrp, pin, nohp, angkatan)"."VALUES('$nama', '$nrp', '$pin', '$nohp', '$angkatan')";
	if ($mysqli->query($sql) ===  true) {
		header("location: index.php");
	}
	else {
		header("location: nambah.php");
	}
?>
