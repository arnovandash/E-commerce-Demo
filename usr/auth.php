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

function auth($login, $passwd)
{
    $file_array = unserialize(file_get_contents('../private/passwd'));
    $usr_index = user_exists($login, $file_array);
    $pass = hash('whirlpool', $passwd, false);
    if (($usr_index >= 0) && ($file_array[$usr_index]['passwd'] === $pass))
        return (true);
    else
        return (false);
}
?>