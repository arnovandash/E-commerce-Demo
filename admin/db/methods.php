<?php

$db = mysqli_connect('localhost', 'root', '000000', 'rush');
$connection_error = mysqli_connect_error();
if ($connection_error != null) {
    include('../../error.php');
    exit();
}
function insert_data($type, $item_name, $price, $img) {
    if ($type === 'pizza')
    {
        add_product(1, $item_name, $price, $img);
    }elseif ($type === 'drinks') {
        add_product(2, $item_name, $price, $img);
    }elseif ($type === 'dessert') {
        add_product(3, $item_name, $price, $img);
    }elseif ($type === 'sides') {
        add_product(4, $item_name, $price, $img);
    }
}

function upload_image($image, $ftp_file){
    $tr_image = $image; 
    $file_tmp_loc = $ftp_file;

// Path and file name

    $img_url = "../../img/" .$tr_image;

    if (file_exists($img_url)){

        $temp = str_ireplace('../../img/', '', $tr_image);

        $img_url = "../../img/". rand(1,99999).$temp;

    }
    $img = str_ireplace('../../img/', ' ', $img_url);
// Run the move_uploaded_file() function here
    if(move_uploaded_file($file_tmp_loc, $img_url)){
        $results = $img;
    }  else {
     $results = 0; 
 }
 return $results;
}

function add_product($type_id, $item_name, $price, $img) {
    global $db;
    if ($type_id == 1) {
        //pizza
        $statement = mysqli_prepare($db, 'INSERT INTO `pizza`(`pizza_name`, `pizza_price`,`pizza_img`) VALUES (?, ?, ?)');
        mysqli_stmt_bind_param($statement, 'sds', $item_name, $price, $img);
        mysqli_stmt_execute($statement);
    } elseif ($type_id == 2) {
        //drinks
        $statement = mysqli_prepare($db, 'INSERT INTO `drinks`(`bev_name`, `bev_price`, `bev_img`) VALUES (?, ?, ?)');
        mysqli_stmt_bind_param($statement, 'sds', $item_name, $price, $img);
        mysqli_stmt_execute($statement);
    } elseif ($type_id == 3) {
        //dessert
        $statement = mysqli_prepare($db, 'INSERT INTO `dessert`(`des_price`, `des_name`, `des_img`) VALUES (?, ?, ?)');
        mysqli_stmt_bind_param($statement, 'dss', $price, $item_name, $img);
        mysqli_stmt_execute($statement);
    } elseif ($type_id == 4) {
        //sides
        $statement = mysqli_prepare($db, 'INSERT INTO `sides`(`sides_name`, `sides_price`, `sides_img`) VALUES (?, ?, ?)');
        mysqli_stmt_bind_param($statement, 'sds', $item_name, $price, $img);
        mysqli_stmt_execute($statement);
    }
    // printf("Error: %s.\n", mysqli_stmt_error($statement));
    mysqli_stmt_close($statement);
}

function display_products()
{
    global $db;
    $results = mysqli_query($db, 'SELECT * FROM `pizza`');
    if ($results)
    {
        while ($row = mysqli_fetch_assoc($results))
        {
            echo $row['pizza_name'] . " " . $row['pizza_price'];
        }
    }
}
