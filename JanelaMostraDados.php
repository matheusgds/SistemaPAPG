<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();

require_once (realpath($_SERVER["DOCUMENT_ROOT"]) . "\SistemaPAPG\SistemaPAPG\ArquivosPHP\CalculaValores.php");
$nomearq = $_SESSION['novonome'];
$classe = new CalculaValores();
$dados = $classe->JsonParaObj($nomearq);

//echo $classe->returnVetorGrafico($dados);
$stringteste = $classe->returnVetorGrafico($dados);
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width-device-width,initial-scale=1.0"/>
        <link rel="stylesheet" type="text/css" href="css/estilo.css"/>
        <title>Sistema PAPG</title>
    </head>
    <body>
        <div> 
            <h1 name="titulotopo" id="titulotopo"> SISTEMA PAPG</h1>
        </div>
         <div id="curve_chart" style="width: 900px; height: 500px"></div>


        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {'packages': ['corechart']});
            google.charts.setOnLoadCallback(drawChart);
            teste = <?php echo $stringteste; ?>
            
            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Year', 'Sales', 'Expenses'],
                    ['2004', 1000, 400],
                    ['2005', 1170, 460],
                    ['2006', 660, 1120],
                    ['2007', 1030, 540]
                ]);


                var options = {
                    title: 'Company Performance',
                    curveType: 'function',
                    legend: {position: 'bottom'}
                };


                var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

                chart.draw(data, options);
            }
        </script>
    </body>
</html>
