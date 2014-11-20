<?php
    require_once('../settings.php');
    $LOGIN = new system\login();
    $check_cookie = $LOGIN->checkCookie();

    if($check_cookie==true) {
        system\database::connect_with_db();
        $check_password = $LOGIN->checkPassword($_COOKIE['userid'],$_COOKIE['password']);
        if($check_password==true) {
            $myYells_public = "1";
            $myYells_type = "0";
            $myYells_comments = "0";
            $myYells = "myYells_".$_COOKIE['userid']; 
            if ($_POST["myYells_message"]!="")  {
                $myYells_message = $_POST["myYells_message"];
                $myYells_message = htmlspecialchars($_POST["myYells_message"]);
                $myYells_message = htmlentities($myYells_message,ENT_QUOTES,"UTF-8");
                $user_id = $_COOKIE['userid'];
                mysql_query("insert INTO `myYells`.`$myYells` (myYells_user_id,myYells_timestamp,myYells_public,myYells_type,myYells_message,myYells_comments)
                VALUES('$user_id',UNIX_TIMESTAMP(),'$myYells_public','$myYells_type','$myYells_message','$myYells_comments')") or die("ERROR myYells/POST");
            }
       } else {
            print "Illegal cookie manipulation! IP: ".$_SERVER['REMOTE_ADDR']." has been logged!";
        }
    } else {
        print "Login abgelaufen. Bitte log' dich erneut ein!";
    }

?>
