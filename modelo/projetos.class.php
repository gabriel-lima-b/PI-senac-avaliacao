<?php
class Projetos
{

    private $id;
    private $nome;
    private $id_equipe;
    private $id_avaliacao;

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