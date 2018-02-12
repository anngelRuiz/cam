<?php

	include("../conexion.php");
	
	header('Content-Type: application/json');


	//query to get data from the table
	$query = sprintf("SELECT nombre, puntuacion FROM high_score ORDER BY id_alumno;");

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