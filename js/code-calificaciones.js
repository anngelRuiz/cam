$(document).ready(function(){
    
    var my_id_value;
    $(".identifyingClass").click(function () {
        my_id_value = $(this).data('id');
        var valueAtrr = "./eliminar-calificaciones.php?idAlumno="+ my_id_value; 
        $("#hiddenValue").attr("href", valueAtrr);
    }) // ./ btn eliminar click

    
    $('#hiddenValue').on('click', function(e){
        e.preventDefault();
        var urlPHP= document.getElementById("hiddenValue").getAttribute("href");

        var valueID = my_id_value;
        var idString = valueID.toString();

        var rowToDelete = '#'+idString;
        
        $.ajax({
                url:"./php/eliminar-calificacion.php",
                method:"POST",
                data: {'id': my_id_value},
                success:function(e){
                    if(e=="success"){
                        // location.href="./alumnos.php";
                        $('#alert').html('');
                        $('.fade').hide();

                        remover: $(rowToDelete).fadeOut('slow', function() {$(rowToDelete).remove();});

                        $('.alert').css("background-color", "#47a8f5");

                        $('#alert').append('<strong>Exito!</strong> Operacion realizada ! <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span>');


                        $('.alert').fadeIn(500);
                        setTimeout( "$('.alert').fadeOut(2500);",4000);
                    }else if(e=="error"){
                        $('#alert').html('');
                        $('.fade').hide(); 
                        $('.alert').css("background-color", "#f44336");
                        
                        $('#alert').append('<strong>Error!</strong> No se pudo eliminar correctamente ! <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span>');
                        

                        $('.alert').fadeIn(500);
                        setTimeout( "$('.alert').fadeOut(2500);",4000);
                    }else {
                        $('#alert').html('');
                        $('.fade').hide();   
                        $('.alert').css("background-color", "#f44336");
                        
                        $('#alert').append('<strong>Error!</strong> No se pudo eliminar correctamente ! <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span>');
                        

                        $('.alert').fadeIn(500);
                        setTimeout( "$('.alert').fadeOut(2500);",4000);
                    }
                }, // success
                error:function(){
                    location.href="../errorPageAdmin.php";           
                } // error
            }); // ajax
        }); // submit

}); // ./ document.ready 
