<?php
  header ('Content-Type: text/xml');
  header ("Cache-Control: no-cache, must-revalidate");


  include 'connection.php';

try
{
    $dbh = new PDO($dsn, $user, $pass);

    $rent = $_GET["date"];
    
    $rent_by_date = "SELECT rent.Cost 
                     FROM rent 
                     WHERE Date_start < '". $rent ."'";

  
    echo '<?xml version="1.0" encoding = "utf-8" ?>';
    echo "<root>";

    $count = 0;
    foreach ($dbh->query($rent_by_date) as $row) {
        $count += $row['Cost'];
    }
    print "<row><Cost>$count</Cost></row>";

    echo "</root>";
}
catch(PDOException $e){
    echo "Error!" .$e->getMessage()."<br/>"; die();
}
?>