<?php

  include '../conexion.php';

  if(isset($_POST['name']) && isset($_POST['ap']) && isset($_POST['am']) && isset($_POST['age'])){
      $nombre=$_POST['name'];
      $apellidoP=$_POST['ap'];
      $apellidoM=$_POST['am'];
      $edad=$_POST['age'];

      $id_alumno = $_REQUEST['id'];

      if($nombre == "" or $apellidoP == "" or $apellidoM == "" or $edad == "" ){
        echo "Error al Editar: <br> Faltaron Campos de llenar o no se enviaron los registros correctamente. <br>";
        echo "Nombre: ". $nombre;
        echo "Apellido Paterno: ". $apellidoP;  
        echo "Apellido Materno: ". $apellidoM;  
        echo "Edad: ". $edad;  
        
      }else{

        $respuesta= $mysqli->query("SELECT FOTO FROM alumno WHERE ID_ALUMNO='$id_alumno'") or die ($mysqli->error);

        $fila=mysqli_fetch_array($respuesta);

        $foto = $fila['FOTO'];
        $destino =$foto;
        // delete($destino);
        @unlink($destino);

        $foto2 = $_FILES["foto"]["name"];
        $ruta2= $_FILES["foto"]["tmp_name"];
        $extension=explode('.',$_FILES['foto']['name']);
        $ext = end($extension);
        $ale1 = rand(1,999999);
        $ale2 = rand(1,999999);
        $ale3 = rand(1,999999);
        $destino2 ="../fotos-alumnos/".$nombre."-".$ale1."-".$ale2."-".$ale3.".".$ext;
        copy($ruta2, $destino2);

        $nombre = ucfirst($nombre);
        $apellidoP= ucfirst($apellidoP);
        $apellidoM= ucfirst($apellidoM);

        $consulta = "UPDATE alumno SET  NOMBRE='$nombre' , APELLIDO_P='$apellidoP', APELLIDO_M='$apellidoM', EDAD='$edad', FOTO='$destino2' WHERE ID_ALUMNO='$id_alumno'";

        $mysqli->query ($consulta) or die ($mysqli->error);
        header("Location: ../alumnos.php");
      }

  } else {
    echo "Error al Editar: <br> Faltaron campos de llenar o no se enviaron los registros correctamente.<br>";
    echo "Nombre: ". $nombre;
    echo "Apellido Paterno: ". $apellidoP;  
    echo "Apellido Materno: ". $apellidoM;  
    echo "Edad: ". $edad;  
  }

 ?>
