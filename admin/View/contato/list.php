<div class="table-responsive">
  <table class="table table-striped table-bordered">
   <thead>
	<tr>
	  <th>Nome</th>
	  <th>Apelido</th>
	  <th>Nascimento</th>
	  <th>E-mail</th>
	  <th>Telefone</th>
	  <th width="10%">Status</th>
	  <th width="10%">Ações</th>
	</tr>
   </thead>
   <tbody>
	<?php
	if ($stmt->rowCount() > 0) {
	  while ($row = $stmt->fetch()) {
		$id = $row['id_contato'];
		$data = 'N/D';
		if (!empty($row['nascimento_contato'])) {
		  $nasc = new DateTime($row['nascimento_contato']);
		  $data = $nasc->format('d/m/Y');
		}

		echo '
		<tr>
		  <td><a href="index.php?page=contato&action=update&id='.$id.'" title="Editar contato">'.$row['nome_contato'].' <small>[editar]</small></a></td>
		  <td>'.$row['apelido_contato'].'</td>
		  <td>'.$data.'</td>
		  <td title="Para visualizar todos os e-mails, clique em editar">'.$row['email'].'</td>
		  <td title="Para visualizar todos os e-mails, clique em editar">'.$row['telefone'].'</td>
		  <td>'.isDeleted($row['excluido'],'txt').'</td>
		  <td align="center"><a href="Model/contato/exc.model.php?id='.$id.'&status='.convertStatus($row['excluido']).'"><small>'.convertStatus($row['excluido'],'txt').'</small></a></td>
		</tr>';
	  }
	} else {
	  echo '<tr><td align="center" colspan="7">Nenhum contato encontrado.</td></tr>';
	}
	?>
   </tbody>
  </table>
</div>