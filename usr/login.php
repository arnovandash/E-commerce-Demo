<?php
include("auth.php");

session_start();

if ((auth($_POST['login'], $_POST['passwd'])) == true)
{
    $_SESSION['logged_on_user'] = $_POST['login'];
    echo "Logged in successfully <br /> Welcome ".$_SESSION['logged_on_user'];
}
else
{
    $_SESSION['logged_on_user'] = "";
    echo "Username or password entered incorrectly.\n";
}
?>

<head>
    <link rel="stylesheet" type="text/css" href="../css/main.css">
</head>
<html>
<body id="users">
<?php require_once('../header.php'); ?>
<div class="logins">
	<h1 align="center" class="textborder">Login Page</h1>
<br />
<form action="login.php" method="post">
    <label align="left">Username:</label><input type="text" name="login"/>
    <br />
      <label align="left">Password:</label><input type="password" name="passwd"/>
    <br />
    <input type="submit" name="submit" value="Login" />
    <button> <a class="buttontext" href="./mod_pass/mod_pass.html" /> Change Password</a> </button>
   <p class="textborder register" style="font-size:2vw;" align="center">New to Pizzaville? <a  href="./register/register.html">Sign up now!</a>
</p>
</form>
</div>
</body><html>