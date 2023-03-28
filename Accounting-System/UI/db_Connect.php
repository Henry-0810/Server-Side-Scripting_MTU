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

function validateEmployeeInputs($age,$salary): string
{
    if($age < 18 || $age > 65) {
        return "Age should be between 18 and 65";
    }

    if($salary < 3500) {
        return "Salary should be greater than 3500";
    }

    return "All inputs correct!";
}

function validateName($name): string
{
    if (!preg_match("/^[a-zA-Z\s]+$/", $name)){
        return "Invalid Name";
    }
    return "Input correct";
}
