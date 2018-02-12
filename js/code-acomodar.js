var dineroKey;

var v = document.createElement("audio");

$(document).ready(function(){


    /**Cantidad selecionada */
    $('#centavos').on('click', function(){
        setDineroKey(0.5);
        setModals(); 
        $('#pop-name-object').text("Ducle Pequeño");  
        $('#pop-price').text("$0.5");  
        $('#pop-img').attr('src', './img-acomodar/toffee.png');
        $('#pop-img-win').attr('src', './img-acomodar/toffee.png');
        
                                    
    });

    $('#1peso').on('click', function(){
        setDineroKey(1);
        setModals(); 
        $('#pop-name-object').text("Dulce Chocolate");  
        $('#pop-price').text("$1");  
        $('#pop-img').attr('src', './img-acomodar/candy.png');
        $('#pop-img-win').attr('src', './img-acomodar/candy.png');          
        
    });

    $('#2pesos').on('click', function(){
        setDineroKey(2);
        setModals(); 
        $('#pop-name-object').text("Galleta");  
        $('#pop-price').text("$2");  
        $('#pop-img').attr('src', './img-acomodar/gingerbread.png');
        $('#pop-img-win').attr('src', './img-acomodar/gingerbread.png');          
        
    });

    $('#5pesos').on('click', function(){
        setDineroKey(5);  
        setModals();  
        $('#pop-name-object').text("Dona");  
        $('#pop-price').text("$5");  
        $('#pop-img').attr('src', './img-acomodar/doughnut.png'); 
        $('#pop-img-win').attr('src', './img-acomodar/doughnut.png');       
        
    });

    $('#10pesos').on('click', function(){
        setDineroKey(10); 
        setModals();  
        $('#pop-name-object').text("Helado");  
        $('#pop-price').text("$10");  
        $('#pop-img').attr('src', './img-acomodar/ice-cream.png');
        $('#pop-img-win').attr('src', './img-acomodar/ice-cream.png');        
        
    });

    $('#20bill').on('click', function(){
        setDineroKey(20);
        setModals(); 
        $('#pop-name-object').text("Hamburguesa");  
        $('#pop-price').text("$20");  
        $('#pop-img').attr('src', './img-acomodar/hamburguer.png');   
        $('#pop-img-win').attr('src', './img-acomodar/hamburguer.png');          
        
    });

    $('#50tabill').on('click', function(){
        setDineroKey(50); 
        setModals();   
        $('#pop-name-object').text("Abaco");  
        $('#pop-price').text("$50");  
        $('#pop-img').attr('src', './img-acomodar/abacus.png'); 
        $('#pop-img-win').attr('src', './img-acomodar/abacus.png');       
        
    });

    $('#100bill').on('click', function(){
        setDineroKey(100);
        setModals(); 
        $('#pop-name-object').text("Jueguete carrito");  
        $('#pop-price').text("$100");  
        $('#pop-img').attr('src', './img-acomodar/car.png'); 
        $('#pop-img-win').attr('src', './img-acomodar/car.png');          
        
    });

    $('#200bill').on('click', function(){
        setDineroKey(200);
        setModals();  
        $('#pop-name-object').text("Consola de Mini Juegos");  
        $('#pop-price').text("$200");  
        $('#pop-img').attr('src', './img-acomodar/game-console.png');   
        $('#pop-img-win').attr('src', './img-acomodar/game-console.png');         
        
    });

    $('#500bill').on('click', function(){
        setDineroKey(500);
        setModals(); 
        $('#pop-name-object').text("Audifonos");  
        $('#pop-price').text("$500");  
        $('#pop-img').attr('src', './img-acomodar/headset.png');
        $('#pop-img-win').attr('src', './img-acomodar/headset.png');                  
    });


    /**Moendas respuesta */
    $('.monedacin').on('click', function(){
        $('#message-alert').hide();        
        checkRes(0.5);
    });

    $('.monenda1').on('click', function(){
        $('#message-alert').hide(); 
        checkRes(1);
    });

    $('.monenda2').on('click', function(){
        $('#message-alert').hide(); 
        checkRes(2);
    });

    $('.monenda5').on('click', function(){
        $('#message-alert').hide(); 
        checkRes(5);
    });

    $('.monenda10').on('click', function(){
        $('#message-alert').hide(); 
        checkRes(10);
    });


    /* Billetes respuesta */
    $('.billete20').on('click', function(){
        $('#message-alert').hide(); 
        checkRes(20);
    });

    $('.billete50').on('click', function(){
        $('#message-alert').hide(); 
        checkRes(50);
    });

    $('.billete100').on('click', function(){
        $('#message-alert').hide(); 
        checkRes(100);
    });

    $('.billete200').on('click', function(){
        $('#message-alert').hide(); 
        checkRes(200);
    });

    $('.billete500').on('click', function(){
        $('#message-alert').hide(); 
        checkRes(500);
    });


});

function setDineroKey(cantidad){
    dineroKey = cantidad;
}

function checkRes(dinero){
    if( dinero == dineroKey){
        $('#wrapper-main').hide();
        $('.box-message').fadeIn();
        v.src = "./audio/done.wav";
        v.play();
    }else {
        $('#message-alert').fadeIn('slow');
        $('#message-alert').addClass('wrong-money');
        
    }
}

function setModals(){
    $('#wrapper-main').fadeIn();
    $('.box-message').hide(); 
}