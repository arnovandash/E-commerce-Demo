<?php

session_start();

    // number
    //$_POST['qlty'']
if (!$_SESSION['cart'])
    $_SESSION['cart'] = [];
if (isset($_SESSION[]))







  $_SESSION["cart"][] = array($_GET['name'] => $_GET['qlty']);

header('Location: ./menu.php');
    //$_SESSION['cart'][] = $item;



?>