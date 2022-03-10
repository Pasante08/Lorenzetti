<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php require 'templates/header.php'; ?>
    <main class="main">
        <div class="home-slider owl-carousel owl-theme show-nav-hover nav-big">
            <div class="home-slide home-slide1 banner">
                <img class="slide-bg owl-lazy" src="assets/images/lazy.png" data-src="assets/images/slider/Banner_lorenzetti.jpg" alt="home banner">
            </div>
            <!-- End .home-slide -->

            <div class="home-slide home-slide2 banner">
                <img class="slide-bg owl-lazy" src="assets/images/lazy.png" data-src="assets/images/slider/slide2.jpg" alt="home banner">
                <div class="banner-layer banner-layer-middle">
                    <h2 class="m-b-1">New Season Hats </h2>
                    <h3 class="text-uppercase rotated-upto-text mb-0"><small>Up to</small>20% off</h3>

                    <hr class="short-thick-divider">

                    <h5 class="text-uppercase d-inline-block mb-0">Starting at <span class="ml-2">$<em>19</em>99</span></h5>
                    <a href="category.html" class="btn btn-dark btn-xl btn-icon-right" role="button">Shop Now <i class="fas fa-long-arrow-alt-right"></i></a>
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
                    <?php foreach ($productos as $producto) : ?>
                        <?php if($producto->estado == 'SI') : ?>
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
                                    <span class="product-price">$ <?php echo number_format($producto->precio) ?></span>
                                </div><!-- End .price-box -->
                                <div class="product-action">
                                    <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="icon-bag"></i>AÑADIR A LA BOLSA</button> 
                                </div>
                            </div><!-- End .product-details -->
                        </div>
                        <?php else : ?>
                        <?php endif ?>
                        <?php endforeach ?>
                </div>


            <hr class="mt-3 mb-6">

            <div class="row feature-boxes-container pt-2">
                

                <div class="col-sm-6 col-lg-4">
                    <div class="feature-box feature-box-simple text-center">
                        <i class="icon-credit-card"></i>

                        <div class="feature-box-content">
                            <h3 class="text-uppercase">Pago seguro</h3>
                            <h5>Seguro y rápido</h5>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapibus lacus. Lorem ipsum dolor sit amet.</p>
                        </div>
                        <!-- End .feature-box-content -->
                    </div>
                    <!-- End .feature-box -->
                </div>
                <!-- End .col-lg-3 -->

                <div class="col-sm-6 col-lg-4">
                    <div class="feature-box feature-box-simple text-center">
                        <i class="icon-action-undo"></i>

                        <div class="feature-box-content">
                            <h3 class="text-uppercase">Devoluciones gratis</h3>
                            <h5>Fácil y Gratis</h5>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.</p>
                        </div>
                        <!-- End .feature-box-content -->
                    </div>
                    <!-- End .feature-box -->
                </div>
                <!-- End .col-lg-3 -->

                <div class="col-sm-6 col-lg-4">
                    <div class="feature-box feature-box-simple text-center">
                        <i class="icon-shipping"></i>

                        <div class="feature-box-content">
                            <h3 class="text-uppercase">Envio gratis</h3>
                            <h5>Orders Over $99</h5>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.</p>
                        </div>
                        <!-- End .feature-box-content -->
                    </div>
                    <!-- End .feature-box -->
                </div>
                <!-- End .col-lg-3 -->
            </div>
            <!-- End .row .feature-boxes-container-->
        </section>
    </main>
    <!-- End .main -->
    <?php require 'templates/footer.php'; ?>
</body>
</html>