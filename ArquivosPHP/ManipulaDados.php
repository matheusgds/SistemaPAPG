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

$vet2 = [];

$classe = new CalculaValores();

if ($opcao == "op1") {
    $vet2 = $classe->CalculaPA($r, $qtnd, $a1);
} else if ($opcao == "op2") {
    $vet2 = $classe->CalculaPG($r, $qtnd, $a1);
}

$classe->ObjParaJson($vet2, $nomearq);

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
