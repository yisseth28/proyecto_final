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
                    <h3>Lista de Especialidades</h3>
                    <hr>
                    <button class="btn btn-outline-primary btn-fw btn-sm align-items-end" >Nueva Especialidad</button>
                    <table class="table table-hover table-striped" >
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>Nombre</th>
                          <th>Estado</th>
                          <th>Fecha Creación</th>
                          <th>Ultimo cambio</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>Pedriatría</td>
                          <td><label class="badge badge-success">Activo</label></td>
                          <td>'04-10-2023'</td>
                          <td>'04-10-2023'</td>
                          <td>
                            <button class="btn btn-outline-info btn-fw btn-sm">Editar</button>
                            <button class="btn btn-outline-danger btn-fw btn-sm">Eliminar</button>
                          </td>
                          </td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>Ginecología</td>
                          <td><label class="badge badge-success">Activo</label></td>
                          <td>'04-10-2023'</td>
                          <td>'04-10-2023'</td>
                          <td>
                            <button class="btn btn-outline-info btn-fw btn-sm">Editar</button>
                            <button class="btn btn-outline-danger btn-fw btn-sm">Eliminar</button>
                          </td>
                          </td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>Cardiología</td>
                          <td><label class="badge badge-danger">Inactivo</label></td>
                          <td>'04-10-2023'</td>
                          <td>'04-10-2023'</td>
                          <td>
                            <button class="btn btn-outline-info btn-fw btn-sm">Editar</button>
                            <button class="btn btn-outline-danger btn-fw btn-sm">Eliminar</button>
                          </td>
                          </td>
                        </tr>
                        <tr>
                          <td>4</td>
                          <td>Dermatología</td>
                          <td><label class="badge badge-success">Activo</label></td>
                          <td>'04-10-2023'</td>
                          <td>'04-10-2023'</td>
                          <td>
                            <button class="btn btn-outline-info btn-fw btn-sm">Editar</button>
                            <button class="btn btn-outline-danger btn-fw btn-sm">Eliminar</button>
                          </td>
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
