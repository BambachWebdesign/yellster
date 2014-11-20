<?php
namespace system;

class user_create {
    public function create_user($user_name, $user_pw, $user_firstname, $user_familyname, $user_birthday, $user_gender, $user_status, $user_status_with, $user_lookingfor, $user_language, $user_email, $user_phone, $user_mobilphone, $user_adress, $user_city, $user_country) {
        $user_pw = hash('sha512',$user_pw);
        $user_id = md5($user_email);
        $picture_exists=register::check_picture($user_email);
        if($picture_exists!=false) {
            function imageToBase65($file=NULL){$content=file_get_contents($file);return base64_encode($content);}
            $user_picture_40=imageToBase65("../../_temp/".$user_id."_40.jpg");
            $user_picture_100=imageToBase65("../../_temp/".$user_id."_100.jpg");
            $user_picture_200=imageToBase65("../../_temp/".$user_id."_200.jpg");
        } else {
            $user_picture_40=0;
            $user_picture_100=0;
            $user_picture_200=0; 
        }
        
        $result = mysql_query("insert INTO `global`.`users` (user_id,user_name,user_pw,user_firstname,user_familyname,user_entrydate,user_birthday,user_gender,user_status,user_status_with,user_lookingfor,user_language,user_email,user_phone,user_mobilphone,user_adress,user_city,user_country,user_picture_40,user_picture_100,user_picture_200)
        VALUES('$user_id','$user_name','$user_pw','$user_firstname','$user_familyname',UNIX_TIMESTAMP(),'$user_birthday','$user_gender','$user_status','$user_status_with','$user_lookingfor','$user_language','$user_email','$user_phone','$user_mobilphone','$user_adress','$user_city','$user_country','$user_picture_40','$user_picture_100','$user_picture_200')") or die("ERROR USERS");    
        @unlink($user_picture_40);
        @unlink($user_picture_100);
        @unlink($user_picture_200);
        return $result;
    }
    public function create_options($options_user_id, $options_colors, $options_friendlist_active, $options_friendlist_x, $options_friendlist_y, $options_messageboard_active, $options_messageboard_x, $options_messageboard_y, $options_messages_menu_active, $options_messages_menu_x, $options_messages_menu_y, $options_messages_main_active, $options_messages_main_x, $options_messages_main_y, $options_public_fullname, $options_public_birthday, $options_public_gender, $options_public_status, $options_public_lookingfor, $options_public_language, $options_public_email, $options_public_phone, $options_public_mobilphone, $options_public_adress, $options_public_city, $options_public_country, $options_public_interests, $options_public_groups, $options_public_friendlist) {
        $options_user_id = md5($options_user_id);
        $result = mysql_query("insert INTO `global`.`options` (options_user_id,options_colors,options_friendlist_active,options_friendlist_x,options_friendlist_y,options_messageboard_active,options_messageboard_x,options_messageboard_y,options_messages_menu_active,options_messages_menu_x,options_messages_menu_y,options_messages_main_active,options_messages_main_x,options_messages_main_y,options_public_fullname,options_public_birthday,options_public_gender,options_public_status,options_public_lookingfor,options_public_language,options_public_email,options_public_phone,options_public_mobilphone,options_public_adress,options_public_city,options_public_country,options_public_interests,options_public_groups,options_public_friendlist)
        VALUES('$options_user_id','$options_colors','$options_friendlist_active','$options_friendlist_x','$options_friendlist_y','$options_messageboard_active','$options_messageboard_x','$options_messageboard_y','$options_messages_menu_active','$options_messages_menu_x','$options_messages_menu_y','$options_messages_main_active','$options_messages_main_x','$options_messages_main_y','$options_public_fullname','$options_public_birthday','$options_public_gender','$options_public_status','$options_public_lookingfor','$options_public_language','$options_public_email','$options_public_phone','$options_public_mobilphone','$options_public_adress','$options_public_city','$options_public_country','$options_public_interests','$options_public_groups','$options_public_friendlist')") or die("ERROR OPTIONS");   
        return $result;
    }
    public function create_history($user_id) {
        $new_history_table = "history_".md5($user_id);
        $result = mysql_query("CREATE TABLE `history`.$new_history_table(
        `history_id` INT( 11)NOT NULL AUTO_INCREMENT PRIMARY KEY ,
        `history_start` INT( 11) UNSIGNED NULL DEFAULT NULL ,
        `history_end` INT( 11) UNSIGNED NULL DEFAULT NULL ,
        `history_group` VARCHAR ( 20) NULL DEFAULT NULL ,
        `history_entry` VARCHAR ( 100) NULL DEFAULT NULL
        ) ENGINE=MYISAM") or die("ERROR HISTORY");
        return $result;    
    }
    public function create_myYells($user_id) {
        $new_myYells_table = "myYells_".md5($user_id);
        $result = mysql_query("CREATE TABLE `myYells`.$new_myYells_table(
        `myYells_id` INT( 11)NOT NULL AUTO_INCREMENT PRIMARY KEY ,
        `myYells_user_id` VARCHAR( 50) NOT NULL,
        `myYells_timestamp` INT( 11) UNSIGNED NULL DEFAULT NULL ,
        `myYells_type` TINYINT UNSIGNED NULL DEFAULT NULL ,
        `myYells_public` TINYINT UNSIGNED NULL DEFAULT NULL ,
        `myYells_message` LONGTEXT NULL DEFAULT NULL ,
        `myYells_comments` VARCHAR ( 50) NULL DEFAULT NULL
        ) ENGINE=MYISAM") or die("ERROR MESSAGEBOARD");
        return $result;        
    }
    public function create_inbox($user_id) {
        $new_inbox_table = "inbox_".md5($user_id);
        $result = mysql_query("CREATE TABLE `inbox`.$new_inbox_table(
        `inbox_id` INT( 11)NOT NULL AUTO_INCREMENT PRIMARY KEY ,
        `inbox_timestamp` INT( 11) UNSIGNED NULL DEFAULT NULL ,
        `inbox_userid` VARCHAR( 50) NULL DEFAULT NULL ,
        `inbox_headline` VARCHAR( 100) NULL DEFAULT NULL ,
        `inbox_message` LONGTEXT NULL DEFAULT NULL
        ) ENGINE=MYISAM") or die("ERROR INBOX");
        return $result;    
    }
    public function create_outbox($user_id) {
        $new_outbox_table = "outbox_".md5($user_id);
        $result = mysql_query("CREATE TABLE `outbox`.$new_outbox_table(
        `outbox_id` INT( 11)NOT NULL AUTO_INCREMENT PRIMARY KEY ,
        `outbox_timestamp` INT( 11) UNSIGNED NULL DEFAULT NULL ,
        `outbox_userid` VARCHAR( 50) NULL DEFAULT NULL ,
        `outbox_headline` VARCHAR( 100) NULL DEFAULT NULL ,
        `outbox_message` LONGTEXT NULL DEFAULT NULL
        ) ENGINE=MYISAM") or die("ERROR OUTBOX");
        return $result;    
    }
    public function create_friendlist($user_id) {
        $new_friendlist_table = "friendlist_".md5($user_id);
        $result = mysql_query("CREATE TABLE `friendlist`.$new_friendlist_table(
        `friendlist_userid` VARCHAR( 50) NOT NULL PRIMARY KEY ,
        `friendlist_abo` TINYINT UNSIGNED NULL DEFAULT NULL ,
        `friendlist_group` VARCHAR( 30) NULL DEFAULT NULL
        ) ENGINE=MYISAM") or die("ERROR FRIENDLIST");
        return $result;   
    }
    public function create_friendlistgroups($user_id) {
        $new_friendlist_groups_table = "friendlist_groups_".md5($user_id);
        $result = mysql_query("CREATE TABLE `friendlistgroups`.$new_friendlist_groups_table(
        `friendlist_group_id` INT( 11)NOT NULL AUTO_INCREMENT PRIMARY KEY ,
        `friendlist_group_name` VARCHAR( 50) NULL DEFAULT NULL ,
        `friendlist_group_show_entrydate` TINYINT UNSIGNED NULL DEFAULT NULL ,
        `friendlist_group_show_birthday` TINYINT UNSIGNED NULL DEFAULT NULL ,
        `friendlist_group_show_gender` TINYINT UNSIGNED NULL DEFAULT NULL ,
        `friendlist_group_show_status` TINYINT UNSIGNED NULL DEFAULT NULL ,
        `friendlist_group_show_lookingfor` TINYINT UNSIGNED NULL DEFAULT NULL ,
        `friendlist_group_show_language` TINYINT UNSIGNED NULL DEFAULT NULL ,
        `friendlist_group_show_email` TINYINT UNSIGNED NULL DEFAULT NULL ,
        `friendlist_group_show_phone` TINYINT UNSIGNED NULL DEFAULT NULL ,
        `friendlist_group_show_mobilphone` TINYINT UNSIGNED NULL DEFAULT NULL ,
        `friendlist_group_show_adress` TINYINT UNSIGNED NULL DEFAULT NULL ,
        `friendlist_group_show_adressnr` TINYINT UNSIGNED NULL DEFAULT NULL ,
        `friendlist_group_show_city` TINYINT UNSIGNED NULL DEFAULT NULL ,
        `friendlist_group_show_citycode` TINYINT UNSIGNED NULL DEFAULT NULL ,
        `friendlist_group_show_country` TINYINT UNSIGNED NULL DEFAULT NULL
        ) ENGINE=MYISAM") or die("ERROR FRIENDLIST_GROUPS");
        return $result;   
    }
    public function create_usergroups($user_id) {
        $new_group_user_table = "groups_user_".md5($user_id);
        $result = mysql_query("CREATE TABLE `usergroups`.$new_group_user_table(
        `groupsadded_id` VARCHAR( 50) NOT NULL PRIMARY KEY ,
        `groupsadded_name` VARCHAR( 50) NULL DEFAULT NULL ,
        `groupsadded_abo` TINYINT UNSIGNED NULL DEFAULT NULL
        ) ENGINE=MYISAM") or die("ERROR GROUP_USER");
        return $result;    
    }
    public function create_userinterests($user_id) {
        $new_interest_user_table = "interests_user_".md5($user_id);
        $result = mysql_query("CREATE TABLE `userinterests`.$new_interest_user_table(
        `interestsadded_id` VARCHAR( 50) NOT NULL PRIMARY KEY ,
        `interestsadded_name` VARCHAR( 30) NULL DEFAULT NULL ,
        `interestsadded_abo` TINYINT UNSIGNED NULL DEFAULT NULL
        ) ENGINE=MYISAM") or die("ERROR INTEREST_USER");
        return $result;        
    }
    public function create_welcomemessage($user_id,$user_name) {
        $user_id = md5($user_id);
        $myYells_table = "myYells_".$user_id;
        $welcome_text = $user_name." hat einen Account erstellt!";
        $result = mysql_query("INSERT INTO `myYells`.$myYells_table (myYells_id,myYells_user_id,myYells_timestamp,myYells_type,myYells_public,myYells_message,myYells_comments)
        VALUES ('10', '$user_id', UNIX_TIMESTAMP(), '1', '1', '$welcome_text', '0')") or die("ERROR WELCOME");    
        return $result;
    }
}




?>