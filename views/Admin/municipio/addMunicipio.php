<div class="container">
    <h3 class="mt-5">Importar municipios</h3>
    <hr>
    <div class="row">
      <div class="col-12 col-md-12">
        <!-- Contenido -->

        <div class="outer-container">
          <form action="?controller=municipio&method=addExcel" method="POST" name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
            <div>
              <label>Elija Archivo Excel</label> <input type="file" name="file" id="file" accept=".xls,.xlsx">
              <button type="submit" id="submit" name="import" class="btn-submit">Importar Registros</button>

            </div>

          </form>

        </div>

          <table class='tutorial-table'>
            <thead>
              <tr>
                <th>Departamento</th>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Flete</th>
              </tr>
            </thead>
              <tbody>
              <?php foreach ($municipios as $municipio) : ?>
                <tr>
                  <td><?php echo $municipio->departamento_id ?></td>
                  <td><?php echo $municipio->codigo ?></td>
                  <td><?php echo $municipio->nombre ?></td>
                  <td><?php echo $municipio->flete ?></td>
                  <td><a href="?controller=municipio&method=edit&id=<?php echo $municipio->idMunicipio ?>">Editar</a></td>
                </tr>
                <?php endforeach ?>
              </tbody>
          </table>
        <!-- Fin Contenido -->
      </div>
    </div>
  </div>