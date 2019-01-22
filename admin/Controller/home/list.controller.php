<?php
global $pdo;

//últimos 10 cadastros
$stmt = $pdo->prepare("SELECT c.id_contato, c.nome_contato FROM contato c ORDER BY c.id_contato DESC LIMIT 10");
$stmt->execute();

//somas de contatos para o gráfico
$graph_contatos = $pdo->prepare("SELECT COUNT(c.id_contato) FROM contato c");
$graph_contatos->execute();
$total = $graph_contatos->fetch();

//somas dos ativos
$graph_ativos = $pdo->prepare("SELECT COUNT(c.id_contato) FROM contato c WHERE c.excluido = 0");
$graph_ativos->execute();
$ativos = $graph_ativos->fetch();

//somas dos inativos
$graph_inativos = $pdo->prepare("SELECT COUNT(c.id_contato) FROM contato c WHERE c.excluido = 1");
$graph_inativos->execute();
$inativos = $graph_inativos->fetch();

//somas dos emails para o grafico
$graph_emails = $pdo->prepare("SELECT COUNT(e.email) FROM email e");
$graph_emails->execute();
$emails = $graph_emails->fetch();

//somas dos telefones para o grafico
$graph_fones = $pdo->prepare("SELECT COUNT(t.telefone) FROM telefone t");
$graph_fones->execute();
$fones = $graph_fones->fetch();
