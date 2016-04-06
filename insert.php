<?php
    //hent input
    $navn=$_REQUEST["navn"];
    $email=$_REQUEST["email"];
    $slogan=$_REQUEST["slogan"];

    //forbindelse til database
    $forbindelse = mysqli_connect("helf-kea.dk.mysql","helf_kea_dk","helf_kea_dk","helf_kea_dk");
    if($forbindelse->connect_error){
        die("Ingen databaseforbindelse ".$forbindelse->connect_error);
    }
    
    //indsæt nyt slogan - også hvis tidligere bidrag
    $sql = "INSERT INTO slogan(navn, email, slogan, likes) values('$navn','$email','$slogan',0)";  
    $result = $forbindelse->query($sql);
    if(!$result){
        die("Sql-søgning gik galt: ". $forbindelse->error);
    } 

    //hop tilbage til slogans.php
    header('Location: slogans.php');
?>
