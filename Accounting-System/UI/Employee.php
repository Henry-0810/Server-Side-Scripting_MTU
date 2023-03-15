<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employee</title>
    <script src="formShow.js" async></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<button id="add">Add Employee</button>
<button id="update">Update Employee</button>
<button id="remove">Remove Employee</button>

<form id="addForm" action="addEmployee.php" method="post">
    <p>Add Employees</p>
    <label for="addName">Name:</label>
    <input type="text" id="addName" name="addName" required>
    <br>
    <label for="addJob">Job:</label>
    <input type="text" id="addJob" name="addJob" required>
    <br>
    <label for="addAge">Age:</label>
    <input type="text" id="addAge" name="addAge" required>
    <br>
    <label for="addSalary">Salary:</label>
    <input type="text" id="addSalary" name="addSalary" required>
    <br>
    <button class="back">Back</button>
    <button type="submit" name="addSubmit">Add</button>
</form>

<?php include 'updateEmployee.php';
if (isset($_POST['employeeNo'])) {
    $employeeNo = $_POST['employeeNo'];
    $employeeInfo = getEmployeeInfo($employeeNo);
}
?>
<form id="updForm" action="updateEmployee.php" method="post">
    <p>Update Employees</p>
    <label for="employeeNo">Select employee No</label>
    <select id="employeeNo" name="employeeNo">
        <option disabled="disabled" selected="selected" style="display:none; value="">Choose an Employee Number</option>
        <?php getEmployeeNo(); ?>
    </select>
    <div id="updEmployeeContents" style="display: none">
        <?php if(isset($employeeInfo)){ ?>
        <label for="updJob">Job:</label>
        <input type="text" id="updJob" name="updJob" value = "<?php echo $employeeInfo['Job']; ?>" required>
        <br>
        <label for="updAge">Age:</label>
        <input type="text" id="updAge" name="updAge" value = "<?php echo $employeeInfo['Age']; ?>" required>
        <br>
        <label for="updSalary">Salary:</label>
        <input type="text" id="updSalary" name="updSalary" value = "<?php echo $employeeInfo['Salary']; ?>" required>
        <br>
        <button class="back">Back</button>
        <button type="submit" name="updSubmit">Update</button>
        <?php } ?>
    </div>
</form>
</body>
</html>