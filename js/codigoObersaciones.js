$(document).ready(function(){
  var estado = false;

  $('#btn-crear').on('click', function(){
    $('.seccionToggle').slideToggle();

    if (estado==true) {
      $(this).text(" Hacer Observacion");
      $('body').css({
        "overflow":"auto"
      });
      $('.btn-crear').css({
        "background-color":"#527ebf"
      });
      estado= false;
    }else {
      $(this).text("Cancelar");
      $('body').css({
        "overflow":"auto"
      });

      $('.btn-crear').css({
        "background-color":"#9d2b20"
      });
      estado= true;
    }
  });
})
