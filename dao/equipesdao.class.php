<?php
include_once '../persistencia/ConexaoBanco.class.php';

class EquipesDAO
{

    private $conexao = null;

    public function __construct()
    {
        $this->conexao = ConexaoBanco::getInstancia();
    } //fecha o construtor

    public function getNomeEquipes($idAvaliacao)
    {
        try {
            $stat = $this->conexao->query("select equipes.id, equipes.nome, projetos.nome as projeto from equipes inner join projetos on equipes.id = projetos.id_equipe
             where projetos.id_avaliacao= " . $idAvaliacao);
            $array = array();
            $array = $stat->fetchAll(PDO::FETCH_CLASS);
            $this->conexao = null;
            return $array;
        } catch (PDOException $e) {
            echo 'Erro ao buscar os nomes das equipes!' . $e;
        } //fecha o catch
    }

}