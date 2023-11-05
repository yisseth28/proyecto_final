<?php
    require_once 'class/User.php';
    require_once 'class/Speciality.php';
    require_once "layout/header.php";
    User::auth();
?>
<div class="container-scroller">
        <?php include_once "layout/topbar.php"; ?>
        <div class="container-fluid page-body-wrapper">
            <?php include_once "layout/sidebar.php"; ?>
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-12 col-lg-6 offset-lg-3">
                            <div class="card card-rounded">
                                <div class="card-body">
                                    <h3>Nueva Especialidad</h3>
                                    <hr>
                                    <?php include_once 'partials/alerts.php' ?>
                                    <form class="forms-sample" action="process_speciality.php" method="post">
                                        <div class="form-group row">
                                            <label for="name" class="col-sm-3 col-form-label">Nombre</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="name" placeholder="Nombre de la especialidad" value="<?= !empty($_SESSION['name']) ? $_SESSION['name'] : '' ?>" required>
                                            </div>
                                        </div>
                                        <input type="hidden" name="action" value="insert">
                                        <button type="submit" class="btn btn-primary me-2">Guardar</button>
                                        <a href="specialities.php" class="btn btn-light">Cancelar</a>
                                    </form>
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