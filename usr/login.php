<?php
include("auth.php");

session_start();

if ((auth($_POST['login'], $_POST['passwd'])) == true)
{
    $_SESSION['logged_on_user'] = $_POST['login'];
    echo "Logged in successfully <br /> Welcome ".$_SESSION['logged_on_user'];
    header('Location: ../menu.php');
}
elseif ($_POST['login'] == "" && $_POST['passwd'] == "")
{}
else
{
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
	<h1 align="center" class="textborder">Login</h1>
<br />
<form class="textborder" action="login.php" method="post">
    <label style="font-size:2vw" align="left">Username:</label><input type="text" name="login"/>
    <br />
      <label style="font-size:2vw" align="left">Password:</label><input type="password" name="passwd"/>
    <br />
    <input class="otherbuttons" type="submit" name="submit" value="Login" />
    <button> <a class="buttontext" href="mod_pass/change_pass.php" /> Change Password</a> </button>
   <p class="textborder register" style="font-size:2vw;" align="center">New to Pizzaville? <a  href="register/register.php">Sign up now!</a>
</p>
</form>
</div>
</body><html>