<?php

  include '../conexion.php';

  if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['p1']) && isset($_POST['p2'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $p1=$_POST['p1'];
    $p2=$_POST['p2'];

    if($name == "" or $email == "" or $p1 == "" or $p2 ==""){
        echo "campos";
    }else {
      if($_POST['p1'] == $_POST['p2']){
        $name = $_POST['name'];
        $email =$_POST['email'];
        $p1 = sha1($_POST['p1']);
        $consulta ="INSERT INTO admin VALUES (NULL, '$name', '$email', '$p1')";
        $mysqli->query ($consulta) or die ($mysqli->error);
        // header("Location: ../index.php");
        echo "si";
      }else {
        echo "contra";
      }
    }
  }else {
    echo "campos";
  }

?>
