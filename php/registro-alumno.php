<?php

  include '../conexion.php';

  if(isset($_POST['name']) && isset($_POST['ap']) && isset($_POST['am']) && isset($_POST['age'])){
    $nombre=$_POST['name'];
    $apellidoP=$_POST['ap'];
    $apellidoM=$_POST['am'];
    $edad=$_POST['age'];

    if($nombre == "" or $apellidoP == "" or $apellidoM == "" or $edad == "" ){
        // header("Location: ../errorPageAdmin.php");
        echo "Error al Insertar: <br> Faltaron Campos de llenar o no se enviaron los registros correctamente. <br>";
        echo "Nombre: ". $nombre;
        echo "Apellido Paterno: ". $apellidoP;  
        echo "Apellido Materno: ". $apellidoM;  
        echo "Edad: ". $edad;  
        
    }else{

        $foto = $_FILES["foto"]["name"];
        $ruta= $_FILES["foto"]["tmp_name"];
        $extension=explode('.',$_FILES['foto']['name']);
        $ext = end($extension);
        $ale1 = rand(1,999999);
        $ale2 = rand(1,999999);
        $ale3 = rand(1,999999);
        $destino ="../fotos-alumnos/".$nombre."-".$ale1."-".$ale2."-".$ale3.".".$ext;
        copy($ruta, $destino);

        $nombre = ucfirst($nombre);
        $apellidoP= ucfirst($apellidoP);
        $apellidoM= ucfirst($apellidoM);
        
        $consulta ="INSERT INTO alumno VALUES (NULL, '$nombre', '$apellidoP','$apellidoM', '$edad', '$destino')";
        $mysqli->query ($consulta) or die ($mysqli->error);
        //echo "success";
        header("Location: ../alumnos.php");
    }
  }else {
    // header("Location: ../errorPageAdmin.php");
    echo "Error al insertar: <br> Faltaron campos de llenar o no se enviaron los registros correctamente.<br>";
    echo "Nombre: ". $nombre;
    echo "Apellido Paterno: ". $apellidoP;  
    echo "Apellido Materno: ". $apellidoM;  
    echo "Edad: ". $edad;  
        
  }

?>
