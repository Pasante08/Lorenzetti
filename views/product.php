<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Producto</title>
</head>

<body>
	<?php require 'templates/header.php'; ?>
	<main class="main">
		<nav aria-label="breadcrumb" class="breadcrumb-nav">
			<div class="container">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="?controller=producto"><i class="icon-home"></i></a></li>
					<li class="breadcrumb-item active" aria-current="page">Producto</li>
				</ol>
			</div>
		</nav>

		<div class="container">
			<div class="container-fluid pl-lg-0 padding-right-lg">
				<div class="product-single-container product-single-default">
					<div class="row">
						<div class="col-lg-6 product-single-gallery">
							<div class="sticky-slider">
								<div class="product-slider-container">
									<div class="product-single-carousel owl-carousel owl-theme caxsa">
										<?php if (!empty($productosColor)) : ?>
											<?php foreach ($productosColor as $productoC) : ?>
												<div class="product-item">
													<img class="product-single-image" src="<?php echo $productoC->ubicacion ?>" data-zoom-image="<?php echo $productoC->imgxcien ?>" />
												</div>
											<?php endforeach ?>
											<!--<div class="product-item">
													<img class="product-single-image" src="assets/images/pastedImage.png" data-zoom-image="assets/images/pastedImage.png" />
												</div>-->
										<?php else : ?>
											<!--<div class="product-item">
													<img class="product-single-image" src="assets/images/pastedImage.png" data-zoom-image="assets/images/pastedImage.png" />
												</div>-->
											<div class="product-item">
												<img class="product-single-image" src="<?php echo $product[0]->ubicacion ?>" data-zoom-image="<?php echo $product[0]->imgxcien ?>" />
											</div>
										<?php endif ?>
									</div>
									<!-- End .product-single-carousel -->
									<span class="prod-full-screen">
										<i class="icon-plus"></i>
									</span>
								</div>

								<div class="prod-thumbnail owl-dots transparent-dots flex-column" id='carousel-custom-dots'>
									<?php if (!empty($productosColor)) : ?>
										<?php foreach ($productosColor as $productoC) : ?>
											<div id="caxsa<?php echo $productoC->color_id ?>" class="owl-dot">
												<img src="<?php echo $productoC->ubicacion ?>" />
											</div>
										<?php endforeach ?>
									<?php else : ?>
										<div class="owl-dot">
											<img src="<?php echo $product[0]->ubicacion ?>" />
										</div>
									<?php endif ?>
								</div>
							</div>
						</div><!-- End .col-lg-6 -->

						<div class="col-lg-6">
							<form action="?controller=carrito&method=add" method="POST">
								<div class="product-single-details">
									<input type="hidden" value="<?php echo $product[0]->idProducto ?>" name="id">
									<h1 class="product-title"><?php echo $product[0]->nombre; ?></h1>

									<div class="ratings-container">

									</div><!-- End .product-container -->

									<hr class="short-divider">

									<div class="price-box">
										<span class="product-price">$ <?php echo number_format($product[0]->precio); ?></span>
										<input type="hidden" value="<?php echo $product[0]->precio ?>" name="precio">
									</div><!-- End .price-box -->

									<div class="product-desc">

									</div><!-- End .product-desc -->

									<div class="product-filters-container">
										<div class="product-single-filter">
											<?php if (isset($colores)) : ?>
												<label>Colores:</label>
												<ul class="config-swatch-list caxsalls">
													<?php foreach ($colores as $color) : ?>
														<input type="hidden" value="<?php echo $color->nombre ?>" name="C_nombre">
														<input type="hidden" value="<?php echo $color->idColor ?>" name="color_id">
														<a href="#" data-id="<?php echo $color->idColor ?>"><img src="<?php echo $color->imgColor ?>" alt="" style="margin-right: 3px;"></a>
													<?php endforeach ?>
												</ul>
											<?php else : ?>
											<?php endif ?>
										</div><!-- End .product-single-filter -->
										<div class="product-single-filter mb-2">
											<?php if (isset($voltajes)) : ?>
												<input type="hidden" id="voltaje_id" name="voltaje_id" value="">
												<label>Sizes:</label>
												<ul class="config-size-list caxsalls1">
													<?php foreach ($voltajes as $voltaje) : ?>
														<input type="hidden" value="<?php echo $voltaje->nombre ?>" name="V_nombre">
														<li class="" value="<?php echo $voltaje->idVoltaje ?>"><a href=""><?php echo $voltaje->nombre ?></a></li>
													<?php endforeach ?>
												</ul>
											<?php else : ?>
											<?php endif ?>
										</div><!-- End .product-single-filter -->
									</div><!-- End .product-filters-container -->

									<hr class="divider">

									<div class="product-action">
										<div class="product-single-qty">
											<input class="horizontal-quantity form-control" type="text" name="quantity" id="quantity">
										</div><!-- End .product-single-qty -->

										<!--<a href="?controller=carrito&method=add" class="btn btn-danger add-cart icon-shopping-cart disabled" id="btn-submit" title="Añadir al carrito">Añadir a la bolsa</a>-->
										<button class="btn btn-danger add-cart icon-shopping-cart" id="btn-submit" title="Añadir a la bolsa" disabled>Añadir a la bolsa</button>
									</div><!-- End .product-action -->

									<hr class="divider mb-1">

									<div class="product-single-share">
										<label class="sr-only">Share:</label>

										<div class="social-icons mr-2">
											<a href="#" class="social-icon social-whatsapp icon-whatsapp" title="WhatsApp"></a>
											<a href="#" class="social-icon social-facebook icon-facebook" title="Facebook"></a>
											<a href="#" class="social-icon social-mail icon-mail-alt" title="Mail"></a>
										</div><!-- End .social-icons -->

									</div><!-- End .product single-share -->
								</div><!-- End .product-single-details -->
							</form>


							<div class="product-single-tabs mb-1">
								<ul class="nav nav-tabs" role="tablist">
									<?php if (!empty($product[0]->descripcion)) : ?>
										<li class="nav-item">
											<a class="nav-link active" id="product-tab-desc" data-toggle="tab" href="#product-desc-content" role="tab" aria-controls="product-desc-content" aria-selected="true">Descripción</a>
										</li>
										<!--<li class="nav-item">
										<a class="nav-link active" id="product-tab-more-info" data-toggle="tab" href="#product-more-info-content" role="tab" aria-controls="product-more-info-content" aria-selected="false">MAS INFORMACIÓN</a>
									</li>-->
									<?php else : ?>
										<!--<li class="nav-item">
											<a class="nav-link active" id="product-tab-more-info" data-toggle="tab" href="#product-more-info-content" role="tab" aria-controls="product-more-info-content" aria-selected="false">More Info</a>
										</li>-->
									<?php endif ?>
								</ul>
								<div class="tab-content">
									<div class="tab-pane fade show active" id="product-desc-content" role="tabpanel" aria-labelledby="product-tab-desc">
										<div class="product-desc-content">
											<p><?php echo $product[0]->descripcion ?></p>
											<div class="col-lg-4">
												<img src="assets/images/pastedImage.png" alt="">
											</div>
										</div><!-- End .product-desc-content -->
									</div><!-- End .tab-pane -->

									<div class="tab-pane fade fade" id="product-more-info-content" role="tabpanel" aria-labelledby="product-tab-more-info">
										<div class="product-desc-content">
											<!--<a href="https://www.lorenzetti.com.br/docs/default-source/manual-de-instala%C3%A7%C3%A3o/372292-rev-d---manual-exporta%C3%A7%C3%A3o-duo-shower.pdf?Status=Master&sfvrsn=309dc19_16" target="_self">Manual de instalacion</a>-->
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.</p>
											<!--<img src="assets/images/pastedImage.png" alt="">-->
										</div><!-- End .product-desc-content -->
									</div><!-- End .tab-pane -->

									<div class="tab-pane fade" id="product-tags-content" role="tabpanel" aria-labelledby="product-tab-tags">
										<div class="product-tags-content">
											<form action="#">
												<h4>Add Your Tags:</h4>
												<div class="form-group">
													<input type="text" class="form-control form-control-sm" required>
													<input type="submit" class="btn btn-dark" value="Add Tags">
												</div><!-- End .form-group -->
											</form>
											<p class="note">Use spaces to separate tags. Use single quotes (') for phrases.</p>
										</div><!-- End .product-tags-content -->
									</div><!-- End .tab-pane -->


								</div><!-- End .tab-content -->
							</div><!-- End .product-single-tabs -->
						</div><!-- End .col-lg-6 -->
					</div><!-- End .row -->
				</div><!-- End .product-single-container -->
			</div>

			<!--<div class="product-single-video outer-container" style="background-image: url('assets/images/products/single/extended/bg-4.jpg');">
				<div class="container">
					<h3>Concept Film</h3>
					<a href="https://www.youtube.com/watch?v=Ph_VkTVmXh4" class="video-btn">
						Watch <img src="assets/images/products/single/extended/icon-play.png" alt="play">
					</a>
				</div>-->
			<!-- End .container -->
			<!--</div>-->
			<!-- End .product-single-video -->

			<div class="products-section">
				<div class="container-fluid">
					<h2 class="section-title">productos relacionados</h2>

					<div class="products-slider owl-carousel owl-theme dots-top">
						<?php foreach ($productos as $producto) : ?>
							<div class="product-default inner-quickview inner-icon">
								<figure>
									<a href="?controller=producto&method=viewProduct&id=<?php echo $producto->idProducto ?>">
										<img src="<?php echo $producto->ubicacion ?>">
									</a>
									<a href="?controller=producto&method=viewProduct&id=<?php echo $producto->idProducto ?>" class="btn-quickview" title="Añadir a la bolsa">Añadir a la bolsa</a>
								</figure>
								<div class="product-details">
									<div class="category-wrap">
										<div class="category-list">
											<!--<a href="category.html" class="product-category">category</a>-->
										</div>
									</div>
									<h3 class="product-title">
										<a href="product.html"><?php echo $producto->nombre ?></a>
									</h3>
									<div class="ratings-container">
									</div><!-- End .ratings-container -->
									<div class="price-box">
										<span class="product-price">$ <?php echo number_format($producto->precio) ?></span>
									</div><!-- End .price-box -->
								</div><!-- End .product-details -->
							</div>
						<?php endforeach ?>
					</div><!-- End .products-slider -->
				</div>
			</div><!-- End .products-section -->
		</div><!-- End .container -->
	</main><!-- End .main -->
	<?php require 'templates/footer.php'; ?>
</body>

</html>