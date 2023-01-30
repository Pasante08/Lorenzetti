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
				<form action="?controller=producto&method=update" method="post">

					<input type="hidden" name="idProducto" value="<?php echo $producto[0]->idProducto; ?>">

					<div class="form-group">
						<label>Nombre</label>
						<input type="text" name="nombre" class="form-control" value="<?php echo $producto[0]->nombre; ?>" disabled>
					</div>
					<div class="form-group">
						<label>Descripción</label>
						<textarea type="text" name="descripcion" class="form-control"><?php echo $producto[0]->descripcion; ?></textarea>
					</div>
					<div class="form-group">
						<label>Categoria</label>
						<select name="categoria_id" class="form-control">
							<option>Seleccione...</option>
							<?php
								foreach ($categorias as $categoria) {
									if ($categoria->idCategoria == $producto[0]->categoria_id) {
										echo '<option selected value="'.$categoria->idCategoria.'">'.$categoria->nombre.'</option>';
									}else{
										echo '<option value="'.$categoria->idCategoria.'">'.$categoria->nombre.'</option>';
									}
								}
							?>
						</select>
					</div>
					<div class="form-group">
                        <label>Estado</label>
                        <?php
                        if ($producto[0]->estado == 1) {
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
						<label for="imagen">Imagen:</label>
						<input type="text" name="imagen" id="imagen" class="form-control" value="<?php echo $producto[0]->imagen ?>">
					</div>
					<div class="form-group">
						<label for="ubicacion">Ubicación:</label>
						<input type="text" name="ubicacion" id="ubicacion" class="form-control" value="<?php echo $producto[0]->ubicacion ?>">
					</div>
					<div class="form-group">
						<label for="imgxcien">Ubicación zoom:</label>
						<input type="text" name="imgxcien" id="imgxcien" class="form-control" value="<?php echo $producto[0]->imgxcien ?>">
					</div>
					<div class="form-group">
						<label for="imgxcien">Precio:</label>
						<input type="text" name="precio" id="precio" class="form-control" value="<?php echo $producto[0]->precio ?>">
					</div>
					<div class="form-group">
						<button class="btn btn-primary">Editar</button>
					</div>
				</form>
			</div>
		</div>
	</section>
</main>