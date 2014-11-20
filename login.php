<?php
require_once ('includes/settings.php');
$LOGIN = new system\login();

    if($_GET['logout']=="1")
    {
        system\database::connect_with_db();
        $LOGIN->destroyCookie();
        $LOGIN->setStatusOffline($_COOKIE['cookieid']);
        echo "Sie haben sich ausgelogged";
        
    }

if(!isset ($_COOKIE['userid'])){
    if($_POST['send']=="1")
    {
        system\database::connect_with_db();
        $check_login = $LOGIN->checkLogin($_POST['login'],$_POST['password']);
        if($check_login==true){
            $create_cookie = $LOGIN->createCookie($_POST['login'],$_POST['password']);
            $set_status_online = $LOGIN->setStatusOnline($cookieid,$_POST['login'],$_SERVER['REMOTE_ADDR'],$_COOKIE[0]);
        }
        echo "Login correct: ".$check_login;
        echo "<br />";
        echo "Session created: ".$create_cookie;
        echo "<br />";
        echo "Status Online: ".$set_status_online;
        echo "<br />";
    }
?>
    <html>
    <head></head>
    <body>
    <fieldset style="padding:2px;width:180px;border:1px solid steelblue;">
    <legend>Login</legend>
    <form id="noSpaces" method="POST" action="login.php">
    Login:<br />
    <input type="text" class="standardField" name="login" size="30" maxLength="100"><br />
    Password:<br />
    <input type="password" class="standardField" name="password" size="30" maxLength="100"><br />
    <input type="hidden" name="send" value="1">
    <input type="submit" onFocus="blur();" class="standardSubmit" name="doLogin" value="Anmelden">
    <input type="reset" onFocus="blur();" class="standardSubmit" name="reset" value="L&ouml;schen">
    </form>
    </fieldset>
    </body>
    </html>
<?php
}
else {
    echo "Allready logged in!<br />";
    echo "<a href='login.php?logout=1'>ausloggen</a>";
}
?>
