<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lorenzetti Admin</title>
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
    <!--<link rel="stylesheet" href="assets/css/style.css">-->
    <link rel="stylesheet" type="text/css" href="assets/vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>

<body>
    <header>
        <!-- Fixed navbar -->
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark"> <a class="navbar-brand" href="#">Lorenzetti</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active"> <a class="nav-link" href="?controller=producto&method=adminIndex">productos<span class="sr-only">(current)</span></a> </li>
                    <li class="nav-item"> <a class="nav-link" href="?controller=color&method=adminIndex">producto color<span class="sr-only">(current)</span></a> </li>
                    <li class="nav-item"> <a class="nav-link" href="?controller=color&method=addColor">color<span class="sr-only">(current)</span></a> </li>
                    <li class="nav-item"> <a class="nav-link" href="?controller=prdtclr&method=addprdtclr">producto voltaje<span class="sr-only">(current)</span></a> </li>
                    <li class="nav-item"> <a class="nav-link" href="?controller=municipio&method=adminIndex">municipio<span class="sr-only">(current)</span></a> </li>
                    <li class="nav-item"> <a class="nav-link" href="?controller=productosis&method=adminIndex">Producto sistema<span class="sr-only">(current)</span></a> </li>
                    <li class="nav-item"> <a class="nav-link" href="?controller=ayuda&method=adminIndex">Preguntas frecuentes<span class="sr-only">(current)</span></a> </li>
                    <li class="nav-item"> <a class="nav-link" href="?controller=factura&method=adminIndex">Facturas<span class="sr-only">(current)</span></a> </li>
                </ul>
            </div>
        </nav>
    </header>