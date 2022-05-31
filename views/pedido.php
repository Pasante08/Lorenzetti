<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finalizar pedido</title>
</head>
<body>
<?php require 'templates/header.php'; ?>
    <div class="container">
        <div class="col-lg-12">
            <div class=" m-0 row justify-content-center">
                <div class="col-auto p-5 text-center" style="background: #fbfbfb;">
                <div class="card-header">
                    <h2>Finalizar Pedido</h2>
                </div>
                <div class="card-body">
                    <form action="https://checkout.wompi.co/p/"  method="GET">
                        <input type="hidden" id="public-key" name="public-key" value="pub_prod_EsYRGmlzvnQKWSL50CnmFYaVwX1a7okw">
                        <input type="hidden" id="redirect-url" name="redirect-url" value="https://sistemasnuruena.com.co/?ref=<?php echo $reference ?>">
                        <label for="">Referencia</label>
                        <p><?php echo $reference ?></p>
                        <input type="hidden" id="reference" name="reference" value="<?php echo $reference ?>">
                        <label for="">Cliente</label>
                        <input type="hidden" id="currency" name="currency" value="COP">
                        <p><?php echo $client ?></p>
                        <label for="">Valor</label>
                        <p>$ <?php  echo number_format($amount_in_cents, 0, ',', '.') ?></p>
                        <input type="hidden" id="amount-in-cents" name="amount-in-cents" value="<?php  echo number_format($amount_in_cents,0,'','').'00' ?>">
                        <button type="submit" id="checkout-shipping" class="btn btn-block btn-sm btn-danger btn-quickview-product">Ir a pagar</button>
                    </form>
                </div>
                <div class="card-footer">

                </div>

                </div>
            </div>
        </div>
    </div>
    <?php require 'templates/footer.php'; ?>
</body>
</html>