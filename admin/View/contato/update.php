<form action="Model/contato/update.model.php" method="post">
  <input type="hidden" name="id_contato" value="<?php echo base64_encode($_GET['id']); ?>">
  <div>
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" value="<?php echo $row['nome_contato']; ?>" required>
  </div>
  <div>
    <label for="apelido">Apelido:</label>
    <input type="text" id="apelido" name="apelido" value="<?php echo $row['apelido_contato']; ?>">
  </div>
  <div>
    <label for="data">Data de nascimento:</label>
    <input type="text" class="data mask-data" id="data" name="data" value="<?php echo $row['nascimento_contato']; ?>">
  </div>
  <div>
    <label for="email">E-mails:</label>
	<div id="email">
	  <?php
	  if ($stmt2->rowCount() > 0) {
	    while ($mail = $stmt2->fetch()) {
	      echo '<p><input type="email" id="email" name="email[]" value="'.$mail['email'].'"></p>';
	    }
	  } else {
  	    echo '<p><input type="email" id="email" name="email[]" value=""></p>';
	  }
	  ?>
    </div>
	<p class="float-right">
		<button type="button" class="new btn-sm" data-type="email" data-class="">[ + ] novo e-mail</button>
    </p>
	<div class="clearfix"></div>
	<small class="help-block">* Somente e-mails no formato correto serão gravados.</small>
  </div>
  <div>
    <label for="tel">Telefones:</label>
	<div id="tel">
	  <?php
	  if ($stmt3->rowCount() > 0) {
	    while ($fone = $stmt3->fetch()) {
	      echo '<p><input class="fone" type="tel" id="tel" name="tel[]" value="'.$fone['telefone'].'"></p>';
	    }
	  } else {
  	    echo '<p><input class="fone" type="tel" id="tel" name="tel[]" value=""></p>';
	  }
	  ?>
    </div>
	<p class="float-right">
		<button type="button" class="new btn-sm" data-type="tel" data-class="fone">[ + ] novo telefone</button>
    </p>
	<div class="clearfix"></div>
  </div>
  <button type="submit">gravar contato</button>
</form>