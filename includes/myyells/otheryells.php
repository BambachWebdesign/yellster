<?php
    require_once('../settings.php');
    $LOGIN = new system\login();
    $YELLS = new system\yells();
    $USERS = new system\users();
    $check_cookie = $LOGIN->checkCookie();

    if($check_cookie==true) {
        system\database::connect_with_db();
        $check_password = $LOGIN->checkPassword($_COOKIE['userid'],$_COOKIE['password']);
        $check_friend = $USERS->isFriend($_POST['friendid']);
        if($check_password==true) {
            if($check_friend==true) {        
                $yellsFrom = "myYells_".$_POST['friendid'];    
                $mysql_yellsFrom=mysql_query("SELECT * FROM `myYells`.`$yellsFrom` order by myYells_id desc LIMIT 0,999");
                print   "<div class='container_headline' id='yellsFrom_h' onmousedown='startDrag(this.parentNode);'>".
                            "Andere Yells".
                        "</div>".
                        "<div id='yellsFrom'>".
                        "<form>".
                            "<input type='text' name='yellsFrom_message' value='Nachricht eingeben' size='30' />".
                            "<input type='button' value='yell it!' onclick='yellsFrom_querry.Post(this.form)' />".
                        "</form>".
                        "</div>".
                        "<div id='yellsFrom_c' class='container_content'>";
            
                while(list($yellsFrom_id, $yellsFrom_user_id, $yellsFrom_timestamp, $yellsFrom_public, $yellsFrom_type, $yellsFrom_message, $yellsFrom_comments) = mysql_fetch_row($mysql_yellsFrom)) {
                                   
                    print "<li id=my".$yellsFrom_id.">User ".$yellsFrom_user_id."(".$YELLS->timeToText($yellsFrom_timestamp)."): ".$yellsFrom_message."</li>";
                }
                print "</div>";
            } else {
                print "Kein Freund!";
            }
            
        } else {
            print "Illegal cookie manipulation! IP: ".$_SERVER['REMOTE_ADDR']." has been logged!";
        }
    } else {
        print "Login abgelaufen. Bitte log' dich erneut ein!";
    }
?>