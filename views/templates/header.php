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
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Lorenzetti</title>

    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Duchas electricas Lorenzetti">
    <meta name="author" content="SW-THEMES">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/images/icons/favicon.ico">

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
    <script type="text/javascript" src="https://checkout.wompi.co/widget.js"></script>
</head>

<body>
    <div class="page-wrapper">
        <header class="header">
            <div class="header-middle sticky-header">
                <div class="container">
                    <div class="header-left">
                        <a href="?controller=producto" class="logo">
                            <img src="assets/images/logo.png" alt="Porto Logo">
                        </a>
                        <nav class="main-nav font2">
                            <ul class="menu">
                                <li>
                                    <a href="?controller=producto&method=getAll">Productos</a>
                                </li>
                                <li>
                                    <a href="#" class="nolink">Catálogos</a>
                                    <ul>
                                        <li><a href="assets/files/pdfs/Catalogo_Duchas_Lorenzetti.pdf" target="_blank">Catálogo duchas</a></li>
                                        <li><a href="assets/files/pdfs/Catalogo_Filtros_Lorenzetti.pdf" target="_blank">Catálogo filtros</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="?controller=producto&method=services">Servicio técnico</a>
                                </li>
                                <li>
                                    <a href="?controller=producto&method=aboutUs">Quienes Somos</a>
                                </li>
                                <li>
                                    <a href="?controller=producto&method=contact">Contactenos</a>
                                </li>
                                <li>
                                    <a href="?controller=ayuda&method=ayuda">Preguntas Frecuentes</a>
                                </li>
                            </ul>
                        </nav>
                    </div><!-- End .header-left -->

                    <div class="header-right">
                        <button class="mobile-menu-toggler" type="button">
                            <i class="icon-menu"></i>
                        </button>
                        <div class="header-search header-search-popup header-search-category d-none d-sm-block">
                            <a href="#" class="search-toggle" role="button"><i class="icon-magnifier"></i></a>
                            <form action="?controller=producto&method=search" method="POST">
                                <div class="header-search-wrapper">
                                    <input type="search" class="form-control" name="name" id="name" placeholder="Buscar producto..." required>
                                    <div class="select-custom">
                                        <select id="cat" name="cat">
                                            <option value="">Todas</option>
                                            <?php foreach ($categorias as $categoria) : ?>
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
                            <a href="#" id="btn-carrito" class="dropdown-toggle dropdown-arrow" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="">
                                <i class="fas fa-shopping-cart"></i>
                                <span class="cart-count badge-circle"></span>
                            </a>

                            <div class="dropdown-menu">
                                <div class="dropdownmenu-wrapper">
                                    <div class="dropdown-cart-header">
                                        <span id="items" class="items"></span>

                                        <a href="?controller=carrito&method=viewCart" class="float-right">Ver carrito</a>
                                    </div>
                                    <!-- End .dropdown-cart-header -->

                                    <div class="dropdown-cart-products" id="tabla-product">
                                        <!-- End .product -->
                                    </div>
                                    <!-- End .cart-product -->

                                    <div class="dropdown-cart-total">
                                        <span>Total</span>

                                        <span id="price" class="cart-total-price float-right"></span>
                                    </div>
                                    <!-- End .dropdown-cart-total -->

                                    <div class="dropdown-cart-action">
                                        <!--<a href="checkout-shipping.html" class="btn btn-primary btn-block">Checkout</a>-->
                                    </div>
                                    <!-- End .dropdown-cart-total -->
                                </div>
                                <!-- End .dropdownmenu-wrapper -->
                            </div>
                            <!-- End .dropdown-menu -->
                        </div>
                        <!-- End .dropdown -->
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-middle -->
        </header><!-- End .header -->