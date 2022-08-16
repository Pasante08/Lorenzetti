<main class="main">
        <div class="container">
            <div class="col-lg-12 order-lg-last dashboard-content">
                <h2>Factura</h2>
                <div class="row">
                    <div class="col-sm-11">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group required-field">
                                    <input type="hidden" id="idFactura" name="idFactura" value="<?php echo $factura[0]->idFactura ?>">
                                    <label for="idFactura">Factura</label>
                                    <input type="text" id="idFactura" name="idFactura" class="form-control" value="<?php echo $factura[0]->idFactura ?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group required-field">
                                    <label for="fecha">Cliente</label>
                                    <input type="text" id="cliente_id" name="cliente_id" class="form-control" value="<?php echo $factura[0]->cliente ?>" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-11">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group required-field">
                                    <label for="">Telefono</label>
                                    <input type="text" id="telefono" name="telefono" class="form-control" value="<?php echo $factura[0]->telefono ?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group required-field">
                                    <label for="">Correo</label>
                                    <input type="text" id="correo" name="correo" class="form-control" value="<?php echo $factura[0]->correo ?>" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-11">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group required-field">
                                    <label for="departamento_id">Departamento</label>
                                    <?php foreach ($departamentos as $departamento) {
                                        if($departamento->idDepartamento == $factura[0]->departamento_id){
                                            echo '<input type="text" id="departamento_id" name="departamento_id" class="form-control" value="'. $departamento->nombre .'" disabled>';
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group required-field">
                                    <label for="municipio_id">Municipio</label>
                                    <?php foreach ($municipios as $municipio) {
                                        if($municipio->idMunicipio == $factura[0]->municipio_id) {
                                            echo '<input type="text" id="municipio_id" name="municipio_id" class="form-control" value="'. $municipio->nombre .'" disabled>';
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-11">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group required-field">
                                    <label for="direccion">Dirección</label>
                                    <input type="text" id="direccion" name="direccion" class="form-control" value="<?php echo $factura[0]->direccion ?>" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <table class="table table-totals">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio unidad</th>
                            <th>Precio</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($factura as $facturas) : ?>
                            <tr>
                                <td><?php echo $facturas->codigo ?></td>
                                <td><?php echo $facturas->producto ?></td>
                                <td><?php echo $facturas->cantidad ?></td>
                                <td><?php echo $facturas->precio/$facturas->cantidad ?></td>
                                <td><?php echo $facturas->precio ?></td>
                            </tr>
                        <?php endforeach ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <th scope="row">Valor Envio </th>
                                <td><?php echo $factura[0]->vEnvio ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <th scope="row">Total</th>
                                <td><?php echo $total ?></td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>