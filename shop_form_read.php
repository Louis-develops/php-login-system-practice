<?php include "functions.php"; ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Shop Form Create</title>
</head>
<body>


	<form class="form" action="shop_form_read.php" method="post">

		<input type="submit" value="Submit" name="submit">

	</form>

	<ul>
		<?php read_db(); ?>
	</ul>

	

</body>
</html>