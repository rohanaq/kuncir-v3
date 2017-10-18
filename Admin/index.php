<!--Index.php digunakan sebagai halaman awal web-->
<?php
    //including the database connection file
    include_once("config.php");
	session_start();
//	jika sudah pernah log sebelumnya akan diarahkan ke logged.php
	if(isset($_SESSION['nrp']))
	{
		header("Location: logged.php");
        die;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>	
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Kuncir v.3</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<style type="text/css" media="all">
		html,body {
			height: 100%;
		}
		body{
		    background: #2980b9 url('img/bg.pn  g') repeat 0 0;
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
<!--    navigation bar-->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand" href="index.php">KUNCIR</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
	</nav>
<!--end of navigation bar-->
<!--    section utama-->
	<section class="utama">
		<div class="container d-flex justify-content-center my-auto">
			<div class="my-auto">
				<div id="border" class="border-light">
					<h1 class="text-center text-light display-2">KUNCIR V.3</h1><br>
				<center>
					<a href="masuk.php">
						<button class="btn btn-outline-light btn-lg">Login</button>
					</a>
					<a href="nambah.php">
						<button class="btn btn-outline-light btn-lg">Daftar</button>
					</a>
				</center>
				</div>
			</div>
		</div>
	</section>
<!--end of section utama-->
<!--footer-->
	<footer class="fixed-bottom bg-dark navbar-dark">
		<center><h2 class="navbar-brand">2017 | Arsitektur dan Jaringan Komputer</h2></center>
	</footer>
<!--end of footer-->
	<!-- Latest compiled and minified JavaScript -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>