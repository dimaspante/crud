<?php

require __DIR__ . '/../../../core/bootstrap.php';

use Respect\Validation\Validator as v;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email'])) {
	$email   = $_POST['email'];
	$apelido = $_POST['apelido'];
	$senha 	 = $_POST['senha'];
	$errors  = array();
	
	if (!empty($email) && !v::email()->validate($email)) {
	  $errors[] = 'E-mail inv\u00e1lido. Deixe-o em branco ou corrija-o.';
	}
	if (empty($apelido)) {
	  $errors[] = 'Usu\u00e1rio inv\u00e1lido. Por favor, preencha um nome de acesso.';
	}

	if (count($errors) === 0) {
	  $sql = "UPDATE admin SET email_admin = :em, apelido_admin = :ap";
	  if ($senha != '[NOTCHANGED]') {
	    $senha = password_hash($senha, PASSWORD_DEFAULT);
	    $sql .= ', senha_admin = :se';
	  }
	  $stmt = $pdo->prepare($sql);
	  $stmt->bindParam(':em', $email);
	  $stmt->bindParam(':ap', $apelido);
	  if ($senha != '[NOTCHANGED]') {
  	    $stmt->bindParam(':se', $senha);
	  }
	  $stmt->execute();
	  
	  echo '<script>alert("Configura\u00e7\u00f5es atualizadas com sucesso!");history.back();</script>';
	  exit(0);
	} else {
	  foreach($errors as $error) echo '<script>alert("'.$error.'");</script>';
	  echo '<script>history.back();</script>';
      exit(0);
	}
}
