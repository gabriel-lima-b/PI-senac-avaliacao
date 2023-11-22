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
    <link rel="stylesheet" href="../style.css">
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
    <div class="col-10 mx-auto text-center form p-4">
    <table class="table table-hover">
      <thead>
        <!-- Button trigger modal -->
        <tr>
        <th scope="col">ID</th>
          <th scope="col">Nome</th>
          <th scope="col">Descrição</th>
          <th scope="col">Data</th>
          <th scope="col">Critérios</th>
          <th scope="col">Notas</th>
        </tr>
      </thead>
      <tbody>
    <?php
if (isset($_SESSION['avaliacoes'])) {
  include_once '../modelo/avaliacao.class.php';
  include_once '../modelo/avaliacoescriterios.class.php';
  include_once '../modelo/criterio.class.php';
  include_once '../dao/criteriosdao.class.php';
  include_once '../dao/avaliacoescriteriosdao.class.php';
  include_once '../dao/notasdao.class.php';
  include_once '../dao/mediaPonderadaDAO.class.php';
  $avaliacoes = array();
  $avaliacoes = unserialize($_SESSION['avaliacoes']);
}
foreach ($avaliacoes as $a) {
  echo
    '<tr>
        <td>' . $a->id . '</td>
        <td>' . $a->nome . '</td>
        <td>' . $a->descricao . '</td>
        <td>' . $a->data . '</td>
        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
          Ver Critérios
            </button>
        </td>
        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#notasModal">
          Ver Notas
            </button>
        </td>
      </tr>
      </tbody>
      </table>
    </div>
  </div>
</div>';

  $avaliacoesCriteriosDAO = new AvaliacoesCriteriosDAO();
  $criterios = array();
  $criterios = $avaliacoesCriteriosDAO->getCriteriosByAvaliacaoId($a->id);

  echo '<!-- Modal Criterios-->
  <div class="modal  fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Critérios da avaliação</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="col-12 mx-auto text-center p-4">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">Criterio</th>
                  <th scope="col">Descrição</th>
                  <th scope="col">Escala</th>
                  <th scope="col">Peso</th>
                </tr>
              </thead>
              <tbody>';
              foreach ($criterios as $c) {
                $criterioDAO = new CriteriosDAO();
                $criterio = $criterioDAO->getCriterioById($c->id_criterio);
                foreach($criterio as $criterio){
                echo '<tr>
                <td>' . $criterio->nome . '</td>
                <td>' . $criterio->descricao . '</td>
                <td>' . $criterio->escala . '</td>
                <td>' . $c->peso_criterio . '</td>
                </tr>';
                }
              }
  echo '
              </tbody>
              </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>';


  echo '<!-- Modal Notas-->
  <div class="modal  fade" id="notasModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Notas da ' . $a->nome.'</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="col-12 mx-auto text-center p-4">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">Avaliador</th>
                  <th scope="col">Projeto</th>
                  <th scope="col">Nota final</th>
                  <th scope="col">Detalhes</th>
                </tr>
              </thead>
              <tbody>';

              $notasDAO = new NotasDAO();
              $listNotas = $notasDAO->getListNotasDTOByIdAvaliacao($a->id);

              $mediaDAO = new MediaPonderadaDAO();
              $listMediaPonderada = $mediaDAO->getMediasByIdAvaliacao($a->id);
              foreach($listNotas as $key=>$nota){
              echo '<tr>
              <td>' . $nota->avaliador . '</td>
              <td>' . $nota->projeto . '</td>
              <td>' . $listMediaPonderada[$key]. '</td>
              
              <td>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalNota'.$key . '">
                   Detalhes
                </button>
              </td>
              </tr>';
                
              }
  echo '
              </tbody>
              </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>';
  foreach($listNotas as $key=>$nota){
  echo '<!-- Modal Notas-->
  <div class="modal  fade" id="modalNota'.$key.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Notas do avaliador: ' . $nota->avaliador.'</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="col-12 mx-auto text-center p-4">
          <div class="row">
          <div class="col-3 mx-auto">
          <h5>Avaliador: </h5> <p>'.$nota->avaliador.'</p>
          </div>
          <div class="col-3 mx-auto">
          <h5>Projeto:</h5> <p>  '.$nota->projeto.'</p>
          </div>
          <div class="col-3 mx-auto">
          <h5>Equipe: </h5> <p>'.$nota->equipe.' </p>
          </div>  
          <div class="col-3 mx-auto">
          <h5>Média final: </h5> <p>'.$listMediaPonderada[$key].' </p>
          </div>  
          </div>
          <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">Critério</th>
                  <th scope="col">Peso</th>
                  <th scope="col">Nota</th>
                </tr>
              </thead>
              <tbody>';
             
             $criterioDAO = new CriteriosDAO();
             $listaCriteriosComNotas = $criterioDAO->getNotasCriterioByIdAvaliacao($nota->avaliador);
              
              foreach($listaCriteriosComNotas as $c){
              echo '<tr>
              <td>' . $c->criterio . '</td>
              <td>' . $c->peso . '</td>
              <td>' . $c->nota . '</td>
              </tr>';
                
            }
  echo '
              </tbody>
              </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>';
          }
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