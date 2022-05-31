<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preguntas Frecuentes</title>
</head>

<body>
    <?php require 'templates/header.php'; ?>
    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="?controller=producto"><i class="icon-home"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Preguntas Frecuentes</li>
                </ol>
            </div><!-- End .container -->
        </nav>
        <div class="page-header">
            <div class="container">
                <h1>Preguntas Frecuentes</h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <div class="container">
            <div class="row row-sparse">
                <div class="col-lg-12">
                    <div class="product-single-collapse" id="productAccordion">
                        <?php foreach ($helps as $help) : ?>
                            <div class="cart-summary">
                                <h4>
                                    <a data-toggle="collapse" href="#question<?php echo $help->idHelpfaq ?>" class="collapsed" role="button" aria-expanded="false" aria-controls="question<?php echo $help->idHelpfaq ?>"><?php echo $help->question ?></a>
                                </h4>
                                <div class="collapse" id="question<?php echo $help->idHelpfaq ?>" data-parent="#productAccordion">
                                    <p><?php echo $help->answer ?></p>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php require 'templates/footer.php'; ?>
</body>

</html>