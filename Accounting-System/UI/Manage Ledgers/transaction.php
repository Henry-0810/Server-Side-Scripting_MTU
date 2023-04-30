<?php
require_once '../db_Connect.php';

function getDeptBal($deptID): float
{
    $pdo = db_connect();

    $sql = "SELECT dept_Bal FROM departments WHERE dept_ID = ?";

    $stmt = $pdo->prepare($sql);
    $stmt->execute(array($deptID));

    $pdo = null;

    return (double) $stmt->fetchColumn();
}

function updateDeptBal($deptID, $deptBal): void
{
    $pdo = db_connect();

    $sql = "UPDATE departments SET dept_Bal = ? WHERE dept_ID = ?";

    $stmt = $pdo->prepare($sql);
    $stmt->execute(array($deptBal, $deptID));

    $pdo = null;
}