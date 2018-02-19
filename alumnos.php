<?php
  session_start();
  if(isset($_SESSION['miSesion'])){
    $arreglo = $_SESSION['miSesion'];
  }else {
    header("Location: ./index.php");
  }
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <?php include ("./headWebAdmin.php");?>  
    <title>Alumnos</title>

    <link rel="stylesheet" href="./css/estilos-side.css">
    <link rel="stylesheet" href="./css/styles-alumnos.css">

    <!-- <link rel="stylesheet" href="./css/estilos-alumnos.css"> -->  
  
</head>

  <body>
    <?php 
      include ("./adminSide.php"); 
      include ("./loader-screen.php");
    ?>

    <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-12">
      <h5 id="caption-intro">Lista de <small>Alumnos</small></h5>
      <a class="links" href="./addAlumno.php">
      <button type="button" class="btn btn-info btn-xs">
          <span class="glyphicon glyphicon-plus"></span>&nbsp;Agregar Alumno
      </button>
      </a>
      <br>
      <br>
      <div class="col-lg-12">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Foto</th>
                <th>Nombre Completo</th>
                <th>Edad</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <?php
              include("conexion.php");
            ?>

            <tbody>

              <?php
                  $respuesta= $mysqli->query("SELECT ID_ALUMNO, CONCAT(NOMBRE , ' ' ,  APELLIDO_P , ' ' , APELLIDO_M) AS NombreCompleto, EDAD, FOTO FROM alumno;") or die ($mysqli->error);
                  while($fila=mysqli_fetch_array($respuesta)){
              ?>
              <tr id="<?php echo "$fila[ID_ALUMNO]"; ?>">
                  <?php 
                    $extension=explode('../',"$fila[FOTO]");
                    $ext = end($extension); 
                  ?>
                              
                  <td class="row-img perfil"><img src="<?php echo "$ext"; ?>" alt=""></td>
                  <td><?php echo "$fila[NombreCompleto]"; ?></td>
                  <td><?php echo "$fila[EDAD]"; ?></td>

                  <td class="row-buttons">
                    <a class="links" href="./calificaciones.php?id=<?php echo "$fila[ID_ALUMNO]"; ?>">
                      <button type="submit" class="btn btn-info btn-xs">
                          <span class="glyphicon glyphicon-folder-open"></span>&nbsp; Calificaciones
                      </button>
                    </a>

                    <a class="links btnEdit" >
                      <button type="submit" class="btn btn-success btn-xs">
                          <span class="glyphicon glyphicon-usd"></span>&nbsp; Objetos
                      </button>
                    </a>

                    <a class="links" href="./editAlumno.php?id=<?php echo "$fila[ID_ALUMNO]"; ?>">
                      <button type="button" class="btn btn-warning btn-xs">
                          <span class="glyphicon glyphicon-pencil"></span>&nbsp;Editar
                      </button>
                    </a>

                    <a class="links"><button type="submit" class="btn btn-danger btn-xs identifyingClass"  data-toggle="modal" data-target="#myModal" data-id="<?php echo "$fila[ID_ALUMNO]"; ?>">
                      <span class="glyphicon glyphicon-trash"></span>&nbsp; Eliminar
                    </button></a>

                  </td>
            </tr>
            <?php }?>
          					  
             </tbody>
        </table>

      </div>

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
            <p>Estas seguro de eliminar este alumno ?</p> 
            <button type="button" class="btn btn-danger" data-dismiss="modal">No</button> 
            <a id="hiddenValue" class="links" href="quitar"><button type="button" class="btn btn-primary">Si</button></a>
          </div>
          <div class="modal-footer">
            <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button> -->
            <a class="links" href="./alumnos.php"><button type="button" class="btn btn-default">Cerrar</button></a>
          </div>
        </div>
      </div>
    </div> <!-- ./ Modal -->

    <div class="alert" id="alert">
      <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
    </div>


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
    <script src="./js/code-alumnos.js"></script> 
  </body>

</html>
