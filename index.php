<!DOCTYPE html>
<html>
<head>
<title>Submit Form Using AJAX and jQuery</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>


 
<script type="text/javascript" src="https://cdn.jsdelivr.net/validation.engine/2.6.2/jquery.validationEngine.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/validation.engine/2.6.2/languages/jquery.validationEngine-en.js"></script>
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/validationEngine.jquery.min.css" type="text/css"/> -->

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/languages/jquery.validationEngine-en.js" type="text/javascript"></script>
 <script src="js/jquery.validationEngine-en.js" type="text/javascript"></script>
<script src="jquery.validationEngine.js" type="text/javascript"></script>  -->
<link href="css/style1.css" rel="stylesheet">
  <link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css"/>  
<script src="js/script.js"></script>
</head>

<body>
	<div id="mainform">
		<!-- <h2>Register Yourself</h2> --> <!-- Required div Starts Here -->
		 <form id="data" method="post" enctype="multipart/form-data">
			<div id="create">
				<h3 id="success">Fill Your Information !</h3>


				<div class="success"></div>

					<div>
						<label> First Name :</label>
						<input value="" id="name" name="fname" class="name1  validate[required]" type="text">
						<div class="name1_error error" ></div>

						<label> Last Name :</label>
						<input value="" id="lname" class="lname1 validate[required]" name="lname" type="text">
						<div class="lname1_error error" ></div>

						<label> Username :</label>
						<input value="" id="uname" class="uname1 validate[required]" name="uname"type="text">
						<div class="uname1_error error" ></div>

						<label>Email :</label>
						<input value="" id="email" class="email1 validate[required,custom[email]]" name="email" type="text">
						<div class="email1_error error" ></div>

						<label>Password :</label>
						<input value="" id="password" class="password1 validate[required]" name="pwd" type="password">
						<div class="password1_error error" ></div>

						<label>Confirm Password :</label>
						<input value="" id="cpassword" class="cpassword1 validate[required,equals[password] ]" name="cpassword" type="password">
						<div class="" ></div>

						<label>Contact No :</label>
						<input value="" id="contact" class="contact1 validate[required,custom[number]] " name="contact" type="text">
						<div class="contact1_error error" ></div> 

						<input id="submit" type="button" value="Submit">
					</div>
			</div>
		</form> 
	</div>
</body>
</html>