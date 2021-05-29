<!DOCTYPE html>
<?php
require_once (realpath($_SERVER["DOCUMENT_ROOT"]) . "\SistemaPAPG\SistemaPAPG\ArquivosPHP\CalculaValores.php");
session_start();

$c = ".json";
$a = "http://localhost/SistemaPAPG/SistemaPAPG/ArquivosPHP/";
$b = $_SESSION['nomearquivo'];
echo $b;
$d = $a . $b . $c;

echo $d;
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width,initial-scale=1.0"/>
    <link rel="stylesheet" type="text/css" href="css/estilo.css"/>
    <title>Sistema PAPG</title>
</head>

<body>
<div> 
    <h1 name= "titulotopo" id="titulotopo"> SISTEMA PAPG</h1>
</div>
<div name="Upload" id="Upload">
    <h1> Download de arquivo </h1>
    <?php "ola" ?>
    <a href= "<?php $d; ?>" download>Baixar Arquivo</a>
</div>
<?php
?>
    
</body>
