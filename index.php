<?php
/**
* Tela inicial para leitura de contatos e fazer o CRUD
*/
require_once __DIR__ . "/core/bootstrap.php";
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
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css" media="all">
  <link rel="stylesheet" href="assets/css/font-awesome.min.css" type="text/css" media="all">
  <link rel="stylesheet" href="assets/css/skeleton.css" type="text/css" media="all">
  <link rel="icon" href="favicon.png">
  <title>Agenda de Contatos</title>
</head>
<body>
  <div class="container-fluid">
    <div class="row">
	  <div class="col-12 col-sm-4 col-md-3 text-left">
	    <aside class="section-bg">
		  <h4>Buscar contato:</h4>
		  <form id="search">
		    <input type="search" name="nome" class="form-control" placeholder="Nome, apelido, telefone ou e-mail" speech="speech" x-webkit-speech="">
	      </form>
		  <hr>
		  <h4>Estatísticas:</h4>
		  <ul>
		    <li><?php echo countContacts(); ?> cadastros</li>
			<li class="text-<?php echo isDeleted(0); ?>"><?php echo countContacts(0); ?> ativos</li>
			<li class="text-<?php echo isDeleted(1); ?>"><?php echo countContacts(1); ?> removidos</li>
		  </ul>
		  <hr>
		  <small><a href="admin" target="_blank" rel="nofollow">adm</a></small>
	    </aside>
	  </div>
	  <div class="col-12 col-sm-8 col-md-9 text-left">
		<main class="section-bg">
		  <p class="text-right"><i title="Alternar layout" class="fa fa-th cursor-pointer"></i></p>
   	      <div class="row" id="results"></div>
		</main>
      </div>
    </div>
  </div>
  
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/init.js"></script>
</body>
</html>