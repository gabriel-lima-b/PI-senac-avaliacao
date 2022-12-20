<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lista Avaliação</title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top" style="border-bottom: 0.3rem solid rgb(247 125 12);">
  <a class="navbar-brand" href="../index.html">
    <img src="../imagens/senac_logo_new.png" width="175px" height="65px" alt="">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse ml-2" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="../index.html">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="../visao/guicadavaliacao.php">Cadastrar Avaliação</a>
        </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Listar Avaliações</a>
      </li>
    </ul>
  </div>
</nav>

<div container>
<div class="row">
      <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto text-center form p-4">
  <table class="table table-hover">
    <thead>
      <!-- Button trigger modal -->
      <tr>
        <th scope="col">Nome da Equipe</th>
        <th scope="col">Nome do Projeto</th>
        <th scope="col">Nota Final</th>
        <th scope="col">Detalhes</th>
      </tr>
    </thead>
    <tbody>
    <?php
if (isset($_SESSION['avaliacoes'])) {
  include_once '../modelo/avaliacao.class.php';
  $avaliacoes = array();
  $avaliacoes = unserialize($_SESSION['avaliacoes']);
}
//TODO: modal ainda mostra apenas a primeira avaliacao 
foreach ($avaliacoes as $a) {
  echo
    '<tr>
        <td>' . $a->nomeEquipe . '</td>
        <td>' . $a->nomeProjeto . '</td>
        <td>' . $a->notaFinal . '</td>
        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Ver Detalhes
</button></td>
  </tr>';

  echo '<!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <ul class="list-group list-group-flush">
          <li class="list-group-item list-group-item-action text-left"><strong> Nome da Equipe: </strong> '
    . $a->nomeEquipe . '</li>
          <li class="list-group-item list-group-item-action text-left"><strong> Nome do Projeto: </strong>'
    . $a->nomeProjeto . '</li>
          <li class="list-group-item list-group-item-action text-left"><strong> Título: </strong>'
    . $a->titulo . '</li>
          <li class="list-group-item list-group-item-action text-left"><strong> Viabilidade: </strong>'
    . $a->viabilidade . '</li>
          <li class="list-group-item list-group-item-action text-left"><strong> Replicabilidade: </strong>'
    . $a->replicabilidade . '</li>
          <li class="list-group-item list-group-item-action text-left"><strong> Inovação: </strong>'
    . $a->inovacao . '</li>
          <li class="list-group-item list-group-item-action text-left"><strong> Apresentação: </strong>'
    . $a->apresentacao . '</li>
          <li class="list-group-item list-group-item-action text-left"><strong> Exibição: </strong>'
    . $a->exibicao . '</li>
          <li class="list-group-item list-group-item-action text-left"><strong> Nota Final: </strong>'
    . $a->notaFinal . '</li>
          <li class="list-group-item list-group-item-action text-left"><strong> Observação: </strong>'
    . $a->observacao . '</li>
        </ul> 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>';
}
?>
    </tbody>
  </table>
</div>
</div>
</div>







  </body>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>