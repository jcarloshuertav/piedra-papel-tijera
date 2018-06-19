<?php
    include("conexion.php");
    $consulta="DELETE FROM resultados";
    $query=$bd->prepare($consulta);
    $query->execute();

    header("Location:game.php")
?>