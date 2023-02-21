<?php
try{
    $pdo = new PDO('mysql:host=localhost;dbname=videos;charset=utf8','root','');
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    echo $pdo->getAttribute(PDO::ATTR_CONNECTION_STATUS).'<br>';
    echo $pdo->getAttribute(PDO::ATTR_SERVER_INFO);

    $sql = 'SELECT name FROM customer where name = :cname';
    $result = $pdo->prepare($sql);
    $result->bindValue(':cname', $_POST['custname']);
    $result->execute();

    while($row = $result->fetch()){
        echo $row['name'].'<br>';
    }
}
catch(PDOException $e){
    $output = 'Unable to connect to database server. '.$e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine();
    echo $output;
}