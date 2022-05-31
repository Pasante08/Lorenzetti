<div class="container">
    <h3 class="mt-5">Importar productos</h3>
    <hr>
    <div class="row">
      <div class="col-12 col-md-12">
        <!-- Contenido -->

        <div class="outer-container">
          <form action="?controller=productosis&method=addExcel" method="POST" name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
            <div>
              <label>Elija Archivo Excel</label> <input type="file" name="file" id="file" accept=".xls,.xlsx">
              <button type="submit" id="submit" name="import" class="btn-submit">Importar Registros</button>

            </div>

          </form>

        </div>

          <table class='tutorial-table'>
            <thead>
              <tr>
                <th>Nombres</th>
                <th>descripcion</th>
                <th>imagen</th>
                <th>ubicacion</th>
                <th>funciones</th>
              </tr>
            </thead>
              <tbody>
              <?php foreach ($productos as $producto) : ?>
                <tr>
                  <td><?php echo $producto->nombre ?></td>
                  <td><?php echo $producto->descripcion ?></td>
                  <td><?php echo $producto->imagen ?></td>
                  <td><?php echo $producto->ubicacion ?></td>
                  <td><a href="?controller=productosis&method=edit&id=<?php echo $producto->idProducto ?>">Editar</a></td>
                </tr>
                <?php endforeach ?>
              </tbody>
          </table>
        <!-- Fin Contenido -->
      </div>
    </div>
  </div>