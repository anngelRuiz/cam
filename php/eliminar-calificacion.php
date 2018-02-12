<?php
    include '../conexion.php';


    $id_calificacion= $_REQUEST['id'];

    $consulta = "DELETE FROM calificaciones WHERE ID_CALIFICACION='$id_calificacion'";
    $mysqli->query ($consulta) or die ($mysqli->error);

    if($consulta){
        echo "success";
        // header("Location: ./objetos.php?id=".$id_alumno);
    }else{
        // echo "Error al eliminar los registros: <br><br>" . mysqli_error($mysqli)."<br><br> Por favor, regresa al menu principal";
        echo "error";
    }

    $mysqli->close();

 ?>
