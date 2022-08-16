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
                                        <input type="hidden" id="idFactura" name="idFactura" value="<?php echo $factura[0]->idFactura ?>">
                                        <label for="idFactura">Cotización</label>
                                        <input type="text" id="idFactura" name="idFactura" class="form-control"  value="<?php echo $factura[0]->idFactura ?>" disabled>
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
                                        <input type="text" id="cliente_id" name="cliente_id" class="form-control" value="<?php echo $factura[0]->nombre ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group required-field">
                                        <label for="guia">Guia</label>
                                        <?php if(empty($factura[0]->guia)) : ?>
                                        <input type="text" id="guia" name="guia" class="form-control" value="">
                                        <?php else : ?>
                                        <input type="text" id="guia" name="guia" class="form-control disabled" value="<?php echo $factura[0]->guia ?>" disabled>
                                        <?php endif ?>
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
                                    <?php if(empty($factura[0]->guia)) : ?>
                                        <button class="btn btn-primary">Enviar correo</button>
                                        <?php else : ?>
                                        <?php endif ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>