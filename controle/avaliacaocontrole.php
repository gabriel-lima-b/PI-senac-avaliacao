<?php
session_start();
session_unset();

include_once '../modelo/avaliacao.class.php';
include_once '../dao/avaliacaodao.class.php';
include_once '../modelo/notas.class.php';
include_once '../dao/notasdao.class.php';

if (isset($_GET['op'])) {
    switch ($_GET['op']) {

        case 'salvar':
            if (
            isset($_POST['equipe']) &&
            isset($_POST['nomeProjeto']) &&
            isset($_POST['form-13']) &&
            isset($_POST['form-14']) &&
            isset($_POST['form-15']) &&
            isset($_POST['form-16']) &&
            isset($_POST['form-17']) &&
            isset($_POST['form-18']) ) {

                $nomeProjeto = $_POST["nomeProjeto"];
                $titulo = $_POST['form-13'];
                $viabilidade = $_POST['form-14'];
                $replicabilidade = $_POST['form-15'];
                $inovacao = $_POST['form-16'];
                $apresentacao = $_POST['form-17'];
                $exibicao = $_POST['form-18'];
                
                $nota13 = new Notas();
                $nota13->id = null;
                $nota13->criterio = 13;
                $nota13->avaliador = 1;
                $nota13->projeto = $nomeProjeto;
                $nota13->nota = $titulo;
                
                $nota14 = new Notas();
                $nota14->id = null;
                $nota14->criterio = 14;
                $nota14->avaliador = 1;
                $nota14->projeto = $nomeProjeto;
                $nota14->nota = $viabilidade;

                $nota15 = new Notas();
                $nota15->id = null;
                $nota15->criterio = 15;
                $nota15->avaliador = 1;
                $nota15->projeto = $nomeProjeto;
                $nota15->nota = $replicabilidade;

                $nota16 = new Notas();
                $nota16->id = null;
                $nota16->criterio = 16;
                $nota16->avaliador = 1;
                $nota16->projeto = $nomeProjeto;
                $nota16->nota = $inovacao;

                $nota17 = new Notas();
                $nota17->id = null;
                $nota17->criterio = 17;
                $nota17->avaliador = 1;
                $nota17->projeto = $nomeProjeto;
                $nota17->nota = $apresentacao;

                $nota18 = new Notas();
                $nota18->id = null;
                $nota18->criterio = 18;
                $nota18->avaliador = 1;
                $nota18->projeto = $nomeProjeto;
                $nota18->nota = $exibicao;

                $notasDAO = new NotasDao();
                
                $notasDAO->cadastrarNota($nota13);
                $notasDAO->cadastrarNota($nota14);
                $notasDAO->cadastrarNota($nota15);
                $notasDAO->cadastrarNota($nota16);
                $notasDAO->cadastrarNota($nota17);
                $notasDAO->cadastrarNota($nota18);

                $_SESSION['msg'] = 'Nota Cadastrada!';
                
              //  header("location:../visao/guiresposta.php");

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