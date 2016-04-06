<?php
    //forbindelse
    $forbindelse = mysqli_connect("x","x","x","x");
    if($forbindelse->connect_error){
        die("Ingen databaseforbindelse ".$forbindelse->connect_error);
    }
    
    //finde alle - i rækkefølge efter likes
    $sql = "SELECT * from slogan ORDER BY likes DESC";
    $result = $forbindelse->query($sql);
    if(!$result){
        die("Sql-søgning gik galt: ". $forbindelse->error);
    }

    //skriv liste over søgeresultat - med like-knapper
    $output="<form action='likes.php'>"; //action når der klikkes på like-knap: likes.php
    while($row=$result->fetch_assoc()){
        $slogan=$row["slogan"];
        $id=$row["id"];
        $likes=$row["likes"];
        $output .= "$slogan <button type='submit' name='likenr' value = '$id'>
                            Like </button> ( $likes )<br><br>";
    }
    $output.="</form>";

    //luk forbindelse
    $forbindelse->close();

    if($output=="<form action='likes.php'></form>"){
        $output= "Vær den første til at foreslå et slogan til kampagnen!";
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Slogan-konkurrence</title>
    </head>
    <body>
        <h1>Slogankonkurrence: foreslå et slogan</h1>
        <form action="insert.php"> <!--sender data til insert.php-->
            <input type="text" name="navn" placeholder="Dit navn" required><br>
            <input type="email" name="email" placeholder="Din email" required><br>
            <textarea rows="4" cols="50" name="slogan" placeholder="Dit slogan" required></textarea><br>
            <input type="submit" value="Send">
        </form>
        <h1>Indkomne forslag:</h1>
        <?php echo $output; ?>
    </body>
</html>
