<?php
namespace system;

class online {
    public function setStatusOnline($set_sid,$set_id,$set_ip){
        $set_id = md5($set_id);
        $result = mysql_query("INSERT INTO `global`.`online` (online_user_sid, online_user_id, online_user_ip, online_user_lastupdate, online_user_start)
        VALUES ('$set_sid','$set_id','$set_ip',UNIX_TIMESTAMP(),UNIX_TIMESTAMP())");
        return true;
    }
    public function updateStatusOnline(){
        //$set_sid = $_COOKIE['cookieid'];
        session_start();
        $set_sid = $_SESSION['cookieid'];
        $result = mysql_query("UPDATE `global`.`online` SET `online_user_lastupdate` = UNIX_TIMESTAMP() WHERE `global`.`online`.`online_user_sid` = '$set_sid'");
        return $result;
    }
    public function setStatusOffline($set_sid){
        $result = mysql_query("DELETE FROM `global`.`online` WHERE `online_user_sid` = '$set_sid'");
        return $result;
    }
    public function deleteIdleUsers() {
        $result = mysql_query("DELETE FROM `global`.`online` WHERE (UNIX_TIMESTAMP() - `online_user_lastupdate`) > 600 ");
        return $result;
    }
}
?>