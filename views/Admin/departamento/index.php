<div class="container">
    <h3 class="mt-5">Importar Departamentos</h3>
    <hr>
    <div class="row">
      <div class="col-12 col-md-12">
        <!-- Contenido -->

        <div class="outer-container">
          <form action="?controller=departamento&method=addExcel" method="POST" name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
            <div>
              <label>Elija Archivo Excel</label> <input type="file" name="file" id="file" accept=".xls,.xlsx">
              <button type="submit" id="submit" name="import" class="btn-submit">Importar Registros</button>

            </div>

          </form>

        </div>

          <table class='tutorial-table'>
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Codigo</th>
                <th>Funciones</th>
              </tr>
            </thead>
              <tbody>
              <?php foreach ($departamentos as $departamento) : ?>
                <tr>
                  <td><?php echo $departamento->nombre ?></td>
                  <td><?php echo $departamento->codigo ?></td>
                  <td><a href="?controller=departamento&method=edit&id=<?php echo $departamento->idDepartamento ?>">Editar</a></td>
                </tr>
                <?php endforeach ?>
              </tbody>
          </table>
        <!-- Fin Contenido -->
      </div>
    </div>
  </div>