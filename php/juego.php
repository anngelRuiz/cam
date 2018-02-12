<title>Objetos</title>
<?php include ("../headOut.php"); ?>

    <link rel="stylesheet" href="../css/estilos-side.css">
    <!-- <link rel="stylesheet" href="../css/estilos-alumnos.css"> -->
    <!-- <link rel="stylesheet" href="../css/estilos-juego.css"> -->
    <link rel="stylesheet" href="../css/style-items-menu.css">
    

  </head>

  <body>
    <?php 
        include ("../loader-screen.php"); 
        include ("../navbarP.php"); 

        include("../conexion.php");
        $id_alumno = $_REQUEST['id'];
    ?>
    <div class="btn-home">
        <a href="../menuAlumno.php?id=<?php echo $id_alumno;?>">
          <img src="../img-detalles/boton-home.png" alt="">
        </a>
    </div>
    

    <div class="container">
      <div class="row">
        <?php
              $resp= $mysqli->query("SELECT * FROM alumno WHERE ID_ALUMNO='$id_alumno'; ") or die ($mysqli->error);
              $fi=mysqli_fetch_array($resp);
        ?>

        <div class="container-items">
            <?php
              $id_alumno = $_REQUEST['id'];
              $respuesta= $mysqli->query("SELECT * FROM objetos WHERE ID_ALUMNO='$id_alumno'; ") or die ($mysqli->error);
              while($fila=mysqli_fetch_array($respuesta)){
            ?>
            <div class="objeto">
                <a href="./juegoObjeto.php?idobjeto=<?php echo"$fila[ID_OBJETO]";?>&amp;idboy=<?php echo"$fi[ID_ALUMNO]";?>"><img src="<?php echo "$fila[IMAGEN]"; ?>" alt=""></a>
                <div class="item-price">
                  <a href="#"><img src="../img-detalles/ticket.png" alt=""></a>
                  <h5>$ <?php echo "$fila[PRECIO]"; ?></h5>
                </div>
            </div>  <!-- ./objeto -->
            <?php } ?>
        
        </div><!-- ./ container-items -->

    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script>
 
        window.addEventListener("load", function(){
            setTimeout(timedOut, 400 );
        });
    
        function timedOut() {
            var load_screen = document.getElementById("load_screen");
            $('#load_screen').fadeOut();
        }
    
    </script>	

  </body>

</html>
