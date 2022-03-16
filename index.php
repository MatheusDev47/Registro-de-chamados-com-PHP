<?php
require "requires/header.php";
?>
<div class="container">
  <div class="row position-relative">
    <div class="card-login">
      <div class="card">
        <div class="card-header">
          Login
        </div>
        <div class="card-body">
          <form method="POST" action="scripts/controller.php?action=login">
            <div class="form-group mb-3">
              <input type="email" class="form-control" placeholder="E-mail" name="email" Required>
            </div>
            <div class="form-group">
              <input type="password" class="form-control" placeholder="Senha" name="password" Required>
            </div>
            <button class="btn btn-info mt-3 w-100 text-white fw-bold" type="submit">Entrar</button>
            <a href="register.php" class="text-decoration-none d-flex justify-content-center link-info mb-1 mt-2 cadastrar">Ainda não é cadastrado? Cadastre-se!</a>

            <?php if (isset($_GET['login']) && $_GET['login'] === 'error') { ?>

              <p class="text-danger text-center fw-bold">Email e/ou senhas inválido(s)</p>

            <?php } ?>

            <?php if (isset($_GET['login']) && $_GET['login'] === 'error2') { ?>

              <p class="text-danger text-center fw-bold">Faça login antes de acessar páginas restritas</p>

            <?php } ?>

            <?php if (isset($_GET['register']) && $_GET['register'] === 'success') { ?>

              <p class="text-success text-center fw-bold">Cadastro feito com sucesso</p>

            <?php } ?>
          </form>
        </div>
      </div>
    </div>
  </div>

  </body>

  </html>