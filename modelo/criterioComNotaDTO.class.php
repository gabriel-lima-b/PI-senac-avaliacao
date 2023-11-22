<?php
class CriterioComNotaDTO
{

    
    private $criterio;
    private $nota;
    private $peso;



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