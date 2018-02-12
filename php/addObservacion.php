<?php

  include '../conexion.php';

  if(isset($_POST['id']) && isset($_POST['dc']) && isset($_POST['fecha'])){
    $id_alumno=$_POST['id'];
    $dc=$_POST['dc'];
    $fecha=$_POST['fecha'];


    if($id_alumno == "" or $dc == "" or $fecha == ""){
        echo "Favor de llenar todos los campos i";
    }else{

        $consulta ="INSERT INTO observaciones VALUES (NULL, '$id_alumno', '$dc','$fecha')";
        $mysqli->query ($consulta) or die ($mysqli->error);
        header("Location: ../observaciones.php");
    }
  }else {
    echo "Favor de llenar todos los campos primero e";
  }
