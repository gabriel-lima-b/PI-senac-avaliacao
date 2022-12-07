<?php
session_start();
session_unset();

class AvaliacaoControle
{
    public static function calculaNotaFinal($titulo, $viabilidade, $replicabilidade, $inovacao, $apresentacao, $exibicao)
    {
        return (
            $titulo * 10 +
            $viabilidade * 20 +
            $replicabilidade * 20 +
            $inovacao * 20 +
            $apresentacao * 20 +
            $exibicao * 10
            ) / 100;
    }
}

?>