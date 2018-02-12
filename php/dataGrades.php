<?php
    include("../conexion.php");

    //query to get data from the table
    $query = sprintf("SELECT nombre, puntacion FROM puntaciones ORDER BY id_puntacion DESC LIMIT 1;");

    //execute query
    $result = $mysqli->query($query);

    //loop through the returned data
    $data = array();
    foreach ($result as $row) {
        $data[] = $row;
    }

    //free memory associated with result
    $result->close();

    //close connection
    $mysqli->close();

    //now print the data
    print json_encode($data);

?>