<?php
require_once '../db_Connect.php';

function getDepartmentName(): void
{
    $pdo = db_connect();

    $sql = "SELECT dept_ID, dept_Name FROM departments";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $row){
        echo "<option value='" . $row['dept_ID'] . "'>" . $row['dept_Name'] . "</option>";
    }

    $pdo = null;
}

$error_msg = "";
if(isset($_POST['addEmpSubmit'])) {
    $name = $_POST['addEmpName'];
    $job = $_POST['addEmpJob'];
    $age = $_POST['addEmpAge'];
    $salary = $_POST['addEmpSalary'];
    $deptID = $_POST['departmentDetails'];

    $error_msg .= validateName($name);

    $error_msg .= validateEmployeeInputs($age, $salary);

    if(!isset($_POST['departmentDetails'])){
        $error_msg .= "Department not selected!";
    }

    if (empty($error_msg)) {

        $pdo = db_connect();

        $sql = "INSERT INTO employees (employee_Name,Job, Age, Salary, dept_ID) VALUES(?, ?, ?, ?, ?)";

        $stmt = $pdo->prepare($sql);

        $values = array($name, $job, $age, $salary, $deptID);

        $stmt->execute($values);

        $data = nl2br("Employee name: " . $name . "\\nJob: " . $job . "\\nAge: " . $age . "\\nSalary: " . $salary .
            "\\nDepartment ID: " . $deptID . "\\nSuccessfully added to database!!!");
      echo $data;
        echo "<script>alert('$data'); window.location.href = 'Employee.php'; </script>";
    } else {
        echo "<script>alert('$error_msg'); window.history.back(); </script>";
    }
}