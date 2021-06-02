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
    static $variavelPEGAPAPG;


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
        //  if() // se é numero... 
        //se é string letras ne?


        $count = count($vetor);
        for ($i = 0; $i < $count; $i++) {

            if (count($vetor) == 0) {
                return TRUE;
            } else if (!(is_numeric($vetor[$i]))) {
                if (is_string($vetor[$i])) {
                    return FALSE;
                } else {
                    return TRUE;
                }
            } else if (is_string($vetor[$i])) {
                return FALSE;
            }
        }

        return FALSE;
    }

    public function calculaSoma($vet2) {
        $soma = 0;
        $qtd = count($vet2);
        for ($i = 0; $i < $qtd; $i++) {
            if (is_numeric($vet2[$i])) {
                $soma = $soma + $vet2[$i];
            }
        }
        return $soma;
    }

    public function calculaMedia($vet2) {
        $qtd = count($vet2);

        $resultadosoma = self::calculaSoma($vet2) / $qtd;
        return $resultadosoma;
    }

    public function calculaMediana($vet2) {
        $qtd = count($vet2);

        if ($qtd % 2 == 0) {
            $nummedia = $qtd / 2;
            if (is_numeric($vet2[$numedia]) && (is_numeric($vet2[$numedia + 1]))) {
                return $mediana = ($vet2[$nummedia] + $vet2[$nummedia + 1]) / 2;
            } else {
                return 0;
            }
        } else {
            $nummedia = $qtd / 2;
            if (is_numeric($vet2[$nummedia])) {
                return $mediana = floor(($vet2[$nummedia]));
            } else {
                return 0;
            }
        }
    }

    public function returnVetorGrafico($vet2) {

        $qtd = count($vet2);

        $vetor;

        for ($i = 0; $i < $qtd; $i++) {
            if (!is_numeric($i)) {
                return $vetor;
            }
        }
        for ($i = 0; $i < $qtd; $i++) {
            $newarray = [];
            $newarray = [$i + 1, $vet2[($i)]];
            $grafico[$i] = $newarray;
        }

        $nome = "teste123";

        self::ObjParaJson($grafico, $nome);

        /* $contagem = count($grafico);

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

          if (($o != ($contagem - 1)) && ($p != 1)) {
          $stringvolta = $stringvolta . "],";
          } else {
          $stringvolta = $stringvolta . "]";
          }
          } */

        return $grafico;
    }

    public function calculaPorcentagem($vet2, $verdadeiroPA, $verdadeiroPG) {
        $cont = count($vet2);
        if ($vet2[2] == "PA") {
            return 100;
        } else if ($vet2[2] == "PG") {
            return 100;
        } else {

            $contpa = 0;
            $contpg = 0;

            for ($i = 0; $i < $cont; $i++) {
                if ($verdadeiroPA[$i] == $vet2[$i]) {
                    $contpa = $contpa + 1;
                }
                if ($verdadeiroPG[$i] == $vet2[$i]) {
                    $contpg = $contpg + 1;
                }
            }

            if ($contpa > $contpg) {
                self::$variavelPEGAPAPG = "PA";
                $conta = 100 * $contpa;
                return $porcentagem = $conta / $cont;
            } else if ($contpg > $contpa) {
                self::$variavelPEGAPAPG = "PG";
                $conta = 100 * $contpg;
                return $porcentagem = $conta / $cont;
            } else {
                self::$variavelPEGAPAPG = "PAPG";
                $porcentagem = 50;
                return $porcentagem;
            }
        }
    }

    public function verificaPAPG($vet2) {

        $vetor;


        if (self::verificaehString($vet2) == FALSE) {

            $cont;
            $primeiroelemento = $vet2[0];
            $segundoelemento = $vet2[1];
            $numSeq = count($vet2);
            //3             //1   = razao   = 2
            $testeRazaoPA = $segundoelemento - $primeiroelemento;
            //3            /   1    =   3 
            $testeRazaoPG = $segundoelemento / $primeiroelemento;
            $verdadeiroPA = self::CalculaPA($testeRazaoPA, $numSeq, $primeiroelemento);
            $verdadeiroPG = self::CalculaPG($testeRazaoPG, $numSeq, $primeiroelemento);

            //$porcentagem

            $terceiroelementoPA = $verdadeiroPA[2]; //
            $terceiroelementoPG = $verdadeiroPG[2]; //

            $vetor[0] = $primeiroelemento; // elemento A1
            // lembrar de colocar if para averiguar se há algum objeto como letra, ou caracteres especiais
            if ($terceiroelementoPA == $vet2[2]) {

                for ($i = 3; $i < $numSeq; $i++) {
                    if ($verdadeiroPA[$i] != $vet2[$i]) {
                        $vetor[1] = $testeRazaoPA;
                        $vetor[2] = "N";
                        $vetor[3] = $numSeq;
                        $vetor[4] = self::calculaSoma($vet2);
                        $vetor[5] = self::calculaMedia($vet2);
                        $vetor[6] = self::calculaMediana($vet2);
                        $vetor[7] = self::calculaPorcentagem($vet2, $verdadeiroPA, $verdadeiroPG);
                        $vetor[8] = self::$variavelPEGAPAPG;
                        return $vetor;
                    }
                }
                $vetor[1] = $testeRazaoPA;
                $vetor[2] = "PA";
                $vetor[3] = $numSeq;
                $vetor[4] = self::calculaSoma($vet2);
                $vetor[5] = self::calculaMedia($vet2);
                $vetor[6] = self::calculaMediana($vet2);
                $vetor[7] = self::calculaPorcentagem($vet2, $verdadeiroPA, $verdadeiroPG);
                return $vetor;
            } else if ($terceiroelementoPG == $vet2[2]) {
                for ($i = 3; $i < $numSeq; $i++) {
                    if ($verdadeiroPG[$i] != $vet2[$i]) {
                        $vetor[1] = 0;
                        $vetor[2] = "N";
                        $vetor[3] = $numSeq;
                        $vetor[4] = self::calculaSoma($vet2);
                        $vetor[5] = self::calculaMedia($vet2);
                        $vetor[6] = self::calculaMediana($vet2);
                        $vetor[7] = self::calculaPorcentagem($vet2, $verdadeiroPA, $verdadeiroPG);
                        $vetor[8] = self::$variavelPEGAPAPG;
                        return $vetor;
                    }
                }
                $vetor[1] = $testeRazaoPG;
                $vetor[2] = "PG";
                $vetor[3] = $numSeq;
                $vetor[4] = self::calculaSoma($vet2);
                $vetor[5] = self::calculaMedia($vet2);
                $vetor[6] = self::calculaMediana($vet2);
                $vetor[7] = self::calculaPorcentagem($vet2, $verdadeiroPA, $verdadeiroPG);
                return $vetor;
            } else {
                $vetor[1] = 0;
                $vetor[2] = "N";
                $vetor[3] = $numSeq;
                $vetor[4] = self::calculaSoma($vet2);
                $vetor[5] = self::calculaMedia($vet2);
                $vetor[6] = self::calculaMediana($vet2);
                $vetor[7] = self::calculaPorcentagem($vet2, $verdadeiroPA, $verdadeiroPG);
                $vetor[8] = self::$variavelPEGAPAPG;

                return $vetor;
            }
        } else {
            $vetor[0] = 0;
            $vetor[1] = 0;
            $vetor[2] = "N";
            $vetor[3] = 0;
            $vetor[4] = 0;
            $vetor[5] = 0;
            $vetor[6] = 0;
            $vetor[7] = 0;

            return $vetor;
        }
    }

    public static function setarNomeArq($nomet) {
        Self::$nome = $nomet;
    }

    public static function getNomeArq() {
        return Self::$nome;
    }

    public function verificaJson($dados) {
        if (self::verificaehString($dados)) {

            $contador = count($dados);

            // se for diferente de so numero
            $str = "";

            for ($i = 0; $i < $contador; $i++) {
                $str = $str . $dados[$i];
            }

            $tam = strlen($str);

            for ($j = 0; $j < $tam; $j++) {
                if (!str_contains($str, '"')) {
                    return FALSE;
                }
            }
        } else {
            return TRUE;
        }
    }


}
