<?php
    include '../conexion.php';

    // Get ID Alumno
    $idAlumno= $_POST['id'];

    //Make the path to the Alumno
    $path = "../fotos-objetos/".$idAlumno."/";  
   
    // Call function makeDir to create a Dir and save the response in a variable to print (true || false)
    $response = checkDir($idAlumno, $path);

        
    //Print the result of the funciont makeDIr to ajax
    echo $response;


    // Function to make a dir if doesnt exist
    function checkDir($id,$directory){
        if(!is_dir($directory)){
            mkdir('../fotos-objetos/'.$id.'/', 0777, true);
            return "newDir";
        }else{
            return "exist";           
        }
    }

?>