<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM peminjam_v3 ORDER BY id ASC"); // using mysqli_query instead
?>

<?php 
	session_start();
	if(($_SESSION['nama'])!='admin')
	{
    	header("Location: index.php");
    	die;
  	}
?>
<html>
<head>	
	<title>Surga Duniawi</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
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
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand" href="index.php">KUNCIR</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
	</nav>
	<h1 class="text-center display-2"><b>LOGS</b></h1>
	<h5 align="center"><b>Last Updated: </b></h5>
	<h5 id="lastModified" align="center"><b></b></h5>
	<center>
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
	</center>
	<br>
	<center>
		<!-- <a href="nambah.php">
			<button class="btn btn-primary">Add New Data</button>
		</a> -->
		<a href="metu.php">
			<button class="btn btn-lg btn-primary">Log Out</button>
		</a>
	</center>
	<footer class="fixed-bottom bg-dark navbar-dark">
		<center><h2 class="navbar-brand">2017 | Arsitektur dan Jaringan Komputer</h2></center>
	</footer>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
	<script type="text/javascript">
		 var x = document.lastModified;
    	document.getElementById("lastModified").innerHTML = x;
	</script>
</body>
</html>
