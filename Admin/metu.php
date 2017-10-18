<?php
	//including the database connection file
	include("config.php");
	session_start();
	session_unset();
	session_destroy();
	header("location:index.php");
	exit();
?>