$(document).ready(function() {
    var dom = document.getElementById("basic-Pie");
    var bpChart = echarts.init(dom);

    var app = {};
    option = null;
    option = {
        color: ['#62549a','#4aa9e9' ],
        tooltip : {
            trigger: 'item',
            formatter: '{a} <br/>{b} : {c} ({d}%)'
        },
        legend: {
            orient : 'vertical',
            x : 'left',
            data:['Femenino','Masculino']
        },
        calculable : true,
        series : [
            {
                name:'Source',
                type:'pie',
                radius : '55%',
                center: ['50%', '60%'],
                data:[
                    {value:335, name:'Femenino'},
                    {value:310, name:'Masculino'},
                ]
            }
        ]
    };

    if (option && typeof option === "object") {
        bpChart.setOption(option, false);
    }

});
