<?php  
  require_once "layout/header-login.php";
  require_once 'class/Doctor.php';
  require_once 'class/Quote.php';


  $date = $_POST['date'];
  $hour = $_POST['hour'];
  $doctorId = $_POST['doctorId'];
  $workDays = str_replace("'", "\"", $_POST['workDays']);
  $workDays = json_decode($workDays);
  $day = date('w', strtotime($date));
  //Validar que trabaja ese dia
  
  if(!in_array($day, $workDays)){ //si no es dia de trabajo
      //proceso
  }

  //validar si esta disponible en la fecha y hora seleccionada
  $quote = new Quote;
  $query = $quote->validateQoute($date, $hour, $doctorId);
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
              <form class="pt-3" method="post" action="stepthree.php">
                
              <?php 
              if(!empty($query)){
                echo "Seleccione una hora y/o fecha diferente... ";
              }
              ?>
                <div class="form-group">
                  <label for="doctor">Indique sus sintomas</label>
                  <textarea class="form-control form-control-lg" name="symtomps" cols="30" rows="10"></textarea>
                </div>
                <div class="mt-3">
                  <input type="hidden" name="action" value="auth">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Crear cita</button>
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
