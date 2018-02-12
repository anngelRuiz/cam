

var ctxAllGrades = document.getElementById('chartGrades').getContext('2d');
Chart.defaults.global.defaultFontColor = 'black'
    
    // Loses
    var barGradesChart = new Chart(ctxAllGrades, {
        type: 'bar',
        data: {
            labels:[],
            datasets: [
            {
                backgroundColor:['#36a2eb','#ff6384','#9966ff','#ffcd56','#4bc0c0','#ff9f40','#c9cbcf','#f6d009','#ee63ff','#63d0ff', '#28d143', '#63ffc2',
                '#9966ff','#ffcd56','#4bc0c0','#ff9f40','#c9cbcf','#f6d009','#ee63ff','#63d0ff'
                ],
                borderColor: ['#36a2eb','#ff6384','#9966ff','#ffcd56','#4bc0c0','#ff9f40','#c9cbcf','#f6d009','#ee63ff','#63d0ff', '#28d143', '#63ffc2',
                '#9966ff','#ffcd56','#4bc0c0','#ff9f40','#c9cbcf','#f6d009','#ee63ff','#63d0ff'
                ],
                label: "Juegos Perdidos",
                data: []
            }
            ]
        }
    });