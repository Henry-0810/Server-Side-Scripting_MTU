<?php
require_once '../db_Connect.php';

if(isset($_POST['addLedgerSubmit'])) {
    $particular = $_POST['addLedgerParticular'];
    $date = $_POST['createdOn'];
    $time = $_POST['time'];
    $deptID = $_POST['deptNo'];
    $amount = $_POST['amount'];
    $transaction = $_POST['debtCredOption'];
    $error_msg = '';

    if($date > date("Y-m-d")){
        $error_msg .= "Date cannot be in the future!\\n";
    }

    if(!isset($_POST['deptNo'])){
        $error_msg .= "Department not selected!";
    }

    if(!is_numeric($amount)){
        $error_msg .= "Amount must be a number!\\n";
    }
    else if($amount <= 0){
        $error_msg .= "Amount must be positive!\\n";
    }

    if (empty($error_msg)) {

        $pdo = db_connect();

        $sql = "INSERT INTO ledgers (ledger_Particulars, created_On, dept_ID, amount, transaction_type) VALUES(?, ?, ?, ?, ?)";

        $stmt = $pdo->prepare($sql);

        $values = array($particular, $date, $deptID, $amount, $transaction);

        $stmt->execute($values);

        $data = nl2br("Ledger Particulars: " . $particular . "\\nCreated On: " . $date . "\\nDepartment ID: " . $deptID . "\\nAmount: " . $amount .
            "\\nTransaction type: " . $transaction . "\\nSuccessfully added to database!!!");
        echo $data;
        echo "<script>alert('$data'); window.location.href = 'Ledger.php'; </script>";
    } else {
        echo "<script>alert('$error_msg'); window.history.back(); </script>";
    }
}
