<?php
require_once '../db_Connect.php';
include_once '../Manage Departments/updateDepartment.php';

$pdo = db_connect();

$sql = "SELECT * FROM Ledger";

$stmt = $pdo->prepare($sql);
$stmt->execute();

while($row = $stmt->fetch()){
    $deptID = $row['dept_ID'];
    echo '<tr><td>'.$row['ledger_ID'].'</td><td>'.$row['ledger_Name'].'</td><td>'.$row['created_On'].'</td><td>'.
        getDeptName($deptID).'</td><td>'.$row['amount'].'</td><td>'.$row['transaction_type'].'</td></tr>';
}

$pdo = null;

