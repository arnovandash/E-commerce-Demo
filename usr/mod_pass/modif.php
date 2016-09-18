<?php

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

if ($_POST['submit'] == "OK" && $_POST['login'] != "" && $_POST['oldpw'] != "" && $_POST['newpw'] != "")
{
    $file_array = unserialize(file_get_contents('../private/passwd'));
    $usr_index = user_exists($_POST['login'], $file_array);
    $oldpass = hash('whirlpool', $_POST['oldpw'], false);
    $newpass = hash('whirlpool', $_POST['newpw'], false);
    if (($usr_index >= 0) && ($file_array[$usr_index]['passwd'] === $oldpass))
    {
        $file_array[$usr_index]['passwd'] = $newpass;
        file_put_contents('../private/passwd', serialize($file_array));
        echo "OK\n";
    }
    else
        echo "ERROR\n";
}
else
  echo "ERROR\n";
?>