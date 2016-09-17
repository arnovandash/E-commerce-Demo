<!DOCTYPE html>
<html>
<head>
	<title>Admin Area</title>
	<link rel="stylesheet" type="text/css" href="../css/main.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body id="menu">
<?php require_once('../header.php'); ?>
<div id="admin">
	<aside>
		<!-- sidebar -->
	</aside>
	<content>
	<h1>Admin Area</h1>
		<form action="db.php" method="post">
			<label for="item">Item Name:</label>
			<input type="text" name="item" class="item">
			<br>
			<label for="desc">Description:</label>
			<input type="text" name="desc" class="desc">
			<br>
			<label for="type">Item type:</label>
			<select name="type" id="">
				<option>Pizza</option>
				<option>Sides</option>
				<option>Drinks</option>
				<option>Desserts</option>
			</select>
			<br>
			<label for="price">Price:</label>
			<input type="text" class="price">
			<label for="image"></label>
			<input type="file" class="image">
			<input type="submit" name="image" value="Submit">
		</form>
	</content>
	<aside>
		<!-- right sidebar -->
	</aside>
</div>
</body>
</html>