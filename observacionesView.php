<?php
    session_start();
    if(isset($_SESSION['miSesion'])){
      $arreglo = $_SESSION['miSesion'];

    }else {
      header("Location: ./index.php");
    }
  ?>
  
<?php include ("./head.php"); ?>

    <link rel="stylesheet" href="./css/estilos-side.css">
    <link rel="stylesheet" href="./css/estilos-observaciones.css">
    <title>Observaciones</title>

  </head>

  <body>
    <?php
      include ("./adminSide.php");
      include ("./conexion.php");
      include ("./loader-screen.php");      
      $id_alumno = $_REQUEST['id'];
      $resp= $mysqli->query("SELECT * FROM alumno WHERE ID_ALUMNO='$id_alumno';") or die ($mysqli->error);
      $f=mysqli_fetch_array($resp);

    ?>

    <table id="contenido" cellpadding="10"  border="1">
      <thead>
        <tr>
          <th>Fecha</th>
          <th>Observacion</th>
        </tr>
      </thead>

      <tbody>
      <?php
          $res= $mysqli->query("SELECT * FROM observaciones WHERE id_alumno='$id_alumno' ORDER BY fecha DESC;") or die ($mysqli->error);
          while($fila=mysqli_fetch_array($res)){
      ?>
      <tr>
          <td><?php echo "$fila[fecha]"; ?></td>
          <td><?php echo "$fila[observacion]"; ?></td>          
        </tr>
        <?php } ?>
      </tbody>
    </table>

    <div class="ob-alm">
        <h5>Observaciones de <small><?php echo "$f[NOMBRE]"; ?> <?php echo "$f[APELLIDO_P]"; ?> <?php echo "$f[APELLIDO_M]"; ?></small></h5>        
      </div>

    <div class="container">    
          <div class="card">
                  <div class="top-section">
                          <div class="facebook">
                                  <a href="#" class="fa fa-user-circle"></a>
                          </div>
                  </div>
                  <div class="avatar">
                          <?php $extension=explode('../',"$$f[FOTO]");
                          $ext = end($extension); ?>
                          <img src="<?php echo "$ext"; ?>" alt="">
                  </div>
                  <div class="bottom-section">               
                      <h5>Nombre: <span><?php echo "$f[NOMBRE]"; ?></span></h5>
                      <h5>Apellido: <span><?php echo "$f[APELLIDO_P]"; ?></span></h5>
                      <h5>Apellido: <span><?php echo "$f[APELLIDO_M]"; ?></span></h5>
                      <h5>Edad: <span><?php echo "$f[EDAD]"; ?></span></h5>
                      

                      <div class="social-media">
                          <!-- <a class="links" href="./menuAlumno.php?id=<?php echo "$$f[ID_ALUMNO]"; ?>">
                              <button type="button" class="btn btn-large btn-block btn-info">Jugar</button>
                          </a> -->
                        </div>
                      
                  </div>

          </div><!-- ./ Card -->  
      </div><!-- ./ Container  -->  
      

    <div class="contenedorAlum">

      <!-- tabla  -->
      <div class="col-lg-6 col-lg-offset-3">
        <a class="links">
          <button type="submit" class="btn btn-info btn-xs" onClick="printObs('contenido','<?php echo "$f[Nombre]"; ?>')">
              <span class="glyphicon glyphicon-print"></span>&nbsp; Imprimir
          </button>
        </a>
      </div>
     

      <br>
      <br>
      <br>

      <div class="contenido" >
        <?php
            $res= $mysqli->query("SELECT * FROM observaciones WHERE id_alumno='$id_alumno';") or die ($mysqli->error);
            while($fila=mysqli_fetch_array($res)){
        ?>
 
        <div id="<?php echo "$fila[id_observacion]"; ?>" class="obs">
          <div class="date">
            <h5>Fecha: </h5>
            <p><?php echo "$fila[fecha]"; ?></p>

            <a class="links">
              <button type="submit" class="btn btn-info btn-xs identifyingClass" data-toggle="modal" data-target="#myModal" data-id="<?php echo "$fila[id_observacion]"; ?>">
                  <span class="glyphicon glyphicon-trash"></span>&nbsp; Eliminar
              </button>
            </a>
          </div><br>


          <h5>Observacion</h5>
          <p><?php echo "$fila[observacion]"; ?></p>

        </div><br>

        <?php } ?>
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
            <p>Estas seguro de eliminar la Observacion ? </p> 
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
    <script src="./js/code-observacionesView.js"></script>
    <script src="./js/codigoGraficas.js"></script>
    <script>
 
        window.addEventListener("load", function(){
            setTimeout(timedOut, 200 );
        });
    
        function timedOut() {
            var load_screen = document.getElementById("load_screen");
            $('#load_screen').fadeOut();
        }
    
    </script> 
    
  </body>

</html>
