
<!DOCTYPE html>
<html>
<head>
	<title>Index</title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<style>
	.error{
		color: red;
	}
</style>
<body>
	<div class="main-section">
		<div class="content-section">
			<div class="head-section">
				<h2>Result</h2>
				<hr>
			</div>
			<div class="body-section" >
				<?php
$con = mysqli_connect("localhost","root","","bsit2b");

if (empty($_GET['search'])) {
	echo "Index must not be empty";
}else{
	$search = $_GET['search'];
	
	$query=mysqli_query($con,"SELECT * FROM student WHERE First_Name LIKE '%$search%' OR Last_Name LIKE '%$search%' OR MI LIKE '%$search%' OR Year_Level LIKE '%$search%' OR Section LIKE '%$search%'OR Student_ID LIKE '%$search%'");

	$check_this = mysqli_num_rows($query);

	if ($check_this > 0 && $search != "") {
		while ($row = mysqli_fetch_array($query)) {
			$db_SID = $row['Student_ID'];
			$db_fn = $row['First_Name'];
			$db_ln = $row['Last_Name'];
			$db_mi = $row['MI'];
			$db_yl = $row['Year_Level'];
			$db_sec = $row['Section'];

			$fullname = ucfirst($db_SID)." ".ucfirst($db_fn)." ".ucfirst($db_ln).". ".ucfirst($db_mi[0])." ".ucfirst($db_yl)." ".ucfirst($db_sec);

			echo "$fullname <br><br><br><br><br><br>";

			echo "<a  href='welcomehome.php'><button class'btn'> BACK TO HOME</button></a>";
		}
	}else{
		echo "<h1>No found result</h1>";
	}
}


?>

			</div>
			</div>
		<!--</div>
		<div class="footer-section">
			<a href="">Forgot your password?</a> <span>Click here to reset it.</span>
		</div>!-->
	</div>


</body>
</html>
