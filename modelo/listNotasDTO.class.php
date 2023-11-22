<?php
class ListNotasDTO
{

    private $avaliador;
    private $projeto;
    private $equipe;
    private $criterio;
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
