<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Lorenzetti Colombia</title>

    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Duchas electricas Lorenzetti">
    <meta name="author" content="SW-THEMES">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/images/icons/favicon.ico">
</head>

<body>
    <?php require 'templates/header.php'; ?>
    <main class="main">
        <div class="home-slider owl-carousel owl-theme show-nav-hover nav-big" data-owl-options="{
				'loop': true, 'autoplay':true
			}">
            <div class="home-slide home-slide1 banner">
                <img class="slide-bg owl-lazy" src="assets/images/lazy.png" data-src="assets/images/slider/Banner_lorenzetti.jpg" alt="home banner">
            </div>
            <!-- End .home-slide -->
            <div class="home-slide home-slide2 banner">
                <img class="slide-bg owl-lazy" src="assets/images/lazy.png" data-src="assets/images/slider/Banner_lorenzetti_2.jpg" alt="home banner">
            </div>
            <div class="home-slide home-slide3 banner">
                <img class="slide-bg owl-lazy" src="assets/images/lazy.png" data-src="assets/images/slider/Banner_lorenzetti_1.jpg" alt="home banner">
                </div>
                <!-- End .banner-layer -->
            </div>
            <!-- End .home-slide -->
        </div>
        <!-- End .home-slider -->

        <section class="container">
            <h2 class="section-title ls-n-10 text-center pt-2 m-b-4">Categorias</h2>
            <div class="row row-sm">
            <?php foreach($categorias as $categoria) : ?>
                <div class="col-6 col-sm-4 col-lg-3 mx-auto">
                    <div class="product-category">
                        <a href="?controller=producto&method=categories&id=<?php echo $categoria->idCategoria ?>">
                            <figure>
                                <img src="<?php echo $categoria->ubicacion ?>" alt="<?php echo $categoria->imagen ?>">
                            </figure>
                            <div class="category-content">
                                <h3><?php echo $categoria->nombre ?></h3>
                            </div>
                        </a>
                    </div>
                </div>
                <?php endforeach ?>
            </div>
            </section>

        <section class="container pb-3 mb-1">
            <h2 class="section-title ls-n-10 text-center pb-2 m-b-4">Productos destacados</h2>

            <div class="product-intro owl-carousel owl-theme" data-toggle="owl" data-owl-options="{
                        'margin': 20,
                        'items': 2,
                        'autoplayTimeout': 5000,
                        'dots': false,
                        'nav': true,
                        'responsive': {
                            '559': {
                                'items': 3
                            },
                            '975': {
                                'items': 4
                            }
                        }
                    }">
                    <?php foreach ($products_Dest as $producto) : ?>
                        <?php //if($producto->estado == 'SI') : ?>
                    <div class="product-default left-details">
                            <figure>
                                <a href="?controller=producto&method=viewProduct&id=<?php echo $producto->idProducto ?>">
                                    <div class="image-product">
                                        <img src="<?php echo $producto->ubicacion ?>" width="500" height="500">
                                    </div>
                                </a>
                            </figure>
                            <div class="product-details">
                                <div class="category-list">
                                </div>
                                <h2 class="product-title">
                                    <a href="?controller=producto&method=viewProduct&id=<?php echo $producto->idProducto ?>"><?php echo $producto->nombre ?></a>
                                </h2>
                                <div class="ratings-container">
                                </div><!-- End .product-container -->
                                <div class="price-box">
                                    <span class="product-price">$ <?php echo number_format($producto->precio, 0, ',', '.') ?></span>
                                </div><!-- End .price-box -->
                                <div class="product-action">
                                    <a href="?controller=producto&method=viewProduct&id=<?php echo $producto->idProducto ?>" class="btn-icon btn-add-cart btn-quickview-product">AÑADIR A LA BOLSA</a>
                                </div>
                            </div><!-- End .product-details -->
                        </div>
                        <?php //else : ?>
                        <?php //endif ?>
                        <?php endforeach ?>
                </div>


            <hr class="mt-3 mb-6">
            
        </section>
    </main>
    <div class="newsletter-popup mfp-hide" id="newsletter-popup-form" style="background-image: url(assets/images/pop-up.png)">
         <!--<div class="newsletter-popup-content">
            <img src="" alt="Logo" class="logo-newsletter">
            <h2>BE THE FIRST TO KNOW</h2>
            <p>Subscribe to the Porto eCommerce newsletter to receive timely updates from your favorite products.</p>
            <form action="#">
                <div class="input-group">
                    <input type="email" class="form-control" id="newsletter-email" name="newsletter-email" placeholder="Email address" required>
                    <input type="submit" class="btn" value="Go!">
                </div>-->
    <!-- End .from-group -->
    <!--</form>
            <div class="newsletter-subscribe">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" value="1">
                        Don't show this popup again
                    </label>
                </div>
            </div>
        </div>-->
    <!-- End .newsletter-popup-content -->
    </div>
    <?php require 'templates/footer.php'; ?>
</body>
</html>