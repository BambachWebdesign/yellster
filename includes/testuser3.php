<?php
if($_GET['option'] == "create")
{
require_once('class/class.database.php');
require_once('class/class.user_create.php');
system\database::connect_with_db();
$USER_CREATE = new system\user_create();

$user_name = "Martin";
$user_pw = "test";
    $user_day = "16";
    $user_month = "6";
    $user_year = "1985";
$user_firstname = "Martin";
$user_familyname = "Koerner";    
$user_birthday = mktime(0,0,1,$user_month,$user_day,$user_year);
$user_gender = "male";
$user_status = "1";
$user_status_with = "Katharina";
$user_lookingfor = "1";
$user_language = "deutsch";
$user_email = "M.Koerner@web.de";
$user_phone = "09721 / 63323";  
$user_mobilphone = "xxxx / xxxxxxxx";
$user_adress = "Am Bauerngraben";
$user_adressnr = "11";
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

$create_user = $USER_CREATE->create_user($user_name, $user_pw, $user_firstname, $user_familyname, $user_birthday, $user_gender, $user_status, $user_status_with, $user_lookingfor, $user_language, $user_email, $user_phone, $user_mobilphone, $user_adress, $user_adressnr, $user_city, $user_citycode, $user_country);
$create_options = $USER_CREATE->create_options($user_email, $options_colors, $options_friendlist_active, $options_friendlist_x, $options_friendlist_y, $options_messageboard_active, $options_messageboard_x, $options_messageboard_y, $options_messages_menu_active, $options_messages_menu_x, $options_messages_menu_y, $options_messages_main_active, $options_messages_main_x, $options_messages_main_y, $options_public_entrydate, $options_public_birthday, $options_public_gender, $options_public_status, $options_public_lookingfor, $options_public_language, $options_public_email, $options_public_phone, $options_public_mobilphone, $options_public_adress, $options_public_adressnr, $options_public_city, $options_public_citycode, $options_public_country, $options_public_interests, $options_public_groups, $options_public_friendlist);
$create_history = $USER_CREATE->create_history($user_email);
$create_myYells = $USER_CREATE->create_myYells($user_email);
$create_inbox = $USER_CREATE->create_inbox($user_email);
$create_outbox = $USER_CREATE->create_outbox($user_email);
$create_friendlist = $USER_CREATE->create_friendlist($user_email);
$create_friendlistgroups = $USER_CREATE->create_friendlistgroups($user_email);
$create_usergroups = $USER_CREATE->create_usergroups($user_email);
$create_userinterests = $USER_CREATE->create_userinterests($user_email);
$create_welcomemessage = $USER_CREATE->create_welcomemessage($user_email, $user_name);

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
echo $create_welcomemessage;
echo "<br />";
echo "<br />";
}



if($_GET['option'] == "delete")
{
require_once('class/class.database.php');
require_once('class/class.user_delete.php');
system\database::connect_with_db();
$USER_DELETE = new system\user_delete();

$user_id = crc32("M.Koerner@web.de");
$delete_user = $USER_DELETE->delete_user($user_id);
$delete_options = $USER_DELETE->delete_options($user_id);
$delete_history = $USER_DELETE->delete_history($user_id);
$delete_myYells = $USER_DELETE->delete_myYells($user_id);
$delete_inbox = $USER_DELETE->delete_inbox($user_id);
$delete_outbox = $USER_DELETE->delete_outbox($user_id);
$delete_friendlist = $USER_DELETE->delete_friendlist($user_id);
$delete_friendlistgroups = $USER_DELETE->delete_friendlistgroups($user_id);
$delete_usergroups = $USER_DELETE->delete_usergroups($user_id);
$delete_userinterests = $USER_DELETE->delete_userinterests($user_id);

echo $delete_user;
echo "<br />";
echo $delete_options;
echo "<br />";
echo $delete_history;
echo "<br />";
echo $delete_myYells;
echo "<br />";
echo $delete_inbox;
echo "<br />";
echo $delete_outbox;
echo "<br />";
echo $delete_friendlist;
echo "<br />";
echo $delete_friendlistgroups;
echo "<br />";
echo $delete_usergroups;
echo "<br />";
echo $delete_userinterests;
echo "<br />";
echo "<br />";        
}
?>
<a href="testuser3.php?option=create">Testuser erstellen!</a><br /><br />
<a href="testuser3.php?option=delete">Testuser l&ouml;schen!</a>






