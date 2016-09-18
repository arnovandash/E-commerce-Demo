<?php
session_start();
$ses = $_SESSION['loggued_on_user'];
if ($ses !== "" && $ses !== NULL)
    echo $ses."\n";
else
    echo "ERROR\n";
?>