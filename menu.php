<?php
include("cart.php");

session_start()

?>

<html>
<head>
	<title>Rush 00</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body id="menu" class="textborder">
<?php require_once('header.php'); ?>
<h1>{we are not finished yet.}</h1>

<h1> Welcome<?php echo " ".$_SESSION['logged_on_user'];?>!</h1>
<br />

<button><a class="buttontext" href="./usr/login.html"> Login </a></button>
<button><a class="buttontext" href="./usr/logout.php"> Logout </a></button>

<div>

	<h2> Margherita </h2>
	<input type="submit" name="Add Regina" value="Add to cart" onclick="add_cart("marg")"/>
	<h2> Regina </h2>
	<button type="button">Add to Cart!</button>
	<h2> Hawaiian </h2>
	<button type="button">Add to Cart!</button>
	<h2> Meaty Bastard </h2>
	<button type="button">Add to Cart!</button>
	<h2> Heart Stopper </h2>
	<button type="button">Add to Cart!</button>
	<h2> Face Melter </h2>
	<button type="button">Add to Cart!</button>
	<br />
	<button type="button">Buy</button>
</div>
</body>
</html>
