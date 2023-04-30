<?php
require_once 'db_Connect.php';

$pdo = db_connect();
$sql = "SELECT dept_ID, dept_Name FROM departments";

$result = $pdo->prepare($sql);
$result->execute();

//initialize arrays
$deptIDs = array();
$deptNames = array();
$rows = $result->fetchAll(PDO::FETCH_ASSOC);
foreach ($rows as $row){
    //add each row to the arrays
    $deptIDs[] = $row['dept_ID'];
    $deptNames[] = $row['dept_Name'];
}

$pdo = null;

echo json_encode(array($deptIDs,$deptNames));


