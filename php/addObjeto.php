<?php
	session_start();
	if(isset($_SESSION['miSesion'])){
		$arreglo = $_SESSION['miSesion'];

	}else {
		header("Location: ../index.php");
	}
?>

<title>Agregar Objeto</title>
<?php include ("../headOut.php"); ?>

    <link rel="stylesheet" href="../css/estilos-side.css">
	<link rel="stylesheet" href="../css/styles-forms.css">

  </head>
<body>
	<?php 
		include ("../adminSideAdmin.php");
		include ("../loader-screen.php");
	?>
	<!-- Contenedor -->

<div class='col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1'>
    <?php $id_alumno = $_REQUEST['id']; ?>

		<form  class="login-form" id="myForm" action="./registro-objeto.php?id=<?php echo $id_alumno; ?>" method="post" enctype="multipart/form-data">

			<div class='col-lg-12 text-center'>
				<div class='panel panel-default'>

					<div class='panel-heading'>
						<h1 class='panel-title'>Agregar un objeto</h1>
					</div>

					<div class='panel-body'>

						<div class='form-group log-status letters' id="form-group-name">
							<label>Nombre del ojbeto</label>
							<input type="text" placeholder='Introduce el nombre' class='form-control' name="nombre"  id="name" required>
							<span><i class="fa fa-check faName" aria-hidden="true"></i></span>
						</div>

						<div class='form-group log-status' id="form-group-precio">
							<label>Precio</label>
							<input type="number" min="1" placeholder='Introduce un precio' class='form-control' name="precio" id="precio" required>
							<span><i class="fa fa-check faPrecio" aria-hidden="true"></i></span>
						</div>

						<div class='form-group log-status' id="form-group-puntos">
							<label>Puntos</label>
							<input type="number" min="1" placeholder='Introduce el valor de puntos del objeto' class='form-control' name="puntos" id="puntos" required>
							<span><i class="fa fa-check faPuntos" aria-hidden="true"></i></span>
						</div>

						<div class='form-group log-status' id="form-group-fp">
							<label>Fotografia principal</label><br>
							<input type='file'  accept=".jpg, .jpeg, .png" name="foto"  class='form-control inputfile' id="fp" required>
							<span><i class="fa fa-check faPhoto" aria-hidden="true"></i></span>
							<br>
						</div>

						<span id="alertFinish" class="alert">Aun no se han llenado los campos correctamente.</span>					
						<span id="campos" class="alert">Faltan Campos de llenar!</span>
						<span id="alertSmall" class="alert">Campo muy pequeño!</span>
						<span id="alertEsp" class="alert">No caracteres especiales! (@, #, $, %, ^, etc).</span>
						<span id="alertWrong" class="alert">Cantidad no valida!.</span>
						<span id="alertNumber" class="alert">Solo numeros!</span>						
						<span id="alertPhoto" class="alert">Solo imagenes son permitidas! (.jpg, .jpeg, .png).</span>

					</div><!-- ./ panel-body -->
				</div><!-- ./ panel-default -->
				<button type="submit" name="btnenviar" id="btnSend">Guardar</button>
			</div><!-- ./ col-md-8 text-center -->
      		<br>
			<!--  -->
		</form>
	</div>

	<script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>	
	<script src="../js/code-add-object.js"></script>
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
