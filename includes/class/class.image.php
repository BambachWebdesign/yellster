<?php
namespace system;

class image {
    public function createImage($image_source,$image_dest,$max_width,$max_height) {
        move_uploaded_file($image_source, "/temp_pictures/".$image_dest);
        $image_info = getimagesize($image_source);
        $temp_resized = "/temp_resized/".$image_dest;
        $old_width = $image_info[0];
        $old_height = $image_info[1];
        $image_type = $image_info[2];
        if($old_width>$old_height) {
            $verhaeltnis=$old_height/$old_width;
            $new_width=$max_width;
            $new_height=$max_height*$verhaeltnis;
        } elseif($old_width<$old_height) {
            $verhaeltnis=$old_width/$old_height;
            $new_height=$max_height;
            $new_width=$max_width*$verhaeltnis;
        }
        $image_new = imagecreatetruecolor($new_width,$new_height);        
        $image_old = imagecreatefromjpeg($image_source);        
        imagecopyresampled($image_new, $image_old,'0','0','0','0',$new_width, $new_height, $old_width, $old_height);
        /*$text_color = imagecolorallocate($image_new,50,33,0);
        imagestring($ixt_color);mage_new,5,30,70,'yellster.de', $te */
        imagejpeg($image_new,$temp_resized,'100');
    }
}
?>