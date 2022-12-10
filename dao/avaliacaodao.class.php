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
            $stat = $this->conexao->prepare("insert into avaliacao( idAvaliacao, nomeEquipe, nomeProjeto, 
            titulo, viabilidade, replicabilidade, inovacao, apresentacao, exibicao,
            observacao, notaFinal) values(null,?,?,?,?,?,?,?,?,?,?)");

            $stat->bindValue(1, $a->nomeEquipe);
            $stat->bindValue(2, $a->nomeProjeto);
            $stat->bindValue(3, $a->titulo);
            $stat->bindValue(4, $a->viabilidade);
            $stat->bindValue(5, $a->replicabilidade);
            $stat->bindValue(6, $a->inovacao);
            $stat->bindValue(7, $a->apresentacao);
            $stat->bindValue(8, $a->exibicao);
            $stat->bindValue(9, $a->observacao);
            $stat->bindValue(10, $a->notaFinal);

            $stat->execute();

            //Encerrando a conexão cm o banco
            $this->conexao = null;

        }
        catch (PDOException $e) {
            echo 'Erro ao cadastrar avaliação: ' . $e->getMessage();
        } //fecha o catch
    } //fecha o método cadastrarUsuario

    public function buscarAvaliação()
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