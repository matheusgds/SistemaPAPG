<!DOCTYPE html>
<?php
require_once (realpath($_SERVER["DOCUMENT_ROOT"]) . "\SistemaPAPG\SistemaPAPG\ArquivosPHP\CalculaValores.php");
session_start();

$c = ".json";
$a = "http://localhost/SistemaPAPG/SistemaPAPG/ArquivosPHP/";
$b = $_SESSION['nomearquivo'];
$d = $a . $b . $c;

?>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/estilo.css"/>
    <title>Sistema PAPG</title>
</head>

<body>
<div> 
    <h1 name= "titulotopo" id="titulotopo"> SISTEMA PAPG</h1>
</div>
<div name="Download" id="Download">
    <h1> Download de arquivo </h1>
    
    <a href= "<?php echo $d; ?>" download>Baixar Arquivo</a>
    <a href="http://localhost/SistemaPAPG/SistemaPAPG/JanelaPrincipal.php"> <button> Voltar ao Inicio</button> </a>
</div>
<?php
?>
    
</body>
