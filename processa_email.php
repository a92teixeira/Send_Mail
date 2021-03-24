<?php 

//por segurança proteger o arquivo fora do diretorio publico
require '../../app_send_mail/processa_email.php';

/****REQUIRE*****/

/*
require "lib/PHPMailer/Exception.php";
require "lib/PHPMailer/OAuth.php";
require "lib/PHPMailer/PHPMailer.php";
require "lib/PHPMailer/POP3.php";
require "lib/PHPMailer/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mensagem{
   private $para = null;
   private $assunto = null;
   private $mensagem = null;

   public $status = array('cod_status' => null, 'desc_status' => null);

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
   //erro=1 : algum campo obrigatório da aplicação nao foi preenchido
   header("Location: index.php?erro=1");
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
    $mail->Password   = '*****';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //encode to utf-8
    $mail->CharSet = "UTF-8"; 

    //Recipients
    $mail->setFrom('a92teixeiradev@gmail.com', 'SourcesDIY Company');
    //$mail->setFrom();
    $mail->addAddress($mensagem->__get('para'), 'Cliente #0974');     //Add a recipient
    //$mail->addAddress('ellen@example.com');               //Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $mensagem->__get('assunto');
    $mail->Body    = $mensagem->__get('mensagem');
    $mail->AltBody = 'É necessário utilizar um client que suporte HTML para utilizar este recurso';

    $mail->send();

    $mensagem->status['cod_status'] = 1;
    $mensagem->status['desc_status'] = "E-mail enviado com sucesso";

} catch (Exception $e) {
   $mensagem->status['cod_status'] = 0;
   $mensagem->status['desc_status'] = "Não foi possível enviar este email, tente novamente mais tarde. Detalhes do erro:" . $mail->ErrorInfo;
}
/****END REQUIRE*****/

?>

<!--
<html lang="pt-br">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>App Send Mail</title>

   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

<div class='container'>
   <div class="py-3 text-center">
      <img src="img/logo.png" alt="">
      <h2>Send Mail</h2>
      <p class="lead">Seu app de envio de emails particular</p>
   </div>

   <div class="row">
      <div class="col-md-12">
      < ?php if($mensagem->status['cod_status'] == 1){ ?>
         <div class="container">
            <h1 class="display-4 text-success">Success</h1>
            <p> < ? = $mensagem->status['desc_status']; ?> </p>
            <a href="index.php" class="btn btn-success btn-lg mt-5 text-white">Voltar</a>
         </div>
         < ?php } ?>

         < ?php if($mensagem->status['cod_status'] == 0){ ?>
         <div class="container">
            <h1 class="display-4 text-danger">Ops!</h1>
            <p> < ?= $mensagem->status['desc_status']; ?> </p>
            <a href="index.php" class="btn btn-danger btn-lg mt-5 text-white">Voltar</a>
         </div>
         < ?php } ?>

      </div>
   </div>

</div> <--FIM CONTAINER-->