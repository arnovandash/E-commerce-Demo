<?php
session_start();
$_SESSION['logged_on_user'] = NULL;
session_destroy();
header('Location: ./login.php');
echo "User logged out successfully!\n";
?>