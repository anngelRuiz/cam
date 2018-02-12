$(document).ready(function(){

    $('.form-control').keypress(function(){
        $('.log-status').removeClass('wrong-entry');
    });

    $('.myForm').on('submit', function(e){
        e.preventDefault();
        $.ajax({
                url:"./php/validate-login.php",
                method:"post",
                data:{
                    "email":$('#email').val(),
                    "password":$('#password').val()
                },
                success:function(e){
                    if(e=="si"){
                        location.href="./alumnos.php";
                    }else if(e=="no"){
                        $('.log-status').addClass('wrong-entry');
                        $('#wrong').fadeIn(500);
                        setTimeout( "$('#wrong').fadeOut(1500);",3000 );
                    }else {
                        $('.log-status').addClass('wrong-entry');
                        $('#fields').fadeIn(500);
                        setTimeout( "$('#fields').fadeOut(1500);",3000 );
                    }
                } // success
            }); // ajax
    }); // submit

});