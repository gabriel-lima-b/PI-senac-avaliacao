<?php
class Notas
{

    private $id;
    private $id_criterio;
    private $id_avaliador;
    private $id_projeto;
    private $nota;
    
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
