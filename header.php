<?php
session_start();

// <button><a class="buttontext" href="./usr/login.php"> Login </a></button>
// <button><a class="buttontext" href="./usr/logout.php"> Logout </a></button>
?>
<header>
	<nav id="nav">
		<div class="header-div">
			<h1>pizzaville</h1>
		</div>
		<div class="header-div user-login">
			<?php if ($_SESSION['logged_on_user']) : ?>
				<p>Welcome<?php echo " ".$_SESSION['logged_on_user'];?>! &nbsp;<img src="img/cart.svg" width="24" height="24"></p>
			<?php else : ?>
				<p>New to Pizzaville? <a class="register" href="../usr/login.php">Create profile or Login</a> <img src="img/cart.svg" width="24" height="24"></p>
			<?php endif; ?>
		</div>
	</nav>
</header>