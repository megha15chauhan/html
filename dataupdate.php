<?php
$con = mysqli_connect("localhost", "root", "", "registration");

$name  =$_POST['fname'];
$lname =$_POST['lname'];
$uname =$_POST['uname'];
$email =$_POST['email'];
 echo $id = $_POST['hide'];
$contact=$_POST['contact'];


$return = array();
if(empty($return)){
	//Insert query
	$return['success'] = true;
	$query = mysqli_query($con , ("UPDATE user SET firstname='$name' , lastname='$lname',username='$uname',email='$email',file= '$contact' WHERE id= '$id'"));
	mysqli_close($con); // Connection Closed	
}


$myJSON = json_encode($return , true);

echo $myJSON; die;

