<?php
    require_once('../settings.php');
    $LOGIN = new system\login();
    $check_cookie = $LOGIN->checkCookie();
    
    if($check_cookie==true) {
        system\database::connect_with_db();
        $check_password = $LOGIN->checkPassword($_COOKIE['userid'],$_COOKIE['password']);
        if($check_password==true) {
            $myYells = "myYells_".$_COOKIE['userid'];
            $mysql_myYells=mysql_query("SELECT myYells_id FROM `myYells`.`$myYells` order by myYells_id desc LIMIT 0,1");
            list($LatestPostId) = mysql_fetch_row($mysql_myYells);
            print $LatestPostId;    
        } 
    }   

    
        
?>
