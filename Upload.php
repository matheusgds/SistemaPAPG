<?php
session_start();
$comandoreal = realpath($_SERVER["DOCUMENT_ROOT"]);
$e = "\SistemaPAPG\SistemaPAPG\ArquivosPHP";
$e .= chr(92);

$diretorio = $comandoreal . $e;

$file = $_FILES["arquivo"];
$novodiretorio = "$diretorio" . $file["name"];
$_SESSION['novonome'] = $novodiretorio;

if (move_uploaded_file($file["tmp_name"], "$diretorio" . $file["name"])) {
    echo "Arquivo enviado com sucesso!";
    header("location:JanelaMostraDados.php");
} else {
    echo "Erro, o arquivo não pode ser enviado.";
}
?>
