<?php
header('Content-Type: application/json');
header ("Cache-Control: no-cache, must-revalidate");

include 'connection.php';

try
{ 
    $dbh = new PDO($dsn, $user, $pass);
}
catch(PDOException $e){
    echo "Error!" .$e->getMessage()."<br/>"; die();
}

$value = $_GET["selected_date"];

$free_auto = "SELECT DISTINCT cars.Name FROM cars, rent 
                WHERE ID_Cars = FID_Car 
                AND Date_start >= :tvalue OR Date_end <= :tvalue";


$sth = $dbh->prepare($free_auto);
$sth->execute(array(':tvalue' => $_GET['selected_date']));


$result = $sth->fetchAll(PDO::FETCH_OBJ);
echo(json_encode($result));
?>