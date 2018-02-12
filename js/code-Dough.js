$(document).ready(function(){
    
	$.ajax({
		url: "./php/data.php",
		method: "GET",
		success: function(data) {
			console.log(data);
			var object_name = [];
			var stock = [];

			for(var i in data) {
				object_name.push("Objeto: " + data[i].object_name);
				stock.push(data[i].stock);
			}

    // Dona
    var ctx = document.getElementById('myChart').getContext('2d');
    
    var barChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
        labels: object_name,
        datasets: [
            {
            label: "Points",
            data: stock,
            // borderColor: ['#333','#333','#333','#333','#333','#333','#333','#333','#333','#333','#333','#333','#333','#333','#333','#333','#333','#333','#333','#333'],
            backgroundColor:['#36a2eb','#ff6384','#9966ff','#ffcd56','#4bc0c0','#ff9f40','#c9cbcf','#f6d009','#ee63ff','#63d0ff', '#28d143', '#63ffc2',
            '#9966ff','#ffcd56','#4bc0c0','#ff9f40','#c9cbcf','#f6d009','#ee63ff','#63d0ff'
            ]
            }
        ]
        }

    });
		}, // success
		error: function(data) {
			console.log(data);
		}
	}); // ajax
}); // document. ready