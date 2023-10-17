<?php require_once "layout/header.php"?>
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
                    <table class="table table-hover table-striped" >
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
                        <tr>
                          <td>1</td>
                          <td>Jacob</td>
                          <td>Photoshop</td>
                          <td class="text-danger"> 28.76% <i class="ti-arrow-down"></i></td>
                          <td><label class="badge badge-danger">Pending</label></td>
                          <td></td>
                          <td></td>
                          <td>
                            <button class="btn btn-outline-info btn-fw">Editar</button>
                          </td>
                          </td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>Messsy</td>
                          <td>Flash</td>
                          <td class="text-danger"> 21.06% <i class="ti-arrow-down"></i></td>
                          <td><label class="badge badge-warning">In progress</label></td>
                          <td></td>
                          <td></td>
                          <td>
                            <button class="btn btn-outline-info btn-fw">Editar</button>
                          </td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>John</td>
                          <td>Premier</td>
                          <td class="text-danger"> 35.00% <i class="ti-arrow-down"></i></td>
                          <td><label class="badge badge-info">Fixed</label></td>
                          <td></td>
                          <td></td>
                          <td>
                            <button class="btn btn-outline-info btn-fw">Editar</button>
                          </td>
                        </tr>
                        <tr>
                          <td>4</td>
                          <td>Peter</td>
                          <td>After effects</td>
                          <td class="text-success"> 82.00% <i class="ti-arrow-up"></i></td>
                          <td><label class="badge badge-success">Completed</label></td>
                          <td></td>
                          <td></td>
                          <td>
                            <button class="btn btn-outline-info btn-fw">Editar</button>
                          </td>
                        </tr>
                        <tr><td>5</td>
                          <td>Dave</td>
                          <td>53275535</td>
                          <td class="text-success"> 98.05% <i class="ti-arrow-up"></i></td>
                          <td><label class="badge badge-warning">In progress</label></td>
                          <td></td>
                          <td></td>
                          <td>
                            <button class="btn btn-outline-info btn-fw">Editar</button>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  
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
