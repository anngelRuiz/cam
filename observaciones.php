<?php
    session_start();
    if(isset($_SESSION['miSesion'])){
      $arreglo = $_SESSION['miSesion'];

    }else {
      header("Location: ./index.php");
    }
?>
<title>Observaciones</title>

<?php include ("head.php"); ?>

    <link rel="stylesheet" href="./css/estilos-side.css">
    <link rel="stylesheet" href="./css/styles-alumnos.css">
    <link rel="stylesheet" href="./css/estilos-observaciones.css">

  </head>

  <body>
   <?php 
      include ("./adminSide.php"); 
      include ("./loader-screen.php");
    ?>
    <?php
      include("conexion.php");

    ?>

    <!-- <div class="col-lg-6 col-lg-offset-3">

      <div class="box-make">

      </div>

    </div> -->

    <div class="contenedorAlum col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-12 text-center">

          <h5 id="caption-intro">Observaciones para <small>Alumnos</small></h5>

          <img src="./img-menu/search.svg" alt="">

          <a href="#"><div id="btn-crear" class="btn-crear">Hacer Observacion</div></a>
     
      <section class="seccionToggle">
          <div class="wrap">
            <form  action="./php/addObservacion.php" method="post">

        					<div class='col-md-12'>
                    <h2>Observacion</h2> 
                    
        						<div class='panel panel-default'>
        							<div class='panel-body'>

        								<div class='form-group'>

        									<label>Nombre</label>
                          <select name="id" required>
                            <option value="">Selecciona el nombre del alumno:</option>
                            <li role="separator" class="divider"></li>
                            <?php
                              $respuesta= $mysqli->query("SELECT concat(NOMBRE,' ',APELLIDO_P,' ',APELLIDO_M)  AS Nombre, ID_ALUMNO FROM alumno") or die ($mysqli->error);
                              // select contact(nombre,apellido) as nombre from users
                              // "select (nombre+" "+apellido) as nombre from users"
                              while($fila=mysqli_fetch_array($respuesta)){
                            ?>
                            <option value="<?php echo "$fila[ID_ALUMNO]";  ?>"><?php echo "$fila[Nombre]";  ?></option>
                            <?php } ?>
                          </select>


        								</div>

                        <div class='form-group'>
        									<label>Descripcion </label><br>
        									<textarea name="dc" placeholder="Descripcion de la observacion al nino" required></textarea>
        								</div>


                        <div class='form-group'>
        									<label>Fecha</label>
                          <input type="date" name="fecha" class='form-control' required>
        								</div>

        							</div>
        						</div>
                    <input type="submit" name="btnenviar" value="Guardar">
                    <br>
        					</div>
        		</form>
          </div>
      </section>
      <br>
    </div>

    <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-12">
        <!-- tabla  -->
      <table class="table table-bordered">
          <thead>
          <tr>
              <th>Nombre</th>
              <th>Apellido Paterno</th>
              <th>Apellido Materno</th>
              <th>Ver</th>
          </tr>
          </thead>

          <tbody>

              <?php
                $respuesta= $mysqli->query("SELECT * FROM alumno") or die ($mysqli->error);
                while($fila=mysqli_fetch_array($respuesta)){
              ?>
          <tr>

              <td><?php echo "$fila[NOMBRE]"; ?></td>
              <td><?php echo "$fila[APELLIDO_P]"; ?></td>
              <td><?php echo "$fila[APELLIDO_M]"; ?></td>
              <td>
                <!--glyphicon glyphicon-folder-open-->
                <a class="links" href="./observacionesView.php?id=<?php echo "$fila[ID_ALUMNO]"; ?>">
                  <button type="submit" class="btn btn-info btn-xs">
                      <span class="glyphicon glyphicon-search"></span>&nbsp; Observaciones
                  </button>
                </a>

              </td>
          </tr>
          <?php }?>

           </tbody>
      </table>
      </div>
    <script src="./js/jquery-3.2.1.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script>
 
        window.addEventListener("load", function(){
            setTimeout(timedOut, 200 );
        });
    
        function timedOut() {
            var load_screen = document.getElementById("load_screen");
            $('#load_screen').fadeOut();
        }
    
    </script> 
    <script src="./js/codigoObersaciones.js">

    </script>
  </body>

</html>
