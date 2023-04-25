<?php

if (isset($_POST['submitdetails'])) {

    try {

        $pdo = new PDO('mysql:host=localhost;dbname=videos; charset=utf8', 'root', '');

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'SELECT count(*) FROM customer where custid = :cid';

        $result = $pdo->prepare($sql);

        $result->bindValue(':cid', $_POST['cid']);

        $result->execute();

        if($result->fetchColumn() > 0) {

            $sql = 'SELECT * FROM customer where custid = :cid';

            $result = $pdo->prepare($sql);

            $result->bindValue(':cid', $_POST['cid']);

            $result->execute();

            while ($row = $result->fetch()) {

                echo $row['name'] . ' ' . $row['address'] . ' Are you sure you want to delete ??' .

                    '<form action="deletecustomer.php" method="post">

                    <input type="hidden" name="id" value="' . $row['custid'] . '">

                    <input type="submit" value="yes delete" name="delete">

                    </form>';
            }
        }
        else {

            print "No rows matched the query.";

        }}

    catch (PDOException $e) {

        $output = 'Unable to connect to the database server: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine();

    }

}

