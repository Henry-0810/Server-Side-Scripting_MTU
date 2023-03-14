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

<form id="addForm" action="SQL_Queries.php" method="post">
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

<form id="updForm" action="SQL_Queries.php" method="post">
    <p>Update Employees</p>
    <label for="employeeNo">Select employee No</label>
    <select id="employeeNo" name="employeeNo">
        <?php include 'FuncCalling.php'; ?>
    </select>
    <div id="updEmployeeContents" style="display: none">
        <label for="updJob">Job:</label>
        <input type="text" id="updJob" name="updJob" required>
        <br>
        <label for="updAge">Age:</label>
        <input type="text" id="updAge" name="updAge" required>
        <br>
        <label for="updSalary">Salary:</label>
        <input type="text" id="updSalary" name="updSalary" required>
        <br>
        <button class="back">Back</button>
        <button type="submit" name="updSubmit">Update</button>
    </div>
</form>
</body>
</html>