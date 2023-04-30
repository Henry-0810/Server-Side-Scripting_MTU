<?php
require_once '../db_Connect.php';
require_once 'transaction.php';
require_once 'ledgerFormValidation.php';
function getLedgerInfo($ledgerID): array
{
    $pdo = db_connect();

    $sql = "SELECT * FROM ledgers WHERE ledger_ID = :ledgerID";

    $result = $pdo->prepare($sql);
    if(isset($ledgerID)){
        $result->bindValue(':ledgerID', $ledgerID);
        $result->execute();
    }

    $ledgerInfo = [];
    while($row = $result->fetch()){
        $ledgerInfo = [
            'id' => $row['ledger_ID'],
            'particulars' => $row['ledger_Particulars'],
            'created_On' => $row['created_On'],
            'dept_ID' => $row['dept_ID'],
            'amount' => $row['amount'],
            'type' => $row['transaction_type']
        ];
    }

    $pdo = null;
    return $ledgerInfo;
}

if(isset($_POST['ledgerID'])) {
    $ledgerInfo = getLedgerInfo($_POST['ledgerID']);
    echo json_encode($ledgerInfo);
}

$error_msg = "";
if(isset($_POST['updLedgerSubmit'])){
    $particular = $_POST['updLedgerParticular'];
    $date = $_POST['updLedgerDate'];
    $time = $_POST['updLedgerTime'];
    $deptID = $_POST['deptNo'];
    $amount = $_POST['updLedgerAmount'];
    $transaction = $_POST['debtCredOption'];
    $ledgerInfo = getLedgerInfo($_POST['ledgerID']);

    if(empty($particular)){
        $error_msg .= "Particulars is empty!";
    }

    $error_msg .= validateLedger($date, $time, $deptID, $amount, $ledgerInfo['amount'], $transaction);

    if($error_msg == ""){
        $pdo = db_connect();

        $sql = "UPDATE ledgers SET ledger_Particulars = ?, created_On = ?, dept_ID = ?, amount = ?, transaction_type = ? WHERE ledger_ID = ?";

        $stmt = $pdo->prepare($sql);
        $values = array($particular, $date.' '.$time, $deptID, $amount, $transaction, $_POST['ledgerID']);
        $stmt->execute($values);

        $data = nl2br("Successfully Updated to database!\\nUpdated information shown below:\\nLedger Particulars: " .
             $particular . "\\nDate: " . $date . ' ' . $time . "\\nDepartment ID: " . $deptID . "\\nAmount: " . $amount .
            "\\nTransaction Type: " . $transaction);

        $deptBal = getDeptBal($deptID);
        $initialDeptBal = getDeptBal($ledgerInfo['dept_ID']);

        echo $ledgerInfo['dept_ID'];
        echo $deptID;
        if ($deptID == $ledgerInfo['dept_ID'] && $amount == $ledgerInfo['amount'] && $transaction == $ledgerInfo['type']) {
            //Do nothing if all the values match
            echo "no need to process";
        } else {
            if ($deptID != $ledgerInfo['dept_ID']) {
                $initialDeptBal += ($ledgerInfo['type'] == 'D') ? (-$ledgerInfo['amount']) : $ledgerInfo['amount'];
                $deptBal += $transaction == 'D' ? $amount : -$amount;
                updateDeptBal($ledgerInfo['dept_ID'],$initialDeptBal);
            } else {
                echo "calling this";
                if ($ledgerInfo['type'] == 'D') {
                    $deptBal -= $ledgerInfo['amount'];
                } else {
                    $deptBal += $ledgerInfo['amount'];
                }
                $deptBal += $transaction == 'D' ? $amount : -$amount;
            }
            echo $deptBal;

            updateDeptBal($deptID, $deptBal);
        }

        $pdo = null;
        echo "<script>alert('$data'); window.location.href = 'Ledger.php'; </script>";
    } else {
        echo "<script>alert('$error_msg'); window.history.back(); </script>";
    }
}