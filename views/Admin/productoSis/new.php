<main class="container">
    <section class="col-md-12 text-center my-4">
        <h1>Nuevo Producto 	Sistema</h1>
    </section>

    <section class="row-mt-2">
		<div class="card w-50 m-auto">
			<div class="card-header container">
				<h2>Información producto</h2>
			</div>
			<div class="card-body w-100">
				<form action="?controller=productosis&method=save" method="POST">
                    <div class="form-group">
						<label>Codigo</label>
						<input type="text" name="codigo" id="codigo" class="form-control" placeholder="Ingrese el codigo SAP">
					</div>
					<div class="form-group">
						<label>Nombre</label>
						<input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese el nombre del producto">
					</div>
					<div class="form-group">
						<label>Voltaje</label>
						<select name="voltaje_id" class="form-control">
							<option>Seleccione...</option>
                            <?php foreach ($voltajes as $voltaje) {
                                echo '<option value="'.$voltaje->idVoltaje.'">'.$voltaje->nombre.'</option>';
                            }
                            ?>
						</select>
					</div>
					<div class="form-group">
						<label>Color</label>
						<select name="color_id" class="form-control">
							<option>Seleccione...</option>
                            <?php foreach ($colores as $color) {
                                echo '<option value="'.$color->idColor.'">'.$color->nombre.'</option>';
                            }
                            ?>
						</select>
					</div>
					<div class="form-group">
						<label>Producto</label>
						<select name="producto_id" class="form-control">
							<option>Seleccione...</option>
                            <?php foreach ($productos as $producto) {
                                echo '<option value="'.$producto->idProducto.'">'.$producto->nombre.'</option>';
                            }
                            ?>
						</select>
					</div>
					<div class="form-group">
						<label>Precio:</label>
						<input type="text" name="precio" id="precio" class="form-control" placeholder="Ingrese el precio del producto">
					</div>
					<div class="form-group">
						<label>Unidades:</label>
						<input type="text" name="unidades" id="unidades" class="form-control" placeholder="Ingrese la cantidad de producto">
					</div>
					<div class="form-group">
						<button class="btn btn-primary">Editar</button>
					</div>
				</form>
			</div>
		</div>
	</section>
</main>