<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8"><meta name="viewport" content="width-device-width,initial-scale=1.0"/>
        <link rel="stylesheet" type="text/css" href="css/estilo.css"/>
        <title>Sistema PAPG</title>
    </head>
    <body>
        <div> 
            <h1 name="titulotopo" id="titulotopo"> SISTEMA PAPG</h1>
        </div>
        <div name="Upload" id="Upload">
            <h1> MENU DE UPLOAD </h1>
            <form action="Upload.php" method="post" enctype="multipart/form-data">
                <label for="file">Selecione o Arquivo:</label>
                <input type="file" name="arquivo" />
                <br> <br>
                <button type="submit" name="import" id="import">Importar Arquivo Json</button>
            </form>
            <br> <br>

        </div>
        <?php
        // put your code here
        ?>
    </body>
</html>
