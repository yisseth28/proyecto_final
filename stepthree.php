<?php
    require_once "layout/header-login.php";
    require_once 'class/Doctor.php';
    $doctorId = $_POST['doctor'];
    $doctor = new Doctor;
    $data = $doctor->selectById($doctorId);
    $workingHours = json_decode($data[0]['working_hours']);
    $workDays = str_replace("\"", "'", $data[0]['work_days']);
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
                        <h4>Selecione su fecha y horario</h4>
                        <h6 class="fw-light">Todos los campos son obligatorios</h6>
                        <?php include_once 'partials/alerts.php' ?>
                        <form class="pt-3" method="post" action="stepfour.php">
                            <div class="form-group">
                                <label for="date">Seleccione la fecha</label>
                                <input type="date" class="form-control form-control-lg" name="date">
                            </div>
                            <div class="form-group">
                                <label for="hour">Seleccione el horario</label>
                                <select name="hour" class="form-control form-control-lg">
                                <option value="" disabled selected>Seleccionar</option>
                                <?php foreach($workingHours as $hour):?>
                                    <option value="<?= $hour?>"><?= "{$hour}:00 horas" ?></option>
                                <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="mt-3">
                                <input type="hidden" name="doctorId" value="<?= $doctorId ?>">
                                <input type="hidden" name="workDays" value="<?= $workDays ?>">
                                <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Continuar</button>
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
</body>

</html>