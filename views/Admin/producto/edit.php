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
						<button class="btn btn-primary">Editar</button>
					</div>
				</form>
			</div>
		</div>
	</section>
</main>