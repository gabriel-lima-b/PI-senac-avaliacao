<?php
session_start();
session_unset();

include_once '../modelo/avaliacao.class.php';

if (isset($_GET['op'])) {
    switch ($_GET['op']) {

        case 'salvar':
            if (isset($_POST['titulo']) &&
            isset($_POST['viabilidade']) &&
            isset($_POST['replicabilidade']) &&
            isset($_POST['inovacao']) &&
            isset($_POST['apresentacao']) &&
            isset($_POST['exibicao']) &&
            isset($_POST['observacao'])) {

                $titulo = $_POST['titulo'];
                $viabilidade = $_POST['viabilidade'];
                $replicabilidade = $_POST['replicabilidade'];
                $inovacao = $_POST['inovacao'];
                $apresentacao = $_POST['apresentacao'];
                $exibicao = $_POST['exibicao'];
                $observacao = $_POST['observacao'];

                $avaliacao = new Avaliacao();
                $avaliacao->titulo = $titulo;
                $avaliacao->viabilidade = $viabilidade;
                $avaliacao->replicabilidade = $replicabilidade;
                $avaliacao->inovacao = $inovacao;
                $avaliacao->apresentacao = $apresentacao;
                $avaliacao->exibicao = $exibicao;
                $avaliacao->observacao = $observacao;
                $avaliacao->calculaNotaFinal();

                $_SESSION['avaliacao'] = serialize($avaliacao);
                header("location:../visao/formCadastrado.php");

            }
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