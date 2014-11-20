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
            $search_value = $_POST['search_value'];
            $search_value_length = strlen ($search_value);
            if($search_value_length >= 2) {
                $result = mysql_query("SELECT `user_id`,`user_name` FROM `global`.`users` WHERE `global`.`users`.`user_name` LIKE '$search_value%' LIMIT 0,10");
                while(list($friend_id,$friend_name) = mysql_fetch_row($result)) {
                    session_start();
                    $user_id=$_SESSION['userid'];
                    if($friend_id!=$user_id) {
                        $friendship_status=$FRIENDS->checkFriend($friend_id,$user_id);
                        $size="40";
                        $crypt_id=md5($friend_id);
                        $crypt_size=md5($size);
                        echo "<li class='search'><div class='search_avatar'><img src='includes/pictures/avatar.php?".$crypt_id."=".$friend_id."&S=".$crypt_size."' height='40' style='overflow:hidden; max-width:40px;' border='0' alt='Avatar'></div><div class='search_text'>".$friend_name;
                        if($friendship_status=="0") {
                            echo     "<a href='#' class='newFriend' onclick=create.question_friendship('".$friend_id."','".$friend_name."') title='".$friend_name." eine Freundschaftsanfrage schicken...'></a>";    
                        } elseif($friendship_status=="1") {
                            echo     "<a href='#' class='aboFriend' title='".$friend_name." muss deine Freundschaft noch best&auml;tigen!'></a>";
                        } elseif($friendship_status=="2") {
                            echo     "<a href='#' class='aboFriend' title='Du musst ".$friend_name."`s Freundschaft noch best&auml;tigen!'></a>";
                        } elseif($friendship_status=="3") {
                            echo     "<a href='#' class='isFriend' title='Du bist mit ".$friend_name." befreundet!'></a>";
                        }      
                        echo "</div></li>";
                    }
                }
            }
        }
    }
?>