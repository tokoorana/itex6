<?php

$dsn = "mysql:host=localhost; dbname=iteh2lb1var7";
$user = 'root';
$pass = '';

try
{ 
    $dbh = new PDO($dsn, $user, $pass); 
} 
catch(PDOException $e){
    echo "Error!" .$e->getMessage()."<br/>"; die();
}
?>