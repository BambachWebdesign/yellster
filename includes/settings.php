<?php
// Pfade
define('PROJECT_DOCUMENT_ROOT',__DIR__);
$project = str_replace($_SERVER['DOCUMENT_ROOT'], '', str_replace("\\", "/",__DIR__));
(!isset($_SERVER['HTTPS']) OR $_SERVER['HTTPS']=='off') ? $protocol = 'http://' : $protocol = 'https://';
define('PROJECT_HTTP_ROOT',$protocol.$_SERVER['HTTP_HOST'].$project);

// Klassen
require_once ('/class/class.database.php');
require_once ('/class/class.login.php');
require_once ('/class/class.security.php');
require_once ('/class/class.yells.php');
require_once ('/class/class.users.php');
require_once ('/class/class.online.php');
require_once ('/class/class.friends.php');
?>