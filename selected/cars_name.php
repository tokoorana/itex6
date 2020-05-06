<?php

include 'connection.php';

try
{ 
    $dbh = new PDO($dsn, $user, $pass);
    $cars_name = "SELECT Name 
                 FROM cars";
    $output_cars[] = array();
    unset($output_cars[0]);

    foreach ($dbh->query($cars_name) as $row) {
        $output_cars[] .= $row['Name'];
    }
}
catch(PDOException $e){
    echo "Error!" .$e->getMessage()."<br/>"; die();
}
?>
