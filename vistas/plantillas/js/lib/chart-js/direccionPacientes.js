( function ( $ ) {
	"use strict";
    var ctx = document.getElementById( "pieChart" );
	var myChart = new Chart( ctx, {
		type: 'pie',
		data: {
			datasets: [ {
				data: [ 45, 25, 20, 10,20,30,1,35,100,20,35,67,82,0],
				backgroundColor: [
                                    "rgba(0, 123, 255,0.9)",
                                    "rgba(0, 123, 147,0.7)",
                                    "rgba(0, 255, 123,0.5)",
                                    "rgba(231, 91, 91, 0.5)",
                                    "rgba(231, 170, 91, 0.5)",
                                    "rgba(228, 233, 84, 0.5)",
                                    "rgba(169, 233, 84, 0.5)",
                                    "rgba(84, 233, 99, 0.5)",
                                    "rgba(67, 231, 149, 0.5)",
                                    "rgba(67, 231, 226, 0.5)",
                                    "rgba(67, 94, 231, 0.648)",
                                    "rgba(144, 67, 231, 0.648)",
                                    "rgba(231, 67, 215, 0.648)",
                                    "rgba(0,0,0,0.07)",
                                ],
				hoverBackgroundColor: [
                    "rgba(0, 123, 255,0.9)",
                    "rgba(0, 123, 147,0.7)",
                    "rgba(0, 255, 123,0.5)",
                    "rgba(231, 91, 91, 0.5)",
                    "rgba(231, 170, 91, 0.5)",
                    "rgba(228, 233, 84, 0.5)",
                    "rgba(169, 233, 84, 0.5)",
                    "rgba(84, 233, 99, 0.5)",
                    "rgba(67, 231, 149, 0.5)",
                    "rgba(67, 231, 226, 0.5)",
                    "rgba(67, 94, 231, 0.648)",
                    "rgba(144, 67, 231, 0.648)",
                    "rgba(231, 67, 215, 0.648)",
                    "rgba(0,0,0,0.07)",
                                ]

                            } ],
			labels: [
                "PIAR",
              
                "MATURIN",
               
                "EZEQUIEL ZAMORA",
              
                "CEDEÑO",
           
                "CARIPE",
      
                "ACOSTA",
     
                "AGUASAY",
 
                "BOLIVAR",
     
                "LIBERTADOR",
 
                "PUNCERES",
     
                "SANTA BARBARA",
     
                "SOTILLO",
           
                "URACOA",

                "FORANEOS"
           
                
                        ]
		},
		options: {
			responsive: true
		}
	} );

} )( jQuery );
