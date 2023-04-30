<?php
function validateLedger($date, $time, $deptID, $validatingAmount, $initialAmount, $transaction): string
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

    if(!is_numeric($validatingAmount)){
        $error_msg .= "Amount must be a number!\\n";
    }
    else if($validatingAmount <= 0){
        $error_msg .= "Amount must be positive!\\n";
    }

    if($transaction == 'C' && $validatingAmount > getDeptBal($deptID) + $initialAmount){
        $error_msg .= "Insufficient balance!\\n";
    }

    return $error_msg;
}