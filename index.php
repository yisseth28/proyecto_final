<?php  
  require_once "layout/header-login.php";
  require_once 'class/Doctor.php';
  $doctor = new Doctor;
  $data = $doctor->loadDoctors();
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
              <h4>Registre su cita</h4>
              <h6 class="fw-light">Todos los campos son obligatorios</h6>
              <?php include_once 'partials/alerts.php' ?>
              <form class="pt-3" method="post" action="steptwo.php">
                <div class="form-group">
                    <select name="document_type" class="form-control form-control-lg">
                      <option value="" disabled selected>Seleccionar</option>
                      <option value="CC">Cedula de ciudadania</option>
                      <option value="CE">Cedula de extranjeria</option>
                      <option value="Pasaporte">Pasaporte</option>
                    </select>
                </div>
                <div class="form-group">
                  <input type="number" class="form-control form-control-lg" name="document_number" placeholder="Ingrese numero">
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Continuar</button>
                  <a href="login.php" class="btn btn-block btn-danger btn-lg font-weight-medium auth-form-btn">Iniciar sesion</a>
                </div>
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
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/template.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- <script src="script/quotes.js"></script> -->
    <!-- endinject -->
</body>

</html>
