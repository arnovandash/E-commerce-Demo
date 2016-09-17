<?php

$db = mysqli_connect('localhost', 'root', 'Icandothis@85', 'rush');
$connection_error = mysqli_connect_error();
if ($connection_error != null) {
    echo 'error'; //don't forget to create a html to display an error
    exit();
}

function insert_data($type, $item_name, $price, $desc) {
    if ($type === 'pizza')
    {
        add_product(1, $item_name, $price, $desc);
    }elseif ($type === 'drinks') {
        add_product(2, $item_name, $price, $desc);
    }elseif ($type === 'dessert') {
        add_product(3, $item_name, $price, $desc);
    }elseif ($type === 'sides') {
        add_product(4, $item_name, $price, $desc);
    }
}

function add_product($type_id, $item_name, $price, $desc) {
    global $db;
    if ($type_id == 1) {
        //pizza
        $statement = mysqli_prepare($db, 'INSERT INTO `pizza`(`pizza_name`, `pizza_desc`, `pizza_price`) VALUES (?, ?, ?)');
        mysqli_stmt_bind_param($statement, 'ssd', $item_name, $desc, $price);
        mysqli_stmt_execute($statement);
    } elseif ($type_id == 2) {
        //drinks
        $statement = mysqli_prepare($db, 'INSERT INTO `drinks`(`bev_name`, `bev_desc`, `bev_price`) VALUES (?, ?, ?)');
        mysqli_stmt_bind_param($statement, 'ssd', $item_name, $desc, $price);
        mysqli_stmt_execute($statement);
    } elseif ($type_id == 3) {
        //dessert
        $statement = mysqli_prepare($db, 'INSERT INTO `dessert`(`des_price`, `des_desc`, `des_name`) VALUES (?, ?, ?)');
        mysqli_stmt_bind_param($statement, 'dss', $price, $desc, $item_name);
        mysqli_stmt_execute($statement);
    } elseif ($type_id == 4) {
        //sides
        $statement = mysqli_prepare($db, 'INSERT INTO `sides`(`sides_name`, `sides_desc`, `sides_price`) VALUES (?, ?, ?)');
        mysqli_stmt_bind_param($statement, 'ssd', $item_name, $desc, $price);
        mysqli_stmt_execute($statement);
    }
}
