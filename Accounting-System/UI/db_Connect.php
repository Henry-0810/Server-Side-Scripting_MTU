<?php
function db_connect(){
    try{
        $pdo = new PDO('mysql:host=localhost;dbname=accountingsys; charset=utf8', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
    catch(PDOException $e){
        errorMsg($e);
    }
}

function errorMsg($e): void
{
    echo 'Database error: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine();
}



