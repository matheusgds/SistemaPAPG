<!DOCTYPE html>
<?php
require_once (realpath($_SERVER["DOCUMENT_ROOT"]) . "\SistemaPAPG\SistemaPAPG\ArquivosPHP\CalculaValores.php");
session_start();

$c = ".json";
$a = "http://localhost/SistemaPAPG/SistemaPAPG/ArquivosPHP/";
$b = $_SESSION['nomearquivo'];
$d = $a . $b . $c;
$comandoreal = realpath($_SERVER["DOCUMENT_ROOT"]);
$e = "\SistemaPAPG\SistemaPAPG\ArquivosPHP";
$e .= chr(92);
$diretorio = $comandoreal.$e.$b.$c;
$_SESSION['diretorio'] = $diretorio;


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
        <form action="ExcluirJSON.php" method="post">
            <a href= "<?php echo $d; ?>" name ="baixar" value="baixar" download>Baixar Arquivo</a>
            
            <button type="submit" name="Enviar" id="Enviar">>>></button>
        </form>
    </div>
    <?php
    ?>

</body>
