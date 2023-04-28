<?php
require_once '../db_Connect.php';
require_once 'transaction.php';

//gets the employee's total wages for a department
if (isset($_POST['functionName']) && $_POST['functionName'] == 'monthlyPay') {
    $deptID = $_POST['deptID'];
    $payroll = monthlyPay($deptID);
    echo json_encode($payroll);
    exit();
}

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

    if (empty($error_msg)) {

        $pdo = db_connect();

        $sql = "INSERT INTO ledgers (ledger_Particulars, created_On, dept_ID, amount, transaction_type) VALUES(?, ?, ?, ?, ?)";

        $stmt = $pdo->prepare($sql);

        $values = array($particular, ($date . ' ' . $time), $deptID, $amount, $transaction);

        $stmt->execute($values);

        $data = nl2br("Ledger Particulars: " . $particular . "\\nCreated On: " . $date . "\\nDepartment ID: " . $deptID . "\\nAmount: " . $amount .
            "\\nTransaction type: " . $transaction . "\\nSuccessfully added to database!!!");
        echo $data;

        $deptBal = getDeptBal($deptID);

        if($transaction == 'D'){
            $deptBal += $amount;
        }
        else if($transaction == 'C'){
            $deptBal -= $amount;
        }

        updateDeptBal($deptID, $deptBal);
        echo "<script>alert('$data'); window.location.href = 'Ledger.php'; </script>";
    } else {
        echo "<script>alert('$error_msg'); window.history.back(); </script>";
    }
}

function monthlyPay($deptID): float
{
    $pdo = db_connect();

    $sql = "SELECT SUM(Salary) FROM employees WHERE dept_ID = ?";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$deptID]);

    $payroll= (double) $stmt->fetchColumn();
    $pdo = null;

    return $payroll;
}

function monthlyIncome($deptID): float
{
    $pdo = db_connect();

    $sql = "SELECT dept_Bal FROM departments WHERE dept_ID = ?";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$deptID]);

    $pdo = null;

    return (double) $stmt->fetchColumn()*0.2;
}
