<?php
include_once '../persistencia/ConexaoBanco.class.php';

class MediaPonderadaDAO
{

    private $conexao = null;

    public function __construct()
    {
        $this->conexao = ConexaoBanco::getInstancia();
    } //fecha o construtor

    public function getMediasByIdAvaliacao($idAvaliacao,$idAvaliador,$idProjeto)
    {
        if($this->conexao == null){
            $this->conexao = ConexaoBanco::getInstancia();
        }
        try {
            $stat = $this->conexao->query("
            SELECT (SUM(notas.nota * avaliacoes_criterios.peso_criterio)/(SUM(avaliacoes_criterios.peso_criterio)))
               as nota_ponderada 
            from ((notas inner join criterios on notas.id_criterio = criterios.id)
            inner join avaliacoes_criterios on avaliacoes_criterios.id_criterio = criterios.id)
            where avaliacoes_criterios.id_avaliacao = ". $idAvaliacao . "
            and notas.id_avaliador = ". $idAvaliador . "
            and notas.id_projeto = ". $idProjeto . "
            group by notas.id_avaliador
            ORDER BY notas.id_avaliador");
            $array = array();
            $array = $stat->fetchAll(PDO::FETCH_COLUMN);
            $this->conexao = null;
            return $array;
        } catch (PDOException $e) {
            echo 'Erro ao buscar avaliacoesCriterios!' . $e;
        } //fecha o catch
    }

}