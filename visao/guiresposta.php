<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Respostas</title>
  </head>
  <body>

  <div class="post">
				<!-- InstanceBeginEditable name="conteúdo" -->
		<h2 class="title">Pagina Resposta</h2>
		<p>
			<?php
if (isset($_SESSION['msg'])) {

  include '../modelo/avaliacao.class.php';

  echo '<br>' . $_SESSION['msg'];
} //fecha o if
?>
		</p>
  </body>
</html>
