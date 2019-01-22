<?php
  if (isset($_GET['err'])) {
	  switch ($_GET['err']) {
		case 1:
		  echo 'Usuário ou senha inválidos. Tente novamente.';
		break;
		case 9:
		  echo 'Por favor, não aceitamos SPAM.';
		break;
		default:
		  echo 'Houve um erro no login. Tente novamente.';
		break;
	  }
	}
  ?>
  <section class="container" id="login">
    <div class="row">
      <div class="col-10 offset-1 col-md-4 offset-md-4">
        <form action="Model/login/login.model.php" method="post">
		  <input type="text" name="surname" value="" class="hide">
          <div>
            <label for="user">Usuário:</label>
            <input type="text" id="user" name="user" autofocus required>
          </div>
          <div>
            <label for="pass">Senha:</label>
            <input type="password" id="pass" name="pass" required>
          </div>
          <button type="submit">login</button>
        </form>
      </div>
  </section>