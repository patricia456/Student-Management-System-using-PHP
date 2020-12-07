<!DOCTYPE html>
<html>
<head>
<style>
body {
    background-image: url("images/floral.jpg");
}
</style>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php 
session_start();
@$_SESSION['namee'];
?>
<div class="form">
<h1>Log In</h1>
<form method="post">
<input type="text" name="uname" placeholder="enter username">
<input type="password" name="upass" placeholder="enter password">
<input type="submit" name="login" value="Login">
</form>
<p>Not registered yet? <a href='regstration.php'>Register Here</a></p>
<br /><br />
<?php
if(isset($_POST['login']))
{
	$uname = $_POST['uname'];
	$upass = $_POST['upass'];
	$con = mysqli_connect("localhost","root","","bsit2b");
	$qry = mysqli_query($con, "select * from student where username = '$uname' and password_ = '$upass'");
	if(mysqli_num_rows($qry) > 0)
	{
		$roww = mysqli_fetch_array($qry);
		$_SESSION['namee'] = $roww['First_Name']." ".$roww['Last_Name'];
		echo "<script>window.location.href='welcomehome.php';</script>";
	}
	else
	{
		echo "no username/password registered";
	}
	
	
	
}
?>
<?php 
if(isset($_POST['welcomehome.php'])){
		echo "<script>window.location.href='login.php';</script>";
}
?>
</body>
</html>









