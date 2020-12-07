<!DOCTYPE html>
<html>
<head>
<style>
body {
    background-image: url("images/floral.jpg");
}
</style>
<meta charset="utf-8">
<title>Registration</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<h1>Registration</h1>
<form name="registration" action="" method="post">
<input type="text" name="fn" placeholder="First Name" required><br>
<input type="text" name="ln" placeholder="Last Name"required><br>
<input type="text" name="mi" placeholder="Middle Initial" required><br>
<input type="text" name="yl" placeholder="Year Level" required><br>
<input type="text" name="sec" placeholder="Section" required><br>
<input type="text" name="uname" placeholder="Username" required><br>
<input type="password" name="upass" placeholder="Password" required><br>
<input type="submit" name="save" value="REGISTER">
</form>
<br /><br />
</div>
<?php
if(isset($_POST['save']))
{
$con = mysqli_connect("localhost","root","","bsit2b");
$fn = $_POST['fn'];
$ln = $_POST['ln'];
$mi = $_POST['mi'];
$yl = $_POST['yl'];
$sec = $_POST['sec'];
$uname = $_POST['uname'];
$upass = $_POST['upass'];
if($fn == "" or $ln == "" or $mi == "" or $yl == "" or $sec == "" or $uname == "" or $upass == "")
{
	echo "fill out all fields, di mo ko madadaya. ha-ha-ha-ha";
}
else
{
if(mysqli_query($con, "insert into student(first_name, last_name, mi, year_level, section, username, password_) values('$fn','$ln','$mi','$yl','$sec','$uname','$upass')"))
{
	echo "<script>alert('record saved');</script>";
}
else
{
	echo "saving failed";
}
}
}
?>
</body>
</html>




