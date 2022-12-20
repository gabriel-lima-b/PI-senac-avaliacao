<?php
session_start();
session_unset();

include_once '../modelo/avaliacao.class.php';
include_once '../dao/avaliacaodao.class.php';

if (isset($_GET['op'])) {
    switch ($_GET['op']) {

        case 'salvar':

            if (
            isset($_POST['nomeEquipe']) &&
            isset($_POST['nomeProjeto']) &&
            isset($_POST['titulo']) &&
            isset($_POST['viabilidade']) &&
            isset($_POST['replicabilidade']) &&
            isset($_POST['inovacao']) &&
            isset($_POST['apresentacao']) &&
            isset($_POST['exibicao']) &&
            isset($_POST['observacao'])) {


                $nomeEquipe = $_POST["nomeEquipe"];
                $nomeProjeto = $_POST["nomeProjeto"];
                $titulo = $_POST['titulo'];
                $viabilidade = $_POST['viabilidade'];
                $replicabilidade = $_POST['replicabilidade'];
                $inovacao = $_POST['inovacao'];
                $apresentacao = $_POST['apresentacao'];
                $exibicao = $_POST['exibicao'];
                $observacao = $_POST['observacao'];

                $avaliacao = new Avaliacao();
                $avaliacao->nomeEquipe = $nomeEquipe;
                $avaliacao->nomeProjeto = $nomeProjeto;
                $avaliacao->titulo = $titulo;
                $avaliacao->viabilidade = $viabilidade;
                $avaliacao->replicabilidade = $replicabilidade;
                $avaliacao->inovacao = $inovacao;
                $avaliacao->apresentacao = $apresentacao;
                $avaliacao->exibicao = $exibicao;
                $avaliacao->observacao = $observacao;
                $avaliacao->calculaNotaFinal();

                $aDAO = new AvaliacaoDao();
                $aDAO->cadastrarAvaliacao($avaliacao);

                $_SESSION['msg'] = 'Avaliação Cadastrado!';
                $_SESSION['avaliacao'] = serialize($avaliacao);
                header("location:../visao/guiresposta.php");

            }
            break;

        case 'listar':
            $aDAO = new AvaliacaoDao();
            $array = array();
            $array = $aDAO->buscarAvaliacao();

            //Levar as informações para o GUIconsUsuario para mostrar na tela.
            $_SESSION['avaliacoes'] = serialize($array);
            header("location:../visao/guilistaavaliacao.php");
            break;
        default:
            echo 'Deu erro no switch!';
            break;
    }
}
else {
    echo 'Variavel op não existe!';
}

?>