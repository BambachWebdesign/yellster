<?php
namespace system;

class yells
{
    public function timeToText($time_to_text) {
        $currentTimestamp = time();
        $timeDifference = $currentTimestamp - $time_to_text;
        $timeDifferenceByMinutes = round($timeDifference / 60);
        $timeDifferenceByHours = round($timeDifference / 3600);
        $timeDifferenceByDays = round($timeDifference / 86400);

        if($timeDifference == 0) {
            $time_text = "gerade eben";
        } else if($timeDifference < 60) {
            $time_text = "vor etwa ".$timeDifference." Sekunden";
        } else if($timeDifference >= 60 && $timeDifference < 120) {
            $time_text = "vor etwa einer Minute";
        } else if($timeDifference >= 60 && $timeDifference < 3600) {
            $time_text = "vor etwa ".$timeDifferenceByMinutes." Minuten";
        } else if($timeDifference >= 3600 && $timeDifference < 7200) {
            $time_text = "vor etwa einer Stunde";
        } else if($timeDifference >= 7200 && $timeDifference < 259200) {
            $time_text = "vor etwa ".$timeDifferenceByHours." Stunden";
        } else if($timeDifference >= 259200) {
            $time_text = "vor etwa ".$timeDifferenceByDays." Tagen";
        }
        return $time_text;
    }    
    public function constructYell($user_id) {
        $size="100";
        $crypt_id=md5($user_id);
        $crypt_size=md5($size);
        $constructHTML = "<div id='myYells_t'>".
                            "<a href='#' class='closeDiv' onclick='remove.myYells_div()'></a>".
                        "</div>".
                        "<div id='myYells_h' onmousedown='startDrag(this.parentNode);'>".
                            "<div class='yells_headline' style='background-image: url(includes/pictures/avatar.php?".$crypt_id."=".$user_id."&S=".$crypt_size.");'></div>".
                        "</div>".
                        "<div id='myYells_f'>".
                            "<form>".
                                "<textarea class='myYells_f' name='myYells_message' cols='35' rows='3' onfocus='clean(this)'>Nachricht eingeben...</textarea>".
                                "<input class='myYells_f' type='button' value='yell it!' onclick='yells_query.Post(this.form)' />".
                            "</form>".
                        "</div>".
                        "<div id='myYells_l'></div>".
                        "<div id='myYells_c'></div>";
        return $constructHTML;                    
    }
        
    
    
    public function postMyYells($myYells_public, $myYells_type, $myYells_message, $myYells_comments) {
        $myYells_message = htmlspecialchars($myYells_message);
        $myYells_message = htmlentities($myYells_message,ENT_QUOTES,"UTF-8");
        $space = chr(13);
        $myYells_message = str_replace($space,'',$myYells_message);
        $myYells_message = str_replace('\n','',$myYells_message);
        $myYells_message = str_replace('\r','',$myYells_message);
        $myYells_message = str_replace('\s','',$myYells_message);
        session_start();
        //$myYells_user_id = $_COOKIE['userid'];
        $myYells_user_id = $_SESSION['userid'];
        $myYells = "myYells_".$myYells_user_id;
        mysql_query("insert INTO `myYells`.`$myYells` (myYells_user_id,myYells_timestamp,myYells_public,myYells_type,myYells_message,myYells_comments)
        VALUES('$myYells_user_id',UNIX_TIMESTAMP(),'$myYells_public','$myYells_type','$myYells_message','$myYells_comments')") or die("ERROR myYells/POST");    
    }
    public function delMyYells($yell_id) {
        session_start();
        //$myYells = "myYells_".$_COOKIE['userid'];
        $myYells = "myYells_".$_SESSION['userid'];
        mysql_query("DELETE FROM `myYells`.`$myYells` WHERE `myYells_id` = $yell_id");
    }
    public function getYell($user_id,$printed_yell_id){
        $myYells = "myyells_".$user_id;
        $mysql_yells_count=mysql_query("SELECT COUNT(*)AS counter FROM `myYells`.`$myYells`");
        list($yells_count) = mysql_fetch_row($mysql_yells_count);
        $newest_yell_id = $this->checkHighestId($user_id);
        if($yells_count>="10") {
            $start_limit=$yells_count-10;
        } else {
            $start_limit="0";
        }
        
        if($printed_yell_id=="1"){
            $mysql_first_yell_id=mysql_query("SELECT `myYells_id` FROM `myyells`.`$myYells` LIMIT $start_limit , 1");    
            list($printed_yell_id) = mysql_fetch_row($mysql_first_yell_id);
            $printed_yell_id = $printed_yell_id -  1;
        }
        if($newest_yell_id>$printed_yell_id) {
            $get_one_yell=mysql_query("SELECT * FROM `myYells`.`$myYells` WHERE `myYells_id` > $printed_yell_id");
            list($myYells_id, $myYells_user_id, $myYells_timestamp, $myYells_public, $myYells_type, $myYells_message, $myYells_comments) = mysql_fetch_row($get_one_yell);
            $myYells_message = nl2br($myYells_message);
            $myYells_message = str_replace('\n','',$myYells_message);
            $myYells_message = str_replace('\r','',$myYells_message);
            $myYells_message = str_replace('\s','',$myYells_message);
            $space = chr(13);
            $myYells_message = str_replace($space,'',$myYells_message);
            $myYells_time = $this->timeToText($myYells_timestamp);
            $myYells_user_name = users::getName($myYells_user_id);
            $size="40";
            $crypt_id=md5($myYells_user_id);
            $crypt_size=md5($size);
            return  "var this_yell_id=".$myYells_id.";var li_html=\"<a class='delYells' onclick=yells_query.Delete('my".$myYells_id."')></a><div style='background-image:url(includes/pictures/avatar.php?".$crypt_id."=".$myYells_user_id."&S=".$crypt_size.")' class='myYells_user_image' title='".$myYells_user_name."'></div><div class='myYells_user'>".$myYells_user_name." hat ".$myYells_time." geschrieben:<br /></div>".$myYells_message."<br /><br /><a class='myYells' onclick=toggle_visibility('comment_form_".$myYells_id."')>kommentieren</a>\"";
        } else {
            return "var this_yell_id=false";
        }        
    }
    public function getComment($user_id,$this_yell_id,$limit) {
        $myYells = "myyells_".$user_id;
        $mysql_get_comment_id=mysql_query("SELECT `myYells_comments` FROM `myyells`.`$myYells` WHERE `myYells_id` = $this_yell_id"); 
        list($comment_id) = mysql_fetch_row($mysql_get_comment_id);
        $commentHTML =
                    "<li id='comment_form_".$this_yell_id."'class='myYells_comment' style='display:none'>".
                        "<form>".
                            "<textarea name='myYells_message' cols='35' rows='1' onfocus='clean(this)'>Kommentar eingeben...</textarea>".
                            "<input type='button' value='kommentieren' onclick='yells_query.post_comment(this.form)' />".
                        "</form>".
                    "</li>";
        if($comment_id!="0") {
            $comment = "com_".$comment_id;
            $mysql_comment=mysql_query("SELECT * FROM `comments`.`$comment` order by comment_id desc LIMIT 0,$limit");
            while(list($comment_id, $comment_userid, $comment_timestamp, $comment_message, $comment_mash) = mysql_fetch_row($mysql_comment)){        
                $comment_time = $this->timeToText($comment_timestamp);
                $comment_user_name = users::getName($comment_userid);
                $size="40";
                $crypt_id=md5($comment_userid);
                $crypt_size=md5($size);
                $commentHTML .=
                        "<li id='com_".$comment_id."' class='myYells_comment'>".  
                        "<div class='myYells_comment_image' style='background-image:url(includes/pictures/avatar.php?".$crypt_id."=".$comment_userid."&S=".$crypt_size.")'></div>".
                        "<div class='myYells_comment'>".$comment_user_name." hat geschrieben:</div>".
                        "<div class='myYells_comment_stats'>".
                            "<div class='myYells_comment_statline' title='positiv: 100 | negativ: 100'><br />".
                                "<a class='myYells_comment_negative' title='Kommentar negativ bewerten'></a>".
                                "<div class='myYells_comment_statline_text'>123456</div>".
                                "<a class='myYells_comment_positive' title='Kommentar positiv bewerten'></a>".
                            "</div>".
                        "</div>".
                        "<div class='myYells_comment_text'><p>".$comment_message."</p></div>".
                        "</li>";
            }
        }
        return $commentHTML;
    }
    public function checkHighestId($user_id) {
        $myYells = "myYells_".$user_id;
        $mysql_myYells=mysql_query("SELECT `myYells_id` FROM `myYells`.`$myYells` order by myYells_id desc LIMIT 0,1");
        list($highest_id) = mysql_fetch_row($mysql_myYells);
        return $highest_id;        
    }
}
?>