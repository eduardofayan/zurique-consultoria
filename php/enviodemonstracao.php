<?php
 
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
  $arquivo = "
    <html>
      <p><b>Formúlario de Solicitar Demonstração</b></p>
      <p><b>Nome: </b>$nome</p>
      <p><b>Sobrenome: </b>$sobrenome</p>
      <p><b>E-mail: </b>$email</p>
      <p><b>Telefone: </b>$tel</p>
      <p><b>Nome da Empresa: </b>$empresa</p>
      <p><b>Mensagem: </b>$mensagem</p>
      <p>Este e-mail foi enviado em <b>$data_envio</b> às <b>$hora_envio</b></p>
    </html>
  ";
  
  //Emails para quem será enviado o formulário
  $destino = "viniciusfayan@gmail.com";
  $assunto = "Solicitação de Demonstração";

  //Este sempre deverá existir para garantir a exibição correta dos caracteres
  $headers  = "MIME-Version: 1.0\n";
  $headers .= "Content-type: text/html; charset=iso-8859-1\n";
  $headers .= "From: $nome <$email>";

  //Enviar
  if (mail($destino, $assunto, $arquivo, $headers)){
    echo ("Email Enviado com sucesso, Aguarde um momento estamos te redirecionando de volta para Zurique Consultoria <meta http-equiv='refresh' content='10;URL=../demonstracao.html'> ") ;
  } else {
    echo ("Ocorreu um erro no envio, Tente Novamente");
  };
  if($_POST):
    if(isset($_POST['url'])&&strlen($_POST['url'])==0 ) {
        echo "ok não é um spam";
    }
  endif;
?>