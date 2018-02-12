$(document).ready(function(){
    var ctxAllGrades = document.getElementById('chartGrades').getContext('2d');
    Chart.defaults.global.defaultFontColor = 'black';

    $.ajax({
        url: "./php/dataGrades.php",
        method: "GET",
        success: function(data){
            console.log(data);
            var name = [];
            var score = [];

            for(var i in data) {
                name.push("Nombre " + data[i].nombre);
                score.push(data[i].puntacion);
            }

        }, // success

        error: function(data) {
            console.log(data);
        } // error

    }); // ajax


}); // document. Ready

