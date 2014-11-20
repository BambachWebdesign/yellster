<?php 
if($_POST['string']!="") {
    $string = $_POST['string'];
    print ord($string)."<br />";    
} 
if($_POST['ascii']!="") {
    $ascii = $_POST['ascii'];
    print chr($ascii)."<br />";    
}
if($_POST['list']!="") {
    for($i=1;$i<=255;$i++) {
        print $i." = ".chr($i)."<br />";
    }
}
?>



<form action="string.php" method="POST">
String eingeben: <textarea name='string' cols='35' rows='1'></textarea><br/>
ASCII-code eingeben: <input type="text" size="30" name="ascii"><br />
ASCII-codes auflisten: <input type="text" size="30" name="list"><br />
<input type="submit" value="senden">
</form>







