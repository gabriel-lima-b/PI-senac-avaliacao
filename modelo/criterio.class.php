<?php
class Criterio
{

    private $id;
    private $nome;
    private $descricao;
    private $escala;



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
        return '<br> ID: ' . $this->id .
            '<br> Nome: ' . $this->nome .
            '<br> Descricao: ' . $this->descricao .
            '<br> Escala: ' . $this->escala;
    }

}

?>