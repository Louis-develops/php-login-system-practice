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

			// Create database record
			db_create($form_validation, $form_data["username"], $form_data["password"]);

			echo $login_status_message;

		}
	}

	function db_create($is_data_valid, $username, $password){

		if($is_data_valid["username"] && $is_data_valid["password"]){
			
			// DB connection
			$db_connect = mysqli_connect("localhost", "root", "", "form-practice");

			if($db_connect){

				// Create db query
				$query = "INSERT INTO login_app(username, password) ";
				$query .= "VALUES ('$username', '$password')";

				// Send query to db
				$result = mysqli_query($db_connect, $query);

				// check if query was succesfull
				if(!$result){
					die("Failed to send data to database" . mysqli_error($db_connect));
				}

			} else {
				die("Error connecting to database");
			}
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