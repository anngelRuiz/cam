<?php
  session_start();
  if(isset($_SESSION['miSesion'])){
    $arreglo = $_SESSION['miSesion'];

  }else {
    header("Location: ./index.php");
  }
?>

<title>Calificaciones</title>
<?php include ("head.php"); ?>

    <link rel="stylesheet" href="./css/estilos-side.css">
    <link rel="stylesheet" href="./css/styles-alumnos.css">
    <link rel="stylesheet" href="./css/estilos-alumnos.css">

  </head>

  <body>
    <?php 
      include ("./adminSide.php"); 
      include ("./loader-screen.php");
    ?>

    <?php include("./conexion.php");

      $id_alumno = $_REQUEST['id'];
      $respu= $mysqli->query("SELECT * FROM alumno WHERE ID_ALUMNO='$id_alumno';") or die ($mysqli->error);
      $fi=mysqli_fetch_array($respu);
      ?>
  <div class="div-title-calificaciones">
        <h5><small>Calificaciones de</small> <?php echo "$fi[NOMBRE]";  ?>&nbsp;<?php echo "$fi[APELLIDO_P]"; ?></h5>
  </div>
    
    <div class="graficasCont">
            <div class="graficasIcon">
              <img src="./img-menu/bar-chart.svg" alt="">
            </div>

            <a href="./graficas.php?id=<?php echo "$id_alumno"; ?>">
              <div class="buttonGraficos">Ver graficas</div>
            </a>
      </div>

    <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-12">

      <div class="col-lg-12">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Puntos</th>
                <th>Alumno</th>
                <th>Objeto</th>
                <th>Precio</th>
                <th>Errores</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>

                <?php
                  $id_alumno = $_REQUEST['id'];
                  $respuesta= $mysqli->query("SELECT * FROM calificaciones WHERE ID_ALUMNO='$id_alumno' ORDER BY ID_CALIFICACION DESC;") or die ($mysqli->error);
                  while($fila=mysqli_fetch_array($respuesta)){
                ?>
            <tr id="<?php echo "$fila[ID_CALIFICACION]"; ?>">
                <td><?php echo "$fila[PUNTOS]"; ?>  pt</td>
                <td><?php echo "$fila[NOMBRE]"; ?></td>
                <td><?php echo "$fila[OBJETO]"; ?></td>
                <td>$ <?php echo "$fila[PRECIO]"; ?></td>
                <td><?php echo "$fila[errores]"; ?></td>                
                <td><?php echo "$fila[FECHA]"; ?></td>
                <td class="row-buttons">

                    <a class="links">
                      <button type="submit" class="btn btn-danger btn-xs identifyingClass" data-toggle="modal" data-target="#myModal" data-id="<?php echo "$fila[ID_CALIFICACION]"; ?>">
                          <span class="glyphicon glyphicon-trash"></span>&nbsp; Eliminar
                      </button>
                    </a>

                </td>
                <!-- <td>
                  <div class="fotoNino">
                    <img src="./img/user.png" alt="..." class="img-thumbnail">
                  </div>
                </td> -->
            </tr>
            <?php }?>

             </tbody>
        </table>

      </div>

    </div>

    <div class="alert" id="alert">
      <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
    </div>

              <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Seguro de Eliminar ?</h4>
          </div>
          <div class="modal-body">
            <p>Estas seguro de eliminar la calificacion ? </p> 
            <button type="button" class="btn btn-danger" data-dismiss="modal">No</button> 
            <a id="hiddenValue" class="links" href="quitar"><button type="button" class="btn btn-primary">Si</button></a>
          </div>
          <div class="modal-footer">
            <a class="links"><button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button></a>
          </div>
        </div>
      </div>
    </div> <!-- ./ Modal -->


    <script src="./js/jquery-3.2.1.min.js"></script>
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
    <script src="./js/code-calificaciones.js"></script>
  </body>

</html>
