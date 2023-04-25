<?php
$interest = 0.05;
$balance = 100000;
$year = 0;
echo "<h1>Joe's bank balance</h1>";
while(++$year){
    $balance = ($balance*1.05) - 12000;
    if($balance < 12000){
        echo "<p>Balance in account left €".number_format($balance,2,'.')." cannot perform withdrawal.</p>";
        break;
    }
    else{
        echo "<p>Balance for year ".$year." is €".number_format($balance,2,'.').".</p>";
    }
}
