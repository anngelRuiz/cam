<title>CAM #8</title>
<?php include ("head.php"); ?>

    <link rel="stylesheet" href="./css/estilos-side.css">
    <link rel="stylesheet" href="./css/estilos-alumnos.css">
    <!-- <link rel="stylesheet" href="./css/estilos-menuOpciones.css"> -->
    <link rel="stylesheet" href="./css/menu-alumno.css">

  </head>

  <body>
    <?php 
        include ("./navbar.php");
        include ("./loader-screen.php"); 
    ?>  
  
      <div class="col-md-8 col-lg-offset-2 col-xs-12 teacher-img">
          <br>
          <?php include("./conexion.php");
  
          $id_alumno = $_REQUEST['id'];
          $respu= $mysqli->query("SELECT * FROM alumno WHERE ID_ALUMNO='$id_alumno';") or die ($mysqli->error);
          $fi=mysqli_fetch_array($respu);

          $extension=explode('../',"$fi[FOTO]");
          $ext = end($extension);
          ?>
          <h5>Hola <small><?php echo "$fi[NOMBRE]";  ?>&nbsp;<?php echo "$fi[APELLIDO_P]"; ?></small></h5><img src="<?php echo "$ext"; ?>" alt="" id="imgProfe">
  
      </div>
  
      <div class="col-lg-8 col-lg-offset-2 col-md-12">
  
        <div class="col-lg-6 col-md-12 col-xs-12">
          <div class="opciones">
              <a href="./acomodar.php"><img src="./img-detalles/money.png" alt=""></a>
              <h5>Acomodar</h5>
          </div>
        </div>
  
        <div class="col-lg-6 col-md-12 col-xs-12">
          <div class="opciones">
              <a href="./php/insert-init.php?id=<?php echo "$fi[ID_ALUMNO]"; ?>"><img src="./img-detalles/gamepad1.svg" alt=""></a>
              <h5>Jugar</h5>
          </div>
        </div>
      </div>
  
      <div class="col-lg-12">
        <div class="container-btn">
          <a href="./inventarioView.php?id=<?php echo "$fi[ID_ALUMNO]"; ?>" id="btnInventario">
            <div class="btnInventario" >
                <h5><i class="fa fa-trophy" aria-hidden="true"></i> Inventario</h5>
            </div>
          </a>
        </div>
      </div>

    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/jquery-3.2.1.min.js"></script>
    <script>
 
        window.addEventListener("load", function(){
            setTimeout(timedOut, 100 );
        });
    
        function timedOut() {
            var load_screen = document.getElementById("load_screen");
            $('#load_screen').fadeOut();
        }
    
    </script>  
    <script src="./js/codigoIDs.js"></script>
  </body>

</html>
