<?php require "requires/header.php" ?>
<div class="container">
  <div class="row">

    <div class="card-login">
      <div class="card">
        <div class="card-header">
          Cadastre-se
        </div>
        <div class="card-body">
          <form method="POST" action="scripts/controller.php?action=register">
            <div class="form-group mb-3">
              <input type="email" class="form-control" placeholder="E-mail" name="email_register" Required>
            </div>
            <div class="form-group">
              <input type="password" class="form-control" placeholder="Senha" name="password_register" Required>
            </div>
            <button class="btn btn-info mt-3 w-100 text-white fw-bold" type="submit">Cadastrar-se</button>
            <a href="index.php" class="text-decoration-none d-flex justify-content-center link-info mb-1 mt-2 cadastrar">Já é cadastrado? Faça seu login!</a>

            <?php if (isset($_GET['register']) && $_GET['register'] === 'error') { ?>

              <p class="text-danger text-center fw-bold">Email já cadastrado</p>

            <?php } ?>

          </form>
        </div>
      </div>
    </div>
  </div>
  </body>

  </html>