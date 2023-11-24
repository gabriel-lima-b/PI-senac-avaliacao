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
          <a class="nav-link" href="../controle/avaliacaocontrole.php?op=listar">Listar Avaliações</a>
        </li>
      </ul>
    </div>
  </nav>


  <container class="container">
    <div class="row">
      <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto text-center form p-4">
      <form 
        class="m-2"
        action="../controle/avaliacaocontrole.php?op=salvar"
        method="post"
      >
        <div class="form-row mb-3">
          <div class="col">
            <label for="nomeEquipe"><h5>Nome equipe:</h5></label>
            <select class="form-control " name="equipe" id='equipe' placeholder= 'Selecione a equipe' onChange='changeProjectName()'>
<?php
include_once '../dao/equipesdao.class.php';
include_once '../dao/projetosdao.class.php';
$projetosDao = new ProjetosDAO();
$equipesDao = new EquipesDAO();
//TODO: implementar o cadastro de notas para diferentes avaliacoes;
$listaNomesEquipes = $equipesDao->getNomeEquipes(1);

echo "<option value=-1>Selecione a equipe</option>";

foreach ($listaNomesEquipes as $equipe) {
  echo "<option value=" .$equipe->id . '> ' . $equipe->nome . ' </option>';
}

echo "  <script>
const mapNomeProjeto = new Map();
mapNomeProjeto.set(-1, 'Nome Projeto');
";
$listaProjetos = $projetosDao->getProjetos();
foreach($listaProjetos as $projeto){
  echo "
  mapNomeProjeto.set(". $projeto->id . ",'". $projeto->nome ."');
  ";

}
echo "
function changeProjectName(){
  var textoNomeProjeto = document.getElementById('nomeProjeto');
  var selectedOption = $('#equipe').val();
  textoNomeProjeto.value = mapNomeProjeto.get(Number(selectedOption));
}
</script>";
?>
          </select>
          </div>
    

          <div class="col">
            <label for="nomeProjeto"><h5>Nome projeto:</h5></label>
            <input type="text" class="form-control" name="nomeProjeto" id="nomeProjeto" placeholder="Nome Projeto" disabled onload="changeProjectName()">
          </div>
        </div>
  
<?php
include_once '../dao/criteriosdao.class.php';
$criteriosDao = new CriteriosDAO();
$listCriterios = $criteriosDao->getCriteriosByAvaliacao(1);

foreach ($listCriterios as $criterio){

  echo"
  <div class='form-group'>
          <label
            for='form-" . $criterio->id . "'
            data-toggle='popover'
            data-trigger='focus'
            data-content='0 a 1'
          >
            <h5>" . $criterio->nome . "</h5> 
            <p class='text-justify ml-3'>
              ". $criterio->descricao ."
            </p>
          </label>
          <select class='form-control' name='form-" . $criterio->id . "' id='form-" . $criterio->id . "'>
  ";
for ($index = 0; $index <= 10; $index++) {
  echo "<option value=" . $index . '> ' . $index . ' </option>';
}
echo "
</select>
        </div>
";
          
}
?>

<div class="form-group">
    <label for="observacao"><h5>Anotações / Observações</h5></label>
    <textarea class="observacao form-control" name="observacao" id="observacao" rows="3"></textarea>
  </div>

<input type="submit" name="btn" id="btn" class="btn btn-primary" style="background-color: rgb(247 125 12); border-color:rgb(247 125 12);" value="Salvar Avaliação">
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
