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
  </head>
  <body>
    <container class="container">
      <form class="m-2">
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
          <select class="titulo form-control w-50">
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
            <select class="viabilidade form-control w-50">
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
<select class="replicabilidade form-control w-50">
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
  for="titulo"
  data-toggle="popover"
  data-trigger="focus"
  data-content="0 a 1"
>
  <h5>Inovação</h5>
  <p class="text-justify ml-3">
  "Inovação é algo diferente que exerce impacto", ou seja, o projeto deve consistir em algo diferente/novo, ainda não incorporado aos processos gerenciais, produtos ou serviços, e que gerará resultados para os clientes, para a organização ou para as partes interessadas.
  </p>
</label>
<select class="titulo form-control w-50">
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
  for="titulo"
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
<select class="titulo form-control w-50">
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
  for="titulo"
  data-toggle="popover"
  data-trigger="focus"
  data-content="0 a 1"
>
<h5>Exibição visual e apresentação oral</h5>
    <p class="text-justify ml-3">
  A exibição visual deverá ser clara e objetiva, salientando os dados mais importantes para possibilitar o perfeito entendimento do projeto, utilizando preferencialmente recursos de informática.
    </p>
</label>
<select class="titulo form-control w-50">
<?php
for ($index = 0; $index <= 10; $index++) {
    echo "<option value=" . $index . '> ' . $index . ' </option>';
}
?>
  </select>
</div>

<div class="form-group">
    <label for="observacao"><h5>Anotações / Observações</h5></label>
    <textarea class="form-control w-75" id="observacao" rows="3"></textarea>
  </div>

        <button type="submit" class="btn btn-primary">Salvar Avalição</button>
      </form>

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
