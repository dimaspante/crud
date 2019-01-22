<?php

/**
* Verifica se a rota da página solicitada existe
* e retorna a página com o seu controller
*
* @param 	string 	$page 		A página a ser conferida
* @param 	string 	$action 	A ação que vai carregar o controller
* @return 	void 				Inclui a página e seu controller
*/

function checkRoute($page, $action){
  $pages = ['home', 'admin', 'contato', 'login'];
  
  if (in_array($page,$pages)) {
	  
    $controller = __DIR__ . '/../admin/Controller/'.$page.'/'.$action.'.controller.php';
    $view 	 	= __DIR__ . '/../admin/View/'.$page.'/'.$action.'.php';
    
    if (file_exists($controller)){
      require_once $controller;
    }
	
	if(file_exists($view)) {
      include_once $view;
    } else {
	  print 'Arquivo não encontrado.';
	}
	
  } else {
    return false;
  }
}

/**
* Retorna a quantidade total de tarefas
*
* @param	integer   $status	Deve ser 0 ou 1 (ativo / inativo)
* @return 	integer 			Retorna o total de linhas da busca
*/

function countContacts($status = null) {
  global $pdo;
  
  $sql = "SELECT COUNT(*) AS total FROM contato";
  if($status) $sql .= " WHERE excluido = :st";
  $cons = $pdo->prepare($sql);
  $cons->bindParam(':st',$status);
  $cons->execute();
  $row = $cons->fetch();

  return $row['total'];
}

/**
* Retorna uma classe com o status dos contatos
*
* @param	integer  $stat 	Solicita o status de exclusão desejado
* @param	string   $modo 	Tipo desejado, se texto (txt) ou estilo (css)
* @return 	string 			Retorna o nome da classe css, ou do status
*/

function isDeleted($stat,$modo='css') {
  switch($stat) {
    case 0:
	  $msg = 'Ativo';
      $cls = 'success';
    break;
	case 1:
	  $msg = 'Inativo';
      $cls = 'danger';
    break;
	default:
	  $msg = '';
	  $cls = '';
	break;
  }

  return ($modo == 'css') ? $cls : $msg;
}

/**
* Alterna um status enviado entre ativo / inativo, ou o booleano disso
*
* @param	integer  $stat 	Solicita o status de comparação desejado
* @param	string   $modo 	Solicita qual o modo de retorno final (boo/txt)
* @return 	string 			Retorna o status alternado em forma textual (ativo / inativo)
* @return 	boolean 		Ou retorna o status alternado em forma booleana (0/1)
*/

function convertStatus($stat,$modo='boo') {
  switch($stat) {
    case 0:
	//atualmente ativo
	  $msg = 'Desativar';
      $bin = 1;
    break;
	case 1:
	//atualmente inativo
	  $msg = 'Reativar';
      $bin = 0;
    break;
	default:
	  $msg = '';
	  $bin = '';
	break;
  }

  return ($modo == 'txt') ? $msg : $bin;
}
