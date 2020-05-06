<?php

include 'connection.php';

    try
    {
        $dbh = new PDO($dsn, $user, $pass);
    
        $vendor = $_REQUEST["vendor"];
       
        $auto_by_vendors = "SELECT cars.Name 
                            FROM cars, vendors 
                            WHERE FID_Vendors=ID_Vendors 
                            AND vendors.Name='". $vendor ."'";
    
        foreach ($dbh->query($auto_by_vendors) as $row) {
            echo '<tr><td>' . $row['Name'] . '</tr></td>';
        }
    }
    catch(PDOException $e){
        echo "Error!" .$e->getMessage()."<br/>"; die();
    }
?>