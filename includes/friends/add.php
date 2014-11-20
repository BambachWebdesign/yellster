<?php
require_once('../settings.php');
    $LOGIN = new system\login();
    $FRIENDS = new system\friends();
    $check_cookie = $LOGIN->checkCookie();

    if($check_cookie==true) {
        system\database::connect_with_db();
        session_start();
        $check_password = $LOGIN->checkPassword($_SESSION['userid'],$_SESSION['password']);
        if($check_password==true) {
           if(isset($_POST['friend_id'])) {
               $FRIENDS->newFriend($_POST['friend_id'], $_SESSION['userid']);
               return "OK";
           } else {
               return "FUCK!";
           }
        }
    }
?>