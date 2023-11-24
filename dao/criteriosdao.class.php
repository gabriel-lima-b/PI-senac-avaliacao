<?php
include_once '../persistencia/ConexaoBanco.class.php';
include_once '../modelo/criterioComNotaDTO.class.php';
class CriteriosDAO
{

    private $conexao = null;

    public function __construct()
    {
        $this->conexao = ConexaoBanco::getInstancia();
    } //fecha o construtor

    public function getCriterioById($id)
    {
        try {
            $stat = $this->conexao->query("select * from criterios
             where id= " . $id);
            $array = array();
            $array = $stat->fetchAll(PDO::FETCH_CLASS, 'Criterio');
            $this->conexao = null;
            return $array;
        } catch (PDOException $e) {
            echo 'Erro ao buscar Criterio!' . $e;
        } //fecha o catch
    }

    public function getNotasCriterioByIdAvaliacao($id)
    {
        try {
            $stat = $this->conexao->query("
            SELECT
            criterios.nome as criterio,
            notas.nota,
            ac.peso_criterio as peso
        FROM
            (
                (
                    notas
                    INNER JOIN projetos ON notas.id_projeto = projetos.id
                )
                INNER JOIN criterios ON notas.id_criterio = criterios.id
            )
            INNER JOIN avaliacoes_criterios ac ON ac.id_criterio = criterios.id
        WHERE
            notas.id_avaliador = (select id from avaliadores where nome = '".$id ."')
        ORDER BY
            notas.id_avaliador,criterios.id;");
            $array = array();
            $array = $stat->fetchAll(PDO::FETCH_CLASS, 'CriterioComNotaDTO');
            $this->conexao = null;
            return $array;
        } catch (PDOException $e) {
            echo 'Erro ao buscar Criterio!' . $e;
        } //fecha o catch
    }

    function getCriteriosByAvaliacao($idAvaliacao){
        try {
            $stat = $this->conexao->query("select criterios.id, criterios.nome, criterios.descricao 
                from criterios 
                inner join avaliacoes_criterios 
                  on criterios.id = avaliacoes_criterios.id_criterio
                where avaliacoes_criterios.id_avaliacao = " . $idAvaliacao."
                order by criterios.id");
            $array = array();
            $array = $stat->fetchAll(PDO::FETCH_CLASS);
            $this->conexao = null;
            return $array;
        } catch (PDOException $e) {
            echo 'Erro ao buscar Criterios por id Avaliacao!' . $e;
        } //fecha o catch
    }

}