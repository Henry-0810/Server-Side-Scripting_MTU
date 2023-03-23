<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employee</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>
<body>
<button id="addDept" class="deptBtn">Add Department</button>
<button id="updateDept" class="deptBtn">Update Department</button>

<form id="addDeptForm" action="addDepartment.php" method="post" class="deptForm">
    <p>Add Department</p>
    <label for="addName">Name:</label>
    <input type="text" id="addName" name="addDeptName" required>
    <br>
    <input type='button' class='deptBack' value='Back'>
    <button type="submit" name="addSubmit">Add</button>
</form>

