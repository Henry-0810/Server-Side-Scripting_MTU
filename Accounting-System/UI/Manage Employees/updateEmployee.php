<?php
require_once '../db_Connect.php';
function getEmployeeInfo($employeeNo): array
{
    $pdo = db_connect();
    $sql = "SELECT * FROM employee WHERE employee_NO = :employeeNo";

    $result = $pdo->prepare($sql);
    if(isset($employeeNo)){
        $result->bindValue(':employeeNo', $employeeNo);
        $result->execute();
    }

    $employeeInfo = [];
    while($row = $result->fetch()){
        //https://www.php.net/manual/en/functions.arrow.php arrow function learned in this link
        $employeeInfo = [
            'id' => $row['employee_NO'],
            'name' => $row['employee_Name'],
            'job' => $row['Job'],
            'age' => $row['Age'],
            'salary' => $row['Salary'],
            'dept_ID' => $row['dept_ID']
        ];
    }

    $pdo = null;
    return $employeeInfo;
}
function getEmployeeName($employeeNo){
    $pdo = db_connect();
    $sql = "SELECT employee_Name FROM employee WHERE employee_NO = ?";

    $stmt = $pdo->prepare($sql);
    $stmt->execute(array($employeeNo));
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    $name = $result['employee_Name'];
    $pdo= null;
    return $name;
}

if(isset($_POST['employeeID'])) {
    $employeeInfo = getEmployeeInfo($_POST['employeeID']);
    echo json_encode($employeeInfo);
}

$errorMsg = "";
if (isset($_POST['updEmpSubmit'])) {
    $job = $_POST['updJob'];
    $age = $_POST['updAge'];
    $salary = $_POST['updSalary'];
    $depID = $_POST['deptNo'];

    if ($job == '') {
        $errorMsg .= "Job is empty!";
    }

    if (validateEmployeeInputs($age, $salary) != "All inputs correct!") {
        $errorMsg .= validateEmployeeInputs($age, $salary);
    }

    if (empty($errorMsg)) {
        $pdo = db_connect();

        $sql = "UPDATE employee SET Job = ?, Age = ?, Salary = ?, dept_ID = ? WHERE employee_NO = ?";
        $stmt = $pdo->prepare($sql);
        $values = array($job, $age, $salary, $depID, $_POST['employeeID']);
        $stmt->execute($values);

        $name = getEmployeeName($_POST['employeeID']);
        $employeeInfo = getEmployeeInfo($_POST['employeeID']);

        $data = nl2br("Successfully Updated to database!\\nUpdated information shown below:\\nEmployee Name: " .
            $name . "\\nJob: " . $employeeInfo['job'] . "\\nAge: " . $employeeInfo['age'] . "\\nSalary: " . $employeeInfo['salary'] .
            "\\nDepartment ID: " . $depID);

        $pdo = null;
        echo "<script>alert('$data'); window.location.href = 'Employee.php'; </script>";
    } else {
        echo "<script>alert('$errorMsg'); window.history.back(); </script>";
    }
}




