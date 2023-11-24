<?php
include_once '../persistencia/ConexaoBanco.class.php';

class ProjetosDAO
{

    private $conexao = null;

    public function __construct()
    {
        $this->conexao = ConexaoBanco::getInstancia();
    } //fecha o construtor

    public function getProjetos()
    {
        try {
            $stat = $this->conexao->query("select id, nome from projetos");
            $array = array();
            $array = $stat->fetchAll(PDO::FETCH_CLASS);
            $this->conexao = null;
            return $array;
        } catch (PDOException $e) {
            echo 'Erro ao buscar projetos by id equipe!' . $e;
        } //fecha o catch
    }

}