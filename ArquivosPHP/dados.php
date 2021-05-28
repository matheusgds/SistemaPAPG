<?php

include("../ArquivosPHP/CalculaValores.php");

$a1 = $_POST["inputa1"];
$r = $_POST["inputr"];
$qtnd = $_POST["inputqtde"];
$opcao = $_POST["opcaoPAPG"];
$nomearq = $_POST["inputnamearq"];


$classe = new CalculaValores();
$vet1 = $classe->CalculaPA($r, $qtnd, $a1);
$met = $classe->ObjParaJson($vet1, $nomearq);

?>