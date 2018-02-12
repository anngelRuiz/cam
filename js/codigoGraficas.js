var hoy = new Date();
var dia = hoy.getDate(); 
var mes = hoy.getMonth();
mes = mes +1;
var year= hoy.getFullYear();

var fecha = (dia + "/" + mes  + "/" + year );

function imprimirPagina(data, nombre){

  //get Data

  var table=document.getElementById("table-stock");

  table.style.textAlign = "center";
  // table.style.width = "100%";
  
  //get Id from Chart to print
  var canvas = document.getElementById(data);
  // conert to an URL data to print
  var dataURL = canvas.toDataURL();
  var fullQuality = canvas.toDataURL('image/webp', 1.0);
  
  var w=window.open();

  w.document.write('<html><head>');
  // styles
  w.document.write('<style type="text/css">');
  // styles head logos
  w.document.write('.content-logo{ width: 100%; height: 150px;}');
  w.document.write('.content-logo .content-img{width: 460px; height: 130px; margin: 0 auto; padding-left:120px;}');
  w.document.write('.content-logo .content-img .content-images{width: 100%; height: 100%; display: inline-block;}');
  w.document.write('.content-logo .content-img .content-images img{width: 115px; height: 115px;}');
  w.document.write('.content-logo .content-img .content-images img:nth-child(3){width: 160px;}');
  w.document.write('.content-logo .content-title{width: 50%; height: 30px; margin: 0 auto;}');
  w.document.write('.content-logo .content-title h5{font-size: 14px; text-align: center; text-transform: uppercase; font-family: serif;}');
  // finn styles head logos

  // styles Data Student
  w.document.write('.contenet-data{width: 50%; height: 100px; margin: 0 auto;}');
  w.document.write('.contenet-data h5{font-weight: bold;}');
  w.document.write('.contenet-data h5 span{font-weight: 100;}');
  // End styles Data Student

  // Sytels Chart img 
  w.document.write('.contenedor-img{width:350px; height:350px; margin: 0 auto;}');
  w.document.write('.contenedor-img img{ width: 100%; height: 100%;}');
  // End Styles Chart img

  // Styles container table
  w.document.write('.container-table{width:150px; height:auto; margin: 0 auto; margin-top:50px;}');

  // End Styles container table

  w.document.write('h5{font-size: 14px; font-weight: 500; text-align: center; font-family: serif;}'); 

  w.document.write('</style>');
  // </style>
  // <body>
  w.document.write('</head><body>');

  // Head logos
  w.document.write('<div class="content-logo">');
    w.document.write('<div class="content-img">');
      w.document.write('<div class="content-images">');
        w.document.write('<img src="./img-detalles/tec.png">');
        w.document.write('<img src="./img-detalles/logo.png">');
        w.document.write('<img src="./img-detalles/sep.jpg">');
      w.document.write('</div>'); // content-images
    w.document.write('</div>'); // content-img
    w.document.write('<div class="content-title">');
      w.document.write('<h5>Centro de Atención Multiple #8</h5>');
    w.document.write('</div>');
  w.document.write('</div>'); 
  // content-logo

  w.document.write('<br>');
  w.document.write('<br>');

  // Data student
  w.document.write('<div class="contenet-data">');
    w.document.write('<h5>Nombre: <span>');
      w.document.write(nombre);        
    w.document.write('</span></h5>');
    
    w.document.write('<h5>Fecha: <span>');
      w.document.write(fecha);
    w.document.write('</span></h5>');
  
  w.document.write('</div>');
// End  Data student

  // Chart img
  w.document.write('<h5> Cantidad de Objetos Comprados </h5>'); 
  w.document.write('<div class="contenedor-img">');
  w.document.write('<img src="'+ dataURL +'">');
  w.document.write('</div>');
  // End Chart img

  // contenainer table
  w.document.write('<div class="container-table">');
    w.document.write(table.outerHTML);    
  w.document.write('</div>');
  // End contenainer table
  

  w.document.write('</body></html>');
  // </body>

  w.document.close();
  w.focus();
  w.print();
  w.close();
}






// print Data Score

function printScore(data, nombre){
  
    //get Data
  
    var table=document.getElementById("table-score");
      
    //get Id from Chart to print
    var canvas = document.getElementById(data);

    table.style.textAlign = "center";
    table.style.width = "100%";

    // conert to an URL data to print
    var dataURL = canvas.toDataURL();
    var fullQuality = canvas.toDataURL('image/webp', 1.0);
    
    var w=window.open();
  
    w.document.write('<html><head>');
    // styles
    w.document.write('<style type="text/css">');
    // styles head logos
    w.document.write('.content-logo{ width: 100%; height: 150px;}');
    w.document.write('.content-logo .content-img{width: 460px; height: 130px; margin: 0 auto; padding-left:120px;}');
    w.document.write('.content-logo .content-img .content-images{width: 100%; height: 100%; display: inline-block;}');
    w.document.write('.content-logo .content-img .content-images img{width: 115px; height: 115px;}');
    w.document.write('.content-logo .content-img .content-images img:nth-child(3){width: 160px;}');
    w.document.write('.content-logo .content-title{width: 50%; height: 30px; margin: 0 auto;}');
    w.document.write('.content-logo .content-title h5{font-size: 14px; text-align: center; text-transform: uppercase; font-family: serif;}');
    // finn styles head logos
  
    // styles Data Student
    w.document.write('.contenet-data{width: 50%; height: 100px; margin: 0 auto;}');
    w.document.write('.contenet-data h5{font-weight: bold;}');
    w.document.write('.contenet-data h5 span{font-weight: 100;}');
    // End styles Data Student
  
    // Sytels Chart img 
    w.document.write('.contenedor-img{width:500px; height:200px; margin: 0 auto;}');
    w.document.write('.contenedor-img img{ width: 100%; height: 100%;}');
    // End Styles Chart img
  
    // Styles container table
    w.document.write('.container-table{width:500px; height:auto; margin: 0 auto; margin-top:50px;}');
  
    // End Styles container table
  
    w.document.write('h5{font-size: 14px; font-weight: 500; text-align: center; font-family: serif;}'); 
  
    w.document.write('</style>');
    // </style>
    // <body>
    w.document.write('</head><body>');
  
    // Head logos
    w.document.write('<div class="content-logo">');
      w.document.write('<div class="content-img">');
        w.document.write('<div class="content-images">');
          w.document.write('<img src="./img-detalles/tec.png">');
          w.document.write('<img src="./img-detalles/logo.png">');
          w.document.write('<img src="./img-detalles/sep.jpg">');
        w.document.write('</div>'); // content-images
      w.document.write('</div>'); // content-img
      w.document.write('<div class="content-title">');
        w.document.write('<h5>Centro de Atención Multiple #8</h5>');
      w.document.write('</div>');
    w.document.write('</div>'); 
    // content-logo
  
    w.document.write('<br>');
    w.document.write('<br>');
  
    // Data student
    w.document.write('<div class="contenet-data">');
      w.document.write('<h5>Nombre: <span>');
        w.document.write(nombre);        
      w.document.write('</span></h5>');
      
      w.document.write('<h5>Fecha: <span>');
        w.document.write(fecha);
      w.document.write('</span></h5>');
    
    w.document.write('</div>');
  // End  Data student
  
    // Chart img
    w.document.write('<h5> Puntuaje </h5>'); 
    w.document.write('<div class="contenedor-img">');
    w.document.write('<img src="'+ dataURL +'">');
    w.document.write('</div>');
    // End Chart img
  
    // contenainer table
    w.document.write('<div class="container-table">');
      w.document.write(table.outerHTML);        
    w.document.write('</div>');
    // End contenainer table
    
  
    w.document.write('</body></html>');
    // </body>
  
    w.document.close();
    w.focus();
    w.print();
    w.close();
  }






  function printLoses(data, nombre){
    
      //get Data
    
      var table=document.getElementById("table-loses");
        
      //get Id from Chart to print
      var canvas = document.getElementById(data);
  
      table.style.textAlign = "center";
      table.style.width = "100%";
  
      // conert to an URL data to print
      var dataURL = canvas.toDataURL();
      var fullQuality = canvas.toDataURL('image/webp', 1.0);
      
      var w=window.open();
    
      w.document.write('<html><head>');
      // styles
      w.document.write('<style type="text/css">');
      // styles head logos
      w.document.write('.content-logo{ width: 100%; height: 150px;}');
      w.document.write('.content-logo .content-img{width: 460px; height: 130px; margin: 0 auto; padding-left:120px;}');
      w.document.write('.content-logo .content-img .content-images{width: 100%; height: 100%; display: inline-block;}');
      w.document.write('.content-logo .content-img .content-images img{width: 115px; height: 115px;}');
      w.document.write('.content-logo .content-img .content-images img:nth-child(3){width: 160px;}');
      w.document.write('.content-logo .content-title{width: 50%; height: 30px; margin: 0 auto;}');
      w.document.write('.content-logo .content-title h5{font-size: 14px; text-align: center; text-transform: uppercase; font-family: serif;}');
      // finn styles head logos
    
      // styles Data Student
      w.document.write('.contenet-data{width: 50%; height: 100px; margin: 0 auto;}');
      w.document.write('.contenet-data h5{font-weight: bold;}');
      w.document.write('.contenet-data h5 span{font-weight: 100;}');
      // End styles Data Student
    
      // Sytels Chart img 
      w.document.write('.contenedor-img{width:500px; height:200px; margin: 0 auto;}');
      w.document.write('.contenedor-img img{ width: 100%; height: 100%;}');
      // End Styles Chart img
    
      // Styles container table
      w.document.write('.container-table{width:500px; height:auto; margin: 0 auto; margin-top:50px;}');
    
      // End Styles container table
    
      w.document.write('h5{font-size: 14px; font-weight: 500; text-align: center; font-family: serif;}'); 
    
      w.document.write('</style>');
      // </style>
      // <body>
      w.document.write('</head><body>');
    
      // Head logos
      w.document.write('<div class="content-logo">');
        w.document.write('<div class="content-img">');
          w.document.write('<div class="content-images">');
            w.document.write('<img src="./img-detalles/tec.png">');
            w.document.write('<img src="./img-detalles/logo.png">');
            w.document.write('<img src="./img-detalles/sep.jpg">');
          w.document.write('</div>'); // content-images
        w.document.write('</div>'); // content-img
        w.document.write('<div class="content-title">');
          w.document.write('<h5>Centro de Atención Multiple #8</h5>');
        w.document.write('</div>');
      w.document.write('</div>'); 
      // content-logo
    
      w.document.write('<br>');
      w.document.write('<br>');
    
      // Data student
      w.document.write('<div class="contenet-data">');
        w.document.write('<h5>Nombre: <span>');
          w.document.write(nombre);        
        w.document.write('</span></h5>');
        
        w.document.write('<h5>Fecha: <span>');
          w.document.write(fecha);
        w.document.write('</span></h5>');
      
      w.document.write('</div>');
    // End  Data student
    
      // Chart img
      w.document.write('<h5> Veces perdidas </h5>'); 
      w.document.write('<div class="contenedor-img">');
      w.document.write('<img src="'+ dataURL +'">');
      w.document.write('</div>');
      // End Chart img
    
      // contenainer table
      w.document.write('<div class="container-table">');
        w.document.write(table.outerHTML);        
      w.document.write('</div>');
      // End contenainer table
      
    
      w.document.write('</body></html>');
      // </body>
    
      w.document.close();
      w.focus();
      w.print();
      w.close();
    }

















  function printErrors(data, nombre){
    
      //get Data
    
      var table=document.getElementById("table-errors");

      table.style.textAlign = "center";
      
    
      // table.style.textAlign = "center";
      // table.style.width = "50%";
      
      //get Id from Chart to print
      var canvas = document.getElementById(data);
      // conert to an URL data to print
      var dataURL = canvas.toDataURL();
      var fullQuality = canvas.toDataURL('image/webp', 1.0);
      
      var w=window.open();
    
      w.document.write('<html><head>');
      // styles
      w.document.write('<style type="text/css">');
      // styles head logos
      w.document.write('.content-logo{ width: 100%; height: 150px;}');
      w.document.write('.content-logo .content-img{width: 460px; height: 130px; margin: 0 auto; padding-left:120px;}');
      w.document.write('.content-logo .content-img .content-images{width: 100%; height: 100%; display: inline-block;}');
      w.document.write('.content-logo .content-img .content-images img{width: 115px; height: 115px;}');
      w.document.write('.content-logo .content-img .content-images img:nth-child(3){width: 160px;}');
      w.document.write('.content-logo .content-title{width: 50%; height: 30px; margin: 0 auto;}');
      w.document.write('.content-logo .content-title h5{font-size: 14px; text-align: center; text-transform: uppercase; font-family: serif;}');
      // finn styles head logos
    
      // styles Data Student
      w.document.write('.contenet-data{width: 50%; height: 100px; margin: 0 auto;}');
      w.document.write('.contenet-data h5{font-weight: bold;}');
      w.document.write('.contenet-data h5 span{font-weight: 100;}');
      // End styles Data Student
    
      // Sytels Chart img 
      w.document.write('.contenedor-img{width:350px; height:350px; margin: 0 auto;}');
      w.document.write('.contenedor-img img{ width: 100%; height: 100%;}');
      // End Styles Chart img
    
      // Styles container table
      w.document.write('.container-table{width:150px; height:auto; margin: 0 auto; margin-top:50px;}');
    
      // End Styles container table
    
      w.document.write('h5{font-size: 14px; font-weight: 500; text-align: center; font-family: serif;}'); 
    
      w.document.write('</style>');
      // </style>
      // <body>
      w.document.write('</head><body>');
    
      // Head logos
      w.document.write('<div class="content-logo">');
        w.document.write('<div class="content-img">');
          w.document.write('<div class="content-images">');
            w.document.write('<img src="./img-detalles/tec.png">');
            w.document.write('<img src="./img-detalles/logo.png">');
            w.document.write('<img src="./img-detalles/sep.jpg">');
          w.document.write('</div>'); // content-images
        w.document.write('</div>'); // content-img
        w.document.write('<div class="content-title">');
          w.document.write('<h5>Centro de Atención Multiple #8</h5>');
        w.document.write('</div>');
      w.document.write('</div>'); 
      // content-logo
    
      w.document.write('<br>');
      w.document.write('<br>');
    
      // Data student
      w.document.write('<div class="contenet-data">');
        w.document.write('<h5>Nombre: <span>');
         w.document.write(nombre);        
        w.document.write('</span></h5>');
        
        w.document.write('<h5>Fecha: <span>');
          w.document.write(fecha);
        w.document.write('</span></h5>');
      
      w.document.write('</div>');
    // End  Data student
    
      // Chart img
      w.document.write('<h5> Errores en Objetos </h5>'); 
      w.document.write('<div class="contenedor-img">');
      w.document.write('<img src="'+ dataURL +'">');
      w.document.write('</div>');
      // End Chart img
    
      // contenainer table
      w.document.write('<div class="container-table">');
        w.document.write(table.outerHTML);    
      w.document.write('</div>');
      // End contenainer table
      
    
      w.document.write('</body></html>');
      // </body>
    
      w.document.close();
      w.focus();
      w.print();
      w.close();
    }
      






  
function printMax(data, nombre){
  
    //get Data
  
    var table=document.getElementById("table-max");
      
    //get Id from Chart to print
    var canvas = document.getElementById(data);

    table.style.textAlign = "center";
    table.style.width = "100%";
    

    // conert to an URL data to print
    var dataURL = canvas.toDataURL();
    var fullQuality = canvas.toDataURL('image/webp', 1.0);
    
    var w=window.open();
  
    w.document.write('<html><head>');
    // styles
    w.document.write('<style type="text/css">');
    // styles head logos
    w.document.write('.content-logo{ width: 100%; height: 150px;}');
    w.document.write('.content-logo .content-img{width: 460px; height: 130px; margin: 0 auto; padding-left:120px;}');
    w.document.write('.content-logo .content-img .content-images{width: 100%; height: 100%; display: inline-block;}');
    w.document.write('.content-logo .content-img .content-images img{width: 115px; height: 115px;}');
    w.document.write('.content-logo .content-img .content-images img:nth-child(3){width: 160px;}');
    w.document.write('.content-logo .content-title{width: 50%; height: 30px; margin: 0 auto;}');
    w.document.write('.content-logo .content-title h5{font-size: 14px; text-align: center; text-transform: uppercase; font-family: serif;}');
    // finn styles head logos
  
    // styles Data Student
    w.document.write('.contenet-data{width: 50%; height: 100px; margin: 0 auto;}');
    w.document.write('.contenet-data h5{font-weight: bold;}');
    w.document.write('.contenet-data h5 span{font-weight: 100;}');
    // End styles Data Student
  
    // Sytels Chart img 
    w.document.write('.contenedor-img{width:500px; height:200px; margin: 0 auto;}');
    w.document.write('.contenedor-img img{ width: 100%; height: 100%;}');
    // End Styles Chart img
  
    // Styles container table
    w.document.write('.container-table{width:500px; height:auto; margin: 0 auto; margin-top:50px;}');
  
    // End Styles container table
  
    w.document.write('h5{font-size: 14px; font-weight: 500; text-align: center; font-family: serif;}'); 
  
    w.document.write('</style>');
    // </style>
    // <body>
    w.document.write('</head><body>');
  
    // Head logos
    w.document.write('<div class="content-logo">');
      w.document.write('<div class="content-img">');
        w.document.write('<div class="content-images">');
          w.document.write('<img src="./img-detalles/tec.png">');
          w.document.write('<img src="./img-detalles/logo.png">');
          w.document.write('<img src="./img-detalles/sep.jpg">');
        w.document.write('</div>'); // content-images
      w.document.write('</div>'); // content-img
      w.document.write('<div class="content-title">');
        w.document.write('<h5>Centro de Atención Multiple #8</h5>');
      w.document.write('</div>');
    w.document.write('</div>'); 
    // content-logo
  
    w.document.write('<br>');
    w.document.write('<br>');
  
    // Data student
    w.document.write('<div class="contenet-data">');
      w.document.write('<h5>Nombre: <span>');
        w.document.write(nombre);        
      w.document.write('</span></h5>');
      
      w.document.write('<h5>Fecha: <span>');
        w.document.write(fecha);
      w.document.write('</span></h5>');
    
    w.document.write('</div>');
  // End  Data student
  
    // Chart img
    w.document.write('<h5> Puntuajes Minimo-Maximo </h5>'); 
    w.document.write('<div class="contenedor-img">');
    w.document.write('<img src="'+ dataURL +'">');
    w.document.write('</div>');
    // End Chart img
  
    // contenainer table
    w.document.write('<div class="container-table">');
      w.document.write(table.outerHTML);        
    w.document.write('</div>');
    // End contenainer table
    
  
    w.document.write('</body></html>');
    // </body>
  
    w.document.close();
    w.focus();
    w.print();
    w.close();
  }





  function printObs(id, nombre){
        
      var table=document.getElementById(id);

      table.style.textAlign = "center";
      table.style.width = "100%";
      
      var w=window.open();
    
      w.document.write('<html><head>');
      // styles
      w.document.write('<style type="text/css">');
      // styles head logos
      w.document.write('.content-logo{ width: 100%; height: 150px;}');
      w.document.write('.content-logo .content-img{width: 460px; height: 130px; margin: 0 auto; padding-left:120px;}');
      w.document.write('.content-logo .content-img .content-images{width: 100%; height: 100%; display: inline-block;}');
      w.document.write('.content-logo .content-img .content-images img{width: 115px; height: 115px;}');
      w.document.write('.content-logo .content-img .content-images img:nth-child(3){width: 160px;}');
      w.document.write('.content-logo .content-title{width: 50%; height: 30px; margin: 0 auto;}');
      w.document.write('.content-logo .content-title h5{font-size: 14px; text-align: center; text-transform: uppercase; font-family: serif;}');
      // finn styles head logos
    
      // styles Data Student
      w.document.write('.contenet-data{width: 50%; height: 100px; margin: 0 auto;}');
      w.document.write('.contenet-data h5{font-weight: bold;}');
      w.document.write('.contenet-data h5 span{font-weight: 100;}');
      // End styles Data Student
    
    
      // Styles container table
      w.document.write('.container-table{width:400px; height:auto; margin: 0 auto; margin-top:50px;}');
    
      // End Styles container table
    
      w.document.write('h5{font-size: 14px; font-weight: 500; text-align: center; font-family: serif;}'); 
    
      w.document.write('</style>');
      // </style>
      // <body>
      w.document.write('</head><body>');
    
      // Head logos
      w.document.write('<div class="content-logo">');
        w.document.write('<div class="content-img">');
          w.document.write('<div class="content-images">');
            w.document.write('<img src="./img-detalles/tec.png">');
            w.document.write('<img src="./img-detalles/logo.png">');
            w.document.write('<img src="./img-detalles/sep.jpg">');
          w.document.write('</div>'); // content-images
        w.document.write('</div>'); // content-img
        w.document.write('<div class="content-title">');
          w.document.write('<h5>Centro de Atención Multiple #8</h5>');
        w.document.write('</div>');
      w.document.write('</div>'); 
      // content-logo
    
      w.document.write('<br>');
      w.document.write('<br>');
    
      // Data student
      w.document.write('<div class="contenet-data">');
        w.document.write('<h5>Nombre: <span>');
        w.document.write(nombre);        
        w.document.write('</span></h5>');
        
        w.document.write('<h5>Fecha: <span>');
        w.document.write(fecha);
        w.document.write('</span></h5>');
        
      w.document.write('</div>');
      // End  Data student
        
      // contenainer table
      w.document.write('<div class="container-table">');
        w.document.write(table.outerHTML);    
      w.document.write('</div>');
      // End contenainer table
      
    
      w.document.write('</body></html>');
      // </body>
    
      w.document.close();
      w.focus();
      w.print();
      w.close();
    }