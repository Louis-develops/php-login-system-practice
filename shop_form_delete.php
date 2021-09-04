<?php include "includes/header.php"; ?>

	<form class="form" action="shop_form_delete.php" method="post">

	<select name="id" id="">
		<?php read(); ?>
	</select>

	<input type="submit" value="Submit" name="submit">

	</form>

	<?php delete_record(); ?>

<?php include "includes/footer.php"; ?>
