<?php
require_once '../db_Connect.php';
include_once '../Manage Departments/updateDepartment.php';

$pdo = db_connect();

$sql = "SELECT * FROM Ledgers";

$stmt = $pdo->prepare($sql);
$stmt->execute();

while($row = $stmt->fetch()){
    $deptID = $row['dept_ID'];
    echo '<tr><td>'.$row['created_On'].'</td><td>'.$row['ledger_ID'].'</td><td>'.$row['ledger_Particulars'].'</td><td>'.
        getDeptName($deptID).'</td><td>'.$row['amount'].'</td><td>'.$row['transaction_type'].'</td>'.
        '<td><button type="button" name="updLedgerBtn" class="table-btn" data-id='.$row['leger_ID'].'>Update</button></td></tr>';
}

$pdo = null;

