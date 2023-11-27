<?php
class Notas
{

    private $id;
    private $criterio;
    private $avaliador;
    private $projeto;
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

    public function __toString(){
        return '<br> Criterio: ' . $this->criterio .
                '<br> Avaliador: ' . $this->avaliador .
                 '<br> projeto: ' . $this->projeto .
                 '<br> Nota: '. $this->nota;
    }
    

}

?>
