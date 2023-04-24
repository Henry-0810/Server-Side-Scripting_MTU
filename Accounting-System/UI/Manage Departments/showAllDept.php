<?php
require_once '../db_Connect.php';

$pdo = db_connect();

$sql = "SELECT * FROM departments";

$stmt = $pdo->prepare($sql);
$stmt->execute();

while($row = $stmt->fetch()){
    echo '<tr><td>'.$row['dept_ID'].'</td><td>'.$row['dept_Name'].'</td><td>'.
        $row['dept_Desc'].'</td><td>€'.$row['dept_Bal'].'</td></tr>';
}

$pdo = null;