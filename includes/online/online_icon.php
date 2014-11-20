<?php
    require_once('../settings.php');
    $LOGIN = new system\login();
    $FRIENDS = new system\friends();
    $check_cookie = $LOGIN->checkCookie();

    if($check_cookie==true) {
        system\database::connect_with_db();
        system\online::deleteIdleUsers();
        system\online::updateStatusOnline();
        session_start();
        $user_id=$_SESSION['userid'];
        //$check_password = $LOGIN->checkPassword($_COOKIE['userid'],$_COOKIE['password']);
        $check_password = $LOGIN->checkPassword($_SESSION['userid'],$_SESSION['password']);
        if($check_password==true) {
            //$friendlist = "friendlist_".$_COOKIE['userid'];
            $friendlist = "friendlist_".$_SESSION['userid'];
            $compare_friendlist_and_online1 = mysql_query("SELECT `friendlist_userid` FROM `friendlist`.`$friendlist`,`global`.`online`,`global`.`users` WHERE `online_user_id` = `friendlist_userid` AND `online_user_id` = `user_id`");
            $counter = mysql_num_rows($compare_friendlist_and_online1);
            while(list($friend_id) = mysql_fetch_row($compare_friendlist_and_online1)){
                $friendship_status=$FRIENDS->checkFriend($friend_id,$user_id);
                if($friendship_status!="3") {
                   $counter--;
                }
            }                        
            print "Online (".$counter.")";
        }
    } else {
        print "<div onload='create.alert('Login ist abgelaufen! Bitte log' dich erneut ein!',200)'></div>";
    }
?>