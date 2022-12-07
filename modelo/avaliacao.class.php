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