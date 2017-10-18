<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	

	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$nrp = mysqli_real_escape_string($mysqli, $_POST['nrp']);
	$password = mysqli_real_escape_string($mysqli, $_POST['password']);	
	
	// checking empty fields
	if(empty($name) || empty($nrp) || empty($password)) {	
			
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($nrp)) {
			echo "<font color='red'>nrp field is empty.</font><br/>";
		}
		
		if(empty($password)) {
			echo "<font color='red'>password field is empty.</font><br/>";
		}		
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE users SET name='$name',nrp='$nrp',password='$password' WHERE id=$id");
		
		//redirectig to the display pnrp. In our case, it is index.php
		header("Location: admin.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM users WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$name = $res['name'];
	$nrp = $res['nrp'];
	$password = $res['password'];
}
?>
<html>
<head>	
	<title>Kuncir</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>

<body style="padding-left: 20px;">
	<br>
	<p>Password harus berupa angka dan tidak dimulai dengan 0</p>
	<form name="form1" method="post" action="edit.php">
		<div class="form-group" style="width: 40%">
	      <label for="name">Nama:</label>
	      <input type="text" class="form-control" name="name" value="<?php echo $name;?>">
	    </div>
	    <div class="form-group" style="width: 40%">
	      <label for="nrp">NRP:</label>
	      <input type="text" class="form-control" name="nrp" value="<?php echo $nrp;?>">
	    </div>
	    <div class="form-group" style="width: 40%">
	      <label for="nrp">Password:</label>
	      <input type="password" class="form-control" accept="number" name="password" value="<?php echo $password;?>">
	    </div>
	    <input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
	    <input type="submit" name="update" value="Update" class="btn btn-primary">
	</form>
</body>
</html>
