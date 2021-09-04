<?php include "functions.php"; ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Shop Form Delete</title>
</head>
<body>


<form class="form" action="shop_form_delete.php" method="post">

<select name="id" id="">
	<?php read(); ?>
</select>

<input type="submit" value="Submit" name="submit">

</form>

<?php delete_record(); ?>

	

	

</body>
</html>