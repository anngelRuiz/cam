<?php
session_start();
include '../conexion.php';

  if(isset($_POST['email']) && isset($_POST['password'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    

    if($email == "" or $password == "" ){
      echo "falto";

    }else{
      $password=sha1($_POST['password']);
      $consulta= "SELECT * FROM admin WHERE email='$email' and password='$password' ";
      $respuesta=$mysqli->query($consulta) or die ($mysqli->error);

      if(mysqli_num_rows($respuesta)==0){
      echo "no";

      }else{
          while($fila=mysqli_fetch_array($respuesta)){
            $id_admin=$fila['id_admin'];            
            $email = $fila['email'];
            $_SESSION['miSesion']=array('email'=>$email,'id_admin'=>$id_admin);
            // header("Location: ./admin.php");
            echo "si";
        }
      }
    }
  }

?>