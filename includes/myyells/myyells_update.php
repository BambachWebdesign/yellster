<?php
    require_once('../settings.php');
    $LOGIN = new system\login();
    $check_cookie = $LOGIN->checkCookie();

    if($check_cookie==true) {
        system\database::connect_with_db();
        $check_password = $LOGIN->checkPassword($_COOKIE['userid'],$_COOKIE['password']);
        if($check_password==true) {        
            if($_POST["NewPostId"]!="") {
                $NewPostId=$_POST['NewPostId'];
                $myYells = "myYells_".$_COOKIE['userid'];
                $mysql_myYells=mysql_query("SELECT * FROM `myYells`.`$myYells` WHERE myYells_id like $NewPostId");
                list($myYells_id, $myYells_user_id, $myYells_timestamp, $myYells_public, $myYells_type, $myYells_message, $myYells_comments) = mysql_fetch_row($mysql_myYells);
                    $currentTimestamp = time();
                    $timeDifference = $currentTimestamp - $myYells_timestamp;
                    $timeDifferenceByMinutes = round($timeDifference / 60);
                    $timeDifferenceByHours = round($timeDifference / 3600);
                    $timeDifferenceByDays = round($timeDifference / 86400);
                
                    if($timeDifference == 0) {
                        $time = "gerade eben";
                    } else if($timeDifference < 60) {
                        $time = "vor etwa ".$timeDifference." Sekunden";
                    } else if($timeDifference >= 60 && $timeDifference < 120) {
                        $time = "vor etwa einer Minute";
                    } else if($timeDifference >= 60 && $timeDifference < 3600) {
                        $time = "vor etwa ".$timeDifferenceByMinutes." Minuten";
                    } else if($timeDifference >= 3600 && $timeDifference < 7200) {
                        $time = "vor etwa einer Stunde";
                    } else if($timeDifference >= 7200 && $timeDifference < 259200) {
                        $time = "vor etwa ".$timeDifferenceByHours." Stunden";       
                    } else if($timeDifference >= 259200) {
                        $time = "vor etwa ".$timeDifferenceByDays." Tagen";
                    }                    
                    print "User: ".$myYells_user_id."(".$time."): ".$myYells_message." <a href='#' onclick=myyells_querry.Delete('my".$myYells_id."')>X</a>";
                }
            } else {
            print "Illegal cookie manipulation! IP: ".$_SERVER['REMOTE_ADDR']." has been logged!";
        }
    } else {
        print "Login abgelaufen. Bitte log' dich erneut ein!";
    }
?>