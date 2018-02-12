<title>Juego</title>
<?php include ("../headOut.php"); ?>

    <link rel="stylesheet" href="../css/estilos-side.css">
    <link rel="stylesheet" href="../css/styles-game.css">
    

    </head>
<body>
    <?php 
        include ("../loader-screen.php");             
        include ("../navbarP.php"); 

        include("../conexion.php");
        $id_objeto = $_REQUEST['idobjeto'];
        $id_boy= $_REQUEST['idboy'];

        // $id_objeto = 18;
        // $id_boy= 6;

        $resp= $mysqli->query("SELECT * FROM objetos WHERE ID_OBJETO='$id_objeto'; ") or die ($mysqli->error);
        $fila=mysqli_fetch_array($resp);

    ?>
<div class="all">
    <div class="btn-home">
        <a href="./juego.php?id=<?php echo $id_boy; ?>">
            <img src="../img-detalles/boton-home.png" alt="">
        </a>
    </div>
    <div class="col-lg-2 col-lg-offset-2">
    <div class="containter-super">
        <div class="container-change">
                <div class="moneda" id="moneda10">
                    <img src="../img-monedas/moneda10.png" alt="">
                </div>

                <div class="moneda" id="moneda5">
                    <img src="../img-monedas/5pesos.png" alt="">
                </div>

                <div class="moneda" id="moneda2">
                    <img src="../img-monedas/dospesos.png" alt="">
                </div>

                <div class="moneda" id="moneda1">
                    <img src="../img-monedas/unpesss.png" alt="">
                </div>

                <div class="moneda" id="monedacinc">
                    <img src="../img-monedas/monedacin.png" alt="">
                </div>     
        </div><!-- ./ container-chang -->

        <div class="container-data">
            <div class="weather-card">
                <div class="weather-card-landmark">
                    <div class="box-img">
                        <img src="<?php echo $fila['IMAGEN']; ?>" alt="">                    
                    </div>
                </div>
                <div class="weather-card-city-name">
                    <h1><?php echo $fila['OBJETO']; ?></h1>
                </div>

                <div class="weather-card-details">
                    <span class="details-day">Precio: <small>$<?php echo $fila['PRECIO']; ?></small></span>
                </div>

                <div class="opcionComprar">
                    <a href="#"><button id="btnCalcular" type="button" name="button" onClick="Calcular(<?php echo $fila['PRECIO'];?>,<?php  echo "$id_objeto"; ?>,<?php echo "$id_boy";?>)">Comprar</button></a>
                </div>


                <div class="opcionesPago">
                    <ul>
                        <li class="outer-pos price"><button id="opcion1" onClick="Respuesta(this.value)"></button></li>
                        <li class="mid-pos price"><button id="opcion2" onClick="Respuesta(this.value)"></button></li>
                        <li class="current-pos price"><button id="opcion3" onClick="Respuesta(this.value)"></button></li>
                        <li class="mid-pos price"><button id="opcion4" onClick="Respuesta(this.value)"></button></li>
                        <!-- <li class="outer-pos price"><button id="opcion5" onClick="Respuesta(this.value)">250</button></li> -->
                    </ul>
                </div>

                <div class="box-captions">
                    <h5></h5>
                </div>

            </div><!-- ./ weather-card -->
        </div><!-- ./ container-data -->

        <div class="container-change bills">
            <div class="moneda bill" id="billetes500">
                <img src="../img-monedas/billquinienton.png" alt="">
              </div>

              <div class="moneda bill" id="billetes200">
                <img src="../img-monedas/bills200.png" alt="">
              </div>

              <div class="moneda bill" id="billetes100">
                <img src="../img-monedas/billete100.png" alt="">
              </div>

              <div class="moneda bill" id="billetes50">
                <img src="../img-monedas/billete50.png" alt="">
              </div>

              <div class="moneda bill" id="billetes20">
                <img src="../img-monedas/billete20.png" alt="">
              </div>    
        </div><!-- ./ container-chang -->
        
    </div> <!-- ./ super-->
    </div>
    


    

    <div class="col-lg-3 col-lg-offset-3">
        <div class="dineroTotal">
            <h5 id="dineroTotal" class="labelTotal">$0</h5>
        </div>


        <div class="box-wrapp">
            <div class="box-btn-erase" id="btn-erase">
                <img src="../img-detalles/eraser.svg" alt="">
            </div>
        </div>
        <div class="box-put" id="pagoPos">
            
            <!-- Some money here -->
        </div><!-- box-put  -->
    </div>

</div><!-- All -->

    <!-- HTML FireWorks -->
    <canvas id="canvas">
    </canvas>
    <!-- <div class="opaco"> -->
      <div class="mensajeFelicidaes" id="mensajeFelicidaes">
        <div class="imgFelicidades" id="imgFelicidades">
          <img src="../img-detalles/trophy.svg" alt="" id="imgCaption">
        </div>
        <div class="captionFelicidades">
          <h5>¡ Felicidades !  <br> ¡¡ Has comprado un objeto !!</h5>
        </div>
      </div>

      <div class="containerItem" id="containerItem">
        <div class="imgConseguido">
          <img src="<?php echo $fila['IMAGEN']; ?>" alt="">
          <h5><?php echo $fila['OBJETO']; ?></h5>
        </div>
      </div>

      <div class="contSalida" id="contSalida">
        <a href="./juego.php?id=<?php echo "$id_boy"; ?>">
          <div class="btnSalidaJuego">
              <h5><i class="fa fa-home" aria-hidden="true"></i> Tienda</h5>
          </div>
        </a>

        <a href="../inventarioView.php?id=<?php echo "$id_boy"; ?>">
          <div class="btnSalidaJuego">
              <h5><i class="fa fa-trophy" aria-hidden="true"></i> Inventario</h5>
          </div>
        </a>
      </div>

    <!-- ./ HTML FireWoks -->



<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery-3.2.1.min.js"></script>
<script>
    $( document ).ready(function() {
      setTimeout( "$('.contMensajes').fadeOut('slow');", 5000);

    });
</script>
<script type="text/javascript" src="../js/codigoJuegoObj.js"></script>
</body>
</html>