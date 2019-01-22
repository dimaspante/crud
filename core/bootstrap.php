<?php

/**
* Inicia a sessão e faz a inclusão dos arquivos,
* inclusive o autoload padrão do Composer
*/

session_start();
require_once __DIR__ . '/conn.php';
require_once __DIR__ . '/functions.php';
require_once __DIR__ . '/../vendor/autoload.php';

/**
* Fuso horário padrão brasileiro
*/
date_default_timezone_set('America/Sao_Paulo');
