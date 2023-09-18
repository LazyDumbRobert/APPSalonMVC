<?php

    namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

    class Email{
        public $email;
        public $nombre;
        public $token;

        public function __construct($email,$nombre,$token){
            $this->email = $email;
            $this->nombre = $nombre;
            $this->token = $token;
        }

        public function  enviarConfirmacion(){
            //Crear el objeto de email
            
            try {
                $email = new PHPMailer();
                $email->isSMTP();
                $email->Host = $_ENV['EMAIL_HOST'];
                $email->SMTPAuth = true;
                $email->Port = $_ENV['EMAIL_PORT'];
                $email->Username = $_ENV['EMAIL_USER'];
                $email->Password = $_ENV['EMAIL_PASS'];

                $email->setFrom('cuentas@appsalon.com');
                $email->addAddress('cuentas@appsalon.com','AppSalon.com');
                $email->Subject = 'Confirma tu cuenta';

                //Set html
                $email->isHTML(TRUE);
                $email->CharSet = 'UTF-8';
                $contenido = "<html>";
                $contenido .= "<p><strong>Hola " . $this->nombre . "</strong> Has creado tu cuenta en App Salon solo debes confirmarla presionando en el siguiente enlace</p>";
                $contenido .= "<p>Preciona aquí: <a href='". $_ENV['APP_URL'] ."ConfirmAccount?token=".$this->token."'>Confirmar cuente</a></p>";
                $contenido .= "<p>Si tu no solicitaste esta cuenta puedes ignorar el mensaje.</p>";
                $contenido .= "</html>";
                $email->Body = $contenido;
                $email->AltBody = 'This is the body in plain text por non-HTML mail clients';
                //Enviar email
                $email->send();
            } catch (Exception $e) {
                debuguear('El mensaje no se pudo enviar:' . $e->getMessage());
            }
        }

        public function enviarInstrucciones(){
              //Crear el objeto de email
            
              try {
                $email = new PHPMailer();
                $email->isSMTP();
                $email->Host = $_ENV['EMAIL_HOST'];
                $email->SMTPAuth = true;
                $email->Port = $_ENV['EMAIL_PORT'];
                $email->Username = $_ENV['EMAIL_USER'];
                $email->Password = $_ENV['EMAIL_PASS'];

                $email->setFrom('cuentas@appsalon.com');
                $email->addAddress('cuentas@appsalon.com','AppSalon.com');
                $email->Subject = 'Reestablece su password';

                //Set html
                $email->isHTML(TRUE);
                $email->CharSet = 'UTF-8';
                $contenido = "<html>";
                $contenido .= "<p><strong>Hola " . $this->nombre . "</strong> Has solicitado reestablecer tu password, sigue el siguiente enlace para hacerlo</p>";
                $contenido .= "<p>Preciona aquí: <a href='". $_ENV['APP_URL'] ."/RecoverPassword?token=".$this->token."'>Reestablecer contraseña</a></p>";
                $contenido .= "<p>Si tu no solicitaste esta cuenta puedes ignorar el mensaje.</p>";
                $contenido .= "</html>";
                $email->Body = $contenido;
                $email->AltBody = 'This is the body in plain text por non-HTML mail clients';
                //Enviar email
                $email->send();
            } catch (Exception $e) {
                debuguear('El mensaje no se pudo enviar:' . $e->getMessage());
            } 
        }
    }


?>