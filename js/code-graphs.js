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
						backgroundColor:['#36a2eb','#ff6384','#9966ff','#ffcd56','#4bc0c0','#ff9f40','#c9cbcf','#f6d009','#ee63ff','#63d0ff', '#28d143', '#63ffc2',
						'#9966ff','#ffcd56','#4bc0c0','#ff9f40','#c9cbcf','#f6d009','#ee63ff','#63d0ff'
						],
						data: cantidad
					}
				]
			};

			var ctx = $("#mycanvas");

			var barGraph = new Chart(ctx, {
				type: 'doughnut',
				data: chartdata
			});
		},
		error: function(data) {
			console.log(data);
		},

	});
});