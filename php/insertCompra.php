<?php
include '../conexion.php';

  if(isset($_POST['idOb']) && isset($_POST['idAlm']) && isset($_POST['errores'])){
    $idObjeto = $_POST['idOb'];
    $idAlmumno = $_POST['idAlm'];
    $errores = $_POST['errores'];


    if($idObjeto == "" or $idAlmumno == "" or $errores == ""){
      echo "Error al traer los datos para inserccion";

    }else{
      $respuesta= $mysqli->query("SELECT * FROM objetos WHERE ID_OBJETO='$idObjeto'") or die ($mysqli->error);
      $fila=mysqli_fetch_array($respuesta);

      $res= $mysqli->query("SELECT * FROM alumno WHERE ID_ALUMNO='$idAlmumno'") or die ($mysqli->error);
      $f=mysqli_fetch_array($res);

      $ans= $mysqli->query("SELECT puntuacion FROM high_score WHERE id_alumno='$idAlmumno'") or die ($mysqli->error);
      $quee=mysqli_fetch_array($ans);

      $high_score = "$quee[puntuacion]";



      $nombre = "$f[NOMBRE]";

      $objeto = "$fila[OBJETO]";
      $precio = "$fila[PRECIO]";
      $puntos = "$fila[PUNTOS]";
      $day = date(d);
      $day = $day - 1;
      $fecha = date('m-Y');
      $fecha = $day."-".$fecha;

      // Insert into calificaciones
      $consulta = "INSERT INTO calificaciones VALUES(NULL, '$idAlmumno', '$nombre', '$objeto', '$precio', '$puntos', '$errores', '$fecha')";
      $mysqli->query ($consulta) or die ($mysqli->error);

      /////////////////////////////////////////////////////////// Update Score //////////////////////////////////////////////////////////////////////
      
      $newScore = 0;
      // Score Item already get in $puntos
      // Date - today already get in $fecha

      // Get Current or last Score
      $respta= $mysqli->query("SELECT puntuacion FROM current_score WHERE id_alumno='$idAlmumno' ORDER BY id_score DESC LIMIT 1;") or die ($mysqli->error);
      $row=mysqli_fetch_array($respta);
      
      $currentScore = $row['puntuacion'];
      

      $newScore = $currentScore + $puntos;

      //Insert into puntacion like a calificacion
      $queryInsert= "INSERT INTO current_score VALUES(NULL, '$idAlmumno', '$nombre', '$newScore', '$fecha')";
      $mysqli->query ($queryInsert) or die ($mysqli->error);

    
      //////////////////////////////////////////////////// | end Update Score end |//////////////////////////////////////////////////////////////////////

      // update Inventario
      $con = "UPDATE objetos SET cantidad= cantidad + 1 WHERE ID_ALUMNO=$idAlmumno AND ID_OBJETO=$idObjeto";
      $mysqli->query ($con) or die ($mysqli->error);

      /////////////////////////////////////////////////////////// Chech scores //////////////////////////////////////////////////////////////////////


      if($newScore>$high_score){

        $conHigh = "UPDATE high_score SET puntuacion= '$newScore', fecha='$fecha' WHERE id_alumno=$idAlmumno";
        $mysqli->query ($conHigh) or die ($mysqli->error);

      } // if
    }
  }

?>
