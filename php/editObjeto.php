<?php
	session_start();
	if(isset($_SESSION['miSesion'])){
		$arreglo = $_SESSION['miSesion'];

	}else {
		header("Location: ../index.php");
	}
?>

<title>Editar Objeto</title>
<?php include ("../headOut.php"); ?>

    <link rel="stylesheet" href="../css/estilos-side.css">
	<link rel="stylesheet" href="../css/styles-forms.css">
    <link rel="stylesheet" href="../css/estilos-add.css">

  </head>
<body>
	<?php 
		include ("../adminSideAdmin.php");
		include ("../loader-screen.php");
	?>
	<!-- Contenedor -->

	<div class='col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1'>
		<?php
			include '../conexion.php';

			$id_objeto= $_REQUEST['id'];
			$respuesta= $mysqli->query("SELECT * FROM objetos WHERE ID_OBJETO='$id_objeto'") or die ($mysqli->error);
			$fila=mysqli_fetch_array($respuesta);
		?>
		<form  class="login-form" id="myForm" action="./editar-objeto.php?id=<?php echo $fila['ID_OBJETO']; ?>" method="post" enctype="multipart/form-data">

			<div class='col-lg-12 text-center'>
				<div class='panel panel-default'>

					<div class='panel-heading'>
						<h1 class='panel-title'>Editar objeto</h1>
					</div>

					<div class='panel-body'>

						<div class='form-group log-status letters' id="form-group-name">
							<label>Nombre del ojbeto</label>
							<input type="text" placeholder='Introduce el nombre' class='form-control' name="nombre"  id="name" value="<?php echo "$fila[OBJETO]"; ?>" required>
							<span><i class="fa fa-refresh faName" aria-hidden="true"></i></span>
						</div>

						<div class='form-group log-status' id="form-group-precio">
							<label>Precio</label>
							<input type="number" min="1" placeholder='Introduce un precio' class='form-control' name="precio" id="precio" value="<?php echo "$fila[PRECIO]"; ?>" required>
							<span><i class="fa fa-refresh faPrecio" aria-hidden="true"></i></span>
						</div>

						<div class='form-group log-status' id="form-group-puntos">
							<label>Puntos</label>
							<input type="number" min="1" placeholder='Introduce el valor de puntos del objeto' class='form-control' name="puntos" id="puntos" value="<?php echo "$fila[PUNTOS]"; ?>" required>
							<span><i class="fa fa-refresh faPuntos" aria-hidden="true"></i></span>
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
						<span id="alertWrong" class="alert">Cantidad no valida!.</span>
						<span id="alertNumber" class="alert">Solo numeros!</span>						
						<span id="alertPhoto" class="alert">Solo imagenes son permitidas! (.jpg, .jpeg, .png).</span>
					</div> <!-- ./ panel-body -->
				</div><!-- ./ panel-default -->
				<button type="submit" name="btnenviar" id="btnSend">Guardar</button>
			</div><!-- ./ col-md-8 text-center -->

      		<br>

		</form>
	</div>

	<script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>	
	<script src="../js/code-edit-object.js"></script>
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
