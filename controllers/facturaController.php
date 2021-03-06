<?php

//use PhpOffice\PhpSpreadsheet\Calculation\TextData\Concatenate;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';

require 'models/factura.php';
require 'models/producto.php';
require 'models/cliente.php';
require 'models/carrito.php';
require 'models/detalle.php';
require 'models/productoSistema.php';

class facturaController
{
    private $facturaModel;
    private $clienteModel;
    private $prdtsistemaModel;
    private $detallecoModel;
    private $productoModel;

    public function __construct()
    {
        $this->facturaModel = new Factura;
        $this->clienteModel = new Cliente;
        $this->carrito = new Carrito;
        $this->prdtsistemaModel = new productoSistema;
        $this->detallecoModel = new Detalle;
        $this->productoModel = new Producto;
        $this->mail = new PHPMailer(true);
    }

    public function adminIndex()
    {
        $facturas = $this->facturaModel->getAll();
        require 'views/Admin/templates/header.php';
        require 'views/Admin/facturas/index.php';
    }

    public function edit()
    {
        if(isset($_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            $factura = $this->facturaModel->getById($id);
            require 'views/Admin/templates/header.php';
            require 'views/Admin/facturas/edit.php';
        }
    }

    public function viewFac()
    {
        if(isset($_GET['id'])) {
            $factura = $this->facturaModel->view($_GET['id']);
            $total = 0;
            print_r($factura[0]->vEnvio);
            foreach ($factura as $key => $value) {
                $total += $factura[$key]->precio;
            }
            $total += $factura[0]->vEnvio;
            require 'views/Admin/templates/header.php';
            require 'views/Admin/facturas/view.php';
        }
    }

    public function addFac()
    {
        if (isset($_POST)) {
            $cliente['nombre'] = $_POST['cliente'];
            $cliente['correo'] = $_POST['email'];
            $cliente['telefono'] = $_POST['phone'];
            $cliente_id = $this->clienteModel->newClient($cliente);
            $modPago = 1;
            $fecha = date('Y-m-d H:i:s');
            $permitted_chars = '123456789abcdefghijklmnopqrstuvwxyz';
            $reference = substr(str_shuffle($permitted_chars), 0, 10);
            $departamento_id = $_POST['slt-depa'];
            $municipio_id = $_POST['slt-muni'];
            $direccion = $_POST['adress'];
            $vEnvio = $_POST['tax'];
            $factura = array("fecha" => "$fecha", "cliente_id" => "$cliente_id", "modPago_id" => "$modPago", "refac" => "$reference", "departamento_id" => "$departamento_id", "municipio_id" => "$municipio_id", "direccion" => "$direccion", "vEnvio" => "$vEnvio");
            $factura_id = $this->facturaModel->newFact($factura);
            $itemsCarrito = json_decode($this->carrito->load(), 1);
            foreach ($itemsCarrito as $itemsCarrito) {
                $cantidad = $itemsCarrito['cantidad'];
                $producto = $this->productoModel->getById($itemsCarrito['id']);
                $precio = $producto[0]->precio * $cantidad;
                $id = $this->prdtsistemaModel->getById($itemsCarrito['id'], $itemsCarrito['idV'], $itemsCarrito['idC']);
                $producto_id = $id[0]->idProducto;
                $detalle = array("cantidad"=>"$cantidad","producto_id"=>"$producto_id","factura_id"=>"$factura_id","precio"=>"$precio");
                $this->detallecoModel->newDetalleco($detalle);
            }
            $client = $_POST['cliente'];
            $amount_in_cents = $_POST['total'];
            require 'views/pedido.php';
        } else {
            print("No llego");
            die();
        }
    }

    public function mostrarItemsCart()
    {
        $itemsCarrito = json_decode($this->carrito->load(), 1);
        var_dump($itemsCarrito);
        die();
    }

    public function addOrder()
    {
        if(isset($_POST)) {
            $itemsCarrito = json_decode($this->carrito->load(), 1);
            $fullItems = [];
            $total = 0;
            $totalItems = 0;
            foreach ($itemsCarrito as $itemCarrito) {
                $httpRequest = $this->productoModel->getByIdCart($itemCarrito['id'], $itemCarrito['idC']);
                $itemProducto = json_decode($httpRequest, 1)['item'];
                $itemProducto['cantidad'] = $itemCarrito['cantidad'];
                $itemProducto['subtotal'] = $itemProducto['cantidad'] * $itemProducto['precio'];
                $total += $itemProducto['subtotal'];
                $totalItems += $itemProducto['cantidad'];
                array_push($fullItems, $itemProducto);

            }
            $resArray = array('info' => ['count' => $totalItems, 'total' => number_format($total)] , 'items' => $fullItems);
            print_R($resArray);
            echo '<br>';
            //die();
            echo json_encode($resArray);
            require 'views/checkout.php';
        } else {
            print("llego sin datos");
            die();
        }
    }

    public function validateFac($ref)
    {
        if(isset($_REQUEST['id'])){
            $request = $this->facturaModel->existRef($_REQUEST);
            $total = 0;
            foreach ($request as $key => $value) {
                $total += $request[$key]->precio;
            }
            $total += $request[0]->vEnvio;
            $message = "<html><body>";
            $message .= "<table width='100%' bgcolor='#e0e0e0' cellpadding='0' cellspacing='0' border='0'>";
            $message .= "<tr><td>";
            $message .= "<table align='center' width='100%' border='0' cellpadding='0' cellspacing='0' style='max-width:650px; background-color:#fff; font-family:MyriadProBold, sans-serif;'>";
            $message .=  "<thead>
            <tr height='80'>
                <th colspan='4' style='background-color:#f5f5f5; border-bottom:solid 1px #bdbdbd; font-family:MyriadProBold, sans-serif; color:#333; font-size:34px;'><img src='https://sistemasnuruena.com.co/assets/images/logo.png' alt='Lorenzetti'></th>
            </tr>
                </thead>";
            $message .= "<tbody>
            <tr>
                <td colspan='4' style='padding:15px;'>
                    <p style='font-size:20px; text-align:center;'>Hola, <span style='font-weight: bold;'>". $request[0]->cliente ."</span></p>
                    <hr/>
                    <p style='font-size:18px; text-align:center; font-weight: bold;'>GRACIAS POR COMPRAR EN LORENZETTI.NET.CO <br> ??TU PEDIDO HA SIDO RECIBIDO!</p>
                    <P style='font-size:15px; text-align:center;'>Fecha: ". $request[0]->fecha ."</P>
                    <hr>
                    <p style='text-align:center;'>Hemos recibido su orden y empezaremos a procesarla. Recuerda que el tiempo de entrega son 3 dias habiles a partir de la confirmaci??n del pago.</p>
                    <table align='center' width='100%' border='0' style='height:auto; width:100%; max-width:100%;'>
                        <thead>
                            <tr style='text-align:center;' height='50'>
                                <th style='background-color:#D71921; color:#fff; border-bottom:solid 1px #bdbdbd; font-family:MyriadProBold, sans-serif; font-weight: bold;'>Producto</th>
                                <th style='background-color:#D71921; color:#fff; border-bottom:solid 1px #bdbdbd; font-family:MyriadProBold, sans-serif; font-weight: bold;'>Cantidad</th>
                                <th style='background-color:#D71921; color:#fff; border-bottom:solid 1px #bdbdbd; font-family:MyriadProBold, sans-serif; font-weight: bold;'>Precio</th>
                            </tr>
                        </thead>
                        <tbody>";
                        foreach ($request as $factura) {
                            $message .= "<tr height='30'>
                                <td style='border-bottom:solid 1px #bdbdbd;'>". $factura->producto ."</td>
                                <td style='text-align:center; border-bottom:solid 1px #bdbdbd;'>". $factura->cantidad ."</td>
                                <td style='text-align:center; border-bottom:solid 1px #bdbdbd;'>". number_format($factura->precio, 0, ',', '.') ."</td>
                            </tr>";
                        }
            $message .= "<tr height='30'>
                                <td></td>
                                <td style='font-weight: bold;'>Valor env??o</td>
                                <td style='text-align:center; border-bottom:solid 1px #bdbdbd;'>". number_format($request[0]->vEnvio, 0, ',', '.') ."</td>
                            </tr>
                            <tr height='30'>
                                <td></td>
                                <td style='font-weight: bold;'>TOTAL</td>
                                <td style='text-align:center; border-bottom:solid 1px #bdbdbd;'>". number_format($total, 0, ',', '.') ."</td>
                            </tr>
                        </tbody>
                    </table>
                    <p style='font-size:15px; font-family:MyriadProBold, sans-serif;'>Hello Nombre del cliente <br /><br /> This is HTML eMail Sent using PHPMailer. isn't it cool to send HTML email rather than plain text, it helps to improve your email marketing.</p>
                </td>
            </tr>
        </tbody>";
            $message .= "</table>";
    
            $message .= "</td></tr>";
            $message .= "</table>";
            
            $message .= "</body></html>";
            try {
                //Server settings
                //$this->mail->SMTPDebug = SMTP::DEBUG_SERVER; 
                $this->mail->SMTPDebug = 0;                     //Enable verbose debug output
                $this->mail->isSMTP();                                            //Send using SMTP
                $this->mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $this->mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $this->mail->Username   = 'fenusa@fenusa.com.co';                     //SMTP username
                $this->mail->Password   = 'bloqueado1234';                               //SMTP password
                $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $this->mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                
                $this->mail->setFrom('fenusa@fenusa.com.co', 'fenusa.com.co'); 
                $this->mail->addAddress($request[0]->correo, $request[0]->cliente);    //Add a recipient
    
                //Content
                $this->mail->isHTML(true);                                  //Set email format to HTML
                $this->mail->Subject = 'Correo de prueba';
                $this->mail->Body    = $message;
    
                $this->mail->send();
                $this->carrito->sessionOff();
                require 'views/finish.php';
            } catch (Exception $e) {
                echo "Hubo un error al enviar el mensaje: {$this->mail->ErrorInfo}";
                die();
            }

            //$this->carrito->sessionOff();
            require 'views/finish.php';
        } else {
            echo 'No existe ninguna variable';
            die();
        }
    }

    public function executeProcedure()
    {
        $request = $this->facturaModel->selectFacturas(2);
        /*print_R($request);
        die();*/
        require 'prueba1.php';
    }

    public function enviarMail()
    {
        $full_name  = 'Nombre del cliente';
        $email      = '';
        $subject    = "Sending HTML eMail using PHPMailer.";
   $text_message    = "Hello $full_name, <br /><br /> This is HTML eMail Sent using PHPMailer. isn't it cool to send HTML email rather than plain text, it helps to improve your email marketing.";  
        // HTML email starts here
        $message = "<html><body>";
            $message .= "<table width='100%' bgcolor='#e0e0e0' cellpadding='0' cellspacing='0' border='0'>";
            $message .= "<tr><td>";
            $message .= "<table align='center' width='100%' border='0' cellpadding='0' cellspacing='0' style='max-width:650px; background-color:#fff; font-family:MyriadProBold, sans-serif;'>";
            $message .=  "<thead>
            <tr height='80'>
                <th colspan='4' style='background-color:#f5f5f5; border-bottom:solid 1px #bdbdbd; font-family:MyriadProBold, sans-serif; color:#333; font-size:34px;'><img src='https://sistemasnuruena.com.co/assets/images/logo.png' alt='Lorenzetti'></th>
            </tr>
                </thead>";
            $message .= "<tbody>
            <tr>
                <td colspan='4' style='padding:15px;'>
                    <p style='font-size:20px; text-align:center;'>Hola, <span style='font-weight: bold;'></span></p>
                    <hr/>
                    <p style='font-size:18px; text-align:center; font-weight: bold;'>GRACIAS POR COMPRAR EN LORENZETTI.NET.CO <br> ??TU PEDIDO HA SIDO REALIZADO!</p>
                    <P style='font-size:15px; text-align:center;'>Fecha: </P>
                    <hr>
                    <p style='text-align:center;'>Hemos recibido su orden y empezaremos a procesarla. Recuerda que el tiempo de entrega son 3 dias habiles a partir de la confirmaci??n del pago.</p>
                    <table align='center' width='100%' border='0' style='height:auto; width:100%; max-width:100%;'>
                        <thead>
                            <tr style='text-align:center;' height='50'>
                                <th style='background-color:#D71921; color:#fff; border-bottom:solid 1px #bdbdbd; font-family:MyriadProBold, sans-serif;'>Producto</th>
                                <th style='background-color:#D71921; color:#fff; border-bottom:solid 1px #bdbdbd; font-family:MyriadProBold, sans-serif;'>Cantidad</th>
                                <th style='background-color:#D71921; color:#fff; border-bottom:solid 1px #bdbdbd; font-family:MyriadProBold, sans-serif;'>Precio</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr height='30'>
                                <td style='border-bottom:solid 1px #bdbdbd;'>Prueba</td>
                                <td style='text-align:center; border-bottom:solid 1px #bdbdbd;'>Prueba</td>
                                <td style='text-align:center; border-bottom:solid 1px #bdbdbd;'>Prueba</td>
                            </tr>
                         <tr height='30'>
                                <td></td>
                                <td>TOTAL</td>
                                <td style='text-align:center; border-bottom:solid 1px #bdbdbd;'>$110.000</td>
                            </tr>
                        </tbody>
                    </table>
                    <p style='font-size:15px; font-family:MyriadProBold, sans-serif;'>Hello Nombre del cliente <br /><br /> This is HTML eMail Sent using PHPMailer. isn't it cool to send HTML email rather than plain text, it helps to improve your email marketing.</p>
                </td>
            </tr>
        </tbody>";
            $message .= "</table>";
    
            $message .= "</td></tr>";
            $message .= "</table>";
            
            $message .= "</body></html>";
   
        try {
            //Server settings
            //$this->mail->SMTPDebug = SMTP::DEBUG_SERVER; 
            $this->mail->SMTPDebug = 0;                     //Enable verbose debug output
            $this->mail->isSMTP();                                            //Send using SMTP
            $this->mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $this->mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $this->mail->Username   = 'fenusa@fenusa.com.co';                     //SMTP username
            $this->mail->Password   = 'bloqueado1234';                               //SMTP password
            $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $this->mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            
            $this->mail->setFrom('fenusa@fenusa.com.co', 'fenusa.com.co'); 
            $this->mail->addAddress('asistentesr.sistemas@fenusa.com.co', 'Asistente Senior Sistemas');    //Add a recipient

            //Content
            $this->mail->isHTML(true);                                  //Set email format to HTML
            $this->mail->Subject = 'Correo de prueba';
            $this->mail->Body    = $message;

            $this->mail->send();
            //$this->carrito->sessionOff();
            require 'views/finish.php';
        } catch (Exception $e) {
            echo "Hubo un error al enviar el mensaje: {$this->mail->ErrorInfo}";
            die();
        }
    }

    public function mostrarFinish()
    {
        require 'views/finish.php';
    }
}
