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
    }
}
else
  echo "Username or password entered incorrectly.\n";
?>