<?php
global $pdo;

if (!isset($_GET['id'])) die('Faltando parâmetro ID.');

/**
* Detalhes do contato
*/
$stmt1 = $pdo->prepare("SELECT id_contato, nome_contato, apelido_contato, nascimento_contato FROM contato WHERE id_contato = :id LIMIT 1");
$stmt1->bindParam(':id',$_GET['id']);
$stmt1->execute();
$row = $stmt1->fetch();

/**
* E-mails do contato
*/
$stmt2 = $pdo->prepare("SELECT id_email, email FROM email WHERE id_contato = :id");
$stmt2->bindParam(':id',$_GET['id']);
$stmt2->execute();

/**
* Telefones do contato
*/
$stmt3 = $pdo->prepare("SELECT id_telefone, telefone FROM telefone WHERE id_contato = :id");
$stmt3->bindParam(':id',$_GET['id']);
$stmt3->execute();
