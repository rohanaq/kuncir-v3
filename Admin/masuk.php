<html>
<head>
	<title>Login | Kuncir</title>
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
<!--form login-->
	<div class="container">
		<h1 class="display-4">LOGIN</h1>
		<form name="form1" method="post" action="login.php">
		    <div class="form-group row" style="width: 50%">
		    	<label for="nrp" class="col-sm-2 col-form-label">NRP:</label>
		    	<div class="col-sm-10">
		    		<input type="text" class="form-control" name="nrp" placeholder="NRP" ">
		    	</div>
		    </div>
		    <div class="form-group row" style="width: 50%">
		    	<label for="pin" class="col-sm-2 col-form-label">PIN:</label>
		    	<div class="col-sm-10">
		    		<input type="password" class="form-control" accept="number" name="pin" placeholder="PIN" maxlength="6">
		    	</div>
		    </div>
		    <!-- <a href="index.php">
				<button class="btn btn-lg btn-primary">Back</button>
			</a> -->
		    <input type="submit" name="update" value="Login" class="btn btn-lg btn-primary">
		</form>
	</div>
<!--end of form login-->
<!--footer-->
	<footer class="fixed-bottom bg-dark navbar-dark">
		<center><h2 class="navbar-brand">2017 | Arsitektur dan Jaringan Komputer</h2></center>
	</footer>
<!--end of footer-->
<!--JavaScript-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
<!--end of JavaScript-->
</body>
</html>

