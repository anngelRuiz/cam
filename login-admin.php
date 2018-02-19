  <title>Login</title>
  <?php include ("head.php"); ?>

  <link rel="stylesheet" href="./css/estilos-side.css">
  <link rel="stylesheet" href="./css/style-login.css">

</head>

<body>
  <?php 
      include ("./loader-screen.php");   
      include ("./navbar.php");
  ?>


  <div class="login-img">
    <img src="./img-detalles/man.svg" alt="">
  </div>
  <div class="login-form">
    <form class="myForm">
      <h1>CAM #8</h1>
      <div class="form-group log-status">
        <input type="text" class="form-control" placeholder="Correo Electronico " id="email">
        <i class="fa fa-user"></i>
      </div>
      <div class="form-group log-status">
        <input type="password" class="form-control" placeholder="Contraseña" id="password">
        <i class="fa fa-lock"></i>
      </div>
        <span id="wrong" class="alert">Usuario o Contraseña incorrectos</span>
        <span id="fields" class="alert">Favor de llenar todos los campos</span>
        <a class="link" href="#">Has olvidado tu contraseña?</a>
      <button type="submit" class="log-btn" >Inisiar Sesión</button>
    </form>
     
   </div> <!-- div login  -->
   
    <script src="./js/jquery-3.2.1.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/codeLogin.js"></script>
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
