
    <?php //require 'templates/header.php'; ?>
    <div class="container">
        <h3 class="mt-5">Importar producto colores</h3>
        <hr>
        <div class="row">
            <div class="col-12 col-md-12">
                <!-- Contenido -->

                <div class="outer-container">
                    <form action="?controller=color&method=addColorProducto" method="POST" name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
                        <div>
                            <label>Elija Archivo Excel</label> <input type="file" name="file" id="file" accept=".xls,.xlsx">
                            <button type="submit" id="submit" name="import" class="btn-submit">Importar Registros</button>

                        </div>

                    </form>

                </div>

                <table class='tutorial-table'>
                    <thead>
                        <tr>
                            <th>producto</th>
                            <th>producto_id</th>
                            <th>color_id</th>
                            <th>ubicacion</th>
                            <th>imgxcien</th>
                            <th>Estado</th>
                            <th>Funciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($producto_color as $productoColor) : ?>
                            <tr>
                                <td><?php echo $productoColor->producto ?></td>
                                <td><?php echo $productoColor->producto_id ?></td>
                                <td><?php echo $productoColor->color_id ?></td>
                                <td><?php echo $productoColor->ubicacion ?></td>
                                <td><?php echo $productoColor->imgxcien ?></td>
                                <td><?php echo $productoColor->estado ? '<span style="color:green">Activo</span>' : '<span style="color:red">Inactivo</span>'; ?></td>
                                <td>
                                    <a href="?controller=color&method=editPC&id=<?php echo $productoColor->idProductoColor ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                    <a href="?controller=color&method=updateStatus&id=<?php echo $productoColor->idProductoColor ?>&S=<?php echo $productoColor->estado ?>" <?php echo $productoColor->estado ? 'class="btn btn-success"' : 'class="btn btn-danger"'; ?>><?php echo $productoColor->estado ? '<i class="fas fa-lock-open"></i>' : '<i class="fas fa-lock"></i>'; ?></a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <!-- Fin Contenido -->
            </div>
        </div>
    </div>
    <?php //require 'templates/footer.php'; ?>