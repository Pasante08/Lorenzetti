<div class="container">
        <h3 class="mt-5">Importar producto voltaje</h3>
        <hr>
        <div class="row">
            <div class="col-12 col-md-12">
                <!-- Contenido -->

                <div class="outer-container">
                    <form action="?controller=prdtclr&method=addVoltajeProducto" method="POST" name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
                        <div>
                            <label>Elija Archivo Excel</label> <input type="file" name="file" id="file" accept=".xls,.xlsx">
                            <button type="submit" id="submit" name="import" class="btn-submit">Importar Registros</button>

                        </div>

                    </form>

                </div>

                <table class='tutorial-table'>
                    <thead>
                        <tr>
                            <th>idProducto</th>
                            <th>idVoltje</th>
                            <th>Estado</th>
                            <th>Funciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($producto_voltaje as $productoVoltaje) : ?>
                            <tr>
                                <td><?php echo $productoVoltaje->producto_id ?></td>
                                <td><?php echo $productoVoltaje->voltaje_id ?></td>
                                <td><?php echo $productoVoltaje->estado ? '<span style="color:green">Activo</span>' : '<span style="color:red">Inactivo</span>'; ?></td>
                                <td>
                                    <a href="?controller=prdtclr&method=editPV&id=<?php echo $productoVoltaje->idProductoVoltaje ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                    <a href="?controller=prdtclr&method=updateStatus&id=<?php echo $productoVoltaje->idProductoVoltaje ?>&S=<?php echo $productoVoltaje->estado ?>" <?php echo $productoVoltaje->estado ? 'class="btn btn-success"' : 'class="btn btn-danger"'; ?>><?php echo $productoVoltaje->estado ? '<i class="fas fa-lock-open"></i>' : '<i class="fas fa-lock"></i>'; ?></a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <!-- Fin Contenido -->
            </div>
        </div>
    </div>