<?php

session_start();

function user_exists($user, $file_array)
{
    $index = 0;
    foreach ($file_array as $val)
    {
        if ($val['login'] === $user)
            return ($index);
        $index++;
    }
    return (-1);
}

if ($_POST['login'] != "" && $_POST['oldpw'] != "" && $_POST['newpw'] != "")
{
    $file_array = unserialize(file_get_contents('../private/passwd'));
    $usr_index = user_exists($_POST['login'], $file_array);
    $oldpass = hash('whirlpool', $_POST['oldpw']);
    $newpass = hash('whirlpool', $_POST['newpw']);
    if (($usr_index >= 0) && ($file_array[$usr_index]['passwd'] === $oldpass))
    {
        $file_array[$usr_index]['passwd'] = $newpass;
        file_put_contents('../private/passwd', serialize($file_array));
        echo "Password changed successfully!\n";
        header('Location: ../login.php');
    }
    else
        echo "Username or password entered incorrectly.\n";
}
else
  echo "Username or password entered incorrectly.\n";
?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="../../css/main.css">
    <nav id="nav">
        <h1>pizzaville</h1>
    </nav>

</head>
<body id="users">
<div class="logins">
    <h1 align="center" class="textborder">Change Password</h1>
    <form class="textborder" action="change_pass.php" method="post">
        <label style="font-size:2vw" align="left">Username:</label><input type="text" name="login"/>
        <br />
        <label style="font-size:2vw" align="left">Old Password:</label><input type="password" name="oldpw"/>
        <br />
        <label style="font-size:2vw" align="left">New Password:</label><input type="password" name="newpw"/>
        <br />
        <input class="otherbuttons" type="submit" name="submit" value="Submit" />
    </form>
</div>
</body><html>