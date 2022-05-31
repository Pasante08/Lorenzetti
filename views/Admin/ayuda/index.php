<div class="container">
    <h3 class="mt-5">Importar preguntas</h3>
    <hr>
    <div class="row">
      <div class="col-12 col-md-12">
        <!-- Contenido -->

        <div class="outer-container">
          <form action="?controller=ayuda&method=addExcel" method="POST" name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
            <div>
              <label>Elija Archivo Excel</label> <input type="file" name="file" id="file" accept=".xls,.xlsx">
              <button type="submit" id="submit" name="import" class="btn-submit">Importar Registros</button>

            </div>

          </form>

        </div>

          <table class='tutorial-table'>
            <thead>
              <tr>
                <th>Pregunta</th>
                <th>Respuesta</th>
              </tr>
            </thead>
              <tbody>
              <?php foreach ($helps as $help) : ?>
                <tr>
                  <td><?php echo $help->question ?></td>
                  <td><?php echo $help->answer ?></td>
                  <td><a href="?controller=municipio&method=edit&id=<?php echo $municipio->idMunicipio ?>">Editar</a></td>
                </tr>
                <?php endforeach ?>
              </tbody>
          </table>
        <!-- Fin Contenido -->
      </div>
    </div>
  </div>