<main class="container">
	<section class="col-md-12 text-center my-4">
		<h1>Nuevo municipio</h1>
	</section>

	<section class="row-my-2">
		<div class="card w-50 m-auto">
			<div class="card-header container">
				<h2>Información municipio</h2>
			</div>
			<div class="card-body w-100">
				<form action="?controller=municipio&method=save" method="POST">
					<div class="form-group">
						<label>Codigo:</label>
						<input type="text" name="codigo" class="form-control" placeholder="Ingrese el codigo del municipio">
					</div>
					<div class="form-group">
						<label>Nombre:</label>
						<input type="text" name="nombre" class="form-control" placeholder="Ingrese el nombre del articulo" required>
					</div>
                    <div class="form-group">
						<label>flete:</label>
						<input type="text" name="flete" class="form-control" placeholder="Ingrese el flete" required>
					</div>
					<div class="form-group">
						<label>Departamento:</label>
						<select name="departamento_id" class="form-control">
							<option>Seleccione...</option>
							<?php
								foreach ($departamentos as $departamento) {
									echo '<option value="'.$departamento->idDepartamento.'">'.$departamento->nombre.'</option>';
								}
							?>
						</select>
					</div>
					<div class="form-group">
						<button class="btn btn-primary">Guardar</button>
					</div>
				</form>
			</div>
		</div>
	</section>
</main>