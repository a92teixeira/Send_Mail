<?php

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

if($mensagem->validar_mensagem()){
   echo 'Mensagem válida';
}else{
   echo "Mensagem inválida";
}


?>