<?php
$db = mysqli_connect('localhost', 'root', '000000', 'rush');
$connection_error = mysqli_connect_error();
if ($connection_error != null) {
    echo 'error'; //don't forget to create a html to display an error
    exit();
}
function display_products()
{
    global $db;
    $data = [];
    $results = mysqli_query($db, 'SELECT * FROM `pizza`');
    if ($results)
    {
        while ($row = mysqli_fetch_assoc($results))
        {
            $data[] = $row;
        }
    }
    return ($data);
}
?>

<html>
<head>
	<title>Rush 00</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body id="menu" class="textborder">
<?php require_once('header.php'); ?>

<h1> Welcome<?php echo " ".$_SESSION['logged_on_user'];?>!</h1>
<br />

<button><a class="buttontext" href="./usr/login.html"> Login </a></button>
<button><a class="buttontext" href="./usr/logout.php"> Logout </a></button>
<div class="menu">
	<?php  
	$data = display_products();
	foreach ($data as $key => $value) : ?>
	<div class="item">
		<img src="img/<?php echo trim($value['pizza_img']); ?>">
		<p><?php echo trim($value['pizza_name']); ?></p>
		<button>add to cart</button>
	</div>
	<?php endforeach; ?>
</div>
</body>
</html>
