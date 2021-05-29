<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CalculaValores
 *
 * @author mathe
 */
class CalculaValores {
    

    public function CalculaPA($razao, $numseq, $a1) {
        $vetor = array();
        $vetor[0] = (int) $a1;
        $valor = 1;
        for ($i = 1; $i < $numseq; $i++) {
            $vetor[$i] = ($a1 + $valor * $razao);
            $valor = $valor + 1;
        }

        return $vetor;
    }

    public function CalculaPG($razao, $numseq, $a1) {
        $vetor = array();
        $vetor[0] = (int) $a1;
        $valor = 1;
        for ($i = 1; $i < $numseq; $i++) {
            $vetor[$i] = ($a1 * (pow($razao, $valor)));
            $valor = $valor + 1;
        }
        return $vetor;
    }

    public function ObjParaJson($vetoratual, $nomearq) {
        $nomearq = $nomearq . ".json";
        $dados_json = json_encode($vetoratual);
        $fp = fopen($nomearq, "w");
        fwrite($fp, $dados_json);
        fclose($fp);
    }

    public function JsonParaObj($nomeJson) {
        if (mb_strpos($nomeJson, ".json") == true) {
            $arquivo = file_get_contents($nomeJson);
            $json = json_decode($arquivo);
            return $json;
        } else {
            $nomeJson = $nomeJson . "json";
            $arquivo = file_get_contents($nomeJson);
            $json = json_decode($arquivo);
            return $json;
        }
    }
    

 
}
