<?php
  session_start();
  require_once "class/User.php";
  require_once "layout/header.php";
  User::auth();
  $user=new User;
  $users=$user->selectALL();
?>
  <div class="container-scroller">
    <?php include_once "layout/topbar.php" ?>
    <div class="container-fluid page-body-wrapper">
      <?php include_once "layout/sidebar.php"  ?>
      <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
              <div class="col-12">
                <div class="card card-rounded">
                  <div class="card-body">
                    <h3>Administrador de Usuarios</h3>
                    <hr>
                    <a href="user_new.php" class="btn btn-outline-primary btn-fw btn-sm align-items-end" >Nuevo Usuario </a>
                    <?php include_once "partials/alerts.php";?>
                    <div class="table-responsive">
                      <table class="table table-hover table-striped">
                      <thead>
                          <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Tipo</th>
                            <th>Estado</th>
                            <th>Usuario desde</th>
                            <th>Ultimo cambio</th>
                            <th></th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php foreach($users as $user):?>
                          <tr>
                            <td><?=$user['id']?></td>
                            <td><?=$user['name']?></td>
                            <td><?=$user['email']?></td>
                            <td><?=$user['type']?></td>
                            <td><?=$user['status']?></td>
                            <td><?=$user['created_at']?></td>
                            <td><?=$user['updated_at']?></td>
                            <td>
                              <form action="process_user.php" method="POST" onsubmit="return eliminar()">
                                <input type="hidden" value="delete" name="action">
                                <input type="hidden" name="id" value="<?=$user['id']?>">
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
        <?php include_once "partials/footer.php"; ?>
      </div>
    </div>
  </div>
  <script>
    function eliminar(){
      return confirm("¿Está seguro de eliminar el usuario?");
    }
  </script>
  <?php require_once "layout/footer.php"?>
  


