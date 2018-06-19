<?php 
    $host = "localhost";
    $db = "juego";
    $user="root";
    $pass = "";
    $puerto="3306";
    try{
        $bd = new PDO( "mysql:host=".$host.";dbname=".$db.";port=".$puerto . ";charset=UTF8", $user, $pass);
        $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        echo "<br>Error: ".$e->getMessage()."<br>";
    }
?>