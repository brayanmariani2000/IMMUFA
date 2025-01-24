( function ( $ ) {
	"use strict";
	var ctx = document.getElementById( "barrasChart" );
	//    ctx.height = 200;
	var myChart = new Chart( ctx, {
		type: 'bar',
		data: {
			labels: [ "0-1 AÑOS", "2-5 AÑOS", "6-12 AÑOS", "13-19 AÑOS", "20-34 AÑOS", "35-59 AÑOS", "60=< AÑOS" ],
			datasets: [
				{
					label: "Cantidad de Pacientes Por años",
					data: [ 65, 59, 80, 81, 56, 55, 40 ],
					borderColor: "rgba(0, 123, 255, 0.9)",
					borderWidth: "0",
					backgroundColor: "rgb(0, 123, 255)"
                            }
                        ]
		},
		options: {
			scales: {
				yAxes: [ {
					ticks: {
						beginAtZero: true
					}
                                } ]
			}
		}
	} );

} )( jQuery );
