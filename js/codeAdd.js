$(document).ready(function(){

    $('.form-control').keypress(function(){
        $('.log-status').removeClass('wrong-entry');
    });

    $('.login-form').on('submit', function(e){
        e.preventDefault();
        $.ajax({
                url:"./php/add-admin.php",
                method:"post",
                data:{
                    "name":$('#name').val(),
                    "email":$('#email').val(),
                    "p1":$('#pw1').val(),
                    "p2":$('#pw2').val()
                },
                success:function(e){
                    if(e=="si"){
                        location.href="./index.php";
                    }else if(e=="contra"){
                        $('.pws').addClass('wrong-entry');
                        $('#pw').fadeIn(500);
                        setTimeout( "$('#pw').fadeOut(1500);",3000 );
                    }else {
                        $('.log-status').addClass('wrong-entry');
                        $('#campos').fadeIn(500);
                        setTimeout( "$('#campos').fadeOut(1500);",3000 );
                    }
                } // success
            }); // ajax
    }); // submit

});
