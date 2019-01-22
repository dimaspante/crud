<form action="Model/contato/add.model.php" method="post">
  <div>
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" required>
  </div>
  <div>
    <label for="apelido">Apelido:</label>
    <input type="text" id="apelido" name="apelido">
  </div>
  <div>
    <label for="data">Data de nascimento:</label>
    <input type="text" class="data mask-data" id="data" name="data">
  </div>
  <div>
    <label for="email">E-mails:</label>
	<div id="email">
	  <p><input type="email" id="email" name="email[]" value=""></p>
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
	  <p><input class="fone" type="tel" id="tel" name="tel[]" value=""></p>
    </div>
	<p class="float-right">
		<button type="button" class="new btn-sm" data-type="tel" data-class="fone">[ + ] novo telefone</button>
    </p>
	<div class="clearfix"></div>
  </div>
  <button type="submit">gravar contato</button>
</form>