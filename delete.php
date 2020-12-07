<!DOCTYPE html>
<html>
<head>
<style>
body {
    background-image: url("images/floral2.jpg");
}
</style>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>

<?php
session_start();
session_unset();
@$_SESSION['fn'];
@$_SESSION['mi'];
@$_SESSION['ln'];
@$_SESSION['yl'];
@$_SESSION['sct'];
@$_SESSION['ids'];
$con = mysqli_connect("localhost","root","","bsit2b");
?>
<form method="post">
<p><a href="welcomehome.php">Home</a> | <a href="updating.php">Update Records</a> | <a href="login.php">Logout</a></p>
<select name="ids">
<option value="">Select ID</option>
<?php
	$qry = mysqli_query($con, "select * from student");
	if(mysqli_num_rows($qry) > 0)
	{
		while($roww = mysqli_fetch_array($qry))
		{
			echo "<option value='$roww[0]'>$roww[0]</option>";
		}
	}
	if(isset($_POST['delete']))
	{
		$ids = $_POST['ids'];
		$_SESSION['ids'] = $_POST['ids'];
		$qry = mysqli_query($con, "select * from student where Student_ID = '$ids'");
		if(mysqli_num_rows($qry) > 0)
		{
			$roww = mysqli_fetch_array($qry);
			$_SESSION['fn'] = $roww['First_Name'];
			$_SESSION['ln'] = $roww['Last_Name'];
			$_SESSION['mi'] = $roww['MI'];
			$_SESSION['yl'] = $roww['Year_Level'];
			$_SESSION['sct'] = $roww['Section'];
			$qry = mysqli_query($con,"delete from student where Student_ID = '$ids'");
		}
	}
	if(isset($_POST['save']))
	{
		$ids = $_SESSION['ids'];
		$fn = $_POST['fn'];
		$ln = $_POST['ln'];
		$mi = $_POST['mi'];
		$yl = $_POST['yl'];
		$sct = $_POST['sct'];
		mysqli_query($con, "update student set first_name = '$fn', last_name = '$ln', mi = '$mi', year_level = '$yl', section = '$sct' where student_id = '$ids'");
		echo 'SUCCESSFULLY';
	}
?>
</select>
<input type="submit" name="delete" value="Delete">
<hr>
First Name: <input type="text" name="fn" value=<?php echo @$_SESSION['fn']; ?>><br>
Last Name: <input type="text" name="ln" value=<?php echo @$_SESSION['ln']; ?>><br>
MI: <input type="text" name="mi" value=<?php echo @$_SESSION['mi']; ?>><br>
Year Level: <input type="text" name="yl" value=<?php echo @$_SESSION['yl']; ?>><br>
Section: <input type="text" name="sct" value=<?php echo @$_SESSION['sct']; ?>><br>
<input type="submit" name="save" value="SAVE">
</form>



</body>
</html>






