<?php
require_once('includes/class/class.image.php');
$IMAGE = new system\image();
$image_source = "images/test.jpg";

echo $IMAGE->createImage($image_source,'200','200');

?>