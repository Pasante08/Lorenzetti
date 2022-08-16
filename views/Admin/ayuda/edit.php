<main class="container">
	<section class="xol-md-12 text-center my-4">
		<h1>Editar preguntas y respuestas</h1>
	</section>

	<section class="row-mt-2">
		<div class="card w-50 m-auto">
			<div class="card-header container">
				<h2>Información pregunta y respuesta</h2>
			</div>
			<div class="card-body w-100">
				<form action="?controller=ayuda&method=update" method="post">

					<input type="hidden" id="idHelpfaq" name="idHelpfaq" value="<?php echo $help[0]->idHelpfaq; ?>">

					<div class="form-group">
						<label>Nombre</label>
						<textarea name="question" id="question" class="form-control"><?php echo $help[0]->question ?></textarea>
					</div>
					<div class="form-group">
						<label>Descripción</label>
						<textarea name="answer" id="answer" class="form-control"><?php echo $help[0]->answer ?></textarea>
					</div>
					<div class="form-group">
						<button class="btn btn-primary">Editar</button>
					</div>
				</form>
			</div>
		</div>
	</section>
</main>