<?php
$r = $_GET['radius'];
$h = $_GET['height'];

//function getVolume($radius,$height){
//    $volume = number_format(M_1_PI*$radius*$radius*$height,2);
//    echo("<p>Radius: $radius, Height: $height </p>");
//    echo("<p>Volume is $volume</p>");
//}
include("../Lab2/Func.php");
getVolume($r,$h);