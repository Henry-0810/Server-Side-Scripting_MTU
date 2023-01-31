<?php
$getLength = $_GET['star'];
$stars = "*";
for($i=1;$i<=$getLength;$i++){
    echo("<p>".$stars ."</p>");
    $stars = $stars . "*";
}

