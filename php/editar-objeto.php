<?php

  include '../conexion.php';

  if(isset($_POST['nombre']) && isset($_POST['precio']) && isset($_POST['puntos'])){

    $id_objeto = $_REQUEST['id'];
    
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

        $respuesta= $mysqli->query("SELECT ID_ALUMNO,IMAGEN FROM objetos WHERE ID_OBJETO='$id_objeto'") or die ($mysqli->error);
        $fila=mysqli_fetch_array($respuesta);
        
        $id_alumno=$fila['ID_ALUMNO'];

        $foto = $fila['IMAGEN'];
        $destino =$foto;
        @unlink($destino);

        $foto2 = $_FILES["foto"]["name"];
        $ruta2= $_FILES["foto"]["tmp_name"];
        $extension=explode('.',$_FILES['foto']['name']);
        $ext = end($extension);
        $ale1 = rand(1,999999);
        $ale2 = rand(1,999999);
        $ale3 = rand(1,999999);
        $destino2 ="../fotos-objetos/".$id_alumno."/".$objeto."-".$ale1."-".$ale2."-".$ale3.".".$ext;
        copy($ruta2, $destino2);

        $consulta = "UPDATE objetos SET  OBJETO='$objeto' , PRECIO='$precio', PUNTOS='$puntos', IMAGEN='$destino2' WHERE ID_OBJETO='$id_objeto'";

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
