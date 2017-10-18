<html>
<head>
	<title>Registrasi | Kuncir</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
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
<!--registrasi-->
	<div class="container">
		<h1 class="display-4">REGISTRASI</h1>
		<form method="POST" action="add.php" enctype="multipart/form-data">
			<div class="form-group row" style="width: 50%">
				<label class="col-sm-2 col-form-label" for="nama">Nama:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" required name="nama" placeholder="Nama" ">	
				</div>
		    </div>
		    <div class="form-group row" style="width: 50%">
		    	<label class="col-sm-2 col-form-label" for="nrp">NRP:</label>
		    	<div class="col-sm-10">
		    		<input type="text" class="form-control" required name="nrp" placeholder="NRP" ">
		    	</div>
		    </div>
		    <div class="form-group row" style="width: 50%">
				<label class="col-sm-2 col-form-label" for="pin">PIN:</label>
				<div class="col-sm-10">
					<input type="password" id="pin" class="form-control" required accept="number" name="pin" placeholder="PIN" pattern="[0-9]{6}">
				<small class="form-text text-muted">PIN berupa 6 digit angka</small>
				</div>
			</div>
		    <div class="form-group row" style="width: 50%">
				<label class="col-sm-2 col-form-label" for="nohp">No HP:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" required accept="number" name="nohp" placeholder="No HP">
				</div>
		    </div>
		   	<div class="form-group row" style="width: 50%">
				<label class="col-sm-2 col-form-label" for="angkatan">Angkatan:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" required accept="number" name="angkatan" placeholder="Angkatan">
				</div>
		    </div>
		    <input type="submit" name="update" value="Submit" class="btn btn-primary btn-lg" onclick="CheckLength('pin')">
		</form>
	</div>
<!--end of registrasi-->
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

