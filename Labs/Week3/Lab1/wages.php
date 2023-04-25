<?php
$hours = $_GET['hours'];
$rate = $_GET['rate'];
//function getWages($hours,$rate){
//    $rate = number_format($rate,2);
//    $wages = number_format($hours*$rate,2);
//    echo("<p>Hours: $hours, Rate: €$rate, Wages: €$wages");
//}
include("../Lab2/Func.php");
getWages($hours,$rate);