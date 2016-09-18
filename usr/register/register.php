<?php
function user_exists($user, $file_array)
{
    foreach ($file_array as $val)
    {
        if ($val['login'] === $user)
            return (true);
    }
    return (false);
}

if ($_POST['login'] != "" && $_POST['passwd'] != "")
{
    $pass = hash('whirlpool', $_POST['passwd']);
    $account_array = array('login' => $_POST['login'], 'passwd' => $pass);
    if (file_exists('../private/') === false)
    {
        mkdir('../private', 0777, true);
    }
    else
        $file_array = unserialize(file_get_contents('../private/passwd'));
    if (user_exists($_POST['login'], $file_array))
    {
        echo "Username already exists.\n";
    }
    else
    {
        $file_array[] = $account_array;
        file_put_contents('../private/passwd', serialize($file_array));
        echo "Registration successful!\n";
        header('Location: ../login.php');

        exit();
    }
}
elseif ($_POST['login'] == "" && $_POST['passwd'] == "")
{}
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
    <h1 align="center" class="textborder">Registration</h1>
    <br />
    <form class="textborder" align= action="create.php" method="post">
        <label style="font-size:2vw" align="left">Username:</label><input type="text" name="login"/>
        <br />
        <label style="font-size:2vw" align="left">Password:</label><input type="password" name="passwd"/>
        <br />
        <input type="submit" name="submit" value="Sign Up" />
    </form>
</div>
</body><html>
