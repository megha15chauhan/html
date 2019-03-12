<?php
$con = mysqli_connect("localhost", "root", "", "registration");
 $id= $_POST['id'];
 $data = "Select * from user WHERE id= '$id'";
$get  = mysqli_query($con,$data);
$row  = mysqli_fetch_assoc($get);
echo json_encode( $row);






