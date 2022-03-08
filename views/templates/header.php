<?php 
    require_once 'models/categoria.php';

    $categoriaModel = new Categoria;

    $categorias = $categoriaModel->getAll();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lorenzetti Colombia</title>
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Porto - Bootstrap eCommerce Template">
    <meta name="author" content="SW-THEMES">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/images/icons/favicon.ico">

    <!--<link rel="stylesheet" href="assets/css/ea92915d6480870b41e84eda217fd24a7831739103.css">-->
    <script type="text/javascript">
        WebFontConfig = {
            google: {
                families: ['Open+Sans:300,400,600,700,800', 'Poppins:300,400,500,600,700']
            }
        };
        (function(d) {
            var wf = d.createElement('script'),
                s = d.scripts[0];
            wf.src = 'assets/js/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>

    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Main CSS File -->
    <link rel="stylesheet" href="assets/css/style.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/fontawesome-free/css/all.min.css">
</head>

<body class="full-screen-slider">
    <div class="page-wrapper">
        <!-- End .top-notice -->
        <header class="header header-transparent">
            <div class="header-middle">
                <div class="container">
                    <div class="header-left">
                        <a href="?controller=color&method=addColor" class="logo">
                            <img src="assets/images/logo.png" alt="Porto Logo">
                        </a>

                        <nav class="main-nav font2">
                            <ul class="menu">
                                <li>
                                    <a href="#">Inicio</a>
                                </li>
                                <li>
                                    <a href="#">Productos</a>
                                </li>
                                <li>
                                    <a href="#">Fichas técnicas</a>
                                </li>
                                <li>
                                    <a href="#">Servicio técnico</a>
                                </li>
                                <li>
                                    <a href="#">Contactenos</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <!-- End .header-left -->

                    <div class="header-right">
                        <button class="mobile-menu-toggler" type="button">
                            <i class="icon-menu"></i>
                        </button>

                        <!--<a href="login.html" class="header-icon login-link"><i class="icon-user-2"></i></a>

                        <a href="#" class="header-icon"><i class="icon-wishlist-2"></i></a>-->

                        <div class="header-search header-search-popup header-search-category d-none d-sm-block">
                            <a href="#" class="search-toggle" role="button"><i class="icon-magnifier"></i></a>
                            <form action="?controller=producto&method=search" method="POST">
                                <div class="header-search-wrapper">
                                    <input type="search" class="form-control" name="name" id="name" placeholder="Buscar producto..." required>
                                    <div class="select-custom">
                                        <select id="cat" name="cat">
                                            <option value="">Todas</option>
                                            <?php foreach($categorias as $categoria) : ?>
                                            <option value="<?php echo $categoria->idCategoria ?>"><?php echo $categoria->nombre ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <!-- End .select-custom -->
                                    <button class="btn bg-dark icon-search-3" type="submit"></button>
                                </div>
                                <!-- End .header-search-wrapper -->
                            </form>
                        </div>

                        <div class="dropdown cart-dropdown">
                            <a href="#" class="dropdown-toggle dropdown-arrow" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="">
                                <i class="icon-shopping-cart"></i>
                                <span class="cart-count badge-circle">2</span>
                            </a>

                            <div class="dropdown-menu">
                                <div class="dropdownmenu-wrapper">
                                    <div class="dropdown-cart-header">
                                        <span>2 Items</span>

                                        <a href="cart.html" class="float-right">View Cart</a>
                                    </div>
                                    <!-- End .dropdown-cart-header -->

                                    <div class="dropdown-cart-products">
                                        <div class="product">
                                            <div class="product-details">
                                                <h4 class="product-title">
                                                    <a href="product.html">Woman Ring</a>
                                                </h4>

                                                <span class="cart-product-info">
                                                    <span class="cart-product-qty">1</span> x $99.00
                                                </span>
                                            </div>
                                            <!-- End .product-details -->

                                            <figure class="product-image-container">
                                                <a href="product.html" class="product-image">
                                                    <img src="assets/images/products/cart/product-1.jpg" alt="product" width="80" height="80">
                                                </a>
                                                <a href="#" class="btn-remove icon-cancel" title="Remove Product"></a>
                                            </figure>
                                        </div>
                                        <!-- End .product -->

                                        <div class="product">
                                            <div class="product-details">
                                                <h4 class="product-title">
                                                    <a href="product.html">Woman Necklace</a>
                                                </h4>

                                                <span class="cart-product-info">
                                                    <span class="cart-product-qty">1</span> x $35.00
                                                </span>
                                            </div>
                                            <!-- End .product-details -->

                                            <figure class="product-image-container">
                                                <a href="product.html" class="product-image">
                                                    <img src="assets/images/products/cart/product-2.jpg" alt="product" width="80" height="80">
                                                </a>
                                                <a href="#" class="btn-remove icon-cancel" title="Remove Product"></a>
                                            </figure>
                                        </div>
                                        <!-- End .product -->
                                    </div>
                                    <!-- End .cart-product -->

                                    <div class="dropdown-cart-total">
                                        <span>Total</span>

                                        <span class="cart-total-price float-right">$134.00</span>
                                    </div>
                                    <!-- End .dropdown-cart-total -->

                                    <div class="dropdown-cart-action">
                                        <a href="checkout-shipping.html" class="btn btn-primary btn-block">Checkout</a>
                                    </div>
                                    <!-- End .dropdown-cart-total -->
                                </div>
                                <!-- End .dropdownmenu-wrapper -->
                            </div>
                            <!-- End .dropdown-menu -->
                        </div>
                        <!-- End .dropdown -->
                    </div>
                    <!-- End .header-right -->
                </div>
                <!-- End .container -->
            </div>
            <!-- End .header-middle -->
        </header>
        <!-- End .header -->