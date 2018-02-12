<?php
      include '../conexion.php';

        $id_alumno = $_POST['id'];

        $respuesta= $mysqli->query("SELECT FOTO FROM alumno WHERE ID_ALUMNO='$id_alumno'") or die ("Error al eliminar registro: <br><br>".$mysqli->error."<br><br> Por favor, regresa al menu principal");
        $fila=mysqli_fetch_array($respuesta);

                
                if($respuesta){
                                    // Eliminacio de foto
                    $foto = $fila['FOTO'];
                    $destino =$foto;
                    //delete($destino);
                    @unlink($destino);

                    //Variable para la ruta de la carpeta del alumno
                    $alumnoCarpeta = "../fotos-objetos/".$id_alumno."/";

                    //Llamada de la funcion para elminar carptea
                    eliminarDir($alumnoCarpeta);


                    //Eliminar todo registro del alumno de la BD
                    
                    $consulta = "DELETE FROM alumno WHERE ID_ALUMNO='$id_alumno'";
                    $mysqli->query ($consulta) or die ($mysqli->error);

                    $queryObs = "DELETE FROM calificaciones WHERE ID_ALUMNO='$id_alumno'";
                    $mysqli->query ($queryObs) or die ($mysqli->error);

                    $queryObjetos = "DELETE FROM current_score WHERE ID_ALUMNO='$id_alumno'";
                    $mysqli->query ($queryObjetos) or die ($mysqli->error);

                    $queryObjetos = "DELETE FROM high_score WHERE ID_ALUMNO='$id_alumno'";
                    $mysqli->query ($queryObjetos) or die ($mysqli->error);

                    $queryObjetos = "DELETE FROM less_score WHERE ID_ALUMNO='$id_alumno'";
                    $mysqli->query ($queryObjetos) or die ($mysqli->error);

                    $queryObjetos = "DELETE FROM objetos WHERE ID_ALUMNO='$id_alumno'";
                    $mysqli->query ($queryObjetos) or die ($mysqli->error);

                    $queryObs = "DELETE FROM observaciones WHERE ID_ALUMNO='$id_alumno'";
                    $mysqli->query ($queryObs) or die ($mysqli->error);

                    $queryObjetos = "DELETE FROM smaller_score WHERE ID_ALUMNO='$id_alumno'";
                    $mysqli->query ($queryObjetos) or die ($mysqli->error);

                    echo "success";
                    // header("Location: ../alumnos.php");
                }else{
                    // echo "Error al eliminar los registros: <br><br>" . mysqli_error($mysqli)."<br><br> Por favor, regresa al menu principal";
                    echo "error";
                }

        
        //Funcion para eliminar carptea del alumno y sus objetos
        function eliminarDir($carpeta){
            if (file_exists($carpeta)) {
                foreach(glob($carpeta . "/*") as $archivos_carpeta)
                {
                    // echo $archivos_carpeta;
            
                    if (is_dir($archivos_carpeta))
                    {
                        eliminarDir($archivos_carpeta);
                    }
                    else
                    {
                        unlink($archivos_carpeta);
                    }
                }
            rmdir($carpeta);    
            } // if

        } // function eliminarDir
    
        $mysqli->close();
 ?>
