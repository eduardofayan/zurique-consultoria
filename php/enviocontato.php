<?php

date_default_timezone_set('America/Sao_Paulo');  

  //Variáveis
  $nomecontato = $_POST['nomecontato'];
  $telcontato = $_POST['telcontato'];
  $emailcontato = $_POST['emailcontato'];
  $empresacontato = $_POST['empresacontato'];
  $mensagemcontato = $_POST['contentcontato'];
  $data_envio = date('d/m/Y');
  $hora_envio = date('H:i:s');

  //Corpo E-mail
  $arquivo = "
    Formulário de solicitação de contato
      Nome: $nomecontato
      Telefone para contato: $telcontato
      E-mail: $emailcontato
      Nome da Empresa: $empresacontato
      Mensagem: $mensagemcontato
      Este e-mail foi enviado em $data_envio às $hora_envio
  ";
  
  //Emails para quem será enviado o formulário
  $destino = "edivan@zurique.com.br";
  $assunto = "Solicitação de Contato";

  //Este sempre deverá existir para garantir a exibição correta dos caracteres
  $headers  = "MIME-Version: 1.0\n";
  $headers .= "Content-type: text/html; charset=utf-8\n";
  $headers .= "From: viniciusfayan@gmail.com";

 //Enviar
 if (mail($destino, $assunto, $arquivo, $headers)){
  echo ("Email enviado com sucesso! Em breve entraremos em contato!") ;
  if(isset($_POST['g-recaptcha-response'])){
    $captcha=$_POST['g-recaptcha-response'];
  }
  if(!$captcha){
    echo 'Valide corretamente o Recaptcha.';
    exit;
  }
  $secretKey = "6Lcw8OgjAAAAAB2NItOA0cWNPmM9nfYGJ5FMAtrM";
  $ip = $_SERVER['REMOTE_ADDR'];
  $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
  $responseKeys = json_decode($response,true);
  if(intval($responseKeys["success"]) !== 1) {
    echo '';
  } else {
    echo '';
  }
} else {
  echo ("Ocorreu um erro no envio, estamos te redirecionando para tentar Novamente");
};                       
if($_POST):
  if(isset($_POST['url'])&&strlen($_POST['url'])==0 ) {
      echo " ";
  }
endif;
