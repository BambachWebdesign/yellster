<?php
require_once('../settings.php');
require_once('../class/class.register.php');
$REGISTER = new system\register();
$error=false;
$id=$_GET['id'];

if(isset($_POST['email']) && isset($_FILES['picture_file']['tmp_name'])) {
    $email_ok = $REGISTER->check_email($_POST['email']);
    $filetype = GetImageSize($_FILES['picture_file']['tmp_name']);
    $error = ($filetype[2]==0)? "Bitte nur *.jpeg, *.jpg, *.gif oder *.png Dateien hochladen!" : $error;
    $error = ($email_ok == 1 OR $email_ok == 2 OR $email_ok == 3 OR $email_ok == 4)? "Fehler im Sicherheitsprotokoll! ".$email_ok : $error;
    if($error==false) {
        $name = md5($email_ok);
        $file        = "../../_temp/temp_".$name.".jpg";
        move_uploaded_file($_FILES['picture_file']['tmp_name'], $file);
        $picture_sizes = array(200,100,40);

        foreach ($picture_sizes as $size) {
            $target      = "../../_temp/".$name."_".$size.".jpg";
            $quality     = "100";
            $max_width   = 200-(200-$size);
            $max_height  = 200-(200-$size);
            $src_img     = imagecreatefromjpeg($file);
            $picsize     = getimagesize($file);
            $src_width   = $picsize[0];
            $src_height  = $picsize[1];
            if($src_width>$src_height) {
                $verhaeltnis=$src_width/$src_height;
                $dest_height=$max_height;                
                $dest_width=$max_width*$verhaeltnis;
            } elseif($src_width<$src_height) {
                $verhaeltnis=$src_height/$src_width;
                $dest_width=$max_width;
                $dest_height=$max_height*$verhaeltnis;
            } elseif($src_width==$src_height) {
                $dest_height=$max_height;
                $dest_width=$max_width;
            }    
            $bild        = $_FILES['picture_file']['name'];
            $dst_img = imagecreatetruecolor($dest_width,$dest_height);
            $dst_img_part = imagecreatetruecolor($max_width,$max_height);
            imagecopyresampled($dst_img, $src_img, 0, 0, 0, 0, $dest_width, $dest_height, $src_width, $src_height);
            ImageCopy ($dst_img_part, $dst_img, 0, 0, 0, 0, $max_width, $max_height );             
            imagejpeg($dst_img_part, $target, $quality);
        }        
        unlink($file);
    } 
}
$formular =
    "<form action='image.php' method='post' enctype='multipart/form-data'>".
        "<input type='hidden' name='email' value=".$id." />".
        "<input class='upload' type='file' name='picture_file' size='20' />".
        "<input class='upload' type='submit' name='' value='senden' />".
        "<input class='upload' type='reset' value='löschen' />".
    "</form>";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de">
<head>
    <title>Yellster - Registrierung</title>
    <meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="keywords" content="" />
</head>
<body>
<?php 
if(isset($_POST['email']) && isset($_FILES['picture_file']['tmp_name'])) {
    echo ($error==false)? "Dein Portrait wurde erfolgreich hochgeladen!" : $error;    
} else {
    echo $formular;
}
?>
</body>
</html>
