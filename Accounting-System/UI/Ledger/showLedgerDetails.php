<?php
require_once '../db_Connect.php';

function showLedgerTable(){
    $pdo = db_connect();

    $sql = "SELECT * FROM Ledger";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    while($row = $stmt->fetch()){
        echo '<tr><td>'.$row['ledger_ID'].'</td><td>'.$row['ledger_Name'].'</td><td>'.$row['created_On'].'</td><td>'.
            $row['dept_ID'].'</td><td>'.$row['amount'].'</td><td>'.$row['transaction_type'].'</td></tr>';
    }

    $pdo = null;
}