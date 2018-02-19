<?php

        $nombreusuario="root";
        $ps="";
        $servidor="localhost";
        $basedatos="cam";

        $mysqli = new mysqli($servidor, $nombreusuario, $ps, $basedatos);
        if($mysqli->connect_error) {
          die ('No se pudo conectar' .mysqli_connect_error());
        }

 ?>
