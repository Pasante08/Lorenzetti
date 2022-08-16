    <div class="container">
        <h3 class="mt-5">Facturas</h3>
        <hr>
        <div class="row">
            <div class="col-12 col-md-12">
                <table class="tutorial-table">
                    <thead>
                        <tr>
                            <th>N° Factura</th>
                            <th>Fecha Factura</th>
                            <th>Referencia pago</th>
                            <th>Cliente</th>
                            <th>Función</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($facturas as $factura) : ?>
                            <tr>
                                <td><?php echo $factura->idFactura ?></td>
                                <td><?php echo $factura->fecha ?></td>
                                <td><?php echo $factura->refac ?></td>
                                <!--<td><?php //$factura-> 
                                        ?></td>-->
                                <td><?php echo $factura->nombre ?></td>
                                <td>
                                    <a href="?controller=factura&method=edit&id=<?php echo $factura->idFactura ?>" class="header-icon"><i class="fas fa-edit"></i></a>
                                    <a href="?controller=factura&method=viewFac&id=<?php echo $factura->idFactura ?>" class="header-icon"><i class="fas fa-eye"></i></a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </body>

    </html>