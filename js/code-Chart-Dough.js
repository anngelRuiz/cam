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
				nombre.push(data[i].nombre);
				cantidad.push(data[i].puntuacion);
			}
			// var datajson = JSON.parse(data);
			var chartdata = {
				labels: nombre,
				datasets : [
					{
						label: "Alumnos",
						labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
						backgroundColor:['#36a2eb','#ff6384','#9966ff','#ffcd56','#4bc0c0','#ff9f40','#c9cbcf','#f6d009','#ee63ff','#63d0ff', '#28d143', '#63ffc2',
						'#9966ff','#ffcd56','#4bc0c0','#ff9f40','#c9cbcf','#f6d009','#ee63ff','#63d0ff'
						],
						data: cantidad
					}
				]
			};

			// var ctx = $("#chartGrades");
			var ctx = document.getElementById('chartGrades').getContext('2d');

			var barGraph = new Chart(ctx, {
				type: 'bar',
				labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
				data: chartdata
			});
		},// success
		error: function(data) {
			console.log(data);
		},

	});
});