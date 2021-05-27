<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width-device-width,initial-scale=1.0"/>
        <link rel="stylesheet" type="text/css" href="css/estilo.css"/>
        <title>Sistema PAPG</title>
    </head>
    <body>
        <div> 
            <h1 name="titulotopo" id="titulotopo"> SISTEMA PAPG</h1>
        </div>
        <div name="paginabotoes" id="paginabotoes">
            <h2 name="titulomeio" id="titulomeio"> Dados da Progressão: </h2>
            <form>
                <br><br>
                <label>Insira O Termo A1 (Primeiro Termo):</label>
                <input id="inputa1" type="text" name="inputa1" placeholder="Termo A1">
                <br><br>
                <label>Insira a R (Razão):</label>
                <input id="inputr" type="text" name="inputr" placeholder="Razão">
                <br><br>
                <label>Insira a Quantidade De Termos (Elementos Da Sequencia):</label>
                <input id="inputqtde" type="text" name="inputqtde" placeholder="Quantidade Elementos">
                <br><br>
                <label>Selecione o Tipo de Progressão ao Lado:</label>
                <INPUT TYPE="RADIO" NAME="opcaoPAPG" id="inputpapg" VALUE="op1"> PA
                <INPUT TYPE="RADIO" NAME="opcaoPAPG" id="inputpapg" VALUE="op2"> PG
                <br><br>

                <button type="submit">Enviar</button>
            </form>
        </div>
        <?php
        ?>
    </body>
</html>
