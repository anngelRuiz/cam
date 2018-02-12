<?php
  session_start();
  if(isset($_SESSION['miSesion'])){
    $arreglo = $_SESSION['miSesion'];

  }else {
    header("Location: ./index.php");
  }
?>

<title>Alumnos Calificaciones</title>
<?php include ("head.php"); ?>

    <link rel="stylesheet" href="./css/estilos-side.css">
    <link rel="stylesheet" href="./css/styles-grades.css">
    <link rel="stylesheet" href="./css/styles-alumnos.css">

  </head>

  <body>
        <?php 
        include ("./adminSide.php"); 
        include ("./loader-screen.php");
        ?>


    <?php include("./conexion.php"); ?>
    <div class="col-lg-10 col-lg-offset-1 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
      <h5 id="caption-intro"><small>Calificaciones de los</small> Alumnos</h5>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="container-chart col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12">

                    <div class="chart-title">
                        <h5>Puntuación de los Alumnos</h5>  
                    </div>

                    <div class="chart-container" id="grafica-grades">
                        <canvas id="chartGrades"></canvas>
                    </div><!-- chart-container -->
                
            </div> <!-- container-chart -->
        </div> <!-- col-lg-12 -->
    </div> <!-- row -->
    <br>
    <div class="row">  
        <div class="col-lg-12">
        <div class="container-table">
                <table class="table table-bordered">
                    <table class="table">
                        <thead id="theadDatos">
                            <tr>
                                <th><i class="fa fa-calendar" aria-hidden="true"> Fecha</th>
                                <th><i class="fa fa-child" aria-hidden="true"></i> Alumno</th>                
                                <th><i class="fa fa-times-circle" aria-hidden="true"></i> Errores</th>
                                <th><i class="fa fa-cubes" aria-hidden="true"></i> Objeto</th>
                                <th><i class="fa fa-usd" aria-hidden="true"></i> Precio</th>
                                <th><i class="fa fa-star" aria-hidden="true"></i> Puntos</th>
                            </tr>
                        </thead>
                    </table>
                    <div class="wrapper" id="wrapper">
                            <table class="table table-bordered">
                                <tbody>
                                    <?php
                                        $respuesta= $mysqli->query("SELECT * FROM calificaciones ORDER BY ID_CALIFICACION DESC;") or die ($mysqli->error);
                                        while($fila=mysqli_fetch_array($respuesta)){
                                    ?>

                                    <tr>
                                        <td><?php echo "$fila[FECHA]"; ?></td>
                                        <td><?php echo "$fila[NOMBRE]"; ?></td>
                                        <td><?php echo "$fila[errores]"; ?></td>
                                        <td><?php echo "$fila[OBJETO]"; ?></td> 
                                        <td>$<?php echo "$fila[PRECIO]"; ?></td>                   
                                        <td><?php echo "$fila[PUNTOS]"; ?>pt</td>                                                                                                        
                                    </tr>

                                    <?php }?>

                                </tbody>
                            </table>
                    </div><!--  wrapper -->                                
                </table>

            </div> <!-- container-table -->
        </div><!-- col-lg-12 -->
    </div> <!-- row -->
    <script src="./js/jquery-3.2.1.min.js"></script>
    
    <script type="text/javascript" src="./js/ajax-libs-Chart-js-2-6-0.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script>
 
        window.addEventListener("load", function(){
            setTimeout(timedOut, 300 );
        });
    
        function timedOut() {
            var load_screen = document.getElementById("load_screen");
            $('#load_screen').fadeOut();
        }
    
    </script> 
                        
    <script src="./js/code-Chart-Dough.js"></script>
    
  </body>

</html>
