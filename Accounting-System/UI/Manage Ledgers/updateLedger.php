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

function getLedgerParticular($ledgerID){
    $pdo = db_connect();
    $sql = "SELECT ledger_Particulars FROM ledgers WHERE ledger_ID = ?";

    $stmt = $pdo->prepare($sql);
    $stmt->execute(array($ledgerID));
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    $name = $result['ledger_Particulars'];
    $pdo= null;
    return $name;
}

if(isset($_POST['ledgerID'])) {
    $ledgerInfo = getLedgerInfo($_POST['ledgerID']);
    echo json_encode($ledgerInfo);
}

$error_msg = "";
if(isset($_POST['updLedgerSubmit'])){
    $particular = $_POST['addLedgerParticular'];
    $date = $_POST['createdOn'];
    $time = $_POST['time'];
    $deptID = $_POST['deptNo'];
    $amount = $_POST['amount'];
    $transaction = $_POST['debtCredOption'];

    if(empty($particular)){
        $error_msg .= "Particulars is empty!";
    }

    $error_msg .= validateLedger($date, $time, $deptID, $amount, $transaction);

    if($error_msg == ""){
        $pdo = db_connect();

        $sql = "UPDATE ledgers SET ledger_Particulars = ?, created_On = ?, dept_ID = ?, amount = ?, transaction_type = ? WHERE ledger_ID = ?";

        $stmt = $pdo->prepare($sql);
        $stmt->execute(array($particular, $date, $deptID, $amount, $transaction, $_POST['ledgerID']));

        $pdo = null;

        header("Location: ../../UI/Manage Ledgers/transaction.php?deptNo=$deptID");
    }
    else{
        header("Location: ../../UI/Manage Ledgers/transaction.php?deptNo=$deptID&errorMsg=$error_msg");
    }
}