<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pago</title>
</head>

<body>
    <?php require 'templates/header.php'; ?>
    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="?controller=producto"><i class="icon-home"></i></a></li>
                    <li class="breadcrumb-item" aria-current="page">Carrito</li>
                    <li class="breadcrumb-item active" aria-current="page">Productos</li>
                </ol>
            </div><!-- End .container -->
        </nav>

        <div class="page-header">
            <div class="container">
                <h1>Pago</h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->

        <div class="container">
            <div class="row row-sparse">
                <div class="col-lg-4">
                    <div class="order-summary">
                        <h3>Resumen</h3>

                        <h4>
                            <a data-toggle="collapse" href="#order-cart-section" class="collapsed" role="button" aria-expanded="false" aria-controls="order-cart-section"><?php print_R($resArray['info']['count'])  ?> Productos en el carrito</a>
                        </h4>

                        <div class="collapse" id="order-cart-section">
                            <table class="table table-mini-cart">
                                <tbody>
                                    <?php  //for ($i=0; $i < $resArray; $i++) : ?>
                                        <?php //echo $resArray[$i]; ?>
                                        <?php  //foreach($items as $product) : ?>
                                            <?php //print_R($product) ?>
                                    <tr>
                                        <td class="product-col">
                                            <figure class="product-image-container">
                                                <a href="product.html" class="product-image">
                                                    <img src="assets/images/products/product-1.jpg" alt="product">
                                                </a>
                                            </figure>
                                            <div>
                                                <h2 class="product-title">
                                                    <a href="product.html"><?php echo $product->nombre ?></a>
                                                </h2>

                                                <span class="product-qty">Qty: 4</span>
                                            </div>
                                        </td>
                                        <td class="price-col">$17.90</td>
                                    </tr>
                                    <?php //endforeach ?>
                                    <?php //endfor ?>
                                </tbody>
                            </table>
                        </div><!-- End #order-cart-section -->
                    </div><!-- End .order-summary -->

                    <div class="checkout-info-box">
                        <h3 class="step-title">Enviar a:
                            <a href="#" title="Edit" class="step-title-edit"><span class="sr-only">Edit</span><i class="icon-pencil"></i></a>
                        </h3>

                        <address>
                        <?php if(isset($_POST)) : ?>
                            <?php echo $_POST['adress'].'<br>' ?>
                            <?php echo $_POST['slt-muni'].'<br>' ?>
                            <?php echo $_POST['slt-depa'] ?>
                                <?php else : ?>
                                    Desmond Mason <br>
                                123 Street Name, City, USA <br>
                                Los Angeles, California 03100 <br>
                                United States <br>
                                (123) 456-7890
                                <?php endif ?>
                        </address>
                    </div><!-- End .checkout-info-box -->
                </div><!-- End .col-lg-4 -->

                <div class="col-lg-8 order-lg-first padding-right-lg">
                    <div class="checkout-payment">
                        <h2 class="step-title">Datos del cliente:</h2>

                        <!--<h4>Check / Money order</h4>-->

                        <div class="form-group-custom-control">
                            <!--<div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="change-bill-address" value="1">
                                <label class="custom-control-label" for="change-bill-address">My billing and shipping address are the same</label>
                            </div>--><!-- End .custom-checkbox -->
                        </div><!-- End .form-group -->

                        <div id="checkout-shipping-address">
                            <address>
                                
                            </address>
                        </div><!-- End #checkout-shipping-address -->

                        <div id="new-checkout-address" class="show">
                            <form action="#">
                                <div class="form-group required-field">
                                    <label>Nombre Completo </label>
                                    <input type="text" class="form-control" name="nameClient" id="nameClient" required>
                                </div><!-- End .form-group -->

                                <div class="form-group required-field">
                                    <label>Correo Electrónico </label>
                                    <input type="text" class="form-control" name="email" id="email" required>
                                </div><!-- End .form-group -->

                                <div class="form-group">
                                    <label>Teléfono </label>
                                    <input type="text" class="form-control" name="phone" id="phone" required>
                                </div><!-- End .form-group -->

                            </form>
                        </div><!-- End #new-checkout-address -->

                        <div class="clearfix">
                            <a href="#" class="btn btn-primary float-right">Place Order</a>
                        </div><!-- End .clearfix -->
                    </div><!-- End .checkout-payment -->

                </div><!-- End .col-lg-8 -->
            </div><!-- End .row -->
        </div><!-- End .container -->

        <div class="mb-6"></div><!-- margin -->
    </main><!-- End .main -->
    <?php require 'templates/footer.php'; ?>
</body>

</html>