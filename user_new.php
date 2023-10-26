<?php
  session_start();
  require_once 'class/User.php';
  require_once 'layout/header.php';
  ?>
  <div class="container-scroller">
    <?php include_once "layout/topbar.php"; ?>
    <div class="container-fluid page-body-wrapper">
      <?php include_once "layout/sidebar.php";  ?>
      <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
              <div class="col-12 col-lg-6 offset-lg-3">
                <div class="card card-rounded">
                  <div class="card-body">
                    <h3>Nuevo Usuario</h3>
                    <hr>
                    <?php include_once "partials/alerts.php";?>
                  <form class="forms-sample" action="process_user.php" method="POST">
                    <div class="form-group row">
                      <label for="name" class="col-sm-3 col-form-label">Nombre</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="name" value="<?= !empty($_SESSION["name"]) ? $_SESSION["name"] :'' ?>" placeholder="Nombre Completo" required>
                        </div>
                    </div>
                    <div class="form-group row">
                      <label for="email" class="col-sm-3 col-form-label">Correo Electrónico</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" name="email" value="<?= !empty($_SESSION["email"])? $_SESSION["email"]:'' ?>"  placeholder="Correo Electrónico Valido" required>
                        </div>
                    </div>
                    <div class="form-group row">
                      <label for="pass" class="col-sm-3 col-form-label">Contraseña</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" name="pass" placeholder="Ingrese su Contraseña" required>
                        </div>
                    </div>
                    <div class="form-group row">
                      <label for="pass_repite" class="col-sm-3 col-form-label">Confirmar Contraseña</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" name="pass_repite" placeholder="Confirme su Contraseña" required>
                        </div>
                    </div>
                    <div class="form-group row">
                      <label for="type" class="col-sm-3 col-form-label">Seleccione el rol</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="type"  required>
                                <option value="" disabled <?= empty($_SESSION['type'])? 'selected':'' ?>Seleccionar</option>
                                <option value="Administrador" <?= (!empty($_SESSION['type'] && $_SESSION['type']=='Administrador'))?'selected':''?> > Administrador </option>
                                <option value="Doctor" <?= (!empty($_SESSION['type'] && $_SESSION['type']=='Doctor'))?'selected':''?>> Doctor </option>    
                            </select>    
                        </div>
                    </div>
                    <input type="hidden" name="action" value="insert">
                    <button type="submit" class="btn btn-primary me-2">Guardar</button>
                    <a href="usuarios.php" class="btn btn-light">Cancelar</a>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php include_once "partials/footer.php"; ?>
      </div>
    </div>
  </div>
  <?php require_once "layout/footer.php"?>
