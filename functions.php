<?php

	include "db_connection.php";



	// delete db record
	function delete_record(){
		global $connection;
		if(isset($_POST["submit"])){
			$id = $_POST["id"];

			$sql_query = "DELETE FROM products ";
			$sql_query .= "WHERE ID = $id ";

			$result = mysqli_query($connection, $sql_query);

			if(!$result){
				die("Error deleting item from database" . mysqli_error($connection));
			} else {
				echo "Record deleted";
			}
		}
	}
	// Update db record
	function update(){
		global $connection;

		if(isset($_POST["submit"])){
			$id = $_POST["id"];
			$item_name = $_POST["item-name"];
			$item_price = $_POST["item-price"];
			$item_category = $_POST["item-category"];
			$stock_quantity = $_POST["item-stock-quantity"];

			$sql_query = "UPDATE products SET ";
			$sql_query .= "item_name = '$item_name', ";
			$sql_query .= "item_price = '$item_price', ";
			$sql_query .= "item_category = '$item_category', ";
			$sql_query .= "stock_quantity = $stock_quantity ";
			$sql_query .= "WHERE ID = $id";

			$result = mysqli_query($connection, $sql_query);

			if(!$result){
				die("Error sending data to database" . mysqli_error($connection));
			} else {
				echo "Item updated";
			}

		}
	}

	// Simple read
	function read(){
		global $connection;

		$sql_query = "SELECT * FROM products";
	
		$result = mysqli_query($connection, $sql_query);

		while($row = mysqli_fetch_assoc($result)){
			$id = $row["ID"];

			echo "<option>$id</option>";
		}

	}

	// Read from database
	function read_db($list_type){
		global $connection;
	

		$sql_query = "SELECT * FROM products";
	
		$result = mysqli_query($connection, $sql_query);

		if(!$result){
			die("Error retrieving data" . mysqli_error($connection));
		} else {
			while($row = mysqli_fetch_assoc($result)){
	
				$id = $row["ID"];
				$item_name = $row["item_name"];
				$item_price = $row["item_price"];
				$item_category = $row["item_category"];

				if($list_type == "li"){
					echo "<li>PRODUCT_ID: $id PRODUCT_NAME: $item_name PRODUCT_PRICE: $item_price PRODUCT_CATEGORY: $item_category </li>";

				} elseif ($list_type == "option"){
					echo "<option>$id</option>";
				} else {
					echo "<option>Neither</option>";
				}

			}
		}
			
	}

	// Get column names
	function get_column_names(){
		global $connection;

		$sql_query = "SHOW COLUMNS FROM products;";

		$result = mysqli_query($connection, $sql_query);

		if(!$result){
			echo die("Could not retrieve data from database" . mysqli_error($connection));
		} else {

			while($row = mysqli_fetch_assoc($result)){
				echo "<option>" . $row['Field'] . "</option>";
			}
		}

	}


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