<?php
   $forbindelse = mysqli_connect("x","x","x","x");
    if($forbindelse->connect_error){
        die("Ingen databaseforbindelse ".$forbindelse->connect_error);
    }
    $sql = "CREATE TABLE slogan (
        id INT(3) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        navn VARCHAR(30),
        email VARCHAR(30),
        slogan VARCHAR(100),
        likes INT(4
    ))";
 //$sql="drop table slogan";

    $result = $forbindelse->query($sql);
    if(!$result){
        die("Sql-søgning gik galt: ". $forbindelse->error);
    }

    $forbindelse->close(); 

?>
