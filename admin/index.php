<?php
/**
* A tela controladora da admin
*/

require_once __DIR__ . '/../core/bootstrap.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="expires" content="-1">
  <meta http-equiv="pragma" content="no-cache">
  <meta name="robots" content="noindex,nofollow">
  <meta name="googlebot" content="noindex,nofollow">
  <meta name="rating" content="general">
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css" type="text/css" media="all">
  <link rel="stylesheet" href="../assets/css/admin.css" type="text/css" media="all">
  <link rel="icon" href="../favicon.png">
  <title>Administração - Agenda de Contatos</title>
  <script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
  <script src="../assets/js/scripts.min.js"></script>
  <script src="../assets/js/admin.js"></script>
</head>
<body>
  <main>
	<?php
    if (isset($_COOKIE['sess_admin_agenda']) && !empty($_COOKIE['sess_admin_agenda'])) {
    ?>
    <header class="container">
      <div class="row">
        <div class="col-12 text-center">
		  <ul class="list-inline">
            <li class="list-inline-item"><a href="index.php?page=home&action=list">Home</a></li>
            <li class="list-inline-item"><a href="index.php?page=contato&action=list&param=0">Contatos ativos</a></li>
			<li class="list-inline-item"><a href="index.php?page=contato&action=list&param=1">Contatos inativos</a></li>
			<li class="list-inline-item"><a style="color:#004f75" href="index.php?page=contato&action=add">Adicionar contatos</a></li>
			<li class="list-inline-item"><a href="index.php?page=admin&action=update">Gerenciar admin</a></li>
			<li class="list-inline-item"><a href="off.php">Sair</a></li>
		  </ul>
        </div>
      </div>
    </header>
	<?php
	}
	?>
    <section class="container">
      <div class="row">
        <div class="col-12">
		  <?php
		  if (isset($_GET['page'])) {
		    checkRoute($_GET['page'],$_GET['action']);
		  } else {
			checkRoute("login","list");
		  }
		  ?>
        </div>
      </div>
    </section>
  </main>
</body>
</html>