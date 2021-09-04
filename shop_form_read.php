<?php include "includes/header.php"; ?>

	<form class="form" action="shop_form_read.php" method="post">

		<input type="submit" value="Submit" name="submit">

	</form>

	<ul>
		<?php read_db("li"); ?>
	</ul>

<?php include "includes/footer.php"; ?>