$(document).ready(function(){
    /*
        Checar bien como ahacer para desablitar el boton 
        Si poner el atrr disabled o buscar otra manera de que no envie el post
    */
    //variables globales  
    var name = $("#name");  
    var precio = $("#precio");  
    var puntos = $("#puntos");  
    var fp = $("#fp");

    var booleanFinish = false;

    var booleanName = true;
    var booleanPrecio = true;
    var booleanPuntos= true;
    var booleanPhoto = false;

    $("form").submit(function(e){
        if(booleanFinish != true){
            e.preventDefault(e);
            $('#alertFinish').fadeIn(1500);         
        }
    });

         
    $("#name").keyup(function(){
        $("#name").removeClass('wrong-entry');        
        validateName();
        checkFinish();
        changeSumbit();
    }); // name keyup

    $("#precio").keyup(function(){
        $("#precio").removeClass('wrong-entry');
        validatePrecio();
        checkFinish();
        changeSumbit();
    }); // apellido paterno keyup

    $("#puntos").keyup(function(){
        $("#puntos").removeClass('wrong-entry');
        validatePuntos();
        checkFinish();
        changeSumbit();
    }); // apellido Materno keyup


    $('#btnSend').mouseover(function(){
        if(booleanFinish == false){
            $('#alertFinish').fadeIn(1500); 
        }else{
            $('#btnSend').css("background-color","rgb(48, 123, 185)");
        }
    });

    $('#btnSend').mouseout(function(){
        if(booleanFinish == false){
            $('#alertFinish').fadeOut(2000); 
        }else{
            $('#btnSend').css("background-color","rgb(48, 123, 185)");
        }
    });

            // validate photo
    $('INPUT[type="file"]').change(function () {
        var ext = this.value.match(/\.(.+)$/)[1];
        switch (ext) {

            case 'jpg':
            case 'jpeg':
            case 'png':
                // console.log("Imagen aceptada");
                $('#form-group-fp').removeClass('wrong-entry');
                $('#alertPhoto').hide();
                booleanPhoto = true;                
                checkFinish();
                changeSumbit();
                // console.log("Photo true: " + booleanPhoto);
                $('.faPhoto').css("visibility", "visible");
                
                break;

            default:
                $('#form-group-fp').addClass('wrong-entry');
                $('#alertPhoto').fadeIn(500);
                this.value = '';
                booleanPhoto = false;
                // console.log("Photo en false: " + booleanPhoto);
                $('.faPhoto').css("visibility", "hidden");
        }
    });     // ./ validate photo




    //funciones de validacion  
    function validateName(){ 
        //NO cumple longitud minima  
        if(name.val().length < 2){  
            $('#form-group-name').addClass('wrong-entry');
            $('#alertSmall').fadeIn(500); 
            $('.faName').css("visibility", "hidden"); 
            booleanName = false;
            console.log("Nombre false: " + booleanName);
        }  
        //SI longitud pero NO solo caracteres A-z  
        else if(!name.val().match(/^[a-zA-Z]+$/)){  
            $('#form-group-name').addClass('wrong-entry');
            $('#alertEsp').fadeIn(500);
            booleanName = false;
            console.log("Nombre false: " + booleanName);
            $('.faName').css("visibility", "hidden");
        }  
        // SI longitud, SI caracteres A-z  
        else{
            $('#form-group-name').removeClass('wrong-entry');  
            $('#alertSmall').hide();
            $('#alertEsp').hide();

            $('.faName').css("visibility", "visible");
            booleanName = true;
            console.log("Nombre true: " + booleanName);
        }  
    } // validate Name

    function validatePrecio(){
        var regex=/^[a-zA-Z]+$/;
        var numbers = /^[0-9]+$/;
        if(!isNaN(precio.val())){
            if(precio.val() <= 0 || precio.val() > 99999){  
                $('#form-group-precio').addClass('wrong-entry');
                $('#alertWrong').fadeIn(500); 
                booleanPrecio = false;
                // console.log("Edad false: " + booleanAge);
                $('.faPrecio').css("visibility", "hidden");
            }else {
                booleanPrecio = true;                        
                $('#alertWrong').hide();
                $('#alertNumber').hide();
                $('#form-group-precio').removeClass('wrong-entry');
                // console.log("Edad true: " + booleanAge);
                $('.faPrecio').css("visibility", "visible");
                                        
            } // age length
        }else{
            $('#form-group-precio').addClass('wrong-entry');
            $('#alertNumber').fadeIn(500);
            booleanPrecio = false;
            $('.faPrecio').css("visibility", "hidden");
        }
    }

    function validatePuntos(){
        var regex=/^[a-zA-Z]+$/;
        var numbers = /^[0-9]+$/;
        if(!isNaN(puntos.val())){
            if(puntos.val() <= 0 || puntos.val() > 99999){  
                $('#form-group-puntos').addClass('wrong-entry');
                $('#alertWrong').fadeIn(500); 
                booleanPuntos = false;
                // console.log("Edad false: " + booleanAge);
                $('.faPuntos').css("visibility", "hidden");
            }else {
                booleanPuntos = true;                        
                $('#alertWrong').hide();
                $('#alertNumber').hide();
                $('#form-group-puntos').removeClass('wrong-entry');
                // console.log("Edad true: " + booleanAge);
                $('.faPuntos').css("visibility", "visible");
                                        
            } // age length
        }else{
            $('#form-group-puntos').addClass('wrong-entry');
            $('#alertNumber').fadeIn(500);
            booleanPuntos = false;
            $('.faPuntos').css("visibility", "hidden");
        }
    }

    

    function checkFinish(){
        if(booleanName && booleanPrecio && booleanPuntos && booleanPhoto == true){
            booleanFinish = true;
        }else{
            booleanFinish = false;
        }
    }

    function changeSumbit(){
        if(booleanFinish == true){
            $('#btnSend').css("background-color","rgb(48, 123, 185)");
        }else{
            $('#btnSend').css("background-color","rgb(83, 84, 85)");      
        }
    }

});