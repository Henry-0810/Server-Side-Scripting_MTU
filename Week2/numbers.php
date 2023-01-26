<?php
function numberSquareCube($x){
    for($i = 1;$i <= $x;$i++){
        echo "<p> Square of $i is " . $i**2 .", cube of it is ". $i**3;
    }
}

numberSquareCube(10);