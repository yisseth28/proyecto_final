<?php
    require_once 'class/User.php';
    require_once 'class/Speciality.php';
    require_once "layout/header.php";
    User::auth();
    $speciality = new Speciality;
    $specialities = $speciality->selectAll();
?>    
<div class="container-scroller">
<?php require_once "layout/header.php"; ?>
    <div class="container-scroller">
        <?php include_once "layout/topbar.php"; ?>
        <div class="container-fluid page-body-wrapper">
            <?php include_once "layout/sidebar.php"; ?>
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-rounded">
                                <div class="card-body">
                                    <h3>Lista de Especialidades</h3>
                                    <hr>
                                    <?php include_once 'partials/alerts.php' ?>
                                    <div  style="text-align: right;">
                                          <a href="speciality_new.php" class="btn btn-primary btn-fw btn-sm">Nueva especialidad</a>
                                         </div>
                                    
                                    <div class="table-responsive">
                                        <table class="table table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Nombre</th>
                                                <th>Estado</th>
                                                <th>Fecha creación</th>
                                                <th>Ultimo cambio</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                            <tbody>  
                                                   <?php foreach($specialities as $speciality): ?>
                                                 <tr>
                                                    <td><?= $speciality['id'] ?></td>
                                                    <td><?= $speciality['name'] ?></td>
                                                    <td><?= $speciality['status'] ?></td>
                                                    <td><?= $speciality['created_at'] ?></td>
                                                    <td><?= $speciality['updated_at'] ?></td>
                                                    <td>
                                                        <form action="process_speciality.php" method="post" onsubmit="return eliminar()">
                                                            <input type="hidden" name="action" value="delete">
                                                            <input type="hidden" name="id" value="<?= $speciality['id'] ?>">
                                                            <button type="submit" class="btn btn-outline-danger btn-fw btn-sm">Eliminar</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>                     
                                          </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php include_once "partials/footer.php" ?>
            </div>
        </div>
    </div>
    <?php require_once "layout/footer.php" ?>