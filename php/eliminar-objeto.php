<?php
    include '../conexion.php';


    $id_objeto= $_REQUEST['id'];

    $respuesta= $mysqli->query("SELECT ID_ALUMNO, IMAGEN FROM objetos WHERE ID_OBJETO='$id_objeto'") or die ($mysqli->error);
    $fila=mysqli_fetch_array($respuesta);

    $id_alumno = $fila['ID_ALUMNO'];

    $foto = $fila['IMAGEN'];
    $destino =$foto;
    @unlink($destino);

    $consulta = "DELETE FROM objetos WHERE ID_OBJETO='$id_objeto'";
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
