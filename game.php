<?php
    include("conexion.php");
    $consulta="SELECT * FROM resultados";
    $query=$bd->prepare($consulta);
    $query->execute();
    $resultados=$query->fetchAll();
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Piedra, Papel y Tijeras</title>
    <link rel="stylesheet" href="css/game.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Acme" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <style>
        img{width:20px;}
        .row{margin:0}
    </style>
</head>
<body>
    <section class="row">
        <form class="col-12 form-inline" action="solucion.php" id="formulario" method="post">
            <div class="col-md-4 col-sm-12 morado">
                <!--<img id="opcion" src="img/papel.png"><br>-->
                <select class="seleccion form-control form-control-lg" id="jugador1" name="jugador1">
                    <option value="">Selecciona Jugador 1</option>
                    <option value="piedra" id="piedra">Piedra</option>
                    <option value="papel" id="papel">Papel</option>
                    <option value="tijera" id="tijera">Tijera</option>
                </select>
            </div>
    
            <div class="col-md-4 col-sm-12 gris">
                <div class="centro">
                    <div class="vs">VS</div>
                    <div class="boton" id="boton" onclick="validar()">JUGAR</div>
                </div>
            </div>

            <div class="col-md-4 col-sm-12 azul">
                <select class="seleccion form-control form-control-lg" id="jugador2" name="jugador2">
                    <option value="">Selecciona Jugador 2</option>
                    <option value="piedra" id="piedra">Piedra</option>
                    <option value="papel" id="papel">Papel</option>
                    <option value="tijera" id="tijera">Tijera</option>
                </select>
            </div>
        </form>
    </section>

    <section class="row">
        <div class="col-md-12">
            <table class="table table-striped text-center">
                <tr>
                    <th colspan="3">Ultimos Juegos</td>
                </tr>
                <tr>
                    <th scope="col">Jugador 1</th>
                    <th scope="col">Jugador 2</th>
                    <th scope="col">Ganador</th>
                </tr>

                <?php
                    for($x=0;$x<count($resultados);$x++){
                ?>

                <tr>
                    <td><?php echo $resultados[$x]["jugador_a"]; ?></td>
                    <td><?php echo $resultados[$x]["jugador_b"]; ?></td>
                    <td><?php echo $resultados[$x]["ganador"]; ?></td>
                </tr>
                
                <?php
                    }
                ?>
            </table>

            <button class="borrar btn btn-primary btn-lg btn-block">Borrar puntuaciones</button>
        </div>
    </section>

    <script>
        function validar(){
            var j1=document.getElementById("jugador1").selectedIndex;
            var j2=document.getElementById("jugador2").selectedIndex;

            if(j1=="" && j2==""){
                alert("ERROR: Ambos jugadores no han seleccionado")
                return false;
            }else if(j1==""){
                alert("ERROR: Jugador 1 no ha seleccionado")
                return false;
            }else if(j2==""){
                alert("ERROR: Jugador 2 no ha seleccionado")
                return false;
            }else{
                document.getElementById("formulario").submit();
            }
        }

        $(".borrar").click(function(){
            window.location="eliminar.php"
        });

        $("#piedra").click(function(){
            var ruta=$("img").attr("src","img/piedra.jpg");
            console.log(ruta);
        });
        $("#papel").click(function(){
            $("#opcion").attr("src","img/papel.jpg");
        });
        $("#tijera").click(function(){
            $("#opcion").attr("src","img/tijera.jpg");
        });
    </script>
</body>
</html>