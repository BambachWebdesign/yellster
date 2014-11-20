<?php
require_once('../settings.php');
require_once('../class/class.register.php');
require_once('../class/class.user_create.php');
system\database::connect_with_db();
$USER_CREATE = new system\user_create();
$REGISTER = new system\register();

$user_name = $_POST['user_name'];
$user_pw = $_POST['user_pw'];
$user_firstname = $_POST['user_firstname'];
$user_familyname = $_POST['user_familyname'];   
    $user_birthmonth=$_POST["user_birthmonth"];
    $user_birthday=$_POST["user_birthday"];
    $user_birthyear=$_POST["user_birthyear"];
$user_gender = $_POST['user_gender'];
$user_status = $_POST['user_status'];
$user_status_with = $_POST['user_status_with'];
$user_lookingfor = $_POST['user_lookingfor'];
$user_language = $_POST['user_language'];
$user_email = $_POST['user_email'];
$user_phone = $_POST['user_phone'];  
$user_mobilphone = $_POST['user_mobilphone'];
$user_adress = $_POST['user_adress'];
$user_city = $_POST['user_city'];
$user_country = $_POST['user_country'];
$user_picture = $_POST['user_picture'];

$options_public_fullname = $_POST['options_public_fullname'];
$options_public_birthday = $_POST['options_public_birthday'];
$options_public_gender = $_POST['options_public_gender'];
$options_public_status = $_POST['options_public_status'];
$options_public_lookingfor = $_POST['options_public_lookingfor'];
$options_public_language = $_POST['options_public_language'];
$options_public_email = $_POST['options_public_email'];
$options_public_phone = $_POST['options_public_phone'];
$options_public_mobilphone = $_POST['options_public_mobilphone'];
$options_public_adress = $_POST['options_public_adress'];
$options_public_city = $_POST['options_public_city'];
$options_public_country = $_POST['options_public_country'];
$options_public_interests = $_POST['options_public_interests'];
$options_public_groups = $_POST['options_public_groups'];
$options_public_friendlist = $_POST['options_public_friendlist'];

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

$user_name=$REGISTER->check_name($user_name);
$user_email=$REGISTER->check_email($user_email);
$password_ok=$REGISTER->check_password($user_pw);
$user_firstname=$REGISTER->check_firstname($user_firstname);
$user_familyname=$REGISTER->check_familyname($user_familyname);
$user_birthday=$REGISTER->check_birthdate($user_birthday,$user_birthmonth,$user_birthyear);
$user_gender=$REGISTER->check_gender($user_gender);
$user_status=$REGISTER->check_status($user_status);
$user_status_with=$REGISTER->check_status_with($user_status_with);
$user_lookingfor=$REGISTER->check_lookingfor($user_lookingfor);
$user_language=$REGISTER->check_language($user_language);
$user_phone=$REGISTER->check_phone($user_phone);
$user_mobilphone=$REGISTER->check_mobilphone($user_mobilphone);
$user_adress=$REGISTER->check_adress($user_adress);
$user_city=$REGISTER->check_city($user_city);
$user_country=$REGISTER->check_country($user_country);
$user_picture=$REGISTER->check_picture($user_picture);

$options_public_fullname = $REGISTER->check_options($options_public_fullname);
$options_public_birthday = $REGISTER->check_options($options_public_birthday);
$options_public_gender = $REGISTER->check_options($options_public_gender);
$options_public_status = $REGISTER->check_options($options_public_status);
$options_public_lookingfor = $REGISTER->check_options($options_public_lookingfor);
$options_public_language = $REGISTER->check_options($options_public_language);
$options_public_email = $REGISTER->check_options($options_public_email);
$options_public_phone = $REGISTER->check_options($options_public_phone);
$options_public_mobilphone = $REGISTER->check_options($options_public_mobilphone);
$options_public_adress = $REGISTER->check_options($options_public_adress);
$options_public_city = $REGISTER->check_options($options_public_city);
$options_public_country = $REGISTER->check_options($options_public_country);
$options_public_interests = $REGISTER->check_options($options_public_interests);
$options_public_groups = $REGISTER->check_options($options_public_groups);
$options_public_friendlist = $REGISTER->check_options($options_public_friendlist);

$error=0;
$error=($user_name==false)? $error."1" : $error."0";
$error=($user_email==false)? $error."1" : $error."0";
$error=($password_ok<=2)? $error.$password_ok:$error."0";
$error=($user_firstname==false)? $error."1" : $error."0";
$error=($user_familyname==false)? $error."1" : $error."0";
$error=($user_birthday==false)? $error."1" : $error."0";
$error=($user_gender==false)? $error."1":$error."0";
$error=($user_status==false)? $error."1":$error."0";
$error=($user_lookingfor==false)? $error."a":$error."0";
$error=($user_language==false)? $error."b":$error."0";
$error=($user_adress==false)?$error."1":$error."0";
$error=($user_city==false)?$error."1":$error."0";
$error=($user_country==false)?$error."1":$error."0";

$error=($options_public_fullname==false)?$error."1":$error."0";
$error=($options_public_birthday==false)?$error."1":$error."0";
$error=($options_public_gender==false)?$error."1":$error."0";
$error=($options_public_status==false)?$error."1":$error."0";
$error=($options_public_lookingfor==false)?$error."1":$error."0";
$error=($options_public_language==false)?$error."1":$error."0";
$error=($options_public_email==false)?$error."1":$error."0";
$error=($options_public_phone==false)?$error."1":$error."0";
$error=($options_public_mobilphone==false)?$error."1":$error."0";
$error=($options_public_adress==false)?$error."1":$error."0";
$error=($options_public_city==false)?$error."1":$error."0";
$error=($options_public_country==false)?$error."1":$error."0";
$error=($options_public_interests==false)?$error."1":$error."0";
$error=($options_public_groups==false)?$error."1":$error."0";
$error=($options_public_friendlist==false)?$error."1":$error."0";



if($error==0) {
    $create_user = $USER_CREATE->create_user($user_name, $user_pw, $user_firstname, $user_familyname, $user_birthday, $user_gender, $user_status, $user_status_with, $user_lookingfor, $user_language, $user_email, $user_phone, $user_mobilphone, $user_adress, $user_city, $user_country);
    $create_options = $USER_CREATE->create_options($user_email, $options_colors, $options_friendlist_active, $options_friendlist_x, $options_friendlist_y, $options_messageboard_active, $options_messageboard_x, $options_messageboard_y, $options_messages_menu_active, $options_messages_menu_x, $options_messages_menu_y, $options_messages_main_active, $options_messages_main_x, $options_messages_main_y, $options_public_fullname, $options_public_birthday, $options_public_gender, $options_public_status, $options_public_lookingfor, $options_public_language, $options_public_email, $options_public_phone, $options_public_mobilphone, $options_public_adress, $options_public_city, $options_public_country, $options_public_interests, $options_public_groups, $options_public_friendlist);
    $create_history = $USER_CREATE->create_history($user_email);
    $create_myYells = $USER_CREATE->create_myYells($user_email);
    $create_inbox = $USER_CREATE->create_inbox($user_email);
    $create_outbox = $USER_CREATE->create_outbox($user_email);
    $create_friendlist = $USER_CREATE->create_friendlist($user_email);
    $create_friendlistgroups = $USER_CREATE->create_friendlistgroups($user_email);
    $create_usergroups = $USER_CREATE->create_usergroups($user_email);
    $create_userinterests = $USER_CREATE->create_userinterests($user_email);
    $create_welcomemessage = $USER_CREATE->create_welcomemessage($user_email, $user_name);
    echo    "<li class='register' style='min-height:250px'>".
                "<div class='complete_text'>".
                    "<br /><br /><br /><br /><div class='green'>Registrierung erfolgreich gesendet!</div><br />".
                    "Bitte bet&auml;tige nun deinen Account durch den Aktivierungslink, <br />".
                    "welcher an ".$user_email." geschickt wurde!".                    
                "</div>".
            "</li>";
} else {
    echo    "<li class='register' style='min-height:250px'>".
                "<div class='complete_text'>".
                    "<br /><br /><br /><br /><div class='red'>Registierung fehlerhaft!</div><br />".
                    "Bitte registriere dich erneut! Fehlercode ".$error.                     
                "</div>".
            "</li>";    
}
?>



