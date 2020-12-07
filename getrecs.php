<?php
$con = mysqli_connect("localhost","root","","bsit2b");
$idd = $_REQUEST['idd'];
$qry = mysqli_query($con, "select * from student where student_id = '$idd'");
if(mysqli_num_rows($qry) > 0)
{
	$roww = mysqli_fetch_array($qry);
	$records = $roww[1]."_".$roww[2]."_".$roww[3]."_".$roww[4]."_".$roww[5];
	echo $records;
}
?>





