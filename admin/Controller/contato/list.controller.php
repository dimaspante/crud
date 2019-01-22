<?php
global $pdo;

if (!isset($_GET['param'])) die('Faltando parâmetro.');

$stmt = $pdo->prepare("SELECT c.id_contato, c.nome_contato, c.nascimento_contato, c.apelido_contato, e.email, t.telefone FROM contato c LEFT JOIN email e ON c.id_contato = e.id_contato LEFT JOIN telefone t ON c.id_contato = t.id_contato WHERE c.excluido = :stat GROUP BY c.id_contato ORDER BY c.id_contato");
$stmt->bindParam(':stat',$_GET['param']);
$stmt->execute();
