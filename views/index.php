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
                <!--<div class="banner-layer banner-layer-middle">
                    <h2>Winter Fashion Trends</h2>
                    <h3 class="text-uppercase mb-0">Get up to 30% off</h3>
                    <h4 class="m-b-4">on Jackets</h4>

                    <h5 class="text-uppercase">Starting at<span class="coupon-sale-text"><sup>$</sup>199<sup>99</sup></span></h5>
                    <a href="category.html" class="btn btn-dark btn-xl" role="button">Shop Now</a>
                </div>-->
                <!-- End .banner-layer -->
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
            <h2 class="section-title ls-n-10 text-center pt-2 m-b-4">CATEGORIAS</h2>
        
            <div class="owl-carousel owl-theme nav-image-center show-nav-hover nav-outer cats-slider">
                <div class="product-category">
                    <a href="category.html">
                        <figure>
                            <img src="assets/images/categories/ducha.jpg">
                        </figure>
                        <div class="category-content">
                            <h3>Duchas electricas</h3>
                            <!--<span><mark class="count">8</mark> products</span>-->
                        </div>
                    </a>
                </div>
                <div class="product-category">
                    <a href="category.html">
                        <figure>
                            <img src="assets/images/categories/category-2.jpg">
                        </figure>
                        <div class="category-content">
                            <h3>Purificadores</h3>
                            <!--<span><mark class="count">4</mark> products</span>-->
                        </div>
                    </a>
                </div>
                <div class="product-category">
                    <a href="category.html">
                        <figure>
                            <img src="assets/images/categories/870505.png">
                        </figure>
                        <div class="category-content">
                            <h3>Filtros</h3>
                            <!--<span><mark class="count">8</mark> products</span>-->
                        </div>
                    </a>
                </div>
            </div>
        </section>

        <section class="container pb-3 mb-1">
            <h2 class="section-title ls-n-10 text-center pb-2 m-b-4">Productos destacados</h2>

            <div class="row">
                <div class="col-6 col-sm-4 col-md-3 col-xl-2">
                    <div class="product-default inner-quickview inner-icon">
                        <figure>
                            <a href="product.html">
                                <img src="assets/images/products/870618.jpg" width="500" height="500">
                            </a>
                            <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a>
                        </figure>
                        <div class="product-details">
                            <div class="category-wrap">
                                <div class="category-list">
                                    <a href="category.html" class="product-category">category</a>
                                </div>
                            </div>
                            <h3 class="product-title">
                                <a href="product.html">Product Short Name</a>
                            </h3>
                            <div class="ratings-container">
                                <!-- End .product-ratings -->
                            </div>
                            <!-- End .product-container -->
                            <div class="price-box">
                                <span class="product-price">$49.00</span>
                            </div>
                            <!-- End .price-box -->
                        </div>
                        <!-- End .product-details -->
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-md-3 col-xl-2">
                    <div class="product-default inner-quickview inner-icon">
                        <figure>
                            <a href="product.html">
                                <img src="assets/images/products/870518.jpg">
                            </a>
                            <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a>
                        </figure>
                        <div class="product-details">
                            <div class="category-wrap">
                                <div class="category-list">
                                    <a href="category.html" class="product-category">category</a>
                                </div>
                            </div>
                            <h3 class="product-title">
                                <a href="product.html">Product Short Name</a>
                            </h3>
                            <div class="ratings-container">
                                <!-- End .product-ratings -->
                            </div>
                            <!-- End .product-container -->
                            <div class="price-box">
                                <span class="product-price">$49.00</span>
                            </div>
                            <!-- End .price-box -->
                        </div>
                        <!-- End .product-details -->
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-md-3 col-xl-2">
                    <div class="product-default inner-quickview inner-icon">
                        <figure>
                            <a href="product.html">
                                <img src="assets/images/products/870544.jpg">
                            </a>
                            <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a>
                        </figure>
                        <div class="product-details">
                            <div class="category-wrap">
                                <div class="category-list">
                                    <a href="category.html" class="product-category">category</a>
                                </div>
                            </div>
                            <h3 class="product-title">
                                <a href="product.html">Product Short Name</a>
                            </h3>
                            <div class="ratings-container">
                                <!-- End .product-ratings -->
                            </div>
                            <!-- End .product-container -->
                            <div class="price-box">
                                <span class="product-price">$49.00</span>
                            </div>
                            <!-- End .price-box -->
                        </div>
                        <!-- End .product-details -->
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-md-3 col-xl-2">
                    <div class="product-default inner-quickview inner-icon">
                        <figure>
                            <a href="product.html">
                                <img src="assets/images/products/8699912.jpg">
                            </a>
                            <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a>
                        </figure>
                        <div class="product-details">
                            <div class="category-wrap">
                                <div class="category-list">
                                    <a href="category.html" class="product-category">category</a>
                                </div>
                            </div>
                            <h3 class="product-title">
                                <a href="product.html">Product Short Name</a>
                            </h3>
                            <div class="ratings-container">
                                <!-- End .product-ratings -->
                            </div>
                            <!-- End .product-container -->
                            <div class="price-box">
                                <span class="product-price">$49.00</span>
                            </div>
                            <!-- End .price-box -->
                        </div>
                        <!-- End .product-details -->
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-md-3 col-xl-2">
                    <div class="product-default inner-quickview inner-icon">
                        <figure>
                            <a href="product.html">
                                <img src="assets/images/products/8699882.jpg">
                            </a>
                            <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a>
                        </figure>
                        <div class="product-details">
                            <div class="category-wrap">
                                <div class="category-list">
                                    <a href="category.html" class="product-category">category</a>
                                </div>
                            </div>
                            <h3 class="product-title">
                                <a href="product.html">Product Short Name</a>
                            </h3>
                            <div class="ratings-container">
                                <!-- End .product-ratings -->
                            </div>
                            <!-- End .product-container -->
                            <div class="price-box">
                                <span class="product-price">$49.00</span>
                            </div>
                            <!-- End .price-box -->
                        </div>
                        <!-- End .product-details -->
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-md-3 col-xl-2">
                    <div class="product-default inner-quickview inner-icon">
                        <figure>
                            <a href="product.html">
                                <img src="assets/images/products/869918.jpg">
                            </a>
                            <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a>
                        </figure>
                        <div class="product-details">
                            <div class="category-wrap">
                                <div class="category-list">
                                    <a href="category.html" class="product-category">category</a>
                                </div>
                            </div>
                            <h3 class="product-title">
                                <a href="product.html">Product Short Name</a>
                            </h3>
                            <div class="ratings-container">
                                <!-- End .product-ratings -->
                            </div>
                            <!-- End .product-container -->
                            <div class="price-box">
                                <span class="product-price">$49.00</span>
                            </div>
                            <!-- End .price-box -->
                        </div>
                        <!-- End .product-details -->
                    </div>
                </div> 
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