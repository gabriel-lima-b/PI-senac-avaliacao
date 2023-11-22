<?php
include_once '../persistencia/ConexaoBanco.class.php';
include_once '../modelo/listNotasDTO.class.php';

class NotasDAO
{

    private $conexao = null;

    public function __construct()
    {
        $this->conexao = ConexaoBanco::getInstancia();
    } //fecha o construtor

    public function getListNotasDTOByIdAvaliacao($id)
    {
        try {
            $stat = $this->conexao->query("
        SELECT
           DISTINCT avaliadores.nome as avaliador,
            projetos.nome as projeto,
            equipes.nome as equipe
        FROM
                (
                    (
                        (
                            notas
                            INNER JOIN avaliadores ON notas.id_avaliador = avaliadores.id
                        )
                        INNER JOIN projetos ON notas.id_projeto = projetos.id
                    )
                    INNER JOIN equipes ON projetos.id_equipe = equipes.id
                )
                
            WHERE projetos.id_avaliacao = " . $id . 
            " ORDER BY notas.id_avaliador");
            $array = array();
            $array = $stat->fetchAll(PDO::FETCH_CLASS, 'ListNotasDTO');
            $this->conexao = null;
            return $array;
        } catch (PDOException $e) {
            echo 'Erro ao buscar ListNotasDTO!' . $e;
        } //fecha o catch
    }

}

