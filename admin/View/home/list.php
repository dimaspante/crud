<div class="row">
	<div class="col-12 col-md-7">
		<div class="panel panel-default">
			<div class="panel-heading">
				Relatório de cadastros
			</div>
			<div class="panel-body">
				<div id="grafico"></div>
			</div>
		</div>
	</div>
	<div class="col-12 col-md-5">
		<div class="panel panel-default">
			<div class="panel-heading">
				Últimos 10 contatos
			</div>
			<div class="panel-body">
				<div class="list-group">
					<?php
					if ($stmt->rowCount() > 0) {
						while ($row = $stmt->fetch()) {
						?>
						<div class="list-group-item">
							<p><a href="index.php?page=contato&action=update&id=<?php echo $row['id_contato']; ?>" title="Editar contato"><?php echo $row['nome_contato']; ?></a>
						</div>
						<?
						}
					} else {
					  echo '<p>Nenhum contato cadastrado.</p>';
					}
					?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
if ($total[0]) {
?>
<script>
$(function() {
	Morris.Donut({
		element: 'grafico',
		data: [
		{label: "Contatos", value: <?php echo $total[0]; ?>},
		{label: "Contatos ativos", value: <?php echo $ativos[0]; ?>},
		{label: "Contatos inativos", value: <?php echo $inativos[0]; ?>},
		{label: "Telefones", value: <?php echo $fones[0]; ?>},
		{label: "E-mails", value: <?php echo $emails[0]; ?>}
		]
	});
});
</script>
<?php
}
?>