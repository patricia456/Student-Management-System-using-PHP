<!DOCTYPE html>
<html>
<head><style>
body {
    background-image: url("images/blue2.jpg");
}
</style>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="welcomehome.php">Home</a> | <a href="updating.php">Update Records</a> | <a href="login.php">Logout</a></p>
<h2>View Records</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<tbody>
<?php
$con = mysqli_connect("localhost","root","","bsit2b");
$qry = mysqli_query($con, "select * from student");
while($row = mysqli_fetch_array($qry))
{
	
	echo $row['First_Name']." ".$row['MI']." ".$row['Last_Name'].", ".$row['Year_Level'].", ".$row['Section']." ".$row['Student_ID'];
	echo "<br>";
}
?>
</tbody>
</table>
</div>
</body>
</html>
