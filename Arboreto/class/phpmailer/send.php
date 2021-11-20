<?php

//error_reporting(E_ALL);
//error_reporting(E_STRICT);

date_default_timezone_set('America/Sao_Paulo');

require_once('class.phpmailer.php');
include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

$mail             = new PHPMailer();

$body             = "Nome: " . $_REQUEST['name'] . "<br/>" . "E-mail: " . $_REQUEST['email'] . "<br/>" . "Telefone: " . $_REQUEST['phone'] . "<br/>" . "Mensagem: " . $_REQUEST['message']; 
//$body             = eregi_replace("[\]",'',$body);
$mail->CharSet = 'UTF-8';
$mail->IsSMTP(); // telling the class to use SMTP
                                           // 1 = errors and messages
$mail->SMTPDebug  = 2;                                           // 2 = messages only
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
$mail->Port       = 465;                   // set the SMTP port for the GMAIL server
$mail->Username   = "mtk@homebrasil.com";  // GMAIL username
$mail->Password   = "home1010";            // GMAIL password

$mail->FromName = $_REQUEST['nome'];
$mail->From = $_REQUEST['email'];

$mail->AddReplyTo($_REQUEST['email'],$_REQUEST['nome']);

$mail->Subject    = "Contato do Hotsite - Barra Park";

$mail->MsgHTML($body);

$address = "allan@homebrasil.com";
$mail->AddAddress($address, "Hotsite - Barra Park");

if(!$mail->Send()) {
	http_response_code(500);;
}

?>