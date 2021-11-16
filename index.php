<?php
require_once('src/PHPMailer.php');
require_once('src/SMTP.php');
require_once('src/Exception.php');
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
 
$mail = new PHPMailer(true);

$nome = isset($_POST['nome']) ? $_POST['nome'] : 'Não Informado';
$email = isset($_POST['email']) ? $_POST['email'] : 'Não Informado';
$endereco = isset($_POST['endereco']) ? $_POST['endereco'] : 'Não Informado';
$numero = isset($_POST['numero']) ? $_POST['numero'] : 'Não Informado';
$mensagem = isset($_POST['mensagem']) ? $_POST['mensagem'] : 'Não Informado';
 
try {
	$mail->SMTPDebug = SMTP::DEBUG_SERVER;
// 	$mail->SMTPSecure = 'tls';
    $mail->SMTPSecure = 'ssl';
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'leolass1010@gmail.com';
	$mail->Password = 'Eletronica@8597';
	$mail->Port = 587;
 
	$mail->setFrom('leolass1010@gmail.com');
	$mail->addAddress('leolass1010@gmail.com');
	$mail->addAddress('leonardoafonso1048@gmail.com');
 
	$mail->isHTML(true);
	$mail->Subject = 'Teste de email';
	$mail->Body = '
	Nome: '.$nome.'<br>
  	E-mail: '.$email.'<br>
 	Endereco: '.$endereco.'<br>
  	Número: '.$numero.'<br>
  	Mensagem: '.$mensagem.'<br>
	
	';
	$mail->AltBody = 'Chegou o email teste do Canal TI';
 
	if($mail->send()) {
		echo 'Email enviado com sucesso';
	} else {
		echo 'Email nao enviado';
	}
} catch (Exception $e) {
	echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
}
