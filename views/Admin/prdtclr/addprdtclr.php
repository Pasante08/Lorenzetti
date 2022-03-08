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
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($productos as $producto) : ?>
                            <tr>
                                <td><?php echo $producto->producto_id ?></td>
                                <td><?php echo $producto->voltaje_id ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <!-- Fin Contenido -->
            </div>
        </div>
    </div>