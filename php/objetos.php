<?php
	session_start();
	if(isset($_SESSION['miSesion'])){
		$arreglo = $_SESSION['miSesion'];

	}else {
		header("Location: ../index.php");
	}
?>
<title>Objetos</title>
<?php include ("../headOut.php"); ?>

    <link rel="stylesheet" href="../css/estilos-side.css">
    <link rel="stylesheet" href="../css/styles-alumnos.css">

  </head>

  <body>
    <?php 
        include ("../adminSideAdmin.php"); 
        include ("../loader-screen.php");
        include ("../conexion.php");
    ?>

    <?php
    $id_alumno = $_REQUEST['id'];
    $resp= $mysqli->query("SELECT * FROM objetos WHERE ID_ALUMNO='$id_alumno';") or die ($mysqli->error);
    $f=mysqli_fetch_array($resp);

    $id_alumno = $_REQUEST['id'];
    $respu= $mysqli->query("SELECT * FROM alumno WHERE ID_ALUMNO='$id_alumno';") or die ($mysqli->error);
    $fi=mysqli_fetch_array($respu);

    ?>



    <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-12">
      <h5 id="caption-intro"><small>Objetos de</small> <?php echo "$fi[NOMBRE]";  ?>&nbsp;<?php echo "$fi[APELLIDO_P]"; ?></h5>
      <a class="links" href="./addObjeto.php?id=<?php echo "$id_alumno"; ?>">
        <button type="button" class="btn btn-info btn-xs">
            <span class="glyphicon glyphicon-plus"></span>&nbsp;Agregar Objeto
        </button>
      </a>

      <br>
      <br>

      <div class="col-lg-12">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Objeto</th>
                <th>Precio</th>
                <th>Puntos</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
              <?php
                $respuesta= $mysqli->query("SELECT * FROM objetos WHERE ID_ALUMNO='$id_alumno';") or die ($mysqli->error);
                while($fila=mysqli_fetch_array($respuesta)){
              ?>


            <tr id="<?php echo "$fila[ID_OBJETO]"; ?>">

                <td><?php echo "$fila[OBJETO]"; ?></td>
                <td>$<?php echo "$fila[PRECIO]"; ?></td>
                <td><?php echo "$fila[PUNTOS]"; ?> pts</td>
                <td class="row-img"><img src="<?php echo "$fila[IMAGEN]"; ?>" alt=""></td>
                <td class="row-buttons">
                  <!--glyphicon glyphicon-folder-open-->
                  <a class="links" href="./editObjeto.php?id=<?php echo "$fila[ID_OBJETO]"; ?>">
                    <button type="button" class="btn btn-warning btn-xs">
                        <span class="glyphicon glyphicon-pencil"></span>&nbsp;Editar
                    </button>
                  </a>

                  <a class="links">
                    <button type="submit" class="btn btn-danger btn-xs identifyingClass" data-toggle="modal" data-target="#myModal" data-id="<?php echo "$fila[ID_OBJETO]"; ?>">
                        <span class="glyphicon glyphicon-trash"></span>&nbsp; Eliminar
                    </button>
                  </a>

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
            <p>Estas seguro de eliminar este Objeto ?</p> 
            <button type="button" class="btn btn-danger" data-dismiss="modal">No</button> 
            <a id="hiddenValue" class="links" href="quitar"><button type="button" class="btn btn-primary">Si</button></a>
          </div>
          <div class="modal-footer">
            <a class="links"><button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button></a>
          </div>
        </div>
      </div>
    </div> <!-- ./ Modal -->

    <div class="alert" id="alert">
      <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
    </div>


    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery-3.2.1.min.js"></script>	

    <script>
 
        window.addEventListener("load", function(){
            setTimeout(timedOut, 300 );
        });
    
        function timedOut() {
            var load_screen = document.getElementById("load_screen");
            $('#load_screen').fadeOut();
        }
    
    </script> 

    <script src="../js/code-object.js"></script>
  </body>
</html>
