<?php
include_once '../persistencia/ConexaoBanco.class.php';

class AvaliacoesCriteriosDAO
{

    private $conexao = null;

    public function __construct()
    {
        $this->conexao = ConexaoBanco::getInstancia();
    } //fecha o construtor

    public function getCriteriosByAvaliacaoId($idAvaliacao)
    {
        try {
            $stat = $this->conexao->query("select * from avaliacoes_criterios
             where id_avaliacao= " . $idAvaliacao);
            $array = array();
            $array = $stat->fetchAll(PDO::FETCH_CLASS, 'AvaliacoesCriterios');
            $this->conexao = null;
            return $array;
        } catch (PDOException $e) {
            echo 'Erro ao buscar avaliacoesCriterios!' . $e;
        } //fecha o catch
    }

}