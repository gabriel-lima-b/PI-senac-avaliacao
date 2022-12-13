<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Form Avaliação</title>
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
    <a class="navbar-brand" href="index.php">
      <img src="imagens/senac_logo_new.png" width="175px" height="65px" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse ml-2" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="controle/avaliacaocontrole.php?op=listar">Listar Avaliações</a>
        </li>
      </ul>
    </div>
  </nav>


  <container class="container">
    <div class="row">
      <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto text-center form p-4">
      <form 
        class="m-2"
        action="controle/avaliacaocontrole.php?op=salvar"
        method="post"
      >
        <div class="form-row mb-3">
          <div class="col">
            <label for="nomeEquipe"><h5>Nome equipe:</h5></label>
            <input type="text" class="form-control" id="nomeEquipe" placeholder="Nome Equipe">
          </div>
    
          <div class="col">
            <label for="nomeProjeto"><h5>Nome projeto:</h5></label>
            <input type="text" class="form-control" id="nomeProjeto" placeholder="Nome Projeto">
          </div>
        </div>
        
        <div class="form-group">
          <label
            for="titulo"
            data-toggle="popover"
            data-trigger="focus"
            data-content="0 a 1"
          >
            <h5>Título:</h5> 
            <p class="text-justify ml-3">
              O título contempla a proposta do projeto.
            </p>
          </label>
          <select class="titulo form-control " id='titulo'>
<?php
for ($index = 0; $index <= 10; $index++) {
  echo "<option value=" . $index . '> ' . $index . ' </option>';
}
?>
          </select>
        </div>

        <div class="form-group">
            <label
            for="viabilidade"
            data-toggle="popover"
            data-trigger="focus"
            data-content="0 a 1"
          >
            <h5>Viabilidade da Solução:</h5> 
                <p class="text-justify ml-3">
                O projeto apresenta viabilidade para a necessidade apresentada pela empresa.
                </p>
            </label>
            <select class="viabilidade form-control " id='viabilidade'>
<?php
for ($index = 0; $index <= 10; $index++) {
  echo "<option value=" . $index . '> ' . $index . ' </option>';
}
?>
            </select>
        </div>

        <!-- Replicabilidade -->
        <div class="form-group">

<label
  for="replicabilidade"
  data-toggle="popover"
  data-trigger="focus"
  data-content="0 a 1"
>
<h5>Replicabilidade (Escalabilidade): </h5>
  <p class="text-justify ml-3">
  Capacidade do projeto de ser replicado em diferentes áreas/regiões.
  </p>
</label>
<select class="replicabilidade form-control " id='replicabilidade'>
<?php
for ($index = 0; $index <= 10; $index++) {
  echo "<option value=" . $index . '> ' . $index . ' </option>';
}
?>
  </select>
</div>

<!-- Inovação -->
<div class="form-group">

<label
  for="inovacao"
  data-toggle="popover"
  data-trigger="focus"
  data-content="0 a 1"
>
  <h5>Inovação</h5>
  <p class="text-justify ml-3">
  "Inovação é algo diferente que exerce impacto", ou seja, o projeto deve consistir em algo diferente/novo, ainda não incorporado aos processos gerenciais, produtos ou serviços, e que gerará resultados para os clientes, para a organização ou para as partes interessadas.
  </p>
</label>
<select class="inovacao form-control " id='inovacao'>
<?php
for ($index = 0; $index <= 10; $index++) {
  echo "<option value=" . $index . '> ' . $index . ' </option>';
}
?>
  </select>
</div>
<!-- Apresentação do projeto -->
<div class="form-group">

<label
  for="apresentacao"
  data-toggle="popover"
  data-trigger="focus"
  data-content="0 a 1"
>
<h5>Apresentação do Projeto - Pitch</h5>
  <p class="text-justify ml-3">
  Apresenta dentro do tempo estipulado e oferece uma visão geral do projeto, abordando</br>
   (a) necessidade, </br>
    (b) solução encontrada,</br>
     (c) e inovação do projeto.
  </p>
</label>
<select class="apresentacao form-control " id='apresentacao'>
<?php
for ($index = 0; $index <= 10; $index++) {
  echo "<option value=" . $index . '> ' . $index . ' </option>';
}
?>
  </select>
</div>
<!-- Exibição visual e apresentação oral -->
<div class="form-group">

<label
  for="exibicao"
  data-toggle="popover"
  data-trigger="focus"
  data-content="0 a 1"
>
<h5>Exibição visual e apresentação oral</h5>
    <p class="text-justify ml-3">
  A exibição visual deverá ser clara e objetiva, salientando os dados mais importantes para possibilitar o perfeito entendimento do projeto, utilizando preferencialmente recursos de informática.
    </p>
</label>
<select class="exibicao form-control " id='exibicao'>
<?php
for ($index = 0; $index <= 10; $index++) {
  echo "<option value=" . $index . '> ' . $index . ' </option>';
}
?>
  </select>
</div>

<div class="form-group">
    <label for="observacao"><h5>Anotações / Observações</h5></label>
    <textarea class="observacao form-control" id="observacao" rows="3"></textarea>
  </div>

<input type="submit" id="btn" class="btn btn-primary" style="background-color: rgb(247 125 12); border-color:rgb(247 125 12);" value="Salvar Avaliação">
      </form>

</div>
</div>

    </container>
  </body>
  <script
    src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"
  ></script>
  <script
    src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"
  ></script>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"
  ></script>
  <script>
    $(".popover-dismiss").popover({
      trigger: "focus",
    });
  </script>
</html>
