<?php
require_once('../settings.php');
require_once('../class/class.register.php');
$REGISTER = new system\register();

if(isset($_POST['name'])) {
    print $REGISTER->check_name($_POST['name']);
}
if(isset($_POST['email'])) {
    print $REGISTER->check_email($_POST['email']);
}
if(isset($_POST['password'])) {
    print $REGISTER->check_password($_POST['password']);
}
if(isset($_POST['firstname'])) {
    print $REGISTER->check_city($_POST['firstname']);
}
if(isset($_POST['familyname'])) {
    print $REGISTER->check_city($_POST['familyname']);
}
if(isset($_POST['birthday']) && isset($_POST['birthmonth']) && isset($_POST['birthyear'])) {
    print $REGISTER->check_birthdate($_POST['birthday'],$_POST['birthmonth'],$_POST['birthyear']);
}
if(isset($_POST['gender'])) {
    print $REGISTER->check_gender($_POST['gender']);
}
if(isset($_POST['status'])) {
    print $REGISTER->check_status($_POST['status']);
}
if(isset($_POST['status_with'])) {
    print $REGISTER->check_status_with($_POST['status_with']);
}
if(isset($_POST['looking_for'])) {
    print $REGISTER->check_looking_for($_POST['looking_for']);
}
if(isset($_POST['language'])) {
    print $REGISTER->check_language($_POST['language']);
}
if(isset($_POST['phone'])) {
    print $REGISTER->check_phone($_POST['phone']);
}
if(isset($_POST['mobilphone'])) {
    print $REGISTER->check_mobilphone($_POST['mobilphone']);
}
if(isset($_POST['adress'])) {
    print $REGISTER->check_adress($_POST['adress']);
}
if(isset($_POST['citycode'])) {
    print $REGISTER->check_citycode($_POST['citycode']);
}
if(isset($_POST['city'])) {
    print $REGISTER->check_city($_POST['city']);
}
if(isset($_POST['country'])) {
    print $REGISTER->check_country($_POST['country']);
}
if(isset($_POST['picture'])){
    print $REGISTER->check_picture($_POST['picture']);    
}
?>