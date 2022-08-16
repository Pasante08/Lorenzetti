<main class="container">
    <section class="xol-md-12 text-center my-4">
        <h1>Editar producto color</h1>
    </section>

    <section class="row-mt-2">
        <div class="card w-50 m-auto">
            <div class="card-header container">
                <h2>Información producto color</h2>
            </div>
            <div class="card-body w-100">
                <form action="?controller=color&method=update" method="post">

                    <input type="hidden" name="idProductoColor" value="<?php echo $producto_color[0]->idProductoColor; ?>">

                    <div class="form-group">
                        <label>Producto</label>
                        <select name="producto_id" id="producto_id" class="form-control">
                            <option>Seleccione...</option>
                            <?php
                            foreach ($productos as $producto) {
                                if ($producto->idProducto == $producto_color[0]->producto_id) {
                                    echo '<option selected value="' . $producto->idProducto . '">' . $producto->nombre . '</option>';
                                } else {
                                    echo '<option value="' . $producto->idProducto . '">' . $producto->nombre . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Color</label>
                        <select name="color_id" id="color_id" class="form-control">
                            <option>Seleccione...</option>
                            <?php
                            foreach ($colores as $color) {
                                if ($color->idColor == $producto_color[0]->color_id) {
                                    echo '<option selected value="' . $color->idColor . '">' . $color->nombre . '</option>';
                                } else {
                                    echo '<option value="' . $color->idColor . '">' . $color->nombre . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Estado</label>
                        <?php
                        if ($producto_color[0]->estado == 1) {
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