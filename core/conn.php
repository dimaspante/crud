<?php

/**
* Conecta ao servidor usando PDO com
* atributos para lançar exceptions
*/

define("DB_HOST","");
define("DB_USER","");
define("DB_NAME","");
define("DB_PASS","");

try
{
	$pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
	die("Erro ao conectar: " . $e->getMessage());
}
