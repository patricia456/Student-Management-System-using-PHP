<!DOCTYPE html>
<html>
<head>
<style>
body {
    background-image: url("images/blue3.jpg");
}
</style>
<meta charset="utf-8">
<title>Welcome Home</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>

<?php
session_start();
if(isset($_SESSION['namee']))
{
	echo "<div class='form'>";
	echo "<b>Welcome ".@$_SESSION['namee']." !</b>";
	echo "<p><a href='search.php'>Search Records</a></p>";
	echo '<br><br>
<form method="post">
<input type="submit" name="logout" value="LOG-OUT">
</form>';
}
else
{
	echo "<a href='login.php'>go to login page</a>";
}
if(isset($_POST['logout']))
{
	echo "<script>window.location.href='login.php';</script>";
	echo "</div>";
	session_unset();
	session_destroy();
	
}
?>


<?php
$search = $searchErr = "";

if (isset($_POST['btnSrch'])) {
  if (empty($_POST['search'])) {
    $searchErr = "Please fill up this field";
  }else{
    $search=$_POST['search'];
  }
  if ($search) {
    echo "<script>window.location.href='result.php?search=$search';</script>";
	
  }
}
?>
<?php 
if(isset($_POST['login.php'])){
		echo "<script>window.location.href='welcomehome.php';</script>";
}
?>

<center>
  <table class="table table-bordered" style="width: 64%;" border="0">

    <form method="POST" autocomplete="off">
      <tr>
        <td>
          <input class="form-input" type="text" name="search" placeholder="Search">
          <br><br>
        </td>
        <td>
          <input class="search" type="submit" name="btnSrch" value="Search">
          <br><br>
        </td>
      </tr>
      <tr>
        <td>
          <span style="color: red"><?php echo "$searchErr"; ?></span>
        </td>
      </tr>
    </form>


    <tr style="background-color: powderblue;">
      <td width="25%"><b>Name</b></td>
      <td width="25%"><b>Year Level</b></td>
      <td width="25%"><b>Section</b></td>
      <td width="25%"><b>Action</b></td>
    </tr>

<?php

$con = mysqli_connect("localhost","root","","bsit2b");
$retrieve_query = mysqli_query($con, "SELECT * FROM student");

while ($row_users = mysqli_fetch_assoc($retrieve_query)) {
  $Student_ID = $row_users['Student_ID'];

  $fn = $row_users['First_Name'];
  $ln = $row_users['Last_Name'];
  $mi = $row_users['MI'];
  $yl = $row_users['Year_Level'];
  $sec = $row_users['Section'];
  

  $full_name = ucfirst($fn)." ".ucfirst($mi). " " . ucfirst($ln);

  echo '
  <tr>
    <td>'.$full_name.'</td>
    <td>'.$yl.'</td>
    <td>'.$sec.'</td>
    <td>
      <center>
        <a href="updating.php?id='.$Student_ID.'">
          <button class="btn">
            <i class="glyphicon glyphicon-edit"></i>
          Edit
          </button>
        </a>

        &nbsp;

        <a href="delete.php?id='.$Student_ID.'">
          <button class="btn">
            <i class="glyphicon glyphicon-trash"></i>
          Delete
          </button
        </a>

      </center>
    </td>
  </tr>';
}

?>


  </table>
</center>
      </div>
    </div>
  </div>

</body>
</html>








