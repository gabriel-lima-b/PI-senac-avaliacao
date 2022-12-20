<?php
include '../persistencia/ConexaoBanco.class.php';

class AvaliacaoDao
{

    private $conexao = null;

    public function __construct()
    {
        $this->conexao = ConexaoBanco::getInstancia();
    } //fecha o construtor

    public function cadastrarAvaliacao($a)
    {

        try {
            $stat = $this->conexao->prepare("insert into avaliacao( idAvaliacao, nomeEquipe, nomeProjeto, titulo, viabilidade, replicabilidade, inovacao, apresentacao, exibicao, observacao, notaFinal)
             values(null,:nomeEquipe, :nomeProjeto, :titulo, :viabilidade, :replicabilidade, :inovacao, :apresentacao, :exibicao, :observacao, :notaFinal)");

            $stat->bindValue(":nomeEquipe", $a->nomeEquipe, PDO::PARAM_STR);
            $stat->bindValue(":nomeProjeto", $a->nomeProjeto, PDO::PARAM_STR);
            $stat->bindValue(":titulo", $a->titulo, PDO::PARAM_INT);
            $stat->bindValue(":viabilidade", $a->viabilidade, PDO::PARAM_INT);
            $stat->bindValue(":replicabilidade", $a->replicabilidade, PDO::PARAM_INT);
            $stat->bindValue(":inovacao", $a->inovacao, PDO::PARAM_INT);
            $stat->bindValue(":apresentacao", $a->apresentacao, PDO::PARAM_INT);
            $stat->bindValue(":exibicao", $a->exibicao, PDO::PARAM_INT);
            $stat->bindValue(":observacao", $a->observacao, PDO::PARAM_STR);
            $stat->bindValue(":notaFinal", $a->notaFinal, PDO::PARAM_INT);

            $stat->execute();

            //Encerrando a conexão cm o banco
            $this->conexao = null;

        }
        catch (PDOException $e) {
            echo 'Erro ao cadastrar avaliação: ' . $e->getMessage();
        } //fecha o catch
    } //fecha o método cadastrarUsuario

    public function buscarAvaliacao()
    {
        try {
            $stat = $this->conexao->query("select * from avaliacao");
            $array = array();
            $array = $stat->fetchAll(PDO::FETCH_CLASS, 'Avaliacao');
            $this->conexao = null;
            return $array;
        }
        catch (PDOException $e) {
            echo 'Erro ao buscar avaliações!' . $e;
        } //fecha o catch
    } //fecha o método buscarUsuarios
}