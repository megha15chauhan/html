<?php
$con = mysqli_connect("localhost", "root", "", "registration");

$deleteid= $_POST['deleteid'];
//echo  $deleteid;
  $deletedata = " DELETE FROM user WHERE id ='$deleteid' ";
echo $get  = mysqli_query($con,$deletedata);
if($get){
	echo '';
}