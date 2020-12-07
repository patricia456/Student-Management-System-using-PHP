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
	$con = mysqli_connect("localhost","root","","bsit2b");
	session_start();
	@$_SESSION['fn'] = $_SESSION['mi'] = $_SESSION['ln'] = $_SESSION['yl'] = $_SESSION['sct']= $ids="";
?>
<form method="post">
<p><a href="welcomehome.php">Home</a> | <a href="delete.php">Delete Records</a> | <a href="login.php">Logout</a></p>
<select name="ids" style="color: black;">
	<option value="">Select ID</option>
	<?php
		$data=mysqli_query($con,"SELECT * FROM student");
		while ($row = mysqli_fetch_array($data)) { ?>
	<option value="<?php echo $row['Student_ID']; ?>"><?php echo $row['Student_ID']; 
	?></option>
	<?php } 
	if (mysqli_num_rows($data)>0) {
		if(isset($_POST['edit'])){
		$ids = $_POST['ids'];
		$data=mysqli_query($con,"SELECT * FROM student where Student_ID='$ids'");
		$row1 = mysqli_fetch_array($data);
		$_SESSION['fn'] = $row1['First_Name'];
		$_SESSION['ln'] = $row1['Last_Name'];
		$_SESSION['mi'] =$row1['MI'];
		$_SESSION['yl'] = $row1['Year_Level'];
		$_SESSION['sct'] = $row1['Section'];
		}
	}
	?>
</select>
			<input type="submit" name="edit" value="EDIT"><hr>
Student ID	<input type="text" name="id" value="<?php echo($ids) ?>"><br>
First Name: <input type="text" name="fn" value="<?php echo($_SESSION['fn']) ?>"><br>
Last Name:  <input type="text" name="ln" value="<?php echo($_SESSION['ln'])?>"><br>
MI: 		<input type="text" name="mi" value="<?php echo($_SESSION['mi'])?>"><br>
Year Level: <input type="text" name="yl" value="<?php echo($_SESSION['yl'])?>"><br>
Section:    <input type="text" name="sct" value="<?php echo($_SESSION['sct'])?>"><br>
            <input type="submit" name="save" value="SAVE">
</form>
<?php
if (isset($_POST['save'])){
	 $var = $_POST['id']; 
	 $varfn = $_POST['fn'];
	 $varln = $_POST['ln'];
	 $varmi = $_POST['mi'];
	 $varyl = $_POST['yl'];
	 $varsct = $_POST['sct'];
		mysqli_query($con,"UPDATE student SET First_Name='$varfn' WHERE Student_ID='$var'");
		mysqli_query($con,"UPDATE student SET Last_Name='$varln' WHERE Student_ID='$var'");
		mysqli_query($con,"UPDATE student SET MI='$varmi' WHERE Student_ID='$var'");
		mysqli_query($con,"UPDATE student SET Year_Level='$varyl' WHERE Student_ID='$var'");
		mysqli_query($con,"UPDATE student SET Section='$varsct' WHERE Student_ID='$var'");
		echo 'SUCCESSFULLY';
}
?>


</body>
</html>





