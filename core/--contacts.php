<?php
/**
* Bloco de leitura dos contatos do CRUD
*/

require_once __DIR__ . "/bootstrap.php";

//consulta inicial padrão
$sql = "SELECT c.id_contato, c.nome_contato, c.nascimento_contato, c.apelido_contato FROM contato c WHERE c.excluido = 0 ";

try {
	//verifica existencia de termos de busca
	if (isset($_REQUEST['term'])) {
		$term = $_REQUEST['term'];
		
		$sql .= " AND c.nome_contato LIKE :term";
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(":term", "%$term%", PDO::PARAM_STR);
	} else {
		$sql .= " ORDER BY nome_contato";
		$stmt = $pdo->prepare($sql);
	}
	
	//executa e exibe a listagem
	$stmt->execute();
	
	if ($stmt->rowCount() > 0) {
		while($row = $stmt->fetch()) {
			$nascimento = null;
			if (!empty($row['nascimento_contato'])) {
			  $data_atual = new DateTime();
			  $data_atual = DateTime::createFromFormat('Y-m-d', $row['nascimento_contato']);
			  $nascimento = 'Nascimento: '.$data_atual->format('d/m/Y');
			}
			
			//emails
			$emails = $pdo->prepare("SELECT email FROM email WHERE id_contato = :id");
			$emails->bindParam(':id',$row['id_contato']);
			$emails->execute();
			
			//telefones
			$telefones = $pdo->prepare("SELECT telefone FROM telefone WHERE id_contato = :id");
			$telefones->bindParam(':id',$row['id_contato']);
			$telefones->execute();
			
			echo '
			<div class="col-12 col-sm-6 col-md-4 margin-bottom">
				<div class="cell cursor-pointer" data-target="#card-'.$row['id_contato'].'" title="Clique para ver dados de contato">
					<div class="media margin-bottom">
					  <div class="media-left">
						<a>
						  <img alt="'.$row['nome_contato'].'" src="assets/img/user.jpg" width="80" height="80" class="img-circle">
						</a>
					  </div>
					  <div class="media-body">
						<h4 class="media-heading text-info"><strong>'.$row['nome_contato'].'</strong></h4>
						<h5 class="text-muted"><em>'.($row['apelido_contato'] ? 'Apelido: '.$row['apelido_contato'] : '').'</em></h5>
						<h5 class="text-muted"><em>'.$nascimento.'</em></h5>
					  </div>
					</div>
					
					<div class="card" id="card-'.$row['id_contato'].'">';
					if ($emails->rowCount() > 0) {
						echo '<p><strong>E-mails:</strong></p>';
						while ($email = $emails->fetch()) {
							echo '<p>'.$email[0].'</p>';
						}
					}
					
					if ($telefones->rowCount() > 0) {
						echo '<p><strong>Telefones:</strong></p>';
						while ($phone = $telefones->fetch()) {
							echo '<p>'.$phone[0].'</p>';
						}
					}
					echo '
					</div>
				</div>
			</div>';
		}
	} else {
		echo '<h6>Nenhum contato encontrado...</h6>';
	}
}catch(PDOException $e) {
	die("Erro ao carregar agenda: " . $e->getMessage());
}

unset($stmt);
unset($pdo);
