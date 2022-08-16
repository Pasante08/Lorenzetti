<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'vendor/autoload.php';
    require 'models/cliente.php';


    class clienteController
    {
        private $clienteController;

        public function __construct()
        {
            $this->clienteModel = new Cliente;
            $this->mail = new PHPMailer(true);
        }

        public function subscribe()
        {
            if (isset($_POST)) {
                try {
                    $this->mail->SMTPDebug = SMTP::DEBUG_SERVER;
                    $this->mail->isSMTP();
                    $this->mail->host       = 'smtp.gmail.com';
                    $this->mail->SMTPAuth   = true;
                    $this->mail->Username   = 'jmarceloangarita@gmail.com';
                    $this->mail->Password   = 'hkfhcyvqlfgiojvl';
                    $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                    $this->mail->Port       = 465;

                    $this->mail->setFrom('fenusa@fenusa.com.co', 'fenusa.com.co');
                    $this->mail->addAddress('supervisor.operaciones@fenusa.com.co', 'Supervisor Operaciones');
                    $this->mail->addAddress('asistentesr.sistemas@fenusa.com.co', 'Asistente Senior Sistemas');

                    $this->mail->isHTML(true);
                    $this->mail->Subject = 'Contacto en lorenzetti.net.co';
                    $this->mail->Body    = 'nombres:'.$_POST['contact-name'].'<br> email: '.$_POST['contact-email'].'<br> telefono:'.$_POST['contact-phone'].'<br> comentarios:'.$_POST['contact-message'].'';

                    $this->mail->send();
                } catch (Exception $e) {
                    echo "Hubo un error al enviar el mensaje: {$this->mail->ErrorInfo}";
                    die();
                }
            } else {
                echo "No viene nada por parametros";
                die();
            }
        }
    }