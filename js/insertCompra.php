<?php
include '../conexion.php';

  if(isset($_POST['idOb']) && isset($_POST['idAlm']) && isset($_POST['errores'])){
    $idObjeto = $_POST['idOb'];
    $idAlmumno = $_POST['idAlm'];
    $errores = $_POST['errores'];


    if($idObjeto == "" or $idAlmumno == "" or $errores == ""){
      echo "Error al traer los datos para inerccion";

    }else{
      $respuesta= $mysqli->query("SELECT * FROM objetos WHERE ID_OBJETO='$idObjeto'") or die ($mysqli->error);
      $fila=mysqli_fetch_array($respuesta);

      $res= $mysqli->query("SELECT * FROM alumno WHERE ID_ALUMNO='$idAlmumno'") or die ($mysqli->error);
      $f=mysqli_fetch_array($res);



      $nombre = "$f[NOMBRE]";
      // echo $nombre;


      $objeto = "$fila[OBJETO]";
      $precio = "$fila[PRECIO]";
      $puntos = "$fila[PUNTOS]";
      $fecha = date('d-m-Y');

      // Insert into calificaciones
      $consulta = "INSERT INTO calificaciones VALUES(NULL, '$idAlmumno', '$nombre', '$objeto', '$precio', '$puntos', '$errores', '$fecha')";
      $mysqli->query ($consulta) or die ($mysqli->error);
    }
  }

?>
