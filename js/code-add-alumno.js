$(document).ready(function(){
    /*
        Checar bien como ahacer para desablitar el boton 
        Si poner el atrr disabled o buscar otra manera de que no envie el post
    */
    //variables globales  
    var name = $("#name");  
    var ap = $("#ap");  
    var am = $("#am");  
    var age = $("#age");  
    var fp = $("#fp");

    var booleanFinish = false;

    var booleanName = false;
    var booleanAp = false;
    var booleanAm = false;
    var booleanAge = false;
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

    $("#ap").keyup(function(){
        $("#ap").removeClass('wrong-entry');
        validateAp();
        checkFinish();
        changeSumbit();
    }); // apellido paterno keyup

    $("#am").keyup(function(){
        $("#am").removeClass('wrong-entry');
        validateAm();
        checkFinish();
        changeSumbit();
    }); // apellido Materno keyup

    $("#age").keyup(function(){
        $("#age").removeClass('wrong-entry');        
        validateAge();
        checkFinish();
        changeSumbit();
    }); // Age keyup


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

    function validateAp(){ 
        //NO cumple longitud minima  
        if(ap.val().length < 2){  
            $('#form-group-ap').addClass('wrong-entry');
            $('#alertSmall').fadeIn(500);

            $('.faAP').css("visibility", "hidden");
            booleanAp = false;    
            // console.log("Ap false: " + booleanAp);
            
        }  
        //SI longitud pero NO solo caracteres A-z  
        else if(!ap.val().match(/^[a-zA-Z]+$/)){  
            $('#form-group-ap').addClass('wrong-entry');
            $('#alertEsp').fadeIn(500);

            $('.faAP').css("visibility", "hidden");
            booleanAp = false;
            // console.log("Ap false: " + booleanAp);
        }  
        // SI longitud, SI caracteres A-z  
        else{
            $('#form-group-ap').removeClass('wrong-entry');  
            $('#alertSmall').hide();
            $('#alertEsp').hide();

            $('.faAP').css("visibility", "visible");
            booleanAp = true;
            // console.log("Ap true: " + booleanAp);
        }  
    } // validate Ap

    function validateAm(){ 
        //NO cumple longitud minima  
        if(am.val().length < 2){  
            $('#form-group-am').addClass('wrong-entry');
            $('#alertSmall').fadeIn(500);
            booleanAm = false;
            // console.log("Am false: " + booleanAm);
            $('.faAM').css("visibility", "hidden");
            
        }  
        //SI longitud pero NO solo caracteres A-z  
        else if(!am.val().match(/^[a-zA-Z]+$/)){  
            $('#form-group-am').addClass('wrong-entry');
            $('#alertEsp').fadeIn(500);
            booleanAm = false;
            // console.log("Am false: " + booleanAm);
            $('.faAM').css("visibility", "hidden");
        }  
        // SI longitud, SI caracteres A-z  
        else{
            $('#form-group-am').removeClass('wrong-entry');  
            $('#alertSmall').hide();
            $('#alertEsp').hide();
            booleanAm = true;
            // console.log("Am true: " + booleanAm);
            $('.faAM').css("visibility", "visible");
        }  
    } // validate Ap

    function validateAge(){
        var regex=/^[a-zA-Z]+$/;
        var numbers = /^[0-9]+$/;
        if(!isNaN(age.val())){
            if(age.val() <= 0 || age.val() > 99){  
                $('#form-group-age').addClass('wrong-entry');
                $('#alertAge').fadeIn(500); 
                booleanAge = false;
                // console.log("Edad false: " + booleanAge);
                $('.faAge').css("visibility", "hidden");
            }else {
                booleanAge = true;                        
                $('#alertAge').hide();
                $('#alertNumber').hide();
                $('#form-group-age').removeClass('wrong-entry');
                // console.log("Edad true: " + booleanAge);
                $('.faAge').css("visibility", "visible");
                                        
            } // age length
        }else{
            $('#form-group-age').addClass('wrong-entry');
            $('#alertNumber').fadeIn(500);
            booleanAge = false;
            $('.faAge').css("visibility", "hidden");
        }
    }

    

    function checkFinish(){
        if(booleanName && booleanAp && booleanAm && booleanAge && booleanPhoto == true){
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