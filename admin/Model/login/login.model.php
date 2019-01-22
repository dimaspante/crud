<?php

require __DIR__ . '/../../../core/bootstrap.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['user'])) {
  $test = $_POST['surname'];
  $user = $_POST['user'];
  $pass = $_POST['pass'];
  
  if (!empty($test)) {
	header("Location:../../index.php?err=9");
	exit();
  }

  $stmt = $pdo->prepare("SELECT id_admin, senha_admin FROM admin WHERE apelido_admin = :ap LIMIT 1");
  $stmt->bindParam(':ap', $user);
  $stmt->execute();
  
  if ($row = $stmt->fetch()) {
	$token = password_verify($pass,$row['senha_admin']);
	
	if ($token) {
	  //checa se estamos no localhost para usar ou não o domínio no cookie
	  $dominio = ($_SERVER['HTTP_HOST'] == 'localhost') ? false : $_SERVER['HTTP_HOST'];
	  $seguro  = ( (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443) ? true : false;
	  
	  setcookie("sess_admin_agenda",sha1("agenda-logado"),time()+8400,"/agenda",$dominio,$seguro,true);
	  
	  //atualiza o ultimo acesso
	  $stmt = $pdo->prepare("UPDATE admin SET ultimo_login = current_timestamp WHERE apelido_admin = :ap LIMIT 1");
	  $stmt->bindParam(':ap', $user);
      $stmt->execute();
	  
	  header("Location:../../index.php?page=home&action=list");
	  exit();
	} else {
	  header("Location:../../index.php?err=1");
	  exit();
	}
  }
}
