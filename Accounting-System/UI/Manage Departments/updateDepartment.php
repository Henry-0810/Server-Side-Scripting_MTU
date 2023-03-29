<?php
include '../db_Connect.php';
function getDeptDetails(): void
{
    $pdo = db_connect();

    $sql = "SELECT dept_ID, dept_Name FROM departments";

    $stmt = $pdo->prepare($sql);

    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $row) {
        echo "<option value='" . $row["dept_ID"] . "'>" . $row["dept_ID"] . " - " .
            $row["dept_Name"] . "</option>";
    }

    $pdo = null;
}