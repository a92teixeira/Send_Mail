<?php

require "lib/PHPMailer/Exception.php";
require "lib/PHPMailer/OAuth.php";
require "lib/PHPMailer/PHPMailer.php";
require "lib/PHPMailer/POP3.php";
require "lib/PHPMailer/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mensagem{
   public $para = null;
   public $assunto = null;
   public $mensagem = null;

   public function __get($atributo){
      return $this->$atributo;
   }

   public function __set($atributo, $valor){
      $this->$atributo = $valor;
   }

   public function validar_mensagem(){
      if(empty($this->para) || empty($this->assunto) || empty($this->mensagem)){
         return false;
      }
      return true;
   }
}

$mensagem = new Mensagem();

$mensagem->__set('para', $_POST['para']);
$mensagem->__set('assunto', $_POST['assunto']);
$mensagem->__set('mensagem', $_POST['mensagem']);

if(!$mensagem->validar_mensagem()){
   echo 'A mensagem não é válida, preencha todos os campos do formulário';
   die();
}

//Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'a92teixeiradev@gmail.com';                     //SMTP username
    $mail->Password   = 'a92devtest';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('a92teixeiradev@gmail.com', 'Mailer Test');
    $mail->addAddress('a92teixeiradev@gmail.com', 'Iha User');     //Add a recipient
    //$mail->addAddress('ellen@example.com');               //Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Teste bem sucedido';
    $mail->Body    = 'Esse email contém um HTML <b>básico</b>';
    $mail->AltBody = 'Esse email não contém HTML';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "A mensagem não pôde ser enviada, codigo: {$mail->ErrorInfo}";
}

?>