<main class="container">
	<section class="xol-md-12 text-center my-4">
		<h1>Editar Municipio</h1>
	</section>

	<section class="row-mt-2">
		<div class="card w-50 m-auto">
			<div class="card-header container">
				<h2>Información municipio</h2>
			</div>
			<div class="card-body w-100">
				<form action="?controller=municipio&method=update" method="post">

					<input type="hidden" name="idMunicipio" value="<?php echo $municipio[0]->idMunicipio; ?>">

					<div class="form-group">
						<label>Codigo</label>
						<input type="text" name="codigo" class="form-control" value="<?php echo $municipio[0]->codigo; ?>">
					</div>
					<div class="form-group">
						<label>Nombre:</label>
						<input type="text" name="nombre" class="form-control" value="<?php echo $municipio[0]->nombre; ?>">
					</div>
					<div class="form-group">
						<label for="flete">Flete:</label>
						<input type="text" name="flete" id="flete" class="form-control" value="<?php echo $municipio[0]->flete ?>">
					</div>
					<div class="form-group">
						<label>Categoria</label>
						<select name="departamento_id" class="form-control">
							<option>Seleccione...</option>
							<?php
								foreach ($departamentos as $departamento) {
									if ($departamento->idDepartamento == $municipio[0]->departamento_id) {
										echo '<option selected value="'.$departamento->idDepartamento.'">'.$departamento->nombre.'</option>';
									}else{
										echo '<option value="'.$departamento->idDepartamento.'">'.$departamento->nombre.'</option>';
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