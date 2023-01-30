<main class="container">
    <section class="col-md-12 text-center my-4">
        <h1>Nuevo Producto</h1>
    </section>

    <section class="row-mt-2">
        <div class="card w-50 m-auto">
            <div class="card-header container">
                <h2>Información producto</h2>
            </div>
            <div class="card-body w-100">
                <form action="?controller=producto&method=save" method="POST">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese el nombre del producto">
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <textarea name="descripcion" id="descripcion" cols="5" rows="5" class="form-control" placeholder="Ingrese la descripción del producto"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="precio">Precio</label>
                        <input type="text" name="precio" id="precio" class="form-control" placeholder="Ingrese el precio del producto">
                    </div>
                    <div class="form-group">
                        <label for="preciosi">Precio sin IVA</label>
                        <input type="text" name="preciosi" id="preciosi" class="form-control" placeholder="Ingrese el precio sin IVA del producto">
                    </div>
                    <div class="form-group">
                        <label for="imagen">Imagen</label>
                        <input type="text" name="imagen" id="imagen" class="form-control" placeholder="Ingrese la imagen del producto">
                    </div>
                    <div class="form-group">
						<label>Categoria</label>
						<select name="categoria_id" class="form-control">
							<option>Seleccione...</option>
                            <?php foreach ($categorias as $categoria) {
                                echo '<option value="'.$categoria->idCategoria.'">'.$categoria->nombre.'</option>';
                            }
                            ?>
						</select>
					</div>
                    <div class="form-group">
                        <label for="Voltaje">Voltaje</label>
                        <input type="text" name="Voltaje" id="Voltaje" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="color">color</label>
                        <input type="text" name="color" id="color" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
						<button class="btn btn-primary">Guardar</button>
					</div>
                </form>
            </div>
        </div>
    </section>
</main>