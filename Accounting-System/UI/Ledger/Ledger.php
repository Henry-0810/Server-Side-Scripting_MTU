<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employee</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<?php include 'showLedgerDetails.php'?>
<form>
    <input type="text" id="userInput" placeholder="Search for desired keyword...">
    <br>
    <table>
        <tr><th>Ledger ID</th><th>Name</th><th>Created On</th><th>Department ID</th><th>Amount</th><th>Transaction Type</th></tr>
        <?php showLedgerTable();?>
    </table>
</form>


<script src="../formShow.js"></script>
</body>
</html>