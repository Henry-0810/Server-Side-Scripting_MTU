<?php
function calcPay($hours, $rate){
    if($hours <= 60){
        return 'The pay is '.number_format($hours*$rate,2);
    }
    else{
        return 'no employee may be paid more than 60 hours, the maximum hours is 60!';
    }
}

echo calcPay(10,11.5);