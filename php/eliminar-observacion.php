<?php
    include '../conexion.php';


    $id_observacion = $_POST['id'];

    $consulta = "DELETE FROM observaciones WHERE id_observacion='$id_observacion'";
    $mysqli->query ($consulta) or die ($mysqli->error);

    if($consulta){
        echo "success";
    }else{
        echo "error";
    }

    $mysqli->close();

 ?>
