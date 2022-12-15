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

<?php
if (isset($_SESSION['avaliacoes'])) {
  include_once '../modelo/avaliacao.class.php';
  $avaliacoes = array();
  $avaliacoes = unserialize($_SESSION['avaliacoes']);
  var_dump($avaliacoes);
}

foreach ($avaliacoes as $a) {
  echo '<p>' . $a->__toString() . '</p>';
}
?>

  </body>
</html>