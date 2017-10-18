<html>
<head>
	<title>Login | Kuncir</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand" href="index.php">KUNCIR</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
	</nav>
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
	<footer class="fixed-bottom bg-dark navbar-dark">
		<center><h2 class="navbar-brand">2017 | Arsitektur dan Jaringan Komputer</h2></center>
	</footer>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>
</html>

