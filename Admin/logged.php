<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM peminjam_terdaftar_v3 ORDER BY nrp DESC"); // using mysqli_query instead
?>

<?php 
	session_start();
?>

<html>
<head>	
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?php echo $_SESSION['nama']; ?> | Kuncir</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	
	<style type="text/css" media="all">
		html,body {
			height: 100%;
		}
		body{
		    <?php
		    	if($_SESSION['nrp']=="5115100163") //biar asik aja sih wkwk
		    		echo "background: #2980b9 url('https://lmcdesign-rj6zcy7b8ypu79snuv.netdna-ssl.com/wp-content/uploads/2016/01/Shrek_Tile-1-500x500.jpg') repeat 0 0;";
		    	else
		    		echo "background: #2980b9 url('https://static.tumblr.com/03fbbc566b081016810402488936fbae/pqpk3dn/MRSmlzpj3/tumblr_static_bg3.png') repeat 0 0;";
		    ?>
		    
		    
			-webkit-animation: 10s linear 0s normal none infinite animate;
			-moz-animation: 10s linear 0s normal none infinite animate;
			-ms-animation: 10s linear 0s normal none infinite animate;
			-o-animation: 10s linear 0s normal none infinite animate;
			animation: 10s linear 0s normal none infinite animate;
		 
		}
		 
		@-webkit-keyframes animate {
			from {background-position:0 0;}
			to {background-position: 500px 0;}
		}
		 
		@-moz-keyframes animate {
			from {background-position:0 0;}
			to {background-position: 500px 0;}
		}
		 
		@-ms-keyframes animate {
			from {background-position:0 0;}
			to {background-position: 500px 0;}
		}
		 
		@-o-keyframes animate {
			from {background-position:0 0;}
			to {background-position: 500px 0;}
		}
		 
		@keyframes animate {
			from {background-position:0 0;}
			to {background-position: 500px 0;}
		}
		.utama {
    		/*height: 100%;*/
    		margin-top: 12.5%;
		}
		#border{
			padding: 1em;
			border: 0.3em solid;
		}
		.btn{
			border-width: 0.2rem;
		}
	</style>
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand" href="index.php">KUNCIR</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
	</nav>
	<section class="utama">
		<div class="container d-flex justify-content-center my-auto">
			<div class="my-auto">
				<div id="border" class="border-light">
					<h1 class="text-center text-light display-2"><b><?php echo $_SESSION['nama']; ?></b><br>has logged in</h1><br>
					<center>
						<a href="#">
							<button class="btn btn-lg btn-outline-primary">Edit Data</button>
						</a>
						<a href="metu.php">
							<button class="btn btn-lg btn-outline-danger">Logout</button>
						</a>
					</center>
				</div>
			</div>
		</div>
	</section>
	<footer class="fixed-bottom bg-dark navbar-dark">
		<center><h2 class="navbar-brand">2017 | Arsitektur dan Jaringan Komputer</h2></center>
	</footer>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>
</html>