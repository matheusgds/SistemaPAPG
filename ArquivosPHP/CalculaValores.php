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

    static $nome;

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

    public function verificaehString($vetor) {
        $count = count($vetor);
        for ($i = 0; $i < $count; $i++) {
            if (is_string($vetor[$i])) {
                return ($i);
            }
        }
    }

    public function calculaSoma($vet2) {
        $qtd = count($vet2);
        for ($i = 0; $i < $qtd; $i++) {
            $soma = $soma + $vet2[$i];
        }
        return $soma;
    }

    public function calculaMedia($vet2) {
        $qtd = count($vet2);
        $media = self::calculaSoma($vet2) / $qtd;
        return $media;
    }

    public function calculaMediana($vet2) {
        $qtd = count($vet2);
        if ($qtd % 2 == 0) {
            $nummedia = $qtnd / 2; // 10 vai ficar 5
            $mediana = ($vet2[$nummedia] + $vet2[$nummedia + 1]) / 2;
        } else {
            $nummedia = $qtnd / 2;
            $mediana = floor(($vet2[$nummedia]));
        }
    }

    public function returnVetorGrafico($vet2) {
        $qtd = count($vet2);
        $array = ['Sequencia', 'teste'];
        $qtdarray = count($array);
        $grafico[0] = $array; // grafico[0][0]e grafico[0][1]
        for ($i = 1; $i < ($qtd + 1); $i++) {
            $newarray = [];
            $newarray = [$i, $vet2[($i - 1)]];
            $grafico[$i] = $newarray;
        }
       
        $contagem = count($grafico);

       // for ($o = 0; $o < $contagem; $o++) {
      //      for ($p = 0; $p < 2; $p++) {
     //           echo $grafico[$o][$p] . " ";
     //       }
    //    }


        $stringvolta = "";

        for ($o = 0; $o < $contagem; $o++) {
            $stringvolta = $stringvolta . '[';
            for ($p = 0; $p < 2; $p++) {
                if (($o === 0) && ($p == 0)) {
                    $stringvolta = $stringvolta . "'";
                } else
                if (($o === 0) && ($p == 1)) {
                    $stringvolta = $stringvolta . "'";
                }
                $stringvolta = $stringvolta . $grafico[$o][$p];
                if (($o === 0) && ($p == 0)) {
                    $stringvolta = $stringvolta . "',";
                } else
                if (($o === 0) && ($p == 1)) {
                    //$stringvolta = $stringvolta . "',";
                } else if ($p != 1) {
                    $stringvolta = $stringvolta . ",";
                }
            }
            
            if (($o != ($contagem-1)) && ($p != 1)) {
                $stringvolta = $stringvolta . "],";
            }else{
                $stringvolta = $stringvolta . "]";
            }
        }

        return $grafico;
    }

    public function verificaPAPG($vet2) {
        
    }

    public static function setarNomeArq($nomet) {
        Self::$nome = $nomet;
    }

    public static function getNomeArq() {
        return Self::$nome;
    }

}
