<?php
require "scripts/session.php";
require "requires/header.php";
?>
<div class="container">
  <div class="row">
    <div class="card-home">
      <div class="card mt-3">
        <div class="card-header">
          Menu
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-4 d-flex justify-content-center">
              <a href="open_call.php">
                <img src="assets/formulario_abrir_chamado.png" class="img-menu">
              </a>
            </div>
            <div class="col-4 d-flex justify-content-center">
              <a href="consult.php">
                <img src="assets/formulario_consultar_chamado.png" class="img-menu">
              </a>
            </div>
            <div class="col-4 d-flex justify-content-center">
              <a href="scripts/logout.php">
                <img src="assets/logout.png" class="img-menu">
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </body>

  </html>