<?php
require_once('includes/settings.php');
system\database::connect_with_db();
$anti_spam_ip = $_SERVER['REMOTE_ADDR'];
$entry_exists = mysql_query("SELECT * FROM `global`.`anti_spam` WHERE `anti_spam`.`anti_spam_ip` = `$anti_spam_ip`");
list($eins,$zwei,$drei) = mysql_fetch_row($entry_exists);
echo $eins.$zwei.$drei;
echo $entry_exists;
?>