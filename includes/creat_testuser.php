<?php
require_once('class/class.database.php');
require_once('class/class.user.php');
system\database::connect_with_db();
$USER = new system\user();

$user_name = "Bambi";
$user_pw = "diesisteinsehrlangespasswort";
$user_pw = md5($user_pw);
    $user_day = "28";
    $user_month = "5";
    $user_year = "1985";
$user_firstname = "Daniel";
$user_familyname = "Bambach";    
$user_birthday = mktime(0,0,1,$user_month,$user_day,$user_year);
$user_gender = "male";
$user_status = "1";
$user_status_with = "Monika";
$user_lookingfor = "1";
$user_language = "deutsch";
$user_email = "bambinet@t-online.de";
$user_phone = "09721 / 646737";  
$user_mobilphone = "0176 / 78778408";
$user_adress = "Eichendorffstraße";
$user_adressnr = "29";
$user_city = "Gochsheim";
$user_citycode = "97469";
$user_country = "Deutschland";

$options_colors = "default";
$options_friendlist_active = "1";
$options_friendlist_x = "50";
$options_friendlist_y = "150";
$options_messageboard_active = "1";
$options_messageboard_x = "300";
$options_messageboard_y = "150";
$options_messages_menu_active = "0";
$options_messages_menu_x = "50";
$options_messages_menu_y = "400";
$options_messages_main_active = "0";
$options_messages_main_x = "300";
$options_messages_main_y = "150";
$options_public_entrydate = "1";
$options_public_birthday = "1";
$options_public_gender = "1";
$options_public_status = "1";
$options_public_lookingfor = "1";
$options_public_language = "1";
$options_public_email = "1";
$options_public_phone = "1";
$options_public_mobilphone = "1";
$options_public_adress = "1";
$options_public_adressnr = "1";
$options_public_city = "1";
$options_public_citycode = "1";
$options_public_country = "1";
$options_public_interests = "1";
$options_public_groups = "1";
$options_public_friendlist = "1";

$create_user = $USER->create_user($user_name, $user_pw, $user_firstname, $user_familyname, $user_birthday, $user_gender, $user_status, $user_status_with, $user_lookingfor, $user_language, $user_email, $user_phone, $user_mobilphone, $user_adress, $user_adressnr, $user_city, $user_citycode, $user_country);
$create_options = $USER->create_options($user_email, $options_colors, $options_friendlist_active, $options_friendlist_x, $options_friendlist_y, $options_messageboard_active, $options_messageboard_x, $options_messageboard_y, $options_messages_menu_active, $options_messages_menu_x, $options_messages_menu_y, $options_messages_main_active, $options_messages_main_x, $options_messages_main_y, $options_public_entrydate, $options_public_birthday, $options_public_gender, $options_public_status, $options_public_lookingfor, $options_public_language, $options_public_email, $options_public_phone, $options_public_mobilphone, $options_public_adress, $options_public_adressnr, $options_public_city, $options_public_citycode, $options_public_country, $options_public_interests, $options_public_groups, $options_public_friendlist);
$create_history = $USER->create_history($user_email);
$create_myYells = $USER->create_myYells($user_email);
$create_inbox = $USER->create_inbox($user_email);
$create_outbox = $USER->create_outbox($user_email);
$create_friendlist = $USER->create_friendlist($user_email);
$create_friendlistgroups = $USER->create_friendlistgroups($user_email);
$create_usergroups = $USER->create_usergroups($user_email);
$create_userinterests = $USER->create_userinterests($user_email);
$create_user = $USER->create_user($user_email);
$create_welcomemessage = $USER->create_welcomemessage($user_email, $user_name);

echo $create_user;
echo "<br />";
echo $create_options;
echo "<br />";
echo $create_history;
echo "<br />";
echo $create_myYells;
echo "<br />";
echo $create_inbox;
echo "<br />";
echo $create_outbox;
echo "<br />";
echo $create_friendlist;
echo "<br />";
echo $create_friendlistgroups;
echo "<br />";
echo $create_usergroups;
echo "<br />";
echo $create_userinterests;
echo "<br />";
echo $create_user;
echo "<br />";
echo $create_welcomemessage;
?>







