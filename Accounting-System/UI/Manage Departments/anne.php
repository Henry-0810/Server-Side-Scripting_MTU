<?php
include "../db_Connect.php";

$name = 'it';
$description = 'sagdwud';
$balance = 10000.00;

$pdo = db_connect();

$sql = "INSERT INTO departments (dept_Name, dept_Desc, dept_Bal) VALUES (?,?,?)";

$stmt = $pdo->prepare($sql);

$balance = round($balance,2);

$values = array($name,$description,$balance);

$stmt->execute($values);

echo "<script>alert('done'); window.location.href = 'Department.php'; </script>";


