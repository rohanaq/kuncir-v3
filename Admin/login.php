<?php
	include "config.php";
	session_start();
	
	$nrp = $_POST['nrp'];
	$pin = ($_POST['pin']);

	$result = $mysqli->query("SELECT * FROM peminjam_terdaftar_v3 WHERE nrp='$nrp' AND pin='$pin'");

	if($result->num_rows>0) {
		$user = $result->fetch_assoc();
	    
	    $_SESSION['nrp'] = $user['nrp'];
	    $_SESSION['pin'] = $user['pin'];
	    $_SESSION['nama'] = $user['nama'];
	    $_SESSION['nohp'] = $user['nohp'];
	    $_SESSION['logged_in'] = true;

	    if($user['nama'] == 'admin'){
		    header("location: admin.php");
		}
		else {
		    header("location:logged.php");
		}
	}
	else {
		header("location:masuk.php");
	}
?>