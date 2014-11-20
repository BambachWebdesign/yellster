<?php
require_once('includes/settings.php');
$LOGIN = new system\login();
$ONLINE = new system\online();
$check_for_cookie = $LOGIN->checkCookie();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de">

<head>
    <title>Yellster - Registrierung</title>

    <meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="keywords" content="" />

    <link href="styles/register.css" type="text/css" rel="stylesheet" />
    <link href="favicon.ico" type="image/x-icon" rel="shortcut icon" />
    <script language="javascript" type="text/javascript" src="scripts/ajax.js"></script>
    <script language="javascript" type="text/javascript" src="scripts/dragit.js"></script>
    <script language="javascript" type="text/javascript" src="scripts/register.js"></script>
    <script language="javascript" type="text/javascript" src="scripts/storage.js"></script>
    <script language="javascript" type="text/javascript" src="scripts/profil.js"></script>
    <script language="javascript" type="text/javascript" src="scripts/secure.js"></script>
    <script language="javascript" type="text/javascript" src="scripts/picture.js"></script>
    <script language="javascript" type="text/javascript" src="scripts/complete.js"></script>
    
</head>

<body onload="dragit_init(); create.init()">
</body>
</html>