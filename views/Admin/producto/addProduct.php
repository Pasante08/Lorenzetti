  <div class="container">
    <h3 class="mt-5">Importar productos</h3>
    <hr>
    <div class="row">
      <div class="col-12 col-md-12">
        <!-- Contenido -->

        <div class="outer-container">
          <form action="?controller=producto&method=addExcel" method="POST" name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
            <div>
              <label>Elija Archivo Excel</label> <input type="file" name="file" id="file" accept=".xls,.xlsx">
              <button type="submit" id="submit" name="import" class="btn-submit">Importar Registros</button>
            </div>
          </form>
        </div>
        <div class="col-md-6 float-left">
          <a class="btn btn-success" href="?controller=producto&method=newProduct"><i class="fas fa-plus-circle"></i> Nuevo producto</a>
        </div>
        <table class='tutorial-table'>
          <thead>
            <tr>
              <th>idProducto</th>
              <th>Nombres</th>
              <th>descripcion</th>
              <th>imagen</th>
              <th>ubicacion</th>
              <th>estado</th>
              <th>funciones</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($productos as $producto) : ?>
              <tr>
                <td><?php echo $producto->idProducto ?></td>
                <td><?php echo $producto->nombre ?></td>
                <td><?php echo $producto->descripcion ?></td>
                <td><?php echo $producto->imagen ?></td>
                <td><?php echo $producto->ubicacion ?></td>
                <td><?php echo $producto->estado ? '<span style="color:green">Activo</span>' : '<span style="color:red">Inactivo</span>'; ?></td>
                <td>
                  <a href="?controller=producto&method=edit&id=<?php echo $producto->idProducto ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                  <a href="?controller=producto&method=updateStatus&id=<?php echo $producto->idProducto ?>&S=<?php echo $producto->estado ?>" <?php echo $producto->estado ? 'class="btn btn-success"' : 'class="btn btn-danger"'; ?>><?php echo $producto->estado ? '<i class="fas fa-lock-open"></i>' : '<i class="fas fa-lock"></i>'; ?></a>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
        <!-- Fin Contenido -->
      </div>
    </div>
  </div>