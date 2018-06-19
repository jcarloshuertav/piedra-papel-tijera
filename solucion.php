<?php
    include("conexion.php");
    /*
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    */

    $jugador1=$_POST["jugador1"];
    $jugador2=$_POST["jugador2"];
    $j1=0;
    $j2=0;

    if($jugador1=="piedra" && $jugador2=="tijera" || $jugador1=="papel" && $jugador2=="piedra" || $jugador1=="tijera" && $jugador2=="papel"){
        $jugador1=$j1+1;
        $jugador2=$j2;
        //echo "Gana J1 - ".$jugador1." - ".$jugador2;
        
        $consulta=" INSERT INTO resultados (jugador_a,jugador_b,ganador) VALUES ('".$jugador1."','".$jugador2."','Jugador 1')";
        $query=$bd->prepare($consulta);
        $query->execute();

    }else if($jugador1=="piedra" && $jugador2=="papel" || $jugador1=="papel" && $jugador2=="tijera" || $jugador1=="tijera" && $jugador2=="piedra"){
        $jugador1=$j1;
        $jugador2=$j2+1;
        //echo "Gana J2 - ".$jugador1." - ".$jugador2;

        $consulta=" INSERT INTO resultados (jugador_a,jugador_b,ganador) VALUES ('".$jugador1."','".$jugador2."','Jugador 2')";
        $query=$bd->prepare($consulta);
        $query->execute();
    }else{
        $jugador1=$j1;
        $jugador2=$j2;
        //echo "Empate";

        $consulta=" INSERT INTO resultados (jugador_a,jugador_b,ganador) VALUES ('".$jugador1."','".$jugador2."','Empate')";
        $query=$bd->prepare($consulta);
        $query->execute();
    }

    header("Location:game.php")
?>