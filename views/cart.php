<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Carrito</title>
</head>

<body>
	<?php require 'templates/header.php'; ?>
	<main class="main">
		<nav aria-label="breadcrumb" class="breadcrumb-nav">
			<div class="container">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="?controller=producto"><i class="icon-home"></i></a></li>
					<li class="breadcrumb-item active" aria-current="page">Carrito</li>
				</ol>
			</div><!-- End .container -->
		</nav>

		<div class="page-header">
			<div class="container">
				<h1>Carrito de compras</h1>
			</div><!-- End .container -->
		</div><!-- End .page-header -->
		<?php if (!empty($carrito)) : ?>
			<div class="container">
				<div class="row row-sparse">
					<div class="col-lg-8 padding-right-lg">
						<div class="cart-table-container">
							<table class="table table-cart">
								<thead>
									<tr>
										<th class="product-col">Producto</th>
										<th class="price-col">Precio</th>
										<th class="qty-col">Cantidad</th>
										<th>Subtotal</th>
										<th class="function-col">funciones</th>
									</tr>
								</thead>
								<tbody id="tabla" class="tabla">
									<?php $id = 0; ?>
									<?php foreach ($carrito as $productos) : ?>
										<?php foreach ($productos as $producto) : ?>
											<tr class="product-row">
												<td class="productCart" hidden>
													<?php echo $id++ ?>
												</td>
												<td class="product-col">
													<figure class="product-image-container">
														<a href="?controller=producto&method=viewProduct&id=<?php echo $producto->idProducto ?>" class="product-image">
															<img src="<?php echo $producto->ubicacion ?>" alt="product">
														</a>
													</figure>
													<h5 class="product-title">
														<a href="?controller=producto&method=viewProduct&id=<?php echo $producto->idProducto ?>"><?php echo $producto->nombre ?> <?php echo $producto->NC ?> <?php echo $producto->NV ?></a>
													</h5>
												</td>
												<td class="idProducto" hidden>
													<?php echo $producto->idProducto ?>
												</td>
												<td class="idC" hidden>
													<?php echo $producto->idC ?>
												</td>
												<td class="idV" hidden>
													<?php echo $producto->idV ?>
												</td>
												<!--<td>
													<input type="text" id="txtC1" value="<?php echo $producto->idProducto ?>">
												</td>-->
												<td>$<?php echo number_format($producto->precio, 0, ',', '.') ?></td>
												<td class="cantidad">
													<input class="vertical-quantity form-control" type="text" id="quantity" name="quantity" value="<?php echo $producto->cantidad ?>">
												</td>
												<td>$<?php echo number_format($producto->subtotal, 0, ',', '.') ?></td>
												<td>
													<a href="#" title="Remove product" class="btn-remove icon-cancel"><span class="sr-only">Remove</span></a>
												</td>
											</tr>
											<tr class="product-action-row">
												<td colspan="4" class="clearfix">
													<div class="float-left">
														<a href="#" class="btn-move"></a>
													</div><!-- End .float-left -->

													<div class="float-right">
														<!--<a href="#" title="Edit product" class="btn-edit" hidden><span class="sr-only">Edit</span><i class="icon-pencil"></i></a>
                                                        <a href="#" title="Remove product" class="btn-remove icon-cancel"><span class="sr-only"></span></a>-->
													</div><!-- End .float-right -->
												</td>
											</tr>
										<?php endforeach ?>
									<?php endforeach ?>
								</tbody>
								<tfoot>
									<tr>
										<td colspan="4" class="clearfix">
											<div class="float-left">
												<a href="?controller=producto" class="btn btn-outline-secondary">Continuar comprando</a>
											</div><!-- End .float-left -->

											<div class="float-right">
												<a href="?controller=carrito&method=update" class="btn btn-outline-secondary btn-update-cart disabled">Actualizar carrito</a>
											</div><!-- End .float-right -->
										</td>
									</tr>
								</tfoot>
							</table>
						</div><!-- End .cart-table-container -->


					</div><!-- End .col-lg-8 -->

					<div class="col-lg-4">
						<div class="cart-summary">
							<form action="" method="POST" id="frm-fac" autocomplete="off">
								<h3>Resumen</h3>
								<div class="collapse show" id="total-estimate-section">
									<div class="form-group form-group-sm">
										<label>Departamento:</label>
										<div class="select-custom">
											<select id="slt-depa" name="slt-depa" class="form-control form-control-sm" required>
												<option value="" selected>Seleccione...</option>
												<?php foreach ($departamentos as $depa) : ?>
													<option value="<?php echo $depa->idDepartamento ?>"><?php echo $depa->nombre ?></option>
												<?php endforeach ?>
											</select>
										</div><!-- End .select-custom -->
									</div><!-- End .form-group -->

									<div class="form-group form-group-sm">
										<label>Municipio:</label>
										<div class="select-custom">
											<select id="slt-muni" name="slt-muni" class="form-control form-control-sm" required>

											</select>
										</div><!-- End .select-custom -->
									</div><!-- End .form-group -->

									<div class="form-group form-group-sm">
										<label>Dirección</label>
										<input id="adress" name="adress" type="text" class="form-control form-control-sm" value="" placeholder="Ingrese su dirección" required>
									</div><!-- End .form-group -->
								</div><!-- End #total-estimate-section -->

								<div class="collapse show" id="total-estimate-section1">
									<div class="form-group form-group-sm">
										<label>Nombre completo:</label>
										<input id="cliente" name="cliente" type="text" class="form-control form-control-sm" value="" placeholder="Ingrese su nombre" required>
									</div>

									<div class="form-group form-group-sm">
										<label>Correo electrónico:</label>
										<input id="email" name="email" type="email" class="form-control form-control-sm" value="" placeholder="Ingrese su correo electrónico" required>
									</div>

									<div class="form-group form-group-sm">
										<label>Teléfono</label>
										<input id="phone" name="phone" type="text" class="form-control form-control-sm" value="" placeholder="Ingrese su numero de teléfono" required>
									</div>
								</div>

								<table class="table table-totals">
									<tbody>
										<tr class="valores">
											<td>Subtotal</td>
											<td>$ <?php echo number_format($total, 0, ',', '.') ?></td>
										</tr>
										<input type="hidden" name="vpsi" id="vpsi" value="<?php echo $totalsi ?>">
										<tr class="flete">
											<input type="hidden" id="tax" name="tax">
											<td>Valor envío</td>
											<td>--</td>
										</tr>
									</tbody>
									<tfoot>
										<tr class="total">
											<input type="hidden" id="total" name="total">
											<td>Total</td>
											<td>--</td>

										</tr>
									</tfoot>
								</table>
								<button type="submit" id="checkout-shipping" class="btn btn-block btn-sm btn-danger btn-quickview-product">Ir a pagar</button>
							</form>
						</div><!-- End .cart-summary -->
					</div><!-- End .col-lg-4 -->
				</div><!-- End .row -->
			</div><!-- End .container -->
		<?php else : ?>
		<?php endif ?>
		<script>
			document.addEventListener("DOMContentLoaded", function() {
				document.getElementById("frm-fac").addEventListener('submit', validarFormulario);
			});

			function validarFormulario(e) {
				e.preventDefault();
				if ($('#slt-depa').val() == "") {
					alert("esta vacio el departamento")
					return false;
				} else if ($('#slt-muni').val() == "") {
					alert("esta vacio el municipio");
					return false;
				} else if ($('#adress').val() == "") {
					alert("esta vacia la dirección")
					return false;
				} else if ($('#cliente').val() == "") {
					alert("esta vacio el nombre del cliente")
					return false;
				} else if ($('#email').val() == "") {
					alert("esta vacio el correo")
					return false;
				} else if ($('#phone').val() == "") {
					alert("esta vacio el teléfono")
					return false;
				} else if ($('#vpsi').val() == "") {
					alert("esta vacio")
					return false;
				} else if ($('#total').val() == "") {
					alert("esta vacio")
					return false;
				} else {

					let url = "?controller=factura&method=addFac";
					var datos = new FormData(document.getElementById("frm-fac"));
					var monto;
					fetch(url, {
						method: "POST",
						body: datos
					}).then(function(data) {
						return data.json();
					}).then(
						//response => colsole.log('Success:', response)
						myJson => {
							console.log( JSON.stringify(myJson['email'] ))
							pagar(myJson)
							//console.log(myJson);
							//validar(myJson);
							//let PruebaOtra = JSON.parse(myJson);
							//monto = JSON.stringify(myJson['monto']);
							//console.log(monto);
							//console.log(PruebaOtra);
						}
					)

					function pagar(data) {
						var checkout = new WidgetCheckout({
							currency: 'COP',
							amountInCents: JSON.stringify(parseInt(data['total'])),
							reference: JSON.stringify(data['reference']),
							publicKey: 'pub_test_3rbyR94vJUGFhse3CtlNPeQ3G7Yo3W73',
							redirectUrl: 'http://localhost/lorenzetti/?controller=factura&method=mostrarFinish', // Opcional
							customerData: { // Opcional
								email: data['email'],
								fullName: data['name'],
								phoneNumber: data['phone'],
								phoneNumberPrefix: '+57',
							}
						})
						checkout.open(function(result) {
							var transaction = result.transaction
							console.log('Transaction ID: ', transaction.id)
							console.log('Transaction object: ', transaction)
						})
					}
					//this.submit();
				}
			}
		</script>
		<div class="mb-6"></div><!-- margin -->
	</main><!-- End .main -->
	<?php require 'templates/footer.php'; ?>
</body>

</html>