<form action="Model/admin/update.model.php" method="post">
  <div>
    <label for="email">E-mail:</label>
    <input type="email" name="email" id="email" value="<?php echo $row['email_admin']; ?>">
  </div>
  <div>
    <label for="apelido">Apelido:</label>
    <input type="text" name="apelido" id="apelido" required value="<?php echo $row['apelido_admin']; ?>">
  </div>
  <div>
    <label for="senha">Senha:</label>
    <input type="password" name="senha" id="senha" required value="[NOTCHANGED]">
  </div>
  <button type="submit">atualizar dados</button>
</form>