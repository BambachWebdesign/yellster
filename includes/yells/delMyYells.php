<?php
    require_once('../settings.php');
    $LOGIN = new system\login();
    $YELLS = new system\yells();
    $check_cookie = $LOGIN->checkCookie();

    if($check_cookie==true) {
        system\database::connect_with_db();
        session_start();
        $check_password = $LOGIN->checkPassword($_SESSION['userid'],$_SESSION['password']);
        if($check_password==true) {           
            if($_POST["myYells_id"]!="") {
                $myYells_id = substr($_POST["myYells_id"],2);        
                $YELLS->delMyYells($myYells_id);
            }
        } else {
            print "Illegal cookie manipulation! IP: ".$_SERVER['REMOTE_ADDR']." has been logged!";
        }
    } else {
        print "Login abgelaufen. Bitte log' dich erneut ein!";
    }
?>