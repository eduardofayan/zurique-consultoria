<?php
 
  //Variáveis
  $nome = addslashes($_POST['nome']);
  $sobrenome = addslashes($_POST['sobrenome']);
  $email = addslashes($_POST['email']);
  $tel = addslashes($_POST['tel']);
  $empresa = addslashes($_POST['empresa']);
  $mensagem = addslashes($_POST['content']);
  $data_envio = date('d/m/Y');
  $hora_envio = date('H:i:s');

  //Compo E-mail
  $arquivo = "
    Formúlario de Solicitar Demonstração
      Nome: $nome
      Sobrenome: $sobrenome
      E-mail: $email
      Telefone: $tel
      Nome da Empresa: $empresa
      Mensagem: $mensagem
      Este e-mail foi enviado em $data_envio às $hora_envio
  ";
  
  //Emails para quem será enviado o formulário
  $destino = "edivan@zurique.com.br";
  $assunto = "Solicitação de Demonstração";

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