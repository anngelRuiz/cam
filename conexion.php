<?php

        $nombreusuario="u861415918_root";
        $ps="root1234";
        $servidor="localhost";
        $basedatos="u861415918_cam";

        // mysqli_select_db("subir_foto");

        $mysqli = new mysqli($servidor, $nombreusuario, $ps, $basedatos);
        if($mysqli->connect_error) {
          die ('No se pudo conectar' .mysqli_connect_error());
        }

 ?>
