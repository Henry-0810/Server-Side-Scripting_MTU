<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employee</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<?php require_once 'showLedgerDetails.php';?>
<form>
    <input class="searchBar" type="text" id="userInput" placeholder="Search for desired keyword...">
    <br>
    <table>
        <tr><th>Ledger ID</th><th>Name</th><th>Created On</th><th>Department ID</th><th>Amount</th><th>Transaction Type</th></tr>
        <?php showLedgerTable();?>
    </table>
</form>

<button id="addLedger" class="ledgerBtn">Add Ledger</button>

<form id="addLedgerForm" action="addLedger.php" method="post" class="ledgerForm">
    <p>Add Ledger</p>
    <label for="addLedgerName">Department Name:</label>
    <input type="text" id="addLedgerName" name="addLedgerName" required><br>
    <label for="ledgerDate">Created On:</label>
    <input type="date" id="ledgerDate" name="createdOn" required><br>
    <label for="deptNo">Select department no</label>
    <select id="deptNo" name="deptNo">
        <option disabled="disabled" selected="selected" style="display:none;" value="">Choose a Department Number</option>
        <?php getDeptDetails(); ?>
    </select><br>
    <label for="amount">Department Balance:</label>
    <input type="text" id="amount" name="amount" value="0.00">
    <label for="debit">Debit</label>
    <input type="radio" id="debit" name="debtCredOption" value="D">
    <label for="credit">Credit</label>
    <input type="radio" id="credit" name="debtCredOption" value="C">
    <input type='button' class='ledgerBack' value='Back'>
    <button type="submit" name="addLedgerSubmit">Add</button>
</form>

<script src="../formShow.js"></script>
</body>
</html>