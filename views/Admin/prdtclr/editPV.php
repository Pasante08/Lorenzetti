<main class="container">
    <section class="xol-md-12 text-center my-4">
        <h1>Editar producto voltaje</h1>
    </section>

    <section class="row-mt-2">
        <div class="card w-50 m-auto">
            <div class="card-header container">
                <h2>Información producto voltaje</h2>
            </div>
            <div class="card-body w-100">
                <form action="?controller=prdtclr&method=update" method="post">

                    <input type="hidden" name="idProductoVoltaje" value="<?php echo $producto_voltaje[0]->idProductoVoltaje; ?>">

                    <div class="form-group">
                        <label>Producto</label>
                        <select name="producto_id" id="producto_id" class="form-control">
                            <option>Seleccione...</option>
                            <?php
                            foreach ($productos as $producto) {
                                if ($producto->idProducto == $producto_voltaje[0]->producto_id) {
                                    echo '<option selected value="' . $producto->idProducto . '">' . $producto->nombre . '</option>';
                                } else {
                                    echo '<option value="' . $producto->idProducto . '">' . $producto->nombre . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Voltaje</label>
                        <select name="voltaje_id" id="voltaje_id" class="form-control">
                            <option>Seleccione...</option>
                            <?php
                            foreach ($voltajes as $voltaje) {
                                if ($voltaje->idVoltaje == $producto_voltaje[0]->voltaje_id) {
                                    echo '<option selected value="' . $voltaje->idVoltaje . '">' . $voltaje->nombre . '</option>';
                                } else {
                                    echo '<option value="' . $voltaje->idVoltaje . '">' . $voltaje->nombre . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Categoria</label>
                        <?php
                        if ($producto_voltaje[0]->estado == 1) {
                            echo '<div class="form-check">
                            <input value="1" class="form-check-input" type="radio" name="estado" id="estado" checked>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Activo
                            </label>
                            </div>';
                            echo '<div class="form-check">
                            <input value="0" class="form-check-input" type="radio" name="estado" id="estado">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Inactivo
                            </label>
                        </div>';
                        } else {
                            echo '<div class="form-check">
                            <input value="1" class="form-check-input" type="radio" name="estado" id="estado">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Activo
                            </label>
                            </div>';
                            echo '<div class="form-check">
                            <input value="0" class="form-check-input" type="radio" name="estado" id="estado" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Inactivo
                            </label>
                        </div>';
                        }
                        ?>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Editar</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>