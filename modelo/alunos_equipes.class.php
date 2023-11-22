<?php
class AlunosEquipes
{

    private $id;
    private $id_equipe;
    private $id_aluno;

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