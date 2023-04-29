<?php
function validateLedger($date, $time, $deptID, $amount, $transaction): string
{
    $error_msg = "";

    if($date > date("Y-m-d")){
        $error_msg .= "Date cannot be in the future!\\n";
    }

    if($date == date("Y-m-d") && $time > date("H:i")){
        $error_msg .= "Time cannot be in the future!\\n";
    }

    if(!isset($_POST['deptNo'])){
        $error_msg .= "Department not selected!\\n";
    }

    if(!is_numeric($amount)){
        $error_msg .= "Amount must be a number!\\n";
    }
    else if($amount <= 0){
        $error_msg .= "Amount must be positive!\\n";
    }

    if($transaction == 'C' && $amount > getDeptBal($deptID)){
        $error_msg .= "Insufficient balance!\\n";
    }

    return $error_msg;
}