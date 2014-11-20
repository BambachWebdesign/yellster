<?php
    require_once('../settings.php');
    $LOGIN = new system\login();
    $FRIENDS = new system\friends();
    $check_cookie = $LOGIN->checkCookie();

    if($check_cookie==true) {
        system\database::connect_with_db();
        session_start();
        //$check_password = $LOGIN->checkPassword($_COOKIE['userid'],$_COOKIE['password']);
        $check_password = $LOGIN->checkPassword($_SESSION['userid'],$_SESSION['password']);
        if($check_password==true) {
            //$friendlist = "friendlist_".$_COOKIE['userid'];
            $user_id=$_SESSION['userid'];
            $friendlist = "friendlist_".$_SESSION['userid'];
            $online_count = mysql_query("SELECT COUNT(*)AS counter FROM`friendlist`.`$friendlist` ,`global`.`online`  WHERE`online_user_id`=`friendlist_userid`"); 
            $compare_friendlist_and_online1 = mysql_query("SELECT `friendlist_userid` FROM `friendlist`.`$friendlist`,`global`.`online`,`global`.`users` WHERE `online_user_id` = `friendlist_userid` AND `online_user_id` = `user_id`");        
            $compare_friendlist_and_online2 = mysql_query("SELECT `friendlist_userid`,`online_user_start`,`user_name` FROM `friendlist`.`$friendlist`,`global`.`online`,`global`.`users` WHERE `online_user_id` = `friendlist_userid` AND `online_user_id` = `user_id`");

            $counter = mysql_num_rows($compare_friendlist_and_online1);
            while(list($friend_id) = mysql_fetch_row($compare_friendlist_and_online1)){
                $friendship_status=$FRIENDS->checkFriend($friend_id,$user_id);
                if($friendship_status!="3") {
                   $counter--;
                }
            }           
            print "<div id='online_h' onmousedown='startDrag(this.parentNode);'>".
                        "<div class='online_headline'>Freunde online: (".$counter.")</div>".
                    "<a href='#' class='closeDiv' onclick='remove.online_div()'></a></div>".
                  "<div id='online_c'>";                  
            while(list($id_online, $time_online, $user_name) = mysql_fetch_row($compare_friendlist_and_online2)){                                               
                $friend_friendlist="friendlist_".$id_online;
                $friendship_status=$FRIENDS->checkFriend($id_online,$user_id);
                if($friendship_status=="3") {
                    $size="40";
                    $crypt_id=md5($id_online);
                    $crypt_size=md5($size);
                    print "<li class='onlineDiv'><img src='includes/pictures/avatar.php?".$crypt_id."=".$id_online."&S=".$crypt_size."' height='20' style='overflow:hidden; max-width:20px;' border='0' alt='Avatar'><a href='#' class='onlineDiv' onclick='remove.myYells_div(); create.otherYells_div(".$id_online.")' title='Yells von ".$user_name." &ouml;ffnen...'>".$user_name."<a href='#' class='newMail' onclick='create.newMail(".$id_online.")' title='".$user_name." eine Nachricht schreiben...'></a><a href='#' class='newChat' onclick='create.newChat(".$id_online.")' title='Mit ".$user_name." chatten...'></a><a href='#' class='newProfil' onclick='create.newProfil(".$id_online.")' title='Profil von ".$user_name." anschauen...'></a></li>";
                }
            }
            print "</div>";
        } else {
            print "Illegal cookie manipulation! IP: ".$_SERVER['REMOTE_ADDR']." has been logged!";
        }
    } else {
        print "Login abgelaufen. Bitte log' dich erneut ein!";
    }
?>