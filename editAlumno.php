<?php
    session_start();
    if(isset($_SESSION['miSesion'])){
      $arreglo = $_SESSION['miSesion'];

    }else {
      header("Location: ./index.php");
    }
?>
<title>Editar Alumno</title>
<?php include ("head.php"); ?>

    <link rel="stylesheet" href="./css/estilos-side.css">
    <link rel="stylesheet" href="./css/styles-forms.css">
    <link rel="stylesheet" href="./css/estilos-add.css">

  </head>
<body>
	<?php 
      include ("./adminSide.php"); 
      include ("./loader-screen.php");
    ?>
	<!-- Contenedor -->

	<div class='col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1'>
    <?php
        include './conexion.php';

        $id_alumno = $_REQUEST['id'];
        $respuesta= $mysqli->query("SELECT * FROM alumno WHERE ID_ALUMNO='$id_alumno'") or die ($mysqli->error);
        $fila=mysqli_fetch_array($respuesta);
     ?>
		<form  class="login-form" id="myForm" action="./php/editar-alumno.php?id=<?php echo "$fila[ID_ALUMNO]"; ?>" method="post" enctype="multipart/form-data">

					<div class='col-lg-12 text-center'>
						<div class='panel panel-default'>
							<div class='panel-heading'>
								<h1 class='panel-title'>Introduce los datos del Alumno</h1>
							</div>

							<div class='panel-body'>
							
									<div class='form-group log-status letters' id="form-group-name">
											<label>Nombre</label>
											<input type="text" placeholder='Introduce el nombre' class='form-control' name="name" id="name" value="<?php echo "$fila[NOMBRE]"; ?>" required > 
											<span><i class="fa fa-refresh faName" aria-hidden="true"></i></span>
									</div>
							
									<div class='form-group log-status letters' id="form-group-ap">
											<label>Apellido Paterno</label>
											<input type="text" placeholder='Introduce el apellido paterno' class='form-control' name="ap" id="ap" value="<?php echo "$fila[APELLIDO_P]"; ?>" required> 
											<span><i class="fa fa-refresh faAP" aria-hidden="true"></i></span>
									</div>
							
									<div class='form-group log-status letters' id="form-group-am">
											<label>Apellido Materno</label>
											<input type="text" placeholder='Introduce el apellido materno' class='form-control' name="am" id="am" value="<?php echo "$fila[APELLIDO_M]"; ?>" required> 
											<span><i class="fa fa-refresh faAM" aria-hidden="true"></i></span>
									</div>
							
									<div class='form-group log-status' id="form-group-age">
											<label>Edad</label>
											<input type="number" min="1" max="99"  placeholder='Introduce le edad' class='form-control' name="age" id="age" value="<?php echo "$fila[EDAD]"; ?>" required> 
											<span><i class="fa fa-refresh faAge" aria-hidden="true"></i></span>
									</div>
							
									<div class='form-group log-status' id="form-group-fp">
											<label>Fotografia principal</label><br>
											<input type='file'  accept=".jpg, .jpeg, .png" name="foto"  class='form-control inputfile' id="fp" required>
											<span><i class="fa fa-refresh faPhoto" aria-hidden="true"></i></span>
											<br>
									</div>
							
									<span id="alertFinish" class="alert">Aun no se han llenado los campos correctamente.</span>					
									<span id="campos" class="alert">Faltan Campos de llenar!</span>
									<span id="alertSmall" class="alert">Campo muy pequeño!</span>
									<span id="alertEsp" class="alert">No caracteres especiales! (@, #, $, %, ^, etc).</span>
									<span id="alertAge" class="alert">Edad no valida!.</span>
									<span id="alertNumber" class="alert">Solo numeros!</span>						
									<span id="alertPhoto" class="alert">Solo imagenes son permitidas! (.jpg, .jpeg, .png).</span>
																			
									<br>
							
							</div><!-- ./ panel-body -->
						</div>
						<button type="submit" name="btnenviar" id="btnSend">Editar</button>
					</div>

      <br>

		</form>
	</div>

	<script src="./js/bootstrap.min.js"></script>
	<script src="./js/jquery-3.2.1.min.js"></script>	
	<script src="./js/code-edit-alumno.js"></script>
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
