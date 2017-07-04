<?php
/**
 * Created by PhpStorm.
 * User: erics
 * Date: 2017-05-14
 * Time: 7:39 PM
 */

$_SESSION = array();

unset($_SESSION['username']);

if(ini_get("session.use_cookies")){
    $params = session_get_cookie_params();
    setcookie(session_name(),'',time()-42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]

    );
}

session_destroy();

header('Location: index.php');

