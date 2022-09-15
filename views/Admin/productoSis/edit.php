<main class="container">
    <section class="xol-md-12 text-center my-4">
        <h1>Editar producto</h1>
    </section>

    <section class="row-mt-2">
		<div class="card w-50 m-auto">
			<div class="card-header container">
				<h2>Información producto</h2>
			</div>
			<div class="card-body w-100">
				<form action="?controller=productosis&method=update" method="post">

					<input type="hidden" name="idProducto" value="<?php echo $productoSis[0]->idProducto; ?>">

                    <div class="form-group">
						<label>Codigo</label>
						<input type="text" name="nombre" class="form-control" value="<?php echo $productoSis[0]->codigo; ?>" disabled>
					</div>
					<div class="form-group">
						<label>Nombre</label>
						<input type="text" name="nombre" class="form-control" value="<?php echo $productoSis[0]->nombre; ?>" disabled>
					</div>
					<div class="form-group">
						<label>Voltaje</label>
						<select name="voltaje_id" class="form-control">
							<option>Seleccione...</option>
							<?php
								foreach ($voltajes as $voltaje) {
									if ($voltaje->idVoltaje == $productoSis[0]->voltaje_id) {
										echo '<option selected value="'.$voltaje->idVoltaje.'">'.$voltaje->nombre.'</option>';
									}else{
										echo '<option value="'.$voltaje->idVoltaje.'">'.$voltaje->nombre.'</option>';
									}
								}
							?>
						</select>
					</div>
					<div class="form-group">
						<label>Color</label>
						<select name="color_id" class="form-control">
							<option>Seleccione...</option>
							<?php
								foreach ($colores as $color) {
									if ($color->idColor == $productoSis[0]->color_id) {
										echo '<option selected value="'.$color->idColor.'">'.$color->nombre.'</option>';
									}else{
										echo '<option value="'.$color->idColor.'">'.$color->nombre.'</option>';
									}
								}
							?>
						</select>
					</div>
					<div class="form-group">
						<label>Producto</label>
						<select name="producto_id" class="form-control">
							<option>Seleccione...</option>
							<?php
								foreach ($productos as $producto) {
									if ($producto->idProducto == $productoSis[0]->producto_id) {
										echo '<option selected value="'.$producto->idProducto.'">'.$producto->nombre.'</option>';
									}else{
										echo '<option value="'.$producto->idProducto.'">'.$producto->nombre.'</option>';
									}
								}
							?>
						</select>
					</div>
                    <div class="form-group">
                        <label>Estado</label>
                        <?php
                        if ($productoSis[0]->estado == 1) {
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