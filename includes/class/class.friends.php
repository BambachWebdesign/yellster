<?php
namespace system;

class friends {
    public function newFriend($friend_id,$user_id) {
        database::connect_with_db();
        $user_friendlist = "friendlist_".$user_id;
        $friend_friendlist = "friendlist_".$friend_id;
        
        mysql_query("INSERT INTO `friendlist`.$user_friendlist (friendlist_userid,friendlist_abo,friendlist_group)
        VALUES('$friend_id','1','0')") or die("ERROR addFriend/USER /-/ ".$friend_id." /-/ ".$user_id." /-/ ".$friend_friendlist." /-/ ".$user_friendlist);
        
        mysql_query("INSERT INTO `friendlist`.$friend_friendlist (friendlist_userid,friendlist_abo,friendlist_group)
        VALUES('$user_id','0','0')") or die("ERROR addFriend/FRIEND");
    }
    public function aboFriend($friend_id,$user_id) {
        database::connect_with_db();
        $user_friendlist = "friendlist_".$user_id;
        
        mysql_query("INSERT INTO `friendlist`.`$user_friendlist` (friendlist_userid,friendlist_abo,friendlist_group)
        VALUES('$friend_id',1,'0')") or die("ERROR addFriend/USER");
    }
    public function checkFriend($friend_id,$user_id) {
        database::connect_with_db();
        $user_friendlist = "friendlist_".$user_id;
        $friend_friendlist = "friendlist_".$friend_id;
        $result=mysql_query("SELECT `friendlist_abo` FROM `friendlist`.$friend_friendlist WHERE `friendlist`.$friend_friendlist.`friendlist_userid` = '$user_id'") or DIE ("ERROR @ 27");
        $is_friend=mysql_num_rows($result);
        
        $result2=mysql_query("SELECT `friendlist_abo` FROM `friendlist`.$user_friendlist WHERE `friendlist`.$user_friendlist.`friendlist_userid` = '$friend_id'") or DIE ("ERROR @ 30");
        $is_your_friend=mysql_num_rows($result2);
        
        if($is_friend) {
            list($is_abo)=mysql_fetch_row($result);
            list($is_your_abo)=mysql_fetch_row($result2);
            if($is_abo=="1" && $is_your_abo=="1") {
                return 3;    
            } elseif($is_abo=="1" && $is_your_abo=="0") {
                return 2;
            } elseif($is_abo=="0" && $is_your_abo=="1") {
                return 1;
            }
        } else {
            return 0;
        }
    }
}




?>