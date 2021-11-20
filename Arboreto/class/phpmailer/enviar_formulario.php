<?php 
$nome       = $_POST['name'];
$input      = $_POST['email'];
$telefone   = $_POST['phone'];
$mensagem   = $_POST['message'];

function validaEmail($email) {
$conta = "^[a-zA-Z0-9\._-]+@";
$domino = "[a-zA-Z0-9\._-]+.";
$extensao = "([a-zA-Z]{2,4})$";

$pattern = $conta.$domino.$extensao;

if (ereg($pattern, $email))
return true;
else
return false;
}


if (!($nome)){
	print "nome"; exit();
	}
	

if (!($input)){
	print "email"; exit();
	}

	
if (!($telefone)){
	print "telefone"; exit();
	}
	
	
if (!($mensagem)){
	print "mensagem"; exit();
	}


date_default_timezone_set('Etc/UTC');

require 'PHPMailerAutoload.php';


$res_admin = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>Arquipélago Condominium Club - Contato Site</title>
</head>
<body>
<table border='0' cellpadding='0' cellspacing='0'>
  <tr>
    <td><img src='http://www.arquipelagocondominioclub.com.br/homologacao/assets/images/logo.jpg' style='margin:0; padding: 0;  display: block; border: 0; '/></td>
  </tr>
  <tr>
    <td style='font-family:Arial; color: #9F0000; font-size: 14px;'>
    <p>Nome:<b> $nome</b></p>
<br />
<p>Email:<b> $input</b></p>
<br />
<p>Telefone:<b>$telefone</b></p>
<br />
<p>Mensagem: <b>$mensagem</b></p>
    </td>
  </tr>
</table>



</body>
</html>
";



$res= "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>Arquipélago Condominium Club</title>
</head>

<body>
<table width='200' border='0' cellpadding='0' cellspacing='0'>
  <tr>
    <td><img src='http://www.arquipelagocondominioclub.com.br/homologacao/assets/images/logo.jpg' style='margin:0; padding: 0;  display: block; border: 0; '/></td>
  </tr>
  <tr>
    <td height='190' align='center' style='font-family:Arial; color: #9F0000; font-size: 20px;'><strong>Obrigado pelo contato</strong> em breve nossa equipe de <br />
    atendimento retorna.</td>
  </tr>
</table>
</body>
</html>
";


//Create a new PHPMailer instance
$mail = new PHPMailer;

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;

//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "naoresponda@homebrasil.com";

//Password to use for SMTP authentication
$mail->Password = "home1010";

//Set who the message is to be sent from
$mail->setFrom('naoresponda@homebrasil.com', 'Homebrasil');

//Set an alternative reply-to address
//$mail->addReplyTo('replyto@example.com', 'First Last');

//Set who the message is to be sent to
//$mail->addAddress('oliveira@homebrasil.com');

$mail->addAddress('andre@incorporadorapv.com.br');
$mail->addCC('oliveira@homebrasil.com');
$mail->addAddress('allan@homebrasil.com');

//Set the subject line
$mail->Subject = 'Arquipélago Condominium Club - Contato';

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML(utf8_decode($res_admin));
$mail->isHTML(TRUE);
//Replace the plain text body with one created manually
//$mail->AltBody = 'This is a plain-text message body';

//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    print "Error: " . $mail->ErrorInfo;
} else {
    print "Mensagem enviada com sucesso!";
}


?>
