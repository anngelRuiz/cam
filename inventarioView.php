<title>Inventario</title>
<?php include ("./head.php"); ?>

    <link rel="stylesheet" href="./css/estilos-side.css">
    <link rel="stylesheet" href="./css/estilos-inventario.css">

  </head>

  <body>
    <?php
      include ("./conexion.php");
      include ("./loader-screen.php");        
      include ("./navbar.php");
      
      $id_alumno = $_REQUEST['id'];
    ?>

      <div class="btn-home">
          <a href="./menuAlumno.php?id=<?php echo $id_alumno;?>">
            <img src="./img-detalles/boton-home.png" alt="">
          </a>
      </div>

    <div class="contInventario">

      <div class="contObjetos">

        <?php
          $respuesta= $mysqli->query("SELECT ID_OBJETO, OBJETO, cantidad, IMAGEN FROM objetos WHERE ID_ALUMNO='$id_alumno' AND cantidad<>0; ") or die ($mysqli->error);
          while($fila=mysqli_fetch_array($respuesta)){
        ?>


        <div class="item">
          <div class="item-img">
            <?php $extension=explode('../',"$fila[IMAGEN]");
                  $ext = end($extension); ?>
            <img src="<?php echo "$ext"; ?>" alt="">
          </div><!--img -->
          <div class="item-name">
            <h5><?php echo "$fila[OBJETO]"; ?></h5>
          </div>
          <div class="item-count">
              <h5>x<?php echo "$fila[cantidad]"; ?></h5>
          </div>
        </div><!--  Item   -->
        <?php  } ?>

      </div>

    </div>
    <script src="./js/jquery-3.2.1.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script>
 
        window.addEventListener("load", function(){
            setTimeout(timedOut, 1000 );
        });
    
        function timedOut() {
            var load_screen = document.getElementById("load_screen");
            $('#load_screen').fadeOut();
        }
    
    </script>   
  </body>

</html>
