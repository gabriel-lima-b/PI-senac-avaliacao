<?php
include_once '../persistencia/ConexaoBanco.class.php';
include_once '../modelo/listNotasDTO.class.php';

class NotasDAO
{

    private $conexao = null;

    public function __construct()
    {
        $this->conexao = ConexaoBanco::getInstancia();
    } 

    public function getListNotasDTOByIdAvaliacao($id)
    {
        try {
            $stat = $this->conexao->query("
        SELECT
           DISTINCT avaliadores.nome as avaliador,
           notas.id_avaliador,
           notas.id_projeto, 
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


    public function cadastrarNota($nota)
    {
        if($this->conexao == null){
            $this->conexao = ConexaoBanco::getInstancia();
        }
        try {
            $stat = $this->conexao->prepare("
            insert into notas (ID_AVALIADOR, ID_CRITERIO, ID_PROJETO, NOTA)
            values (:avaliador, :criterio,
            (
              select id from projetos where nome = :projeto  
            ), :nota)");

            $stat->bindValue(":avaliador", $nota->avaliador, PDO::PARAM_INT);
            $stat->bindValue(":criterio", $nota->criterio, PDO::PARAM_INT);
            $stat->bindValue(":projeto", $nota->projeto, PDO::PARAM_STR);
            $stat->bindValue(":nota", $nota->nota, PDO::PARAM_INT);
            $stat->execute();


            $this->conexao = null;
        } catch (PDOException $e) {
            echo 'Erro ao cadastrar nota: ' . $e->getMessage();
        } 
    }
}

