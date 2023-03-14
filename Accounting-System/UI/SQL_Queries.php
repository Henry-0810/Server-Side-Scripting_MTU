<?php
function db_Connect(): PDO
{
    $pdo = new PDO('mysql:host=localhost;dbname=accountingsys; charset=utf8', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
}

function errorMsg($e): void
{
    echo 'Database error: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine();
}
//add Employee part
if(isset($_POST['addSubmit'])){
    try{
        $name = $_POST['addName'];
        $job = $_POST['addJob'];
        $age = $_POST['addAge'];
        $salary = $_POST['addSalary'];
        $error_msg = '';

        if(!preg_match("/^[a-zA-Z\s]+$/", $name)) {
            $error_msg .= "Invalid Name";
        }
        if($age < 18 || $age > 65) {
            $error_msg .= "Age should be between 18 and 65";
        }
        if($salary < 3500) {
            $error_msg .= "Salary should be greater than 3500";
        }

        if(empty($error_msg)) {
            $pdo = db_Connect();

            $sql = "INSERT INTO employee (employee_Name,Job, Age, Salary) VALUES(:name, :job, :age, :salary)";

            $stmt = $pdo->prepare($sql);

            $stmt->bindValue(':name', $name);
            $stmt->bindValue(':job', $job);
            $stmt->bindValue(':age', $age);
            $stmt->bindValue(':salary', $salary);

            $stmt->execute();

            $data = nl2br("Employee name: ".$name."\\nJob: ".$job."\\nAge: ".$age."\\nSalary: ".$salary.
                "\\nSuccessfully added to database!!!");

            echo "<script>alert('$data'); window.location.href = 'Employee.php';</script>";
        }
        else{
            echo "<script>alert('$error_msg'); window.history.back();</script>";
        }
    }
    catch (PDOException $e) {
        errorMsg($e);
    }

function getEmployeeNo(): void
{
    $pdo = db_Connect();
    $sql = "SELECT employee_NO FROM employee";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $row) {
        echo "<option value='" . $row["employee_NO"] . "'>" . $row["employee_NO"] . "</option>";
    }

    $pdo = null;
}
}