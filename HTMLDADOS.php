<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
require_once (realpath($_SERVER["DOCUMENT_ROOT"]) . "\SistemaPAPG\SistemaPAPG\ArquivosPHP\CalculaValores.php");

$a1 = $_POST["inputa1"];
$r = $_POST["inputr"];
$qtnd = $_POST["inputqtde"];
$opcao = $_POST["opcaoPAPG"];
$nomearq = $_POST["inputnamearq"];
$soma = 0;
$media;
$mediana;
$nummedia;
$vet1=[];

$classe = new CalculaValores();

if ($opcao == "op1") {
    $vet1 = $classe->CalculaPA($r, $qtnd, $a1);

    $ult = end($vet1);

    for ($i = 0; $i < $qtnd; $i++) {
        $soma = $soma + $vet1[$i];
    }

    $media = $soma / $qtnd;

    if ($qtnd % 2 == 0) {
        $nummedia = $qtnd / 2; // 10 vai ficar 5
        $mediana = ($vet1[$nummedia] + $vet1[$nummedia + 1]) / 2;
    } else {
        $nummedia = $qtnd / 2;
        $mediana = floor(($vet1[$nummedia]));
    }


    if ($opcao == "op1") {
        $vet1[] = "PA";
    }

    $vet1[] = $a1;
    $vet1[] = $r;
    $vet1[] = $qtnd;
// somatoria,media, mediana
    $vet1[] = $soma;
    $vet1[] = $media;
    $vet1[] = $mediana;
} else if ($opcao == "op2") {
    $vet1 = $classe->CalculaPG($r, $qtnd, $a1);

    $ult = end($vet1);

    for ($i = 0; $i < $qtnd; $i++) {
        $soma = $soma + $vet1[$i];
    }

    $media = $soma / $qtnd;

    if ($qtnd % 2 == 0) {
        $nummedia = $qtnd / 2; // 10 vai ficar 5
        $mediana = ($vet1[$nummedia] + $vet1[$nummedia + 1]) / 2;
    } else {
        $nummedia = $qtnd / 2;
        $mediana = floor(($vet1[$nummedia]));
    }
    if ($opcao == "op2") {
        $vet1[] = "PG";
    }

    $vet1[] = $a1;
    $vet1[] = $r;
    $vet1[] = $qtnd;
// somatoria,media, mediana
    $vet1[] = $soma;
    $vet1[] = $media;
    $vet1[] = $mediana;
}


$classe->ObjParaJson($vet1, $nomearq);

//CalculaValores::setarNomeArq($nomearq);
//echo CalculaValores::getNomeArq();
header('location:http://localhost/SistemaPAPG/SistemaPAPG/Download.php');
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width-device-width,initial-scale=1.0"/>
        <title>Jogo Dos Dados</title>
        <link rel="stylesheet" type="text/css" href="css/estilo.css"/>
    </head>
    <body>

        <form action ="Download.php" method="POST">
            <input type ="hidden" id ="pegarnomearq" name="pegarnome" value="<?php echo $nomearq ?>">

        </form>

    </body>
</html>
