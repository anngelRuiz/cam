<?php

include '../conexion.php';

$idAlmumno = $_REQUEST['id'];

$res= $mysqli->query("SELECT * FROM alumno WHERE ID_ALUMNO='$idAlmumno'") or die ($mysqli->error);
$f=mysqli_fetch_array($res);

$nombre = "$f[NOMBRE]";
$fecha = date('d-m-Y');

$respuesta= $mysqli->query("SELECT * FROM current_score WHERE id_alumno='$idAlmumno'") or die ($mysqli->error);
$fila=mysqli_fetch_array($respuesta);

$ans= $mysqli->query("SELECT * FROM high_score WHERE id_alumno='$idAlmumno'") or die ($mysqli->error);
$quee=mysqli_fetch_array($ans);

$answer= $mysqli->query("SELECT * FROM smaller_score WHERE id_alumno='$idAlmumno'") or die ($mysqli->error);
$queeded=mysqli_fetch_array($answer);

if (mysqli_num_rows($respuesta)==0 and mysqli_num_rows($ans)==0 and mysqli_num_rows($answer)==0)
{   

    $queryInsert= "INSERT INTO current_score VALUES(NULL, '$idAlmumno', '$nombre', 0, '$fecha')";
    $mysqli->query ($queryInsert) or die ($mysqli->error);

    $queryHigh= "INSERT INTO high_score VALUES(NULL, '$idAlmumno', '$nombre', 0, '$fecha')";
    $mysqli->query ($queryHigh) or die ($mysqli->error);

    $querySmaller= "INSERT INTO smaller_score VALUES(NULL, '$idAlmumno', '$nombre', 1500, '$fecha')";
    $mysqli->query ($querySmaller) or die ($mysqli->error);

    header("Location: ../index.php");
   
} else{
    header("Location: ./juego.php?id=".$idAlmumno);
}// else

echo "si";

?>

