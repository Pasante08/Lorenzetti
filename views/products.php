<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
</head>
<body>
    <?php require 'templates/header.php'; ?>
    <main class="main">
			<nav aria-label="breadcrumb" class="breadcrumb-nav">
				<div class="container">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.html">Home</a></li>
						<li class="breadcrumb-item"><a href="#">Men</a></li>
						<li class="breadcrumb-item active" aria-current="page">Accessories</li>
					</ol>
				</div><!-- End .container -->
			</nav>

			<div class="container mb-3">
				<div class="category-banner">
                        <img class="slide-bg" src="assets/images/banners/Banner-Loren2.jpg" alt="banner" width="1500" height="320">
					<div class="category-slide-content">
						<h3 class="text-uppercase m-b-4">Lorenzetti</h3>
					</div><!-- End .category-slide-content -->
				</div><!-- End .category-slide -->

				<nav class="toolbox">
                <div class="toolbox-left">
                        <div class="toolbox-item toolbox-sort">
                            <label>Sort By:</label>
                            <div class="select-custom">
                                <select name="orderby" class="form-control">
									<option value="menu_order" selected="selected">Default sorting</option>
									<option value="popularity">Sort by popularity</option>
									<option value="rating">Sort by average rating</option>
									<option value="date">Sort by newness</option>
									<option value="price">Sort by price: low to high</option>
									<option value="price-desc">Sort by price: high to low</option>
								</select>
                            </div>
                            <!-- End .select-custom -->
                        </div>
                        <!-- End .toolbox-item -->
                    </div>
                    <!-- End .toolbox-left -->
				</nav>

				<div class="divide-line row row-sparse mx-0 up-effect image-bg-white">
                    <?php foreach($products as $product) : ?>
					<div class="col-6 col-sm-4 col-md-3 col-xl-3 product-default inner-quickview inner-icon">
						<figure>
							<a href="?controller=producto&method=viewProduct&id=<?php echo $product->idProducto ?>">
                                <div class="image-product">
                                    <img src="<?php echo $product->ubicacion ?>">
                                </div>
							</a>
							<div class="btn-icon-group">
							</div>
							<a href="ajax/product-quick-view.html" class="btn-quickview" title="Añadir a la bolsa">Añadir a la bolsa</a> 
						</figure>
						<div class="product-details">
							<div class="category-wrap">
								<div class="category-list">
									<!--<a href="category.html" class="product-category">category</a>-->
								</div>
							</div>
							<h6 class="product-title">
								<a href="product.html"><?php echo $product->nombre ?></a>
							</h6>
							<div class="ratings-container">
								
							</div><!-- End .product-container -->
							<div class="price-box">
								<span class="product-price">$ <?php echo number_format($product->precio) ?></span>
							</div><!-- End .price-box -->
						</div><!-- End .product-details -->
					</div>
                    <?php endforeach ?>
				</div>

				<nav class="toolbox toolbox-pagination border-0">
					<div class="toolbox-item toolbox-show">
					</div><!-- End .toolbox-item -->

					<!--<ul class="pagination toolbox-item">
						<li class="page-item active">
							<a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
						</li>
						<li class="page-item"><a class="page-link" href="#">2</a></li>
						<li class="page-item"><a class="page-link" href="#">3</a></li>
						<li class="page-item"><a class="page-link" href="#">4</a></li>
						<li class="page-item"><a class="page-link" href="#">5</a></li>
						<li class="page-item"><span class="page-link">...</span></li>
						<li class="page-item">
							<a class="page-link page-link-btn" href="#"><i class="icon-angle-right"></i></a>
						</li>
					</ul>-->
				</nav>
			</div><!-- End .container -->
		</main><!-- End .main -->
    <?php require 'templates/footer.php'; ?>
</body>
</html>