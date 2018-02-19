<title>Compra</title>
<?php include ("../headOut.php"); ?>

    <link rel="stylesheet" href="../css/estilos-side.css">
    <link rel="stylesheet" href="../css/estilos-alumnos.css">
    <link rel="stylesheet" href="../css/estilos-juego.css">

  </head>

  <body>
    <?php 
        include ("../loader-screen.php");             
        include ("../navbarP.php"); 
    ?>

    <div class="contenedorJuego">
      <div class="arriba">
        <div class="sideOpciones">
          <?php
            include("../conexion.php");
            $id_objeto = $_REQUEST['idobjeto'];
            $id_boy= $_REQUEST['idboy'];

            $resp= $mysqli->query("SELECT * FROM objetos WHERE ID_OBJETO='$id_objeto'; ") or die ($mysqli->error);
            $fila=mysqli_fetch_array($resp);

          ?>

          <div class="opcione">
            <a href="./juego.php?id=<?php echo $id_boy; ?>"><img src="../img-detalles/boton-home.png" alt=""></a>
          </div>

          <div class="contenedorBilletes ">
            <div class="mitadBilletes monedas">
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

            </div>

            <div class="mitadBilletes">

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

            </div>
          </div>
        </div>

        <div class="contenedorObjeto">

          <div class="contenedorObtj ">
            <div class="imgObjeto">
                <img src="<?php echo $fila['IMAGEN']; ?>" alt="">
            </div>

          </div>
          <div class="detalles">
            <div class="detallesIconos">
              <img src="../img-detalles/moneyIcon.svg" alt="">

            </div>
            <div class="detallesObjeto">
              <h5><?php echo $fila['OBJETO']; ?></h5>
              <h5>$<?php echo $fila['PRECIO']; ?></h5>


            </div>
          </div>



          <div class="opcionesPago">
            <div class="opcioneAle">
              <a href="#"><button type="button" name="button" id="opcion1" onClick="Respuesta(this.value)"></button></a>
            </div>

            <div class="opcioneAle">
              <a href="#"><button type="button" name="button" id="opcion2" onClick="Respuesta(this.value)"></button></a>
            </div>

            <div class="opcioneAle">
              <a href="#"><button type="button" name="button" id="opcion3" onClick="Respuesta(this.value)"></button></a>
            </div>

            <div class="opcioneAle">
              <a href="#"><button type="button" name="button" id="opcion4" onClick="Respuesta(this.value)"></button></a>
            </div>

          </div> <!--  Opciones aleatorias-->

          <div class="opcionComprar">

            <a href="#"><button id="btnCalcular" type="button" name="button" onClick="Calcular(<?php echo $fila['PRECIO'];?>,<?php  echo "$id_objeto"; ?>,<?php echo "$id_boy";?>)">Comprar</button></a>


          </div>

        </div><!--  contenedorObjeto-->

        <div class="contenedorPago" id="contenedorPago">

        <div class="box-btn-erase" id="btn-erase">
          <img src="../img-detalles/eraser.svg" alt="">
        </div>
          <div class="pagoPos" id="pagoPos">

          </div><!--  pagoPos-->
          
          <div class="dineroTotal">
              <h5 id="dineroTotal" class="labelTotal">$0</h5>
            </div>

          <div class="contMensajes" id="contMensajes">
            <div class="captions">
              <div class="imgContentCaption" id="imgContentCaption">
                <img src="../img-detalles/girl.svg" alt="" id="imgCaption">

              </div>
                <div class="captionColoca" id="contMensajesId">
                    <p>Coloca el dinero con el que pagaras.</p>
                </div>
            </div>

          </div>


        </div><!--  contenedorPago-->


      </div>

    </div>
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

      <div class="alert" id="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
      </div>

    <!-- </div> -->

    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script>

    $( document ).ready(function() {
      setTimeout( "$('.contMensajes').fadeOut('slow');", 5000);

    });
    </script>

    <script type="text/javascript" src="../js/codigoJuego.js"></script>
  </body>

</html>
