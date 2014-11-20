<?php
namespace system;

class users
{
    public function isFriend($friend_id) {
        $friendlist = "friendlist_".$_SESSION['userid'];
        $result = mysql_query("SELECT `friendlist_userid` FROM `friendlist`.`$friendlist` WHERE `friendlist`.`$friendlist`.`friendlist_userid` = '$friend_id'") or die("ERROR isFriend()");
        list($friendlist_userid) = mysql_fetch_row($result);
        if($friendlist_userid == $friend_id){
            return true;
        } else {
            return false;
        }
    }
    public function getName($id) {
        $result = mysql_query("SELECT `user_name` FROM `global`.`users` WHERE `global`.`users`.`user_id` = '$id'");      
        list($user_name) = mysql_fetch_row($result);
        return $user_name;       
    }  
}
?>