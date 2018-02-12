var v = document.createElement("audio");

var contenedor = document.getElementById("pagoPos");
var labelDinero = document.getElementById("dineroTotal");

var countBills = 0;
var max = 18;
var dinero = 0;
var change;
var errores = 0;
var maxErrores = 4;
var idItem  = 0;
var idAlumno = 0;

window.addEventListener("load", function(){
  setTimeout(timedOut, 400 );
  setTimeout(audioIniciar, 650 );
  // audioIniciar();
  
});

// $(document).ready(function(){
//     audioIniciar();
// });

function timedOut() {
  var load_screen = document.getElementById("load_screen");
  $('#load_screen').fadeOut();
}

function Calcular(precio,idObjeto,idboy){
  idItem = idObjeto;
  idAlumno = idboy;

  if(dinero == precio){
    FireWorks();

  }else if (dinero > precio){
    change =dinero - precio;
    // alert(change);
    // alert("Te sobra dinero, selecciona la opcion");
    setTimeout( "$('.contMensajes').show('slow');", 300);
    $('#btnCalcular').hide('500');

    $("#contMensajes").css("background-color","rgba(24, 121, 115, 1)");
    $("#imgContentCaption").css("background-color","#929191");


    $('#contMensajesId p').text('Te sobra dinero, selecciona la opcion con la cantidad que te sobra!');
    $('#imgCaption').attr('src','../img-detalles/wallet.svg');

    $('.opcioneAle').show(130);

    var opcionCorrecta = Math.round(Math.random() * 3) + 1;
    // console.log("Div: " + opcionCorrecta);

    v.src = "../audio/sobra.wav";
    v.play();

    var ale1 ;
    var ale2 ;
    var ale3 ;
    var aleatorios = new Array(5);
    for(i=0; i<5; i++){
      aleatorios[i]= Math.round(Math.random() * precio) +1;
    }
        for(i = 1; i<=4; i++){
          if(i!=opcionCorrecta ){
                $('#opcion'+i).text("$"+ aleatorios[i]);
                $('#opcion'+i).val(aleatorios[i]);
                // console.log("Arreglo " + i + ": "+aleatorios[i]);
          }
          $('#opcion'+opcionCorrecta).text("$"+ (dinero-precio));
          $('#opcion'+opcionCorrecta).val(dinero-precio);
        }

  }else{
    // alert("Te falta dinero");
    errores +=1;
    maxErrors(errores,idAlumno,idItem);
    $('.contMensajes').hide();
    setTimeout( "$('.contMensajes').show('slow');", 300);

    $("#contMensajes").css("background-color","rgb(164, 69, 69)");
    // $("#imgContentCaption").css("background-color","#e1d4d6");
    $("#imgContentCaption").css("background-color","#26769f");

    $('#contMensajesId p').text('Te falta mas dinero!');
    $('#imgCaption').attr('src','../img-detalles/change.svg');

    v.src = "../audio/falta.wav";
    v.play();

    
  }
}

function Respuesta(res){
  // alert("Cambio: "+ change)
  // alert("Valor: "+ res)
    if(res == change){
      FireWorks();
    }else{
      errores +=1;
      maxErrors(errores,idAlumno,idItem);
      $('.contMensajes').hide('fast');
      setTimeout( "$('.contMensajes').show('slow');", 300);

      $("#contMensajes").css("background-color","rgb(164, 69, 69)");
      // $("#imgContentCaption").css("background-color","#e1d4d6");
      $("#imgContentCaption").css("background-color","rgba(0, 0, 0, 0)");
      $("#imgContentCaption").css("border-radius","0px");
      $("#imgContentCaption").css("border","none");


      $('#contMensajesId p').text('Opcion Incorrecta! Selecciona otra opcion');
      $('#imgCaption').attr('src','../img-detalles/inco3.svg');

      v.src = "../audio/incorrecto.wav";
      v.play();
    }

}

function FireWorks(){
  $('.contMensajes').hide();
  $('#btn-erase').hide();
  setTimeout( "$('#canvas').show('fast');", 500);
  setTimeout( "$('#mensajeFelicidaes').show('fast');", 500);
  setTimeout( "$('#containerItem').show('fast');", 500);
  setTimeout( "$('#contSalida').show('fast');", 500);

  v.src = "../audio/comprado.wav";
  v.play();

  // alert("Numero de errores: " + errores);
  // var variableToSend = 'foo';
  // $.post('file.php', {variable: variableToSend});


  $.ajax({
      url:"./insertCompra.php",
      method:"post",
      data:{
        "idOb":idItem,
        "idAlm":idAlumno,
        "errores": errores
      }
      // success:function(e){
      //     alert(e);
      // }
  });

}

function maxErrors(num, id_ninio,idOb){
  if(num>=4){

    $.ajax({
      url:"./insert-lose.php",
      method:"post",
      data:{
        "idOb":idOb,
        "idAlm":id_ninio
      },
      success:function(e){
        location.href="./maxErrors.php?id="+id_ninio;
      }
  }); // ajax

  } // if

      // location.href="./insert-lose.php?id="+id_ninio;

    // location.href="./maxErrors.php?id="+id_ninio;
}

function audioIniciar(){
  v.src = "../audio/elijeDinero.wav";
  v.play();
}

document.getElementById("billetes500").onclick= function(){
  countBills +=1;
  dinero +=500;

  // console.log(dinero);
  // console.log(countBills);


  if(countBills <= max) {
    var div = document.createElement('div');
    div.id = "billetes";
    div.className= "billete500";
    contenedor.insertBefore(div, contenedor.firstChild);
    labelDinero.innerHTML = "$" +dinero;
  }else {
    console.log("Son demasiados billetes");

  }

}



$('#btn-erase').on('click', function(){
  erase();  
});

function erase(){
  $('#pagoPos').html('');
  dinero = 0;
  labelDinero.innerHTML = "$" +dinero;
}

document.getElementById("billetes200").onclick= function(){
  countBills +=1;
  dinero +=200;

  // console.log(dinero);
  // console.log(countBills);

  if(countBills <= max) {
    var div = document.createElement('div');
    div.id = "billetes";
    div.className= "billete200";
    contenedor.insertBefore(div, contenedor.firstChild);
    labelDinero.innerHTML = "$" +dinero;

  }else {
    console.log("Son demasiados billetes");

  }


}

document.getElementById("billetes100").onclick= function(){

  dinero +=100;
  console.log(dinero);

  countBills +=1;
  console.log(countBills);

  if(countBills <= max) {
    var div = document.createElement('div');
    div.id = "billetes";
    div.className= "billete100";
    contenedor.insertBefore(div, contenedor.firstChild);
    labelDinero.innerHTML = "$" +dinero;

  }else {
    console.log("Son demasiados billetes");

  }
}

document.getElementById("billetes50").onclick= function(){

  dinero +=50;
  console.log(dinero);

  countBills +=1;
  console.log(countBills);

  if(countBills <= max) {
    var div = document.createElement('div');
    div.id = "billetes";
    div.className= "billete50";
    contenedor.insertBefore(div, contenedor.firstChild);
    labelDinero.innerHTML = "$" +dinero;

  }else {
    console.log("Son demasiados billetes");

  }
}

document.getElementById("billetes20").onclick= function(){

  dinero +=20;
  console.log(dinero);

  countBills +=1;
  console.log(countBills);

  if(countBills <= max) {
    var div = document.createElement('div');
    div.id = "billetes";
    div.className= "billete20";
    contenedor.insertBefore(div, contenedor.firstChild);
    labelDinero.innerHTML = "$" +dinero;

  }else {
    console.log("Son demasiados billetes");

  }

}

document.getElementById("moneda10").onclick= function(){
  dinero +=10;
  console.log(dinero);

  countBills +=1;
  console.log(countBills);

  if(countBills <= max) {
    var div = document.createElement('div');
    div.id = "monedas";
    div.className= "moneda10";
    contenedor.insertBefore(div, contenedor.firstChild);
    labelDinero.innerHTML = "$" +dinero;

  }else {
    console.log("Son demasiados billetes");
  }
}

document.getElementById("moneda5").onclick= function(){
  dinero +=5;
  console.log(dinero);

  countBills +=1;
  console.log(countBills);

  if(countBills <= max) {
    var div = document.createElement('div');
    div.id = "monedas";
    div.className= "moneda5";
    contenedor.insertBefore(div, contenedor.firstChild);
    labelDinero.innerHTML = "$" +dinero;

  }else {
    console.log("Son demasiados billetes");
  }
}

document.getElementById("moneda2").onclick= function(){
  dinero +=2;
  console.log(dinero);

  countBills +=1;
  console.log(countBills);

  if(countBills <= max) {
    var div = document.createElement('div');
    div.id = "monedas";
    div.className= "moneda2";
    contenedor.insertBefore(div, contenedor.firstChild);
    labelDinero.innerHTML = "$" +dinero;

  }else {
    console.log("Son demasiados billetes");
  }
}

document.getElementById("moneda1").onclick= function(){
  dinero +=1;
  console.log(dinero);

  countBills +=1;
  console.log(countBills);

  if(countBills <= max) {
    var div = document.createElement('div');
    div.id = "monedas";
    div.className= "moneda1";
    contenedor.insertBefore(div, contenedor.firstChild);
    labelDinero.innerHTML = "$" +dinero;

  }else {
    console.log("Son demasiados billetes");
  }
}

document.getElementById("monedacinc").onclick= function(){
  dinero +=0.5;
  console.log(dinero);

  countBills +=1;
  console.log(countBills);

  if(countBills <= max) {
    var div = document.createElement('div');
    div.id = "monedas";
    div.className= "monedacinc";
    contenedor.insertBefore(div, contenedor.firstChild);
    labelDinero.innerHTML = "$" +dinero;

  }else {
    console.log("Son demasiados billetes");
  }
}





// **********************************************************************
$(function() {
	var canvas = $('#canvas')[0];
	canvas.width = $(window).width();
	canvas.height = $(window).height();
	var ctx = canvas.getContext('2d');

	// resize
	$(window).on('resize', function() {
		canvas.width = $(window).width();
		canvas.height = $(window).height();
		ctx.fillStyle = '#000';
		ctx.fillRect(0, 0, canvas.width, canvas.height);
	});

	// init
	ctx.fillStyle = '#000';
	ctx.fillRect(0, 0, canvas.width, canvas.height);
	// objects
	var listFire = [];
	var listFirework = [];
	var fireNumber = 20;
	var center = { x: canvas.width / 2, y: canvas.height / 2 };
	var range = 550;
	for (var i = 0; i < fireNumber; i++) {
		var fire = {
			x: Math.random() * range / 2 - range / 4 + center.x,
			y: Math.random() * range * 2 + canvas.height,
			size: Math.random() + 0.5,
			fill: '#fd1',
			vx: Math.random() - 0.5,
			vy: -(Math.random() + 4),
			ax: Math.random() * 0.02 - 0.01,
			far: Math.random() * range + (center.y - range)
		};
		fire.base = {
			x: fire.x,
			y: fire.y,
			vx: fire.vx
		};
		//
		listFire.push(fire);
	}

	function randColor() {
		var r = Math.floor(Math.random() * 256);
		var g = Math.floor(Math.random() * 256);
		var b = Math.floor(Math.random() * 256);
		var color = 'rgb($r, $g, $b)';
		color = color.replace('$r', r);
		color = color.replace('$g', g);
		color = color.replace('$b', b);
		return color;
	}

	(function loop() {
		requestAnimationFrame(loop);
		update();
		draw();
	})();

	function update() {
		for (var i = 0; i < listFire.length; i++) {
			var fire = listFire[i];
			//
			if (fire.y <= fire.far) {
				// case add firework
				var color = randColor();
				for (var i = 0; i < fireNumber * 5; i++) {
					var firework = {
						x: fire.x,
						y: fire.y,
						size: Math.random() + 1.5,
						fill: color,
						vx: Math.random() * 5 - 2.5,
						vy: Math.random() * -5 + 1.5,
						ay: 0.05,
						alpha: 1,
						life: Math.round(Math.random() * range / 2) + range / 2
					};
					firework.base = {
						life: firework.life,
						size: firework.size
					};
					listFirework.push(firework);
				}
				// reset
				fire.y = fire.base.y;
				fire.x = fire.base.x;
				fire.vx = fire.base.vx;
				fire.ax = Math.random() * 0.02 - 0.01;
			}
			//
			fire.x += fire.vx;
			fire.y += fire.vy;
			fire.vx += fire.ax;
		}

		for (var i = listFirework.length - 1; i >= 0; i--) {
			var firework = listFirework[i];
			if (firework) {
				firework.x += firework.vx;
				firework.y += firework.vy;
				firework.vy += firework.ay;
				firework.alpha = firework.life / firework.base.life;
				firework.size = firework.alpha * firework.base.size;
				firework.alpha = firework.alpha > 0.6 ? 1 : firework.alpha;
				//
				firework.life--;
				if (firework.life <= 0) {
					listFirework.splice(i, 1);
				}
			}
		}
	}

	function draw() {
		// clear
		ctx.globalCompositeOperation = 'source-over';
		ctx.globalAlpha = 0.18;
		ctx.fillStyle = '#000';
		ctx.fillRect(0, 0, canvas.width, canvas.height);

		// re-draw
		ctx.globalCompositeOperation = 'screen';
		ctx.globalAlpha = 1;
		for (var i = 0; i < listFire.length; i++) {
			var fire = listFire[i];
			ctx.beginPath();
			ctx.arc(fire.x, fire.y, fire.size, 0, Math.PI * 2);
			ctx.closePath();
			ctx.fillStyle = fire.fill;
			ctx.fill();
		}

		for (var i = 0; i < listFirework.length; i++) {
			var firework = listFirework[i];
			ctx.globalAlpha = firework.alpha;
			ctx.beginPath();
			ctx.arc(firework.x, firework.y, firework.size, 0, Math.PI * 2);
			ctx.closePath();
			ctx.fillStyle = firework.fill;
			ctx.fill();
		}
	}
})

