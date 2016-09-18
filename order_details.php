<?php 


?>
<html>
<head>
	<title></title>
</head>
<body>
<?php require_once('header.php'); ?>
<table>
	<?php
		if (count($_SESSION['cart_product']))
		{
			foreach ($_SESSION['cart_product'] as $value) {
				echo '<tr><td>' . $value['product'] .'</td><td>' . $value['price'] . '</td></tr>';
			}
		}
	?>
</table>
</body>
</html>