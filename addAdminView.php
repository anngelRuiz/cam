<?php
  session_start();
  if(isset($_SESSION['miSesion'])){
    $arreglo = $_SESSION['miSesion'];

  }else {
    header("Location: ./index.php");
  }
?>
<title>Agregar Administrador</title>
<?php include ("head.php"); ?>

<link rel="stylesheet" href="./css/estilos-side.css">
<link rel="stylesheet" href="./css/style-add-ad.css">

</head>

<body>
<?php include ("./adminSide.php"); ?>
<br>
<div class="container">
  <div class="info">
    <h1>Crear Administrador</h1>
  </div>
</div>
<div class="form">
  <div class="thumbnail"><img src="./img-detalles/man2.svg"/></div>

  <form class="login-form">

    <div class="form-group log-status">
      <input type="text" class="form-control" placeholder="Nombre " id="name" name="name">
    </div>

    <div class="form-group log-status">
      <input type="email" class="form-control" placeholder="Correo Electronico " id="email" name="email">
    </div>

    <div class="form-group log-status pws">
      <input type="password" class="form-control" placeholder="Contraseña " id="pw1" name="pw1">  
    </div>

    <div class="form-group log-status pws">
      <input type="password" class="form-control" placeholder="Confirmar Contraseña " id="pw2" name="pw2">
    </div>

    <span id="campos"class="alert">Faltan Campos de llenar</span> <br>
    <span id="pw"class="alert">Contraseñas no coiciden</span>
    <br>
    <button type="submit" class="log-btn">Crear</button>
  </form>
</div>

  <script src="./js/jquery-3.2.1.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
  <script src="./js/codeAdd.js"></script>
</body>
</html>
