<?php

include 'connection.php';

try
{
    $dbh = new PDO($dsn, $user, $pass);
    $vendors_name = "SELECT Name 
                    FROM `vendors`";
                    
    $outputVendors[] = array();
    unset($outputVendors[0]);

    foreach ($dbh->query($vendors_name) as $row) {
        $outputVendors[] .= $row['Name'];
    }
} 
catch(PDOException $e){
    echo "Error!" .$e->getMessage()."<br/>"; die();
}
?>
