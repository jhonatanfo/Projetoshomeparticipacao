<?php 

$nome = utf8_decode($_POST['nome']);
$email = utf8_decode($_POST['email']);

if (!($nome)){
print "nome"; exit();
}

if (!($email)){
print "email"; exit();
}

$data = date("Y-m-d");      

include "conexao.php";

$insert = mysqli_query($conexao,"INSERT INTO cadastro VALUES ('', '".$email."','".$data."','".$nome."')");
	
mysqli_close($conexao);
if($insert) {
	print "Cadastro Realizado!";
}else {
	print "Erro ao Cadastrar!";
}

?>