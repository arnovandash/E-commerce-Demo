<?php

function cart($item)
{
$cart = array("marg" => 0, "regina" => 0, "hawaii" => 0);

switch ($item)
{
	case 0:
	$cart["marg"]++;
	break;
	}
	print_r($cart);
}

?>
