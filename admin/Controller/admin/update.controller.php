<?php
global $pdo;

$sql = "SELECT * FROM admin WHERE id_admin = 1";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$row = $stmt->fetch();
	