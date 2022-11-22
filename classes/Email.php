<?php 

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email{

    public $email;
    public $nombre;
    public $token;


    public function __construct($email, $nombre, $token){
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

    public function enviarConfirmacion(){
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '2f8f2e81ab16a6';
        $mail->Password = 'b0ab4f491b4718';

        $mail->setFrom('cuentas@appsalon.com');
        $mail->addAddress('cuentas@appsalon.com','AppSalon.com');
        $mail->Subject = 'Confirma tu cuenta';

        //Set Html
        $mail->isHTML(TRUE);
        $mail->Charset = 'UTF-8';

        $contenido = "<html>";
        $contenido .= "<p> <strong> Hola ". $this->nombre ." </strong> Has creado tu cuenta en app Salón, solo debes confirmarla presionando el siguiente enlace</p>";
        $contenido .="<p>Presiona aquí: <a href='" . $_ENV['SERVER_HOST'] . "confirmar-cuenta?token=".$this->token."'>Confirmar Cuenta</a></p>";
        $contenido .= "<p>Si tu no solicitaste esta cuenta, puedes ignorar el mensaje</p>";
        $contenido .="</html>";
        $mail->Body=$contenido;

        //enviar el mail
        $mail->send();
    }
    public function enviarInstrucciones(){
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '2f8f2e81ab16a6';
        $mail->Password = 'b0ab4f491b4718';

        $mail->setFrom('cuentas@appsalon.com');
        $mail->addAddress('cuentas@appsalon.com','AppSalon.com');
        $mail->Subject = 'Restablece tu password';

        //Set Html
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $contenido = "<html>";
        $contenido .= "<p> <strong> Hola ". $this->nombre ." </strong> Has solicitado restablecer tu password, sigue el siguiente enlace para hacerlo </p>";
        $contenido .="<p>Presiona aquí: <a href='" . $_ENV['SERVER_HOST'] . "confirmar-cuenta?token=".$this->token."'>Restablecer Password</a></p>";
        $contenido .= "<p>Si tu no solicitaste esta cuenta, puedes ignorar el mensaje</p>";
        $contenido .="</html>";
        $mail->Body=$contenido;

        //enviar el mail
        $mail->send();
    }
}