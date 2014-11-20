<?php
foreach($_GET as $gesendet){
    echo "user_id: ".$gesendet."<br />";
    $check=md5($gesendet);
    $user_id2=$_GET[$check];
    echo "user_id2: ".$user_id2."<br />";    
}
?>