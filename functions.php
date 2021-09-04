<?php

	include "db_connection.php";

	// Create store item
	function create_item(){
		global $connection;

		if(isset($_POST["submit"])){

			// Get form values
			$item_name = $_POST["item-name"];
			$item_price = $_POST["item-price"];
			$item_category = $_POST["item-category"];
			$stock_quantity = $_POST["item-stock-quantity"];

			// Check form has been completed
			if($item_name && $item_price && $item_category && $stock_quantity){

				// Create SQL query
				$sql_query = "INSERT INTO products(item_name, item_price, item_category, stock_quantity) ";
				$sql_query .= "VALUES ('$item_name', '$item_price', '$item_category', '$stock_quantity')";

				// Send query to db
				$result = mysqli_query($connection, $sql_query);

				// Check if query was succesful
				if($result){
					echo "Product added to database";
				} else {
					die("Error. Please try again later " . mysqli_error($connection));
				}

			} else {
				echo "Please complete all form fields";
			}
		}

		
	}

	
	


?>