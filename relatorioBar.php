<?php
require('header.php');
?>

<div id="container" style="height: 400px"></div>

<style>
#container {
    height: 700px; 
    min-width: 310px; 
    max-width: 800px;
    margin: 0 auto;
}
</style>

<script>
$(function () {
    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Relatório Anual'
        },
        subtitle: {
            text: 'Média Serviço x Valor'
        },
        xAxis: {
            categories: [
                'Jan',
                'Fev',
                'Mar',
                'Abr',
                'Mai',
                'Jun',
                'Jul',
                'Ago',
                'Set',
                'Out',
                'Nov',
                'Dez'
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Valor R$'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.3f} </b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Serviço',
            data: [18, 15, 20, 18]

        }, {
            name: 'Valor R$',
            data: [35.500, 45.250, 54.000, 23.000]

        }]
    });
});

</script>