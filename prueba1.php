<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table width='100%' bgcolor='#e0e0e0' cellpadding='0' cellspacing='0' border='0'>
        <tr>
            <td>
                <table align='center' width='100%' border='0' cellpadding='0' cellspacing='0' style='max-width:650px; background-color:#fff; font-family:MyriadProBold, sans-serif;'>
                    <thead>
                        <tr height='80'>
                            <th colspan='4' style='background-color:#f5f5f5; border-bottom:solid 1px #bdbdbd; font-family:MyriadProBold, sans-serif; color:#333; font-size:34px;'><img src="https://sistemasnuruena.com.co/assets/images/logo.png" alt="Lorenzetti"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan='4' style='padding:15px;'>
                                <p style='font-size:20px; text-align:center;'>Hola, <span style="font-weight: bold;"><?php echo $request[0]->cliente ?></span></p>
                                <hr/>
                                <p style='font-size:18px; text-align:center; font-weight: bold;'>GRACIAS POR COMPRAR EN LORENZETTI.NET.CO <br> ¡TU PEDIDO HA SIDO REALIZADO!</p>
                                <P style="font-size:15px; text-align:center;">Fecha: <?php echo $request[0]->fecha ?></P>
                                <hr>
                                <p style="text-align:center;">Hemos recibido su orden y empezaremos a procesarla. Recuerda que el tiempo de entrega son 3 dias habiles a partir de la confirmación del pago.</p>
                                <table align='center' width='100%' border='0' style='height:auto; width:100%; max-width:100%;'>
                                    <thead>
                                        <tr style='text-align:center;' height='50'>
                                            <th style='background-color:#D71921; color:#fff; border-bottom:solid 1px #bdbdbd; font-family:MyriadProBold, sans-serif;'>Producto</th>
                                            <th style='background-color:#D71921; color:#fff; border-bottom:solid 1px #bdbdbd; font-family:MyriadProBold, sans-serif;'>Cantidad</th>
                                            <th style='background-color:#D71921; color:#fff; border-bottom:solid 1px #bdbdbd; font-family:MyriadProBold, sans-serif;'>Precio</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($request as $request) : ?>
                                        <tr height='30'>
                                            <td style="border-bottom:solid 1px #bdbdbd;"><?php echo $request->producto ?></td>
                                            <td style="text-align:center; border-bottom:solid 1px #bdbdbd;"><?php echo $request->cantidad ?></td>
                                            <td style="text-align:center; border-bottom:solid 1px #bdbdbd;"><?php echo $request->precio ?></td>
                                        </tr>
                                        <?php endforeach ?>
                                        <tr height='30'>
                                            <td></td>
                                            <td>TOTAL</td>
                                            <td style="text-align:center; border-bottom:solid 1px #bdbdbd;">$110.000</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <p style='font-size:15px; font-family:MyriadProBold, sans-serif;'>Hello Nombre del cliente <br /><br /> This is HTML eMail Sent using PHPMailer. isn't it cool to send HTML email rather than plain text, it helps to improve your email marketing.</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>