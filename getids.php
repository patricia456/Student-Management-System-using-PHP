<!DOCTYPE html>
<html>
<head>
<style>
body {
    background-image: url("images/blue.jpg");
}
</style>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>

<?php
$con = mysqli_connect("localhost","root","","bsit2b");
$qry = mysqli_query($con, "select * from student");
if(mysqli_num_rows($qry) > 0)
{
	echo "<option value=''>select id</option>";
	while($roww = mysqli_fetch_array($qry))
	{
		echo "<option value='$roww[0]'>$roww[0]</option>";
	}
}
else
{
	echo "<option>No ID Found</option>";
}
?>
</body>
</html>







