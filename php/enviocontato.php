<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'vendor/autoload.php';

if(isset($_POST['enviar'])){

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'developereduardofayan@gmail.com';                     //SMTP username
    $mail->Password   = 'vkmwgwovvyscmroj';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;          //Enable implicit TLS encryption
    $mail->Port       = '465';                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('developereduardofayan@gmail.com', 'Email');
    $mail->addAddress('viniciusfayan@gmail.com', 'Solicitação de Contato');     //Add a recipien   
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Solicitação de Contato';
    $body = "Informações de Contato: <br>
    Nome: ". isset($_POST['nomecontato'])." <br>
    Telefone para contato: ". isset($_POST['telcontato']) ." <br>
    Email: ". isset($_POST['emailcontato'])." </br>
    Nome da empresa: ". isset($_POST['empresacontato'])." <br>
    Mensagem: <br>
    ". isset($_POST['contentcontato']);

    $mail->Body    = $body;

    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Mensagem enviada com sucesso, em breve entraremos em contato!';
} catch (Exception $e) {
    echo "Ocorreu um erro no envio, tentar novamente: {$mail->ErrorInfo}";
}
}else{
  echo "Ocorreu um erro no envio, tentar novamente: {$mail->ErrorInfo}";
}