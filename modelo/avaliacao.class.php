<?php
class Avaliacao
{

    private $titulo;
    private $viabilidade;
    private $replicabilidade;
    private $inovacao;
    private $apresentacao;
    private $exibicao;
    private $observacao;
    private $notaFinal;


    public function __construct()
    {

    }

    public function Avaliacao()
    {

    }

    public function __get($atrib)
    {
        return $this->$atrib;
    }

    public function __set($atrib, $valor)
    {
        $this->$atrib = $valor;
    }

    public function calculaNotaFinal()
    {
        $this->notaFinal = (
            $this->titulo * 10 +
            $this->viabilidade * 20 +
            $this->replicabilidade * 20 +
            $this->inovacao * 20 +
            $this->apresentacao * 20 +
            $this->exibicao * 10
            ) / 100;
    }
    public function __toString()
    {
        return '<br> Titulo: ' . $this->titulo .
            '<br> Viabilidade: ' . $this->viabilidade .
            '<br> Replicabilidade: ' . $this->replicabilidade .
            '<br> Inovação: ' . $this->inovacao .
            '<br> Apresentação do Projeto: ' . $this->apresentacao .
            '<br> Exibição visual: ' . $this->exibicao .
            '<br> Anotações / Observações: ' . $this->observacao;
    }

}

?>