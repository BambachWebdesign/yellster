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
            $myYells_public = "1";
            $myYells_type = "0";
            $myYells_comments = "0"; 
            if ($_POST["myYells_message"]!="")  {
                $myYells_message = $_POST["myYells_message"];
                $YELLS->postMyYells($myYells_public, $myYells_type, $myYells_message, $myYells_comments);
            }
       } else {
            print "Illegal cookie manipulation! IP: ".$_SERVER['REMOTE_ADDR']." has been logged!";
        }
    } else {
        print "Login abgelaufen. Bitte log' dich erneut ein!";
    }
?>
