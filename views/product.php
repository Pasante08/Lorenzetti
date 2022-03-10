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
					<li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
					<li class="breadcrumb-item active" aria-current="page">Product</li>
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
									<div class="product-single-carousel owl-carousel owl-theme">
										<?php if (!empty($productosColor)) : ?>
											<?php foreach ($productosColor as $productoC) : ?>
												<div class="product-item">
													<img class="product-single-image" src="<?php echo $productoC->ubicacion ?>" data-zoom-image="<?php echo $productoC->ubicacion ?>" />
												</div>
											<?php endforeach ?>
										<?php else : ?>
											<div class="product-item">
												<img class="product-single-image" src="<?php echo $product[0]->ubicacion ?>" data-zoom-image="<?php echo $product[0]->ubicacion ?>" />
											</div>
										<?php endif ?>
									</div>
									<!-- End .product-single-carousel -->
									<span class="prod-full-screen">
										<i class="icon-plus"></i>
									</span>
								</div>

								<div class="prod-thumbnail owl-dots transparent-dots flex-column" id='carousel-custom-dots'>
									<?php if(!empty($productosColor)) : ?>
									<?php foreach ($productosColor as $productoC) : ?>
										<div class="owl-dot">
											<img src="<?php echo $productoC->ubicacion ?>" />
										</div>
									<?php endforeach ?>
									<?php else : ?>
										<div class="owl-dot">
											<img src="<?php echo $product[0]->ubicacion ?>" />
										</div>
									<?php endif ?>
									<!--<div class="owl-dot">
										<img src="assets/images/products/870618.jpg" />
									</div>
									<div class="owl-dot">
										<img src="assets/images/products/zoom/product-3.jpg" />
									</div>-->
								</div>
							</div>
						</div><!-- End .col-lg-6 -->

						<div class="col-lg-6">
							<div class="product-single-details">
								<h1 class="product-title"><?php echo $product[0]->nombre; ?></h1>

								<div class="ratings-container">

								</div><!-- End .product-container -->

								<hr class="short-divider">

								<div class="price-box">
									<span class="product-price">$ <?php echo number_format($product[0]->precio); ?></span>
								</div><!-- End .price-box -->

								<div class="product-desc">
									<p><?php echo $product[0]->descripcion ?></p>
								</div><!-- End .product-desc -->

								<div class="product-filters-container">
									<div class="product-single-filter">
										<?php if (isset($colores)) : ?>
											<label>Colores:</label>
											<ul class="config-swatch-list">
												<?php foreach ($colores as $color) : ?>
													<!--<li class="">
													<a href="#" class="first-color" style="background-color: #0188cc;"></a>
												</li>-->
													<div class="active">
														<a href="#"><img src="<?php echo $color->imgColor ?>" alt="" style="margin-right: 3px;"></a>
													</div>
												<?php endforeach ?>
											</ul>
										<?php else : ?>
										<?php endif ?>
									</div><!-- End .product-single-filter -->
									<div class="product-single-filter mb-2">
										<?php if (isset($voltajes)) : ?>
											<label>Sizes:</label>
											<ul class="config-size-list">
												<?php foreach ($voltajes as $voltaje) : ?>
													<li class=""><a href="#"><?php echo $voltaje->nombre ?></a></li>
												<?php endforeach ?>
											</ul>
										<?php else : ?>
										<?php endif ?>
									</div><!-- End .product-single-filter -->
								</div><!-- End .product-filters-container -->

								<hr class="divider">

								<div class="product-action">
									<div class="product-single-qty">
										<input class="horizontal-quantity form-control" type="text">
									</div><!-- End .product-single-qty -->

									<a href="cart.html" class="btn btn-danger add-cart icon-shopping-cart" title="Añadir al carrito">Añadir a la bolsa</a>
								</div><!-- End .product-action -->

								<hr class="divider mb-1">

								<div class="product-single-share">
									<label class="sr-only">Share:</label>

									<div class="social-icons mr-2">
										<a href="#" class="social-icon social-whatsapp icon-whatsapp" target="_blank" title="WhatsApp"></a>
										<a href="#" class="social-icon social-facebook icon-facebook" target="_blank" title="Facebook"></a>
										<a href="#" class="social-icon social-mail icon-mail-alt" target="_blank" title="Mail"></a>
									</div><!-- End .social-icons -->

								</div><!-- End .product single-share -->
							</div><!-- End .product-single-details -->

							<div class="product-single-tabs mb-1">
								<ul class="nav nav-tabs" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" id="product-tab-desc" data-toggle="tab" href="#product-desc-content" role="tab" aria-controls="product-desc-content" aria-selected="true">Description</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="product-tab-more-info" data-toggle="tab" href="#product-more-info-content" role="tab" aria-controls="product-more-info-content" aria-selected="false">More Info</a>
									</li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane fade show active" id="product-desc-content" role="tabpanel" aria-labelledby="product-tab-desc">
										<div class="product-desc-content">
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.</p>
											<ul>
												<li><i class="fa fa-check-circle"></i>Any Product types that You want - Simple, Configurable</li>
												<li><i class="fa fa-check-circle"></i>Downloadable/Digital Products, Virtual Products</li>
												<li><i class="fa fa-check-circle"></i>Inventory Management with Backordered items</li>
											</ul>
											<p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, <br>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
										</div><!-- End .product-desc-content -->
									</div><!-- End .tab-pane -->

									<div class="tab-pane fade fade" id="product-more-info-content" role="tabpanel" aria-labelledby="product-tab-more-info">
										<div class="product-desc-content">
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.</p>
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

			<div class="product-single-video outer-container" style="background-image: url('assets/images/products/single/extended/bg-4.jpg');">
				<div class="container">
					<h3>Concept Film</h3>
					<a href="https://www.youtube.com/watch?v=Ph_VkTVmXh4" class="video-btn">
						Watch <img src="assets/images/products/single/extended/icon-play.png" alt="play">
					</a>
				</div><!-- End .container -->
			</div><!-- End .product-single-video -->

			<div class="products-section">
				<div class="container-fluid">
					<h2 class="section-title">productos relacionados</h2>

					<div class="products-slider owl-carousel owl-theme dots-top">
						<?php foreach ($productos as $producto) : ?>
							<div class="product-default inner-quickview inner-icon">
								<figure>
									<a href="product.html">
										<img src="assets/images/products/870544.jpg">
									</a>
									<a href="?controller=producto&method=productView&id=<?php echo $producto->idProducto ?>" class="btn-quickview" title="Añadir a la bolsa">Añadir a la bolsa</a>
								</figure>
								<div class="product-details">
									<div class="category-wrap">
										<div class="category-list">
											<a href="category.html" class="product-category">category</a>
										</div>
									</div>
									<h3 class="product-title">
										<a href="product.html"><?php echo $producto->nombre ?></a>
									</h3>
									<div class="ratings-container">
									</div><!-- End .ratings-container -->
									<div class="price-box">
										<span class="product-price">$ <?php echo $producto->precio ?></span>
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