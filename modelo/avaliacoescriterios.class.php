<?php
class AvaliacoesCriterios
{

    private $id;
    private $id_criterio;
    private $id_avaliacao;
    private $peso_criterio;

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

    

}

?>