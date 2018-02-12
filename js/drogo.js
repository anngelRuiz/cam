
function fecha(){
  // var hoy = new Date();
  // var dia = hoy.getDate(); 
  // var mes = hoy.getMonth();
  // var anio= hoy.getFullYear();
  // var fecha_actual = String(dia+"/"+mes+"/"+anio);
  // var fecha_actual = new Date(fecha_actual);
  // alert(fecha_actual);

  var hoy = new Date();
  dia = hoy.getDate(); 
  mes = hoy.getMonth();
  anio= hoy.getFullYear();
  fecha_actual = String(dia+"/"+mes+"/"+anio);
  fecha_actual = new Date(fecha_actual);
  alert(fecha_actual);
  
}

function allowDrop(ev) {
    ev.preventDefault();
  }
  
  function drag(ev) {
     ev.dataTransfer.setData("text", ev.target.id);
  }
  
  function drop(ev,ids) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    ev.target.appendChild(document.getElementById(data));
    testing(ids);
  }

  // function drop(ev,id){
  //   ev.preventDefault();
  //   var image= ev.dataTransfer.getData("content");
  //   if ( image == ev.target.id) {
  //          ev.target.appendChild(document.getElementById(image));
  //   }
  //   else {

  //   }
  //                 }
  
  function testing(id){
    var correcto = 1;
    var pokes = document.getElementsByClassName("pokemon");
    for(var i=0;i<pokes.length;i++){
       if(pokes[i].getAttribute("name") != pokes[i].parentNode.getAttribute("id")){

        // $(id).remove();
        console.log("Borrado:");           
         correcto = correcto*0;
         break;
       }else{
           console.log("Incorrecto bien:");
       }
    }
    if(correcto == 1){
      document.getElementById("resultado").innerHTML = "CORRECTO"; 
    }else{
      document.getElementById("resultado").innerHTML = "INCOMPLETO";
    }
    
  }