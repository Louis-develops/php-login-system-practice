<?php include "functions.php"; ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Shop Form Update</title>
</head>
<body>


<form class="form" action="shop_form_update.php" method="post">

<label for="item-name">Item Name:</label><br>
<input type="text" name="item-name" id="item-name"><br><br>

<label for="item-price">Item Price:</label><br>
<input type="text" name="item-price" id="item-price"><br><br>

<label for="item-category">Item Category:</label><br>
<input type="text" name="item-category" id="item-category"><br><br>

<label for="item-stock-quantity">Item Stock qunatity:</label><br>
<input type="number" name="item-stock-quantity" id="item-stock-quantity"><br><br>

<select name="id" id="">
	<?php read_db("option"); ?>
</select>

<input type="submit" value="Submit" name="submit">

</form>

<?php update(); ?>

	

	

</body>
</html>