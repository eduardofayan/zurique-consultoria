<?php
 if($_POST):
  if(isset($_POST['url'])&&strlen($_POST['url'])==0 ) {
      echo "ok não é um spam";
  }
endif;
  //Variáveis
  $nome = $_POST['nome'];
  $sobrenome = $_POST['sobrenome'];
  $email = $_POST['email'];
  $tel = $_POST['tel'];
  $empresa = $_POST['empresa'];
  $mensagem = $_POST['content'];
  $data_envio = date('d/m/Y');
  $hora_envio = date('H:i:s');

  //Compo E-mail
  $body = "Nome: ".$nome. "\n"
          "Sobrenome: " .$sobrenome. "\n"
          "E-mail: " .$email. "\n"
          "Telefone: " .$tel. "\n"
          "Nome da empresa: " .$empresa. "\n"
          "Mensagem: " .$mensagem. "\n"
          "Enviado em: ".$data_envio. "as" .$hora_envio;
  
  //Emails para quem será enviado o formulário
  $destino = "viniciusfayan@gmail.com";
  $assunto = "Solicitação de Demonstração";

  //Este sempre deverá existir para garantir a exibição correta dos caracteres
  $headers  = "MIME-Version: 1.0\n";
  $headers .= "Content-type: text/html; charset=iso-8859-1\n";
  $headers .= "From: $nome <$email>";

  //Enviar
  if (mail($destino, $assunto, $body, $headers)){
    echo ("Email Enviado com sucesso <meta http-equiv='refresh' content='10;URL=../demonstracao.html'> ") ;
  } else {
    echo ("Ocorreu um erro no envio, Tente Novamente");
  }
  
?>