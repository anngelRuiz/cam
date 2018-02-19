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
      
      <br>
      <br>
      <div class="contenedorAlumnos">

          <div class="conten-datos">

          </div>
      </div>

    </div>
    <script src="./js/jquery-3.2.1.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
  </body>

</html>
