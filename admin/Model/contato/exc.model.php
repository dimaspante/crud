<?php
session_start();

require __DIR__ . '/../../../core/bootstrap.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
	$sql = "UPDATE contato SET excluido = :exc, data_excluido = current_timestamp WHERE id_contato = :id";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':exc', $_GET['status']);
	$stmt->bindParam(':id', $_GET['id']);
	$stmt->execute();

	echo '<script>history.back();</script>';
}
