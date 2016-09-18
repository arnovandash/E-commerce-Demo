<?php
session_start();
$db = mysqli_connect('localhost', 'root', 'password', 'rush');
$connection_error = mysqli_connect_error();
if ($connection_error != null) {
    header('Location: ./error.php');
    exit();
}
function display_products()
{
    global $db;
    $data = [];
    $results = mysqli_query($db, 'SELECT * FROM `pizza`');
    if ($results)
    {
        while ($row = mysqli_fetch_assoc($results))
        {
            $data[] = $row;
        }
    }
    return ($data);
}
?>
<html>
<head>
	<title>Rush 00</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body id="menu" class="textborder">
<?php require_once('header.php');?>
<div class="menu">
<h1 class="textborder">Pizza Menu</h1>
	<?php  
	$data = display_products();

	print_r($_SESSION["cart"]);

	foreach ($data as $key => $value) : ?>
	<div class="item">
		<img src="img/<?php echo trim($value['pizza_img']); ?>">
		<p><?php echo trim($value['pizza_name']); ?></p>
		<div class="add-to-cart">
			<form action="cart.php" method="get">
				<input type="number" min="1" value="1" name="qlty">
				<select>
					<option>Small</option>
					<option>Medium</option>
					<option>Large</option>
				</select>
				<input type="submit" name="<?php echo $value['pizza_id']?>" value="Add to cart" "/>
			</form>
		</div>
	</div>
	<?php endforeach; ?>
</div>
</body>
</html>
