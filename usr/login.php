<?php
include("auth.php");

session_start();
if ((auth($_POST['login'], $_POST['passwd'])) == true)
{
    $_SESSION['logged_on_user'] = $_POST['login'];
    echo "Logged in successfully <br /> Welcome ".$_POST['login'];
}
else
{
    $_SESSION['logged_on_user'] = "";
    echo "Username or password entered incorrectly.\n";
}
?>