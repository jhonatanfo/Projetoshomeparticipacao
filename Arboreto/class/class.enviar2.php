<?php
include("PHPMailer4/class/class.phpmailer.php");

//instancia objeto
$mail = new PHPMailer();
$mail->CharSet  = "UTF-8"; 
$phpmailer->CharSet  = "UTF-8"; 
// mandar via SMTP
$mail->IsSMTP(); 
// Seu servidor smtp
$mail->Host = "smtp.gmail.com";
//tipo de suguranca
$mail->SMTPSecure = "ssl"; 
// habilita smtp autenticado
$mail->SMTPAuth = true; 
//porta
$mail->Port       = 465;
// usuário deste servidor smtp
$mail->Username = "formulario@awdigital.com.br"; 
$mail->Password = "agenciaaw2020"; // senha

//email utilizado para o envio 
//pode ser o mesmo de username
$mail->From = "formulario@awdigital.com.br";
$mail->FromName = utf8_decode("Feirão Caixa Imóveis Campinas 2015 - Parque das Flores");

//Enderecos que devem ser enviadas as mensagens

$mail->AddAddress("tobias.bremer@hausbau.com.br","Tobias");
$mail->AddAddress("fernanda.flauzino@hausbau.com.br","Fernanda");
$mail->AddAddress("natalia.felicio@hausbau.com.br","Natalia");
$mail->AddAddress("arthur@awdigital.com.br");
// $mail->AddAddress("thiago.lino@awdigital.com.br","Thiago");

//wrap seta o tamanhdo do texto por linha
$mail->WordWrap = 50; 
//anexando arquivos no email
//$mail->AddAttachment("anexo/arquivo.zip"); 
//$mail->AddAttachment("imagem/foto.jpg");
$mail->IsHTML(true); //enviar em HTML

// recebendo os dados od formulario
if(isset($_POST['nome'])){
	$nome         	= ucwords($_POST['nome']);
	$emai	  		= $_POST['email'];
	$celular 	    = $_POST['celular'];
	$mensagem 	    = utf8_decode($_POST['mensagem']);
	
	
	
    // informando a quem devemos responder 
	//ou seja para o mail inserido no formulario
	$mail->AddReplyTo("$emai","$nome");
	//criando o codigo html para enviar no email
	//vocepode utilizar qualquer tag html ok
	$msg  = "";
	$msg .= "<b> Feir&atilde;o Caixa Im&oacute;veis Campinas 2015 - Parque das Flores</b><br>\n\n";
	$msg .= "<b> Nome:</b> $nome<br>\n";
	$msg .= "<b> E-mail:</b> $emai<br>\n";
	$msg .= "<b> Telefone/Celular:</b> $celular<br>\n";
	$msg .= "<b> Mensagem:</b> $mensagem<br>\n";
		
 }
 
$mail->Subject = utf8_decode("Feirão Caixa Imóveis Campinas 2015 - Parque das Flores");

//adicionando o html no corpo do email
$mail->Body = $msg;
//enviando e retornando o status de envio
if(!$mail->Send())
{
//echo "<P>Houve um erro ao  enviar o email! </P> ".$mail->ErrorInfo;
//echo "<script>alert(\"Houve um erro ao enviar a mensagem, tente novamente!\")
echo $mail->ErrorInfo; //informa onde ocorreu o erro 
exit;

}else {
	echo "<script>location.href='http://www.parquedasfloressumare.com.br/feirao-da-caixa/obrigado.html';</script>";
}
?>

