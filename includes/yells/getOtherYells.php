<?php
    require_once('../settings.php');
    $LOGIN = new system\login();
    $YELLS = new system\yells();
    $USERS = new system\users();
    $check_cookie = $LOGIN->checkCookie();

    if($check_cookie==true) {
        system\database::connect_with_db();
        $check_password = $LOGIN->checkPassword($_COOKIE['userid'],$_COOKIE['password']);
        if($check_password==true) {
            $check_isFriend = $USERS->isFriend($_POST['friendid']);
            if($check_isFriend==true) {
                echo $YELLS->getOtherYells($_POST['friendid']);
            } else {
                echo "Kein Freund!";
            }            
        } else {
            print "Illegal cookie manipulation! IP: ".$_SERVER['REMOTE_ADDR']." has been logged!";
        }
    } else {
        print "Login abgelaufen. Bitte log' dich erneut ein!";
    }
?>