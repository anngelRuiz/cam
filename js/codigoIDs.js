$(document).ready(function(){
    
    $id_alumno = $_REQUEST['id'];
    
    $.ajax({
        url:"./php/insert-init.php",
        method:"post",
        data:{
          "idAlm":$id_alumno
        }
    }); // ajax


}); // document. Ready

