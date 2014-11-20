<?php
namespace system;

class login
{
    public function createCookie($cookieid,$user_id,$user_pw){
        $user_id = md5($user_id);
        $user_pw = hash('sha512',$user_pw);
        $result = mysql_query("SELECT `user_name` FROM `global`.`users` WHERE `users`.`user_id` = '$user_id'") or die("ERROR");
        list($user_name) = mysql_fetch_row($result);
        //setcookie('cookieid', $cookieid, time()+86400);
        //setcookie('userid', $user_id, time()+86400);
        //setcookie('password', $user_pw, time()+86400);
        //setcookie('username', $user_name, time()+86400);
        session_start();
        $_SESSION['cookieid'] = $cookieid;
        $_SESSION['userid'] = $user_id;
        $_SESSION['password'] = $user_pw;
        $_SESSION['username'] = $user_name; 
        return true;
    }
    public function updateCookie($cookieid,$userid,$password,$username){
        //setcookie('cookieid', $cookieid, time()+600);
        //setcookie('userid', $userid, time()+600);
        //setcookie('password', $password, time()+600);
        //setcookie('username', $username, time()+600);
        session_start();
        $_SESSION['cookieid'] = $cookieid;
        $_SESSION['userid'] = $userid;
        $_SESSION['password'] = $password;
        $_SESSION['username'] = $username;
        return true;
    }
    public function destroyCookie(){
        session_start();
        //setcookie('cookieid', NULL, time()-86400);
        //setcookie('userid', NULL, time()-86400);
        //setcookie('password', NULL, time()-86400);
        //setcookie('username', NULL, time()-86400);
        //$_COOKIE = array();
        $_SESSION = array();
        session_unset();
        session_destroy();       
        return true;
    }
    public function checkCookie(){
        //if(isset ($_COOKIE['userid']) && isset ($_COOKIE['password'])){
        session_start();
        if(isset ($_SESSION['userid']) && isset ($_SESSION['password'])){
            return true;
        } else {
            return false;
        }
        
    }
    public function checkPassword($user_id,$user_pw){
        $result = mysql_query("SELECT `user_id`,`user_pw` FROM `global`.`users` WHERE `users`.`user_id` = '$user_id' && `users`.`user_pw` = '$user_pw'") or die("ERROR");
        list($r_user_id,$r_user_pw) = mysql_fetch_row($result);
        if($user_id == $r_user_id && $user_pw == $r_user_pw){
            return true;
        } else {
            return false;
        }

    }
    public function checkLogin($user_id,$user_pw){         
        $user_id = md5($user_id);
        $user_pw =  hash('sha512',$user_pw);
        $result = mysql_query("SELECT `user_id`,`user_pw` FROM `global`.`users` WHERE `users`.`user_id` = '$user_id' && `users`.`user_pw` = '$user_pw'") or die("ERROR");        
        list($r_user_id,$r_user_pw) = mysql_fetch_row($result);
        if($user_id == $r_user_id && $user_pw == $r_user_pw){
            return true;
        } else {
            return false;
        }
         
    }
    public function antiSpam() {
        $anti_spam_ip = $_SERVER['REMOTE_ADDR'];
        $entry_exists = mysql_query("SELECT * FROM `global`.`anti_spam` WHERE `anti_spam`.`anti_spam_ip` = '$anti_spam_ip'");
        list(,$anti_spam_count,$anti_spam_time) = mysql_fetch_row($entry_exists);            
            if($anti_spam_count!="") {
                $time_difference = time() - $anti_spam_time;
                if($time_difference <= 600) {
                    if($anti_spam_count < 6) {
                        $anti_spam_count++;
                        $update_entry = mysql_query("UPDATE `global`.`anti_spam` SET `anti_spam_count` = '$anti_spam_count' WHERE `anti_spam`.`anti_spam_ip` = '$anti_spam_ip'");    
                        return false;
                    } else {
                        return true;
                    }
                } else {
                    $delete_spam = mysql_query("DELETE FROM `global`.`anti_spam` WHERE `anti_spam_ip` = '$anti_spam_ip'");    
                    return false;
                }
            } else {
                $new_entry = mysql_query("INSERT INTO `global`.`anti_spam` (anti_spam_ip, anti_spam_count, anti_spam_time)
                VALUES ('$anti_spam_ip','1',UNIX_TIMESTAMP())");
                return false;   
            }
    }
    public function checkBan() {
        $anti_spam_ip = $_SERVER['REMOTE_ADDR'];
        $is_ip_banned = mysql_query("SELECT * FROM `global`.`anti_spam` WHERE `anti_spam`.`anti_spam_ip` = '$anti_spam_ip'");
        list(,$anti_spam_count,$anti_spam_time) = mysql_fetch_row($is_ip_banned);
        $time_difference = time() - $anti_spam_time;
        if($time_difference <= 600 && $anti_spam_count >= 6) {
            return true;    
        } else {
            return false;
        }   
    }   
}
?>