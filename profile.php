<?php 
    require_once 'class/Doctor.php';
    require_once 'class/User.php';
    require_once 'class/Speciality.php';
    require_once "layout/header.php";
    User::auth();
    $speciality = new Speciality;
    $specialities =  $speciality->list();
    $doctor = new Doctor;
    $query = $doctor->selectForField('user_id', $_SESSION['id']);
    if($query){
        $workDays = json_decode($query[0]['work_days']);
        $workingHours = json_decode($query[0]['working_hours']);
    }
?>
    <div class="container-scroller">
        <?php include_once "layout/topbar.php"; ?>
        <div class="container-fluid page-body-wrapper">
            <?php include_once "layout/sidebar.php"; ?>
            <div class="main-panel">
                <div class="content-wrapper">
                    <h1>Mi Perfil</h1>
                    <hr>
                    <div class="row">
                        <?php include_once 'partials/alerts.php' ?>
                        <div class="col">
                            <form action="process_doctor.php" method="post">
                                <input type="hidden" name="action" value="<?= empty($query[0]) ? 'insert': 'edit' ?>">
                                <input type="hidden" name="id" value="<?= (!empty($query[0]['id'])) ? $query[0]['id'] : 0 ?>">
                                <div class="form-group">
                                    Seleccione su especialidad
                                    <select name="speciality" id="" class="form-control">
                                        <option value="" disable selected>Seleccionar</option>
                                        <?php foreach ($specialities as $item): ?>
                                            <option 
                                                value="<?= $item['name'] ?>" 
                                                <?=(!empty($query[0]['specialty']) && $query[0]['specialty'] == $item['name']) ?'selected': '' ?>
                                                >
                                                <?= $item['name']?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
        
        
                                <div class="form-group">
                                    Ingrese su domicilio
                                    <input type="text" class="form-control" name="address" value="<?= !empty($query[0]['address']) ? $query[0]['address'] :'' ?>" placeholder="Ingrese su dirección">
                                </div>
        
                                <div class="form-group">
                                    Ingrese su número de tarjeta profesional
                                    <input type="number" class="form-control" name="professional_id" value="<?= !empty($query[0]['professional_id']) ? $query[0]['professional_id'] :'' ?>" placeholder="Tarjeta profesional">
                                </div>
                                <div class="form-group">
                                    Ingrese su telefono
                                    <input type="number" class="form-control" name="phone" value="<?= !empty($query[0]['phone']) ? $query[0]['phone'] :'' ?>"placeholder="Telefono">
                                </div>
                                
                                <!-- <div class="form-group">
                                    <p>Seleccione los dias que trabaja</p>
                                    <input type="checkbox" name="work_days[]" value="1" <?= (in_array("1", $workDays)) ? 'checked': '' ?>> Lunes
                                    <input type="checkbox" name="work_days[]" value="2" <?= (in_array("2", $workDays)) ? 'checked': '' ?>> Martes
                                    <input type="checkbox" name="work_days[]" value="3" <?= (in_array("3", $workDays)) ? 'checked': '' ?>> Miercoles
                                    <input type="checkbox" name="work_days[]" value="4" <?= (in_array("4", $workDays)) ? 'checked': '' ?>> Jueves
                                    <input type="checkbox" name="work_days[]" value="5" <?= (in_array("5", $workDays)) ? 'checked': '' ?>> Viernes
                                    <input type="checkbox" name="work_days[]" value="6" <?= (in_array("6", $workDays)) ? 'checked': '' ?>> Sabado
                                </div> -->
        
                                <div class="form-group">
                                    <p>Seleccione su horario de trabajo</p>
                                    <input type="checkbox" name="working_hours[]" value="9" <?= (in_array("9", $workingHours)) ? 'checked': '' ?>> 09
                                    <input type="checkbox" name="working_hours[]" value="10"<?= (in_array("10", $workingHours)) ? 'checked': '' ?>> 10
                                    <input type="checkbox" name="working_hours[]" value="11"<?= (in_array("11", $workingHours)) ? 'checked': '' ?>> 11
                                    <input type="checkbox" name="working_hours[]" value="12"<?= (in_array("12", $workingHours)) ? 'checked': '' ?>> 12
                                    <input type="checkbox" name="working_hours[]" value="13"<?= (in_array("13", $workingHours)) ? 'checked': '' ?>> 13
                                    <input type="checkbox" name="working_hours[]" value="14"<?= (in_array("14", $workingHours)) ? 'checked': '' ?>> 14
                                    <input type="checkbox" name="working_hours[]" value="15"<?= (in_array("15", $workingHours)) ? 'checked': '' ?>> 15
                                    <input type="checkbox" name="working_hours[]" value="16"<?= (in_array("16", $workingHours)) ? 'checked': '' ?>> 16
                                    <input type="checkbox" name="working_hours[]" value="17"<?= (in_array("17", $workingHours)) ? 'checked': '' ?>> 17
                                    <input type="checkbox" name="working_hours[]" value="18"<?= (in_array("18", $workingHours)) ? 'checked': '' ?>> 18
                                    <input type="checkbox" name="working_hours[]" value="19"<?= (in_array("19", $workingHours)) ? 'checked': '' ?>> 19
                                </div>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </form>
                        </div>
                        <div class="col">
                            <form action="">
                                <div class="form-group">
                                    
                                    Contraseña actual
                                    <input type="password" class="form-control" name="pass" placeholder="Ingrese su contraseña">

                                </div>
                                <div class="form-group ">
                                    
                                    Ingrese su nueva contraseña
                                    
                                        <input type="password" class="form-control" name="pass" placeholder="Ingrese su contraseña">
                                
                                </div>
                                <div class="form-group">
                                    Repita su nueva contraseña
                                    <input type="password" class="form-control" name="pass_repeat" placeholder="Confirmar su contraseña" required> 
                                </div>
                                <button type="submit" class="btn btn-info">Cambiar contraseña</button>
                            </form>
                        </div>
                    </div>
                </div>
                <?php include_once "partials/footer.php" ?>
            </div>
        </div>
    </div>
<?php require_once "layout/footer.php" ?>