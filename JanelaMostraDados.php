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

$ndados = count($dados);


if (empty($dados)) {
    $pera = FALSE;
    $variavelvetordados[0] = 0;
    $variavelvetordados[1] = 0;
    $variavelvetordados[2] = "";
    $variavelvetordados[3] = 0;
    $variavelvetordados[4] = 0;
    $variavelvetordados[5] = 0;
    $variavelvetordados[6] = 0;
    $variavelvetordados[7] = 0;
} else {
    $pera = $classe->verificaJson($dados);

    if ($pera == TRUE) {
        $ndados = count($dados);
        $stringteste = $classe->returnVetorGrafico($dados); // gera um vetor de um vetor[0] [0] [1]

        $variavelvetordados = $classe->verificaPAPG($dados);
    } else {

        $variavelvetordados[0] = 0;
        $variavelvetordados[1] = 0;
        $variavelvetordados[2] = "";
        $variavelvetordados[3] = 0;
        $variavelvetordados[4] = 0;
        $variavelvetordados[5] = 0;
        $variavelvetordados[6] = 0;
        $variavelvetordados[7] = 0;
    }
}
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
        <div id="verifica">

        </div>
        <div id="curve_chart" style="width: 900px; height: 500px"></div>

        <div style="color:red;">
            <?php
            if ($pera == FALSE) {
                echo "<h1> ERRO! Arquivo Com Erro, Insira um Arquivo Completo e Sem Erros!</h1>";
            }
            ?>
        </div>



        <div id="DadosTeste" style="width: 900px; height: 500px">
            <br><br>
            <label>Elemento A1 (Primeiro Termo):</label>
            <input id="inputa1" type="text" name="inputa1" value=<?php echo $variavelvetordados[0] ?> readonly>
            <br><br>

            <label>Valor de R (Razão):</label>
            <input id="inputr" type="text" name="inputr" value=<?php echo $variavelvetordados[1] ?> readonly>
            <br><br>

            <label>Quantidade De Termos (Elementos Da Sequencia):</label>
            <input id="inputqtde" type="text" name="inputqtde" value=<?php echo $variavelvetordados[3] ?> >
            <br><br>

            <label>Selecione o Tipo de Progressão ao Lado:</label>
            <INPUT TYPE="RADIO" NAME="opcaoPAPG" id="inputpapg" VALUE="op1" checked> <?php
            if ($variavelvetordados[2] == "N") {
                echo "Nem PA, Nem PG";
            } else if ($variavelvetordados[2] == "PA") {
                echo "PA";
            } else {
                echo "PG";
            }
            ?>
            <br><br>
            <label>Soma Dos Termos:</label>
            <input id="inputb1" type="text" name="inputb1" value=<?php echo $variavelvetordados[4] ?> readonly>

            <br><br>
            <label>Média Dos Termos:</label>
            <input id="inputb2" type="text" name="inputb2" value=<?php echo $variavelvetordados[5] ?> readonly>

            <br><br>
            <label>Mediana Dos Termos:</label>
            <input id="inputb2" type="text" name="inputb2" value=<?php echo $variavelvetordados[6] ?> readonly>
            <br><br>

            <label>Porcentagem:</label>
            <input id="inputb4" type="text" name="inputb4" value=<?php
                   echo $variavelvetordados[7] . "% ";
                   ?> readonly> <?php
                   if ($variavelvetordados[2] == "N") {
                       echo $variavelvetordados[8];
                   }
                   ?>
            <br><br>

        </div>


        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([

                    ['Sequencia', 'PAPG'],

<?php
for ($valor = 0; $valor < $ndados; $valor++) {
    ?>



                        [<?php echo ($valor+1) ?>, <?php echo ($dados[$valor]) ?>],
                      



<?php } ?>


                ]);

                var options = {
                    title: 'Funcções PA / PG',
                    curveType: 'function',
                    legend: {
                        position: 'bottom'
                    }
                };

                var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

                chart.draw(data, options);
            }
        </script>


    </body>
</html>
