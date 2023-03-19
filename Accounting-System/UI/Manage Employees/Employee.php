<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employee</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="../style.css">
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

<?php include 'updateEmployee.php'; ?>
<form id="updForm" action="updateEmployee.php" method="post">
    <p>Update Employees</p>
    <label for="employeeNo">Select employee No</label>
    <select id="employeeNo" name="employeeNo">
        <option disabled="disabled" selected="selected" style="display:none;" value="">Choose an Employee Number</option>
        <?php getEmployeeNo(); ?>
    </select>
    <div id="updEmployeeContents" style="display: none">
    </div>
</form>

<form id="rmvForm" action="removeEmployee.php" method="post">
    <p>Remove Employee</p>
    <table>
        <tr><th>Employee No</th><th>Employee Name</th><th>Job</th><th>Age</th><th>Salary</th><th>Choose</th></tr>
    </table>
    <button class="back">Back</button>
</form>
<script src="../formShow.js"></script>
</body>
</html>