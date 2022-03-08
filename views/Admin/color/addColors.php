
    <div class="container">
        <h3 class="mt-5">Importar colores</h3>
        <hr>
        <div class="row">
            <div class="col-12 col-md-12">
                <!-- Contenido -->

                <div class="outer-container">
                    <form action="?controller=color&method=addColors" method="POST" name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
                        <div>
                            <label>Elija Archivo Excel</label> <input type="file" name="file" id="file" accept=".xls,.xlsx">
                            <button type="submit" id="submit" name="import" class="btn-submit">Importar Registros</button>

                        </div>

                    </form>

                </div>

                <table class='tutorial-table'>
                    <thead>
                        <tr>
                            <th>idColor</th>
                            <th>Nombre</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($colores as $color) : ?>
                            <tr>
                                <td><?php echo $color->idColor ?></td>
                                <td><?php echo $color->nombre ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <!-- Fin Contenido -->
            </div>
        </div>
    </div>