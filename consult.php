<?php
// require "scripts/session.php";
$action = 'list_calls';
require "scripts/controller.php";
require "requires/header.php";
?>

<div class="container">
  <div class="row">
    <div class="card-consultar-chamado mt-3">
      <div class="card">
        <div class="card-header">
          Consulta de chamado
        </div>

        <div class="card-body">

          <?php foreach ($calls as $call) { ?>

            <div class="card mb-3 bg-light">
              <div class="card-body row">
                <div class="col-md-11">
                  <h5 class="card-title"><?= $call->title ?></h5>
                  <h6 class="card-subtitle mb-2 text-muted"><?= $call->category ?></h6>
                  <p class="card-text"><?= $call->description ?></p>
                </div>

                <div class="col-md-1 d-flex align-items-center">
                  <a href="consult.php?action=delete_call&id=<?= $call->id_chamado ?>">
                    <i class="bi bi-x-square-fill text-danger btn-delete me-2"></i>
                  </a>

                  <i class="bi bi-pencil-square text-success btn-edit" onclick="openModalForm(<?= $call->id_chamado ?>, '<?= $call->title ?>', '<?= $call->category ?>', '<?= $call->description ?>')"></i>
                </div>
              </div>
            </div>

          <?php } ?>

          <div class="row mt-5">
            <div class="col-12">
              <a href="home.php" class="btn btn-lg btn-warning w-100" type="submit">Voltar</a>
            </div>
          </div>
        </div>

        <!-- Modal Form Edit -->
        <div class="modal fade" tabindex="-1" id="modalEdit">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Editar Chamado</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form method="POST" action="scripts/controller.php?action=edit_call">
                  <div class="form-group mb-3">
                    <label>Título</label>
                    <input id="titleEdit" type="text" class="form-control" placeholder="Título" name="title" Required>
                  </div>

                  <div class="form-group mb-3">
                    <label>Categoria</label>
                    <select class="form-control" name="category" id="categoryEdit" Required>
                      <option value="">Criação Usuário</option>
                      <option value="0">Impressora</option>
                      <option value="1">Hardware</option>
                      <option value="2">Software</option>
                      <option value="3">Rede</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Descrição</label>
                    <textarea id="descriptionEdit" class="form-control" rows="3" name="description" Required></textarea>
                  </div>
                  <input type="hidden" id="inputHidden" name="id_chamado" />
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success">Salvar Alterações</button>
              </div>
              </form>
            </div>
          </div>
        </div>

        <?php
        require "requires/modalFeeback.php";
        require "requires/footer.php";
        ?>