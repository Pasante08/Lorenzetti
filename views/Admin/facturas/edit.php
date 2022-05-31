<main class="main">
        <div class="container">
            <div class="col-lg-12 order-lg-last dashboard-content">
                <h2>Editar factura</h2>
                <form action="?controller=factura&method=update" method="POST">
                    <div class="row">
                        <div class="col-sm-11">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group required-field">
                                        <input type="hidden" id="idfactura" name="idfactura" value="<?php echo $factura[0]->idFactura ?>">
                                        <label for="idfactura">Cotización</label>
                                        <input type="text" id="idfactura" name="idfactura" class="form-control"  value="<?php echo $factura[0]->idFactura ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group required-field">
                                        <label for="fecha">Fecha</label>
                                        <input type="text" id="fecha" name="fecha" class="form-control" value="<?php echo $factura[0]->fecha ?>" disabled>
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
                                        <label for="">Cliente</label>
                                        <input type="text" id="cliente_id" name="cliente_id" class="form-control" value="<?php echo $factura[0]->nombre.' '.$factura[0]->apellido ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group required-field">
                                        <label for="">Guia</label>
                                        <input type="text" id="facturaSap" name="facturaSap" class="form-control" value="Vacio">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-11">
                            <div class="row">
                                <div class="form-footer">
                                    <div class="form-footer-right">
                                        <button class="btn btn-primary">Actualizar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>