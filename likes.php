<?php
    // hent variablen likenr - id-nummer på det slogan, som er blevet liket
    $likenr=$_REQUEST["likenr"];

    //forbindelse til databasen
    $forbindelse = mysqli_connect("helf-kea.dk.mysql","helf_kea_dk","helf_kea_dk","helf_kea_dk");
    if($forbindelse->connect_error){
        die("Ingen databaseforbindelse ".$forbindelse->connect_error);
    }

    //Opdater posten, så likes tælles op
    $sql = "UPDATE slogan SET likes=likes+1 WHERE id='$likenr'";

    $result = $forbindelse->query($sql);
    if(!$result){
        die("Sql-søgning gik galt: ". $forbindelse->error);
    }
    //luk til sidst forbindelsen
    $forbindelse->close();
header('Location: slogans.php');

?>