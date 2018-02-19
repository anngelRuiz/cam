<title>CAM #8</title>
<?php include ("head.php"); ?>

    <link rel="stylesheet" href="./css/estilos-side.css">
    <link rel="stylesheet" href="./css/index-alumnos.css">

  </head>

  <body>
    <?php 
        include ("./navbar.php");
        include ("./loader-screen.php"); 
    ?>    
    
    <br>
    <div class="col-lg-4 col-lg-offset-3">
      <div class="lista-box">
          <h5>Lista de <small>Alumnos</small></h5>
      </div>
    </div>

    <div class="container">
            <?php
                include("./conexion.php");
                $respuesta= $mysqli->query("SELECT * FROM alumno ORDER BY ID_ALUMNO ASC") or die ($mysqli->error);
                while($fila=mysqli_fetch_array($respuesta)){
            ?>
            <div class="card">
                    <div class="top-section">
                            <div class="facebook">
                                    <a href="#" class="fa fa-user-circle"></a>
                            </div>
                    </div>
                    <div class="avatar">
                            <?php $extension=explode('../',"$fila[FOTO]");
                            $ext = end($extension); ?>
                            <img src="<?php echo "$ext"; ?>" alt="">
                    </div>
                    <div class="bottom-section">               
                        <h5> <?php echo "$fila[NOMBRE]"; ?> <?php echo "$fila[APELLIDO_P]"; ?></h5>

                        <div class="social-media">
                            <a class="links" href="./menuAlumno.php?id=<?php echo "$fila[ID_ALUMNO]"; ?>">
                                <button type="button" class="btn btn-large btn-block btn-info">Jugar</button>
                            </a>
                          </div>
                        
                    </div>

            </div><!-- ./ Card -->  
            <?php } ?>      
    </div><!-- ./ Container -->

    <script src="./js/jquery-3.2.1.min.js"></script>    
    <script src="./js/bootstrap.min.js"></script>
    <script>
 
        window.addEventListener("load", function(){
            setTimeout(timedOut, 500 );
        });
    
        function timedOut() {
            var load_screen = document.getElementById("load_screen");
            $('#load_screen').fadeOut();
        }
    
    </script>  
    	
  </body>

</html>
