<?php
require "scripts/session.php";
require "requires/header.php";
?>

<div class="container">
  <div class="row">
    <div class="card-abrir-chamado mt-3">
      <div class="card">
        <div class="card-header">
          Abertura de chamado
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col">

              <form method="POST" action="scripts/controller.php?action=call">
                <div class="form-group mb-3">
                  <label>Título</label>
                  <input type="text" class="form-control" placeholder="Título" name="title" Required>
                </div>

                <div class="form-group mb-3">
                  <label>Categoria</label>
                  <select class="form-control" name="category" id="category" Required>
                    <option value="">Criação Usuário</option>
                    <option value="0">Impressora</option>
                    <option value="1">Hardware</option>
                    <option value="2">Software</option>
                    <option value="3">Rede</option>
                  </select>
                </div>

                <div class="form-group">
                  <label>Descrição</label>
                  <textarea class="form-control" rows="3" name="description" Required></textarea>
                </div>

                <div class="row mt-5">
                  <div class="col-6">
                    <a href="home.php" class="btn btn-lg btn-warning w-100">Voltar</a>
                  </div>

                  <div class="col-6">
                    <button class="btn btn-lg btn-info w-100 text-white fw-bold" type="submit" id="btnChamado">Abrir</button>
                  </div>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
  require "requires/modalFeeback.php";
  require "requires/footer.php";
  ?>