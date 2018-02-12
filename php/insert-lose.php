<?php

include '../conexion.php';

$idObjeto = $_POST['idOb'];
$idAlmumno = $_POST['idAlm'];
$newScore =0;


// get data
$res= $mysqli->query("SELECT * FROM alumno WHERE ID_ALUMNO='$idAlmumno';") or die ($mysqli->error);
$f=mysqli_fetch_array($res);

$nombre = "$f[NOMBRE]";

$respuesta= $mysqli->query("SELECT * FROM objetos WHERE ID_OBJETO='$idObjeto';") or die ($mysqli->error);
$fila=mysqli_fetch_array($respuesta);

$objeto = "$fila[OBJETO]";
$puntos = "$fila[PUNTOS]";

$ans= $mysqli->query("SELECT puntuacion FROM smaller_score WHERE id_alumno='$idAlmumno';") or die ($mysqli->error);
$quee=mysqli_fetch_array($ans);

$smaller_score = "$quee[puntuacion]";

////////

$fecha = date('d-m-Y');


// Insert into less_score
$insertLess= "INSERT INTO less_score VALUES(NULL, '$idAlmumno', '$idObjeto', '$nombre', '$objeto', '$puntos', '$fecha')";
$mysqli->query ($insertLess) or die ($mysqli->error);

// Insert into current_score

          // Get Current or last Score
          $respta= $mysqli->query("SELECT puntuacion FROM current_score WHERE id_alumno='$idAlmumno' ORDER BY id_score DESC LIMIT 1;") or die ($mysqli->error);
          $row=mysqli_fetch_array($respta);
          
          $currentScore = $row['puntuacion'];

    $newScore = $currentScore - $puntos;
          
    //Insert into current_score like a calificacion
    $queryInsert= "INSERT INTO current_score VALUES(NULL, '$idAlmumno', '$nombre', '$newScore', '$fecha')";
    $mysqli->query ($queryInsert) or die ($mysqli->error);

          /////////////////////////////////////////////////////////// Chech scores //////////////////////////////////////////////////////////////////////


        if($newScore<$smaller_score){
            
            $conSmall = "UPDATE smaller_score SET puntuacion= '$newScore', fecha='$fecha' WHERE id_alumno=$idAlmumno";
            $mysqli->query ($conSmall) or die ($mysqli->error);
    
        } // if




?>