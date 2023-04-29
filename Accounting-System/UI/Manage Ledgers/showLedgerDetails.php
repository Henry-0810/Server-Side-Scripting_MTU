<?php
require_once '../db_Connect.php';
include_once '../Manage Departments/updateDepartment.php';

$pdo = db_connect();

$sql = "SELECT * FROM Ledgers";

$stmt = $pdo->prepare($sql);
$stmt->execute();

while($row = $stmt->fetch()){
    $deptID = $row['dept_ID'];
    $date = substr($row['created_On'],0, 10);
    $time = substr($row['created_On'],11, 15);
    echo '<tr><td>'.$date.'</td><td>'.$time.'</td><td>'.$row['ledger_ID'].'</td><td>'.$row['ledger_Particulars'].'</td><td>'.
        getDeptName($deptID).'</td><td>'.$row['amount'].'</td><td>'.$row['transaction_type'].'</td>'.
        '<td><button type="button" name="updLedgerBtn" class="table-btn" data-id='.$row['ledger_ID'].'><i class="editIcon"></i></button></td></tr>';
}

$pdo = null;

