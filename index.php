<?php
require_once "layout/header-login.php";
?>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="assets/images/logo.svg" alt="logo">
              </div>
              <?php include_once 'partials/alerts.php';?>
              <h4>Creación de citas</h4>
              <h6 class="fw-light">Ingresar los datos para asignar su cita</h6>
              <form class="pt-3" method="post" action="process_user.php">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" name="telefono" placeholder="Ingrese su número de teléfono">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" name="name" placeholder="Ingrese su nombre">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" name="lastname" placeholder="Ingrese su apellido">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" name="tipo" placeholder="Ingrese su tipo documento">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" name="documento" placeholder="Ingrese su número de documento">
                </div>
                <div class="mt-3">
                  <input type="hidden" name="action" value="auth">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">INICIAR SESIÓN</button>
                </div>
                <!--<div class="text-center mt-4 fw-light">
                  No tienes cuenta? <a href="user_new.php" class="text-primary">Crear</a>
                </div>-->
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <?php require_once "layout/footer-login.php"; ?>
