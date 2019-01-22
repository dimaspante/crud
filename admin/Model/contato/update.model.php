<?php

require __DIR__ . '/../../../core/bootstrap.php';

use Respect\Validation\Validator as v;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id_contato'])) {
	$id = base64_decode($_POST['id_contato']);
	$nome = $_POST['nome'];
	$apelido = $_POST['apelido'];
	$nasc = null;
	$errors = array();
	
	if (empty($nome)) {
	  $errors[] = "Preencha o nome do contato!";
	}
	
	if (!empty($_POST['data'])) {
	  $data = new DateTime();
	  $data = DateTime::createFromFormat('d/m/Y', $_POST['data']);
	  $nasc = $data->format('Y-m-d');
	}
	
	if (count($errors) === 0) {
	  $sql = "UPDATE contato SET nome_contato = :nm, apelido_contato = :ap, nascimento_contato = :dt WHERE id_contato = :id LIMIT 1";
	  $stmt = $pdo->prepare($sql);
	  $stmt->bindParam(':nm', $nome);
	  $stmt->bindParam(':ap', $apelido);
	  $stmt->bindParam(':dt', $nasc);
	  $stmt->bindParam(':id', $id);
	  $stmt->execute();
	  
	  //remove todos os e-mails atuais do contato
	  $stmt = $pdo->prepare("DELETE FROM email WHERE id_contato = :id");
	  $stmt->bindParam(':id', $id);
	  $stmt->execute();
	  
	  //verifica e grava os novos e-mails passados
	  if (count($_POST['email'])) {
	    foreach ($_POST['email'] as $email) {
		  if (!empty($email) && v::email()->validate($email)) {
			$stmt = $pdo->prepare("INSERT INTO email (id_contato, email) VALUES (:id, :ml)");
			$stmt->bindParam(':id', $id);
			$stmt->bindParam(':ml', $email);
			$stmt->execute();
		  }
	    }
	  }
	  
	  //remove todos os telefones atuais do contato
	  $stmt = $pdo->prepare("DELETE FROM telefone WHERE id_contato = :id");
	  $stmt->bindParam(':id', $id);
	  $stmt->execute();
	  
	  //verifica e grava os novos telefones passados
	  if (count($_POST['tel'])) {
	    foreach ($_POST['tel'] as $fone) {
		  if (!empty($fone)) {
			$stmt = $pdo->prepare("INSERT INTO telefone (id_contato, telefone) VALUES (:id, :tl)");
			$stmt->bindParam(':id', $id);
			$stmt->bindParam(':tl', $fone);
			$stmt->execute();
		  }
	    }
	  }
	  
	  echo '<script>alert("Contato atualizado com sucesso!");window.location="../../index.php?page=contato&action=list&param=0";</script>';
	} else {
	  foreach($errors as $error) echo '<script>alert("'.$error.'");</script>';
	  echo '<script>history.back();</script>';
      exit(0);
	}
}
