<?php
require_once '../db_Connect.php';
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
            'deptID' => $row['dept_ID'],
            'deptName' => $row['dept_Name'],
            'deptDesc' => $row['dept_Desc'],
            'deptBal' => $row['dept_Bal']
        ];
    }

    $pdo = null;
    return $deptInfo;
}

function getDeptName($deptID)
{
    $pdo = db_connect();
    $sql = "SELECT dept_Name FROM departments WHERE dept_ID = ?";

    $stmt = $pdo->prepare($sql);
    $stmt->execute(array($deptID));
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    $name = $result['dept_Name'];
    $pdo= null;
    return $name;
}

if(isset($_POST['deptNo'])){
    $deptInfo = getDeptInfo($_POST['deptNo']);
    echo json_encode($deptInfo);
}

$errorMsg = '';
if(isset($_POST['updDeptSubmit'])){
    $description = $_POST['updDesc'];
    $balance = $_POST['updBal'];

    if(empty($description)){
        $errorMsg .= 'Description cannot be blank!';
    }

    if(!is_numeric($balance)) {
        $errorMsg .= 'Balance must be a number';
    }
    else if($balance < 10000){
        $errorMsg .= "Balance must be more than 10000";
    }

    if(empty($errorMsg)){
        $pdo = db_connect();

        $sql = "UPDATE departments SET dept_Desc = ?, dept_Bal = ? WHERE dept_ID = ?";
        $stmt = $pdo->prepare($sql);
        $values = array($description,$balance,$_POST['deptID']);
        $stmt->execute($values);

        $name = getDeptName($_POST['deptID']);
        $departmentInfo = getDeptInfo($_POST['deptID']);

        $data = nl2br("Successfully Updated to database!\\nUpdated information shown below:\\nDepartment Name: " .
            $name . "\\nDescription: " . $departmentInfo['deptDesc'] . "\\nBalance: " . $departmentInfo['deptBal']);

        $pdo = null;
        echo "<script>console.log('$data'); window.location.href = 'Department.php'; </script>";
    }
    else {
        echo "<script>alert('$errorMsg'); window.history.back(); </script>";
    }
}