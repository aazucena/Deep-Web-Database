<?php
if (isset($_COOKIE['logged'])) {
    unset($_COOKIE['logged']);
    unset($_COOKIE['id']);
    unset($_COOKIE['email']);
    unset($_COOKIE['user']);
    unset($_COOKIE['first']);
    unset($_COOKIE['last']);
    unset($_COOKIE['passwd']);
    setcookie('id', null, time()-3600);
    setcookie('logged', null, time()-3600);
    setcookie("email", null, time()-3600);
    setcookie("user", null, time()-3600);
    setcookie("first", null, time()-3600);
    setcookie("last", null, time()-3600);
    setcookie("passwd", null, time()-3600);
    header("Location: index.php");
}
?>
