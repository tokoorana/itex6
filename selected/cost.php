<?php

include 'connection.php';

try
{ 
    $dbh = new PDO($dsn, $user, $pass);
    $rent_cost = "SELECT rent.FID_Car 
                 FROM rent";
            
    $output_cost[] = array();
    unset($output_cost[0]);

foreach ($dbh->query($rent_cost) as $row) 
    {
        $output_cost[] .= $row['FID_Car'];
    }
}
catch(PDOException $e){
    echo "Error!" .$e->getMessage()."<br/>"; die();
}
?>
