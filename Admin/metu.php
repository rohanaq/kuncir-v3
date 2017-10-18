<?php
	//including the database connection file
	include("config.php");
//	menghilangkan session
	session_start();
	session_unset();
	session_destroy();
	header("location:index.php");
	exit();
?>