<?php
header ( 'Content-Type: image/jpeg' );
require_once('../settings.php');
    $LOGIN = new system\login();
    $check_cookie = $LOGIN->checkCookie();
    if($check_cookie==true) {
        system\database::connect_with_db();
        system\online::deleteIdleUsers();
        system\online::updateStatusOnline();
        session_start();
        $secure=false;
        foreach($_GET as $get_data){    
            $md5_data = md5($get_data);            
            if(isset($_GET[$md5_data])) {$user_id=$_GET[$md5_data]; $secure=true;}            
        }
        $md5_40   = md5(40);
        $md5_100  = md5(100);
        $md5_200  = md5(200);
        if($_GET['S'] == $md5_40){$size="user_picture_40";}
        if($_GET['S'] == $md5_100){$size="user_picture_100";}
        if($_GET['S'] == $md5_200){$size="user_picture_200";}
        
        if($secure==true) {
            $result=mysql_query("SELECT $size FROM `global`.`users` WHERE `global`.`users`.`user_id` = '$user_id'");
            list($picture)=mysql_fetch_row($result);
            echo base64_decode($picture);
        }
    }
?>