var hoy = new Date();
dia = hoy.getDate(); 
mes = hoy.getMonth();
anio= hoy.getFullYear();
fecha_actual = String(dia+"/"+mes+"/"+anio);
fecha_actual = new Date(fecha_actual);
alert(fecha_actual);