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
$valorlimite;
$valorlimite = count($dados[0]);
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


        <?php
        $count = count($dados);
        for ($i = 0; $i < $count; $i++) {
            if ($i == 0) {
                $count2 = count($dados[0]);
                for ($j = 0; $j < $count2; $j++) {
                    echo "";
                    echo ($dados[0][$j] . " ");
                    echo "";
                }
            } else {
                echo "";
                echo ($dados[$i] . "  ");
                echo "";
            }
        }
        echo '';
        ?>

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {'packages': ['corechart']});
            google.charts.setOnLoadCallback(drawChart);
            var nomenclatura = "<?php echo $dados[1] ?>";
            var dados = "<?php echo $str ?>";
            var limite = "<?php echo $valorlimite ?>";
            var str;
            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                        for (var i = 0; i < limite; i++) {
                    if (i === 0) {
                        str = str + "['Sequencia', nomenclatura],";
                    }
                }
                ['Sequencia', nomenclatura],
                        [4, 27],
                        [5, 81]

                ]);
                var options = {

                    title: 'Grafico Da ' + nomenclatura,
                    curveType: 'function',
                    legend: {position: 'bottom'}
                };
                var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
                chart.draw(data, options);
            }
        </script>
    </body>
</html>
