<?php include "includes/header.php"; ?>

	<form class="form" action="shop_form_create.php" method="post">

		<label for="item-name">Item Name:</label><br>
		<input type="text" name="item-name" id="item-name"><br><br>

		<label for="item-price">Item Price:</label><br>
		<input type="text" name="item-price" id="item-price"><br><br>

		<label for="item-category">Item Category:</label><br>
		<input type="text" name="item-category" id="item-category"><br><br>

		<label for="item-stock-quantity">Item Stock qunatity:</label><br>
		<input type="number" name="item-stock-quantity" id="item-stock-quantity"><br><br>
		
		
		<input type="submit" value="Submit" name="submit">

	</form>

	<?php create_item(); ?>

<?php include "includes/footer.php"; ?>