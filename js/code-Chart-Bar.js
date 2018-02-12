$(document).ready(function(){
	$.ajax({
		url: "./php/data.php",
		method: "GET",
		contentType: "application/json",
        dataType: "json",
		success: function(data) {
			
			console.log(data);
			var nombre = [];
			var cantidad = [];

			for(var i in data) {
				nombre.push("Objeto " + data[i].OBJETO);
				cantidad.push(data[i].cantidad);
			}
			// var datajson = JSON.parse(data);
			var chartdata = {
				labels: nombre,
				datasets : [
					{
						label: 'Player Score',
						backgroundColor: 'rgba(200, 200, 200, 0.75)',
						borderColor: 'rgba(200, 200, 200, 0.75)',
						hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
						hoverBorderColor: 'rgba(200, 200, 200, 1)',
						data: cantidad
					}
				]
			};

			var ctx = $("#mycanvas");

			var barGraph = new Chart(ctx, {
				type: 'bar',
				data: chartdata
			});
		},
		error: function(data) {
			console.log(data);
		},

	});
});