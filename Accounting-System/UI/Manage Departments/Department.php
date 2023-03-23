<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employee</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<button id="addDept" class="deptBtn">Add Department</button>
<button id="updateDept" class="deptBtn">Update Department</button>

<form id="addDeptForm" action="addDepartment.php" method="post" class="deptForm">
    <p>Add Department</p>
    <label for="addDeptName">Department Name:</label>
    <input type="text" id="addDeptName" name="addDeptName" required>
    <label for="addDeptDesc">Description:</label>
    <input type="text" id="addDeptDesc" name="addDeptDesc" required>
    <label for="addDeptBal">Department Balance:</label>
    <input type="text" id="addDeptBal" name="addDeptBal" value="0.00">
    <input type='button' class='deptBack' value='Back'>
    <button type="submit" name="addSubmit">Add</button>
</form>

<form id="updDeptForm" action="updateDepartment.php" method="post" class="deptForm">
    <p>Update Department details</p>
</form>
<script src="../formShow.js"></script>
</body>
</html>

