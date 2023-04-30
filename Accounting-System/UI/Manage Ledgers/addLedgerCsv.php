<?php
require_once '../db_Connect.php';
require_once 'transaction.php';
require_once 'ledgerFormValidation.php';

//reference from here https://www.youtube.com/watch?v=btjkXDimK5U
//https://www.w3schools.com/php/php_file_upload.asp
if(isset($_POST['uploadLedgerSubmit'])) {
    if(isset($_FILES['uploadLedger']['name'])){
        $fileName = basename($_FILES["uploadLedger"]["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        if($fileType == "csv") {
            $file = $_FILES['uploadLedger']['tmp_name'];

            $handle = fopen($file, "r");

            //Reads the first line to skip header, max 1000 bytes for a line
            fgetcsv($handle, 1000, ",");

            while (($data = fgetcsv($handle, 1000, ",")) !== false) {
                $particular = $data[0];
                $date = $data[1];
                $time = $data[2];
                $deptID = $data[3];
                $amount = $data[4];
                $transaction = $data[5];

                $error_msg = "";

                //https://www.geeksforgeeks.org/php-datetime-createfromformat-function/
                $formatDate = DateTime::createFromFormat('Y-m-d', $date);
                if(!$formatDate){
                    $error_msg .= "Date must be in the format YYYY-MM-DD!\\n";
                }

                if($date > date("Y-m-d")){
                    $error_msg .= "Date cannot be in the future!\\n";
                }

                $formatTime = DateTime::createFromFormat('H:i:s', $time);
                if(!$formatTime){
                    $error_msg .= "Time must be in the format HH:MM:ss!\\n";
                }

                if($date == date("Y-m-d") && $time > date("H:i")){
                    $error_msg .= "Time cannot be in the future!\\n";
                }

                if(!is_numeric($deptID)){
                    $error_msg .= "Department ID must be a number!\\n";
                }
                else if(!isDeptIDValid($deptID)){
                    $error_msg .= "Department ID does not exist!\\n";
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

                if (empty($error_msg)) {

                    $pdo = db_connect();

                    $sql = "INSERT INTO ledgers (ledger_Particulars, created_On, dept_ID, amount, transaction_type) VALUES(?, ?, ?, ?, ?)";

                    $stmt = $pdo->prepare($sql);

                    $values = array($particular, ($date . ' ' . $time), $deptID, $amount, $transaction);

                    $stmt->execute($values);

                    $msgData = nl2br("Ledger Particulars: " . $particular . "\\nCreated On: " . $date . "\\nDepartment ID: " . $deptID . "\\nAmount: " . $amount .
                        "\\nTransaction type: " . $transaction . "\\nSuccessfully added to database!!!");

                    //transaction
                    $deptBal = getDeptBal($deptID);

                    $transaction == 'D' ? $deptBal += $amount : $deptBal -= $amount;

                    updateDeptBal($deptID, $deptBal);

                    echo "<script>console.log('$msgData'); window.location.href = 'Ledger.php'; </script>";
                } else {
                    echo "<script>alert('$error_msg'); </script>";
                    exit();
                }
            }
        } else {
            echo "<script>alert('Please upload a CSV file!'); window.history.back(); </script>";
        }
    }
}

function isDeptIDValid($deptID): bool
{
    $pdo = db_connect();
    $sql = "SELECT dept_ID FROM departments WHERE dept_ID = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array($deptID));
    $row = $stmt->fetch();
    $pdo = null;
    (is_null($row)) ? $valid = false : $valid = true;
    return $valid;
}