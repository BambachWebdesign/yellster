<?php
require_once('includes/settings.php');
$LOGIN = new system\login();
$ONLINE = new system\online();
$check_for_cookie = $LOGIN->checkCookie();
$create_alert = "";

if($_POST['login_done']=="1" && $check_for_cookie==false) {
    $spam_check = time() - $_POST['antispam'];
    if($spam_check <= "600") {
        system\database::connect_with_db();
        $check_login = $LOGIN->checkLogin($_POST['login'],$_POST['password']);
        $check_for_ban = $LOGIN->checkBan();    
        if($check_login==true && $check_for_ban==false) {
            $cookieid = time().$_POST['login'];
            $cookieid = md5($cookieid);            
            $create_cookie = $LOGIN->createCookie($cookieid,$_POST['login'],$_POST['password']);
            $set_status_online = $ONLINE->setStatusOnline($cookieid,$_POST['login'],$_SERVER['REMOTE_ADDR']);    
            $create_html = "dragit_init(); create.init(); create.header()";
        } elseif($check_login==false && $check_for_ban==false) {
            $set_spam = $LOGIN->antiSpam();
            if($set_spam==false) {
                $create_alert = "create.alert('Du hast ein falsches Passwort oder falschen Benutzernamen eingegeben!',500)";
                $create_antispam = time();
                $create_html = "create.init(); create.login('".$create_antispam."')";
            } else {
                $create_alert = "create.alert('Du hast zu oft falsche Daten eingegeben! Der Spamschutz hat dich f&uuml;r 10 Minuten gebant!',500)";
                $create_antispam = time();
                $create_html = "create.init(); create.login('".$create_antispam."')";    
            }    
        } elseif($check_for_ban==true) {
            $create_alert = "create.alert('Deine IP-Adresse wurde wegen SPAM gebant!',500)";
            $create_antispam = time();
            $create_html = "create.init(); create.login('".$create_antispam."')";    
        }
    } else {
        $create_alert = "create.alert('Deine Loginsession ist abgelaufen.<br />Bitte gib deine Daten erneut ein.',500)";
        $create_antispam = time();
        $create_html = "create.init(); create.login('".$create_antispam."')";
    }
}

if(!isset ($_POST['login_done'])) {    
    if($check_for_cookie==true) {
        $create_html = "dragit_init(); create.init(); create.header()";
    } else {
        $create_antispam = time();
        $create_html = "create.init(); create.login('".$create_antispam."')";     
    }
} 
if(isset ($_GET['logout'])) {
    system\database::connect_with_db();
    $ONLINE->setStatusOffline($_COOKIE['cookieid']);
    $LOGIN->destroyCookie();
    $create_alert = "create.alert('Sie haben sich ausgelogged',400)";
    $create_antispam = time();
    $create_html = "create.init(); create.login('".$create_antispam."')";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de">

<head>
    <title>Yellster</title>

    <meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="keywords" content="" />

    <link href="styles/default.css" type="text/css" rel="stylesheet" />
    <link href="favicon.ico" type="image/x-icon" rel="shortcut icon" />
    <script language="javascript" type="text/javascript" src="scripts/global.js"></script>
    <script language="javascript" type="text/javascript" src="scripts/ajax.js"></script>
    <script language="javascript" type="text/javascript" src="scripts/querries.js"></script>
    <script language="javascript" type="text/javascript" src="scripts/dragit.js"></script>
    <script language="javascript" type="text/javascript" src="scripts/container.js"></script>
</head>

<body onload="<?php echo $create_html."; ".$create_alert ?>">
</body>
</html>