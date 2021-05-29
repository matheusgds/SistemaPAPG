<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width-device-width,initial-scale=1.0"/>
        <link rel="stylesheet" type="text/css" href="css/estilo.css"/>
        <title>Sistema PAPG</title>
    </head>
    <body>
        <?php 
        include("ArquivosPHP/dados.php");
        $a ="http://localhost/SistemaPAPG/SistemaPAPG/ArquivosPHP/";
        
        $b = $nomearq;
        $c = ".json";
        $d = $a.$b.$c;
        ?>
        <div> 
            <h1 name= "titulotopo" id="titulotopo"> SISTEMA PAPG</h1>
        </div>
        <div name="Upload" id="Upload">
            <h1> Download de arquivo </h1>
            
            <?php echo "http://localhost/SistemaPAPG/SistemaPAPG/ArquivosPHP/"?>
           <?php $a ?>
           <?php echo $d ?>
            <a href= "http://localhost/SistemaPAPG/SistemaPAPG/ArquivosPHP/" download>Baixar Arquivo</a>

        </div>
        <?php
           
        ?>
    </body>
</html>
