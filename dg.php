<?php
    session_start();
    if(isset($_SESSION['miSesion'])){
      $arreglo = $_SESSION['miSesion'];

    }else {
      header("Location: ./index.php");
    }
  ?>
<?php include ("head.php"); ?>

    <link rel="stylesheet" href="./css/estilos-side.css">
    <link rel="stylesheet" href="./css/estilos-observaciones.css">




  </head>

  <body>
    <?php include ("adminSide.php"); ?>

    <div class="contenedorAlum">
      <h5>Lista de <small>Alumnos</small></h5>
      <div class="img-dg">
        <img src="./img-menu/curriculum-vitae.svg" alt=""><br>
      </div>
      <a href="#"><div id="btn-crear" class="btn-crear">Agregar Datos</div></a>

      <br>
      <br>
      <div class="contenedorAlumnos">
        <table class="table">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <?php
              include("conexion.php");

            ?>

            <tbody>

                <?php

                  $respuesta= $mysqli->query("SELECT * FROM alumno") or die ($mysqli->error);
                  while($fila=mysqli_fetch_array($respuesta)){?>
            <tr>

                <td><?php echo "$fila[NOMBRE]"; ?></td>
                <td><?php echo "$fila[APELLIDO_P]"; ?></td>
                <td><?php echo "$fila[APELLIDO_M]"; ?></td>
                <td>
                  <!--glyphicon glyphicon-folder-open-->

                  <a class="links" href="./dgView.php?id=<?php echo "$fila[ID_ALUMNO]"; ?>">
                    <button type="button" class="btn btn-info btn-xs">
                        <span class="glyphicon glyphicon-eye-open"></span>&nbsp;Ver
                    </button>
                  </a>

                </td>
            </tr>
            <?php }?>

             </tbody>
        </table>

      </div>
      <!-- <div class="conten-datos">

      </div> -->

    </div>
    <script src="./js/jquery-3.2.1.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
  </body>

</html>
