<?php

  include '../conexion.php';

  if(isset($_POST['nombre']) && isset($_POST['precio']) && isset($_POST['puntos'])){

    $id_alumno = $_REQUEST['id'];

    $objeto=$_POST['nombre'];
    $precio=$_POST['precio'];
    $puntos=$_POST['puntos'];

    if($objeto == "" or $precio == "" or $puntos == "" ){
        // header("Location: ../errorPageAdmin.php");
        echo "Error al Insertar: <br> Faltaron Campos de llenar o no se enviaron los registros correctamente. <br>";
        echo "Objeto: ". $objeto;
        echo "Precio: ". $precio;  
        echo "Puntos: ". $puntos;
          
    }else{
        mkdir('../fotos-objetos/'.$id_alumno.'/', 0777, true);
        $alumnoCarpeta = "../fotos-objetos/".$id_alumno."/";

        $foto = $_FILES["foto"]["name"];
        $ruta= $_FILES["foto"]["tmp_name"];

        $extension=explode('.',$_FILES['foto']['name']);
        $ext = end($extension);
        $ale1 = rand(1,999999);
        $ale2 = rand(1,999999);
        $ale3 = rand(1,999999);

        $destino =$alumnoCarpeta.$objeto."-".$ale1."-".$ale2."-".$ale3.".".$ext;
        copy($ruta, $destino);
        $objeto = ucfirst($objeto);
        $consulta ="INSERT INTO objetos VALUES (NULL, '$id_alumno','$objeto', '$precio','$puntos',0,'$destino')";
        $mysqli->query ($consulta) or die ($mysqli->error);
        header("Location: ./objetos.php?id=".$id_alumno);
     }
  }else {
    echo "Error al Insertar: <br> Faltaron Campos de llenar o no se enviaron los registros correctamente. <br>";
    echo "Objeto: ". $objeto;
    echo "Precio: ". $precio;  
    echo "Puntos: ". $puntos;
  }

?>
