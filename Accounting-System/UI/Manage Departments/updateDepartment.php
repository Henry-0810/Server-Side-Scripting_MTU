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
function getDeptInfo($deptID): array
{
    $pdo = db_connect();
    $sql = "SELECT * FROM departments WHERE dept_ID = :dept_ID";

    $result = $pdo->prepare($sql);
    if(isset($deptID)){
        $result->bindValue(':dept_ID',$deptID);
        $result->execute();
    }

    $deptInfo = [];
    while($row = $result->fetch()){
        $deptInfo = [
            'deptDesc' => $row['dept_Desc'],
            'deptBal' => $row['dept_Bal']
        ];
    }

    $pdo = null;
    return $deptInfo;
}

if(isset($_POST['deptNo'])){
    $deptInfo = getDeptInfo($_POST['deptNo']);
    echo json_encode($deptInfo);
}
