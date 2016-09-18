<?php
require_once './methods.php';
if (filter_has_var(INPUT_POST, 'add'))
{
    $item_name = filter_input(INPUT_POST, 'item', FILTER_SANITIZE_STRING);
    $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
    $desc = filter_input(INPUT_POST, 'desc', FILTER_SANITIZE_STRING);
    $type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_STRING);
    $img_url = $_FILES['image']['name'];
    $temp = $_FILES['image']['tmp_name'];
    $img_url = upload_image($img_url, $temp);
    insert_data($type, $item_name, $price, $img_url);
    // require_once('../index.php');
}