<?php
$con = mysqli_connect("localhost", "root", "", "registration"); // Establishing Connection with Server..
//$db = mysqli_select_db("registration", $connection); // Selecting Database
/*if ($connection ){echo "success";}
die;*/
//Fetching Values from URL
$name  =$_POST['fname'];
$lname =$_POST['lname'];
$uname =$_POST['uname'];
$email =$_POST['email'];
$password = $_POST['pwd'];
$contact=$_POST['contact'];

$return = array();

$return['errors'] = array();

if(empty($name )){
	$return['errors']['name1'] = 'First Name is required';	
}

if(empty($lname)){
	$return['errors']['lname1'] = 'Last Name is required';	
}

if(empty($uname)){
	$return['errors']['uname1'] = 'User Name is required';	
}

if(empty($email)){
	$return['errors']['email1'] = 'Email is required';	
}elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  $return['errors']['email1'] = "Invalid email format"; 

}

if(empty($password)){
	$return['errors']['password1'] = 'Password is required';	
}elseif(!($password == $_POST['cpassword'] )){
	$return['errors']['password1'] = 'not matched';
}

if(empty($contact)){
	$return['errors']['contact1'] = 'Contact is required';	
}


if(empty($return['errors'])){
	//Insert query
	$return['success'] = true;
	$query = mysqli_query($con , ("insert into user(firstname, lastname, username, email, password, file) values ('$name','$lname','$uname', '$email', '$password','$contact')"));
	mysqli_close($con); // Connection Closed	
}


$myJSON = json_encode($return , true);

echo $myJSON; die;




?>