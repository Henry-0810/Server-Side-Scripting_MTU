<?php



try { 
$pdo = new PDO('mysql:host=localhost;dbname=videos; charset=utf8', 'root', ''); 
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = 'SELECT count(*) FROM customer where custid = :cid';
$result = $pdo->prepare($sql);
$result->bindValue(':cid', $_GET['custid']); 
$result->execute();

if($result->fetchColumn() > 0) 
{
    $sql = 'SELECT * FROM customer where custid = :cid';
    $result = $pdo->prepare($sql);
    $result->bindValue(':cid', $_GET['custid']); 
    $result->execute();
    
while ($row = $result->fetch()) { 
      
      echo $row['name'] . ' ' . $row['address'] . ' Are you sure you want to delete ??' . '<form action="deletecustomer.php" method="post">
            <input type="hidden" name="id" value="'.$row['custid'].'"> 
            <input type="submit" value="yes delete" name="delete">
        </form>';
        
         /* echo $row['name'] . "<form action=\"deletecustomer.php\" method=\"post\">
            <input type=\"text\" name=\"id\" value=\" $num \"> 
            <input type=\"submit\" value=\"delete\" name=\"delete\">
        </form>"; 
      
      
         If you want to keep using single quotes, youll need to use the append operator (a period).
         echo $row['name'] .'<form action="deletecustomer.php" method="post">
            <input type="text" name="id" value="'.$num.'"> 
            <input type="submit" value="delete" name="delete">
        </form>';
        
        NOTE - Dont keep associative array inside double quote while printing otherwise it would not return any value. */
      
    
      
   }
}
else {
      print "No rows matched the query.";
    }} 
catch (PDOException $e) { 
$output = 'Unable to connect to the database server: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine(); 
}



?>