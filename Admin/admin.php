<?php
//including the database connection file
    include_once("config.php");

	session_start();
//	jika bukan login dengan user admin maka web diarahkan ke index.php
	if(($_SESSION['nama'])!='admin' and $_SESSION['nrp']!='123')
	{
    	header("Location: index.php");
    	die;
  	}
?>
<html>
<head>	
	<title>Surga Duniawi</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<style type="text/css" media="all">
		.log{
			text-align:center; 
    		vertical-align:middle;
    		padding: 5rem;
		}
		.tengah{
			text-align:center; 
    		vertical-align:middle;
		}
	</style>
</head>

<body>
<!--navigation bar-->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand" href="index.php">KUNCIR</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
	</nav>
<!--end of navigation bar-->
	<h1 class="text-center display-2"><b>LOGS</b></h1>
	<h5 align="center"><b>Last Updated: </b></h5>
	<h5 id="lastModified" align="center"><b></b></h5>
	<center>
<!--        tabel log-->
		<table class="table table-responsive log">
			<thead>
				<tr>
					<th class="tengah">NRP</th>
					<th class="tengah">Waktu Pinjam</th>
					<th class="tengah">Waktu Kembali</th>
					<th class="tengah">Foto</th>
				</tr>
			</thead>
			<tbody>
				<?php
				include "config.php";
				$sql = "SELECT * FROM peminjam_v3 ORDER BY idpeminjam DESC";
				$query = $mysqli->query($sql);

				while($row=mysqli_fetch_array($query)) {
					?>	
					<tr>
						<td scope="row" style="padding-top: 5rem;"><?php echo $row[4]; ?></td>
						<td style="padding-top: 5rem;"><?php echo $row[1]; ?></td>
						<td style="padding-top: 5rem;"><?php echo $row[2]; ?></td>
						<?php 
						echo '<td><img class=" img-responsive" width="250" alt="" src="'.$row[3].'"></td>';
						?>
					</tr>
					<?php
				}
				?>
			</tbody>
		</table>
<!--        end of table logs-->
	</center>
	<br>
	<center>
<!--        tombol logout-->
		<a href="metu.php">
			<button class="btn btn-lg btn-primary">Log Out</button>
		</a>
<!--        end of tombol logout-->
	</center>
<!--footer-->
	<footer class="fixed-bottom bg-dark navbar-dark">
		<center><h2 class="navbar-brand">2017 | Arsitektur dan Jaringan Komputer</h2></center>
	</footer>
<!--end of footer-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script type="text/javascript">
		 var x = document.lastModified;
    	document.getElementById("lastModified").innerHTML = x;
	</script>
</body>
</html>
