<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
require_once (realpath($_SERVER["DOCUMENT_ROOT"]) . "\SistemaPAPG\SistemaPAPG\ArquivosPHP\CalculaValores.php");
session_start();

$a1 = $_POST["inputa1"];
$r = $_POST["inputr"];
$qtnd = $_POST["inputqtde"];
$opcao = $_POST["opcaoPAPG"];
$nomearq = $_POST["inputnamearq"];
$_SESSION['nomearquivo'] = $nomearq;
$soma = 0;
$media;
$mediana;
$nummedia;
$vet1;

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

CalculaValores::setarNomeArq($nomearq);
?>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../css/estilo.css"/>
        <title>Sistema PAPG</title>
    </head>
    <body>
        <div> 
            <h1 name="titulotopo" id="titulotopo"> SISTEMA PAPG</h1>
        </div>
        <div id="janelaManipulaDados" name="janelaManipulaDados">
            <input hidden="button" name="peganomedoarq" value="<?php echo $nomearq ?>">
            <a href="http://localhost/SistemaPAPG/SistemaPAPG/Download.php"> <button> Download Do Arquivo! Acesse Aqui</button> </a>
            
            <a href="http://localhost/SistemaPAPG/SistemaPAPG/JanelaPrincipal.php"> <button> Voltar ao Inicio</button> </a>
        </div>
    </body>
</html>
