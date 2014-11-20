<?php
require_once('../settings.php');
    $LOGIN = new system\login();
    $YELLS = new system\yells();
    $check_cookie = $LOGIN->checkCookie();

    if($check_cookie==true) {
        system\database::connect_with_db();
        session_start();
        //$check_password = $LOGIN->checkPassword($_COOKIE['userid'],$_COOKIE['password']);
        $check_password = $LOGIN->checkPassword($_SESSION['userid'],$_SESSION['password']);
        if($check_password==true) {
            echo $YELLS->getMyYells();
        }
    }
?>