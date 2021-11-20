<?php
date_default_timezone_set('Etc/UTC');
require 'phpmailer/PHPMailerAutoload.php';

//instancia a objetos
$mail = new PHPMailer();
// mandar via SMTP
$mail->IsSMTP(); 

$mail->Host = "smtp.gmail.com";
//tipo de suguranca
$mail->SMTPSecure = "tsl"; 
// habilita smtp autenticado
$mail->SMTPAuth = true; 
//porta
$mail->Port       = 587;
$mail->SMTPDebug = 0;
// usuário deste servidor smtp
$mail->Username = "naoresponda@homebrasil.com"; 
$mail->Password = "***Hfk48snd"; // senha
//email utilizado para o envio 
//pode ser o mesmo de username


$mail->setFrom = "naoresponda@homebrasil.com";
$mail->FromName = "Contato - Arboreto";

//Enderecos que devem ser enviadas as mensagens
$mail->AddAddress("allan@agenciahauze.com.br","Allan");
$mail->AddAddress("jricardo@construtoracpd.com.br","José Ricardo");
$mail->AddAddress("brazil.helio@gmail.com","brazil helio");

$mail->AddBCC("jajah@realton.com.br","Jajah");
$mail->AddBCC("michelle@realton.com.br","Michelle");


/**/
//wrap seta o tamanhdo do texto por linha
//$mail->WordWrap = 50; 

$mail->IsHTML(true); //enviar em HTML

// recebendo os dados od formulario
if(isset($_POST['nome'])){
	$nome         	= ucwords($_POST['nome']);
	$emai	  		= $_POST['email'];
	$celular	  	= $_POST['celular'];
	$mensagem 	    = utf8_decode($_POST['mensagem']);
	
	
	
    // informando a quem devemos responder 
	//ou seja para o mail inserido no formulario
	//$mail->AddReplyTo("$emai","$nome");
	//criando o codigo html para enviar no email
	//vocepode utilizar qualquer tag html ok
	$msg  = "";
	$msg .= "<b> Nome:</b> $nome</br>\n";
	$msg .= "<b> E-mail:</b> $emai</br>\n";
	$msg .= "<b> Celular:</b> $celular</br>\n";
	$msg .= "<b> Mensagem:</b> $mensagem</br>\n";
		
 }
$mail->Subject = utf8_decode("Contato - Arboreto");
//adicionando o html no corpo do email
$mail->Body = $msg;
// enviando e retornando o status de envio

$enviado = $mail->Send();



if ($enviado){
  echo "E-mail enviado com sucesso!";
}else{
  echo 'Erro do PHPMailer: ' . $mail->ErrorInfo;
}

?>

