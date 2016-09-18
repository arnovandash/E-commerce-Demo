<?php
session_start();

// <button><a class="buttontext" href="./usr/login.php"> Login </a></button>
// <button><a class="buttontext" href="./usr/logout.php"> Logout </a></button>
 if (!$_SESSION['cart_product'])
 	$_SESSION['cart_product'] = [];
 	if (isset($_POST['cart']))
 	{
 		$product  = array('product' => $_POST['product'], 'price' => $_POST['price']);
 		array_push($_SESSION['cart_product'], $product);
 		$total = count($_SESSION['cart_product']);
 	}
?>
<header>
	<nav id="nav">
		<div class="header-div">
			<h1>pizzaville</h1>
		</div>
		<div class="header-div user-login">
			<?php if ($_SESSION['logged_on_user']) : ?>
				<p>Welcome<?php echo " ".$_SESSION['logged_on_user'];?>! &nbsp;<a href="order_details.php"><img src="img/cart.svg" width="24" height="24"><?php echo $total; ?></a></p>
				<button> <a class="buttontext" href="./usr/logout.php" /> Logout</a> </button>
			<?php else : ?>
				<p>New to Pizzaville? <a class="register" href="../usr/login.php">Create profile or Login</a> <a href="order_details.php"><span><img src="img/cart.svg" width="24" height="24"><?php echo $total; ?></span></a></p>
			<?php endif; ?>
		</div>
	</nav>
</header>