<?php
    require_once('../settings.php');
    $LOGIN = new system\login();
    $check_cookie = $LOGIN->checkCookie();

    if($check_cookie==true) {
        system\database::connect_with_db();
        $check_password = $LOGIN->checkPassword($_COOKIE['userid'],$_COOKIE['password']);
        if($check_password==true) {           
            if($_POST["myYells_id"]!="") {
                $myYells = "myYells_".$_COOKIE[userid];
                $myYells_id = substr($_POST["myYells_id"],2);        
                mysql_query("DELETE FROM `myYells`.`$myYells` WHERE `myYells_id` = $myYells_id");
            }
        } else {
            print "Illegal cookie manipulation! IP: ".$_SERVER['REMOTE_ADDR']." has been logged!";
        }
    } else {
        print "Login abgelaufen. Bitte log' dich erneut ein!";
    }
?>