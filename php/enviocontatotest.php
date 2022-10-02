<?php
 
  //Variáveis
  $nomecontato = addslashes($_POST['nomecontato']);
  $telcontato = addslashes($_POST['telcontato']);
  $emailcontato = addslashes($_POST['emailcontato']);
  $empresacontato = addslashes($_POST['empresacontato']);
  $mensagemcontato = addslashes($_POST['contentcontato']);
  $data_envio = date('d/m/Y');
  $hora_envio = date('H:i:s');

  //Compo E-mail
  $arquivo = "
    Formúlario de Solicitar Contato
      Nome: $nomecontato
      Telefone para contato: $telcontato
      E-mail: $emailcontato
      Nome da Empresa: $empresacontato
      Mensagem: $mensagemcontato
      Este e-mail foi enviado em $data_envio às $hora_envio
  ";
  
  //Emails para quem será enviado o formulário
  $destino = "viniciusfayan@gmail.com";
  $assunto = "Solicitação de Contato";

  //Este sempre deverá existir para garantir a exibição correta dos caracteres
  $headers  = "MIME-Version: 1.0\n";
  $headers .= "Content-type: text/html; charset=iso-8859-1\n";
  $headers .= "From: $nome <$email>";

 //Enviar
 if (mail($destino, $assunto, $arquivo, $headers)){
  echo ("Email Enviado com sucesso! Em breve Entraremos em contato! <meta http-equiv='refresh' content='10;URL=../demonstracao.html'> ") ;
} else {
  echo ("Ocorreu um erro no envio, estamos te redirecionando para tentar Novamente");
};
if($_POST):
  if(isset($_POST['url'])&&strlen($_POST['url'])==0 ) {
      echo "Validado Redirecionando...";
  }
endif;
?>