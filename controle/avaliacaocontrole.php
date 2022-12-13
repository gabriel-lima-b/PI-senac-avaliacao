<?php
session_start();
session_unset();

include_once '../modelo/avaliacao.class.php';
include_once '../dao/avaliacaodao.class.php';

if (isset($_GET['op'])) {
    switch ($_GET['op']) {

        case 'salvar':
            var_dump($_GET['op']);
            var_dump($_POST['nomeEquipe']);
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
                var_dump($_POST['nomeEquipe']);

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

                $aDAO->cadastrarAvaliacao($a);

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