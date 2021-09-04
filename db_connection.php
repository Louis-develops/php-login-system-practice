<?php 

	
	$connection = mysqli_connect("localhost", "root", "",  "shop_form");

	if (!$connection){
		echo "Connection to db failed. Please try again  later";
	}
	
?>