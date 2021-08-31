<?php

	// CONTROLLER
	function initAndPrint(){
		if(isset($_POST["submit"])){
			// Get form data
			$form_data = getFormData();

			// Validation
			$form_validation = validateFormData($form_data["username"], $form_data["password"]);

			// Save login login status to a varible
			$login_status_message = logInStatusMessage($form_validation["username"], $form_validation["password"]);

			echo $login_status_message;

		}
	}
	
	
	
	function logInStatusMessage($username_is_valid, $password_is_valid){
		
		$login_status;

		// Username and password passed validation
		if($username_is_valid && $password_is_valid){
			$login_status = "<h1 style='color: green'>Sign up successful!</h1>";
			
		// Username is valid, password isn't
		} elseif($username_is_valid && !$password_is_valid){
			$login_status = "<h1 style='color: red'>Please enter a password with at least 8 characters</h1>";

		// Username not valid, password is
		} elseif(!$username_is_valid && $password_is_valid){
			$login_status = "<h1 style='color: red'>Please enter a username that has between 5 and 15 characters (including 5 and 15)</h1>";

		// Username and password not valid
		} elseif(!$username_is_valid && !$password_is_valid){
			$login_status = "<h1 style='color: red'>Please enter a username that has between 5 and 15 characters (including 5 and 15)</h1><br>
							 <h1 style='color: red'>Please enter a password with at least 8 characters</h1>";

		// Error
		} else {
			$login_status = "<h1> Something has gone wrong. Please try again later</h1>";
		}

		return $login_status;
	}


	function validateFormData($username, $password){
		
		$validation_arr = array();

		if(strlen($username) <= 15 && strlen($username) >= 5){
			$validation_arr["username"] = true;
		} else {
			$validation_arr["username"] = false;	
		}

		if(strlen($password) < 8){
			$validation_arr["password"] = false;
		} else {
			$validation_arr["password"] = true;
		}

		return $validation_arr;
		
	}

	function getFormData(){
		$username = $_POST["username"];
		$password = $_POST["password"];
		$form_data_array = array("username" => $username, "password" => $password);
		return $form_data_array;	
	}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Form Practice</title>
</head>
<body>


	<form action="form-practice.php" method="post">

		<input type="text" name="username" id="username" placeholder="Username"><br>
		<input type="password" name="password" id="password" placeholder="password">
		<input type="submit" value="Submit" name="submit">

	</form>
	<?php initAndPrint(); ?>

</body>
</html>