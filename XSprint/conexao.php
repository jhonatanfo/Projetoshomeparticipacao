<?php
	$_SG['servidor'] = '208.97.163.231'; 
	$_SG['usuario'] = 'xsprint';
	$_SG['senha'] = 'hb251025'; 
	$_SG['banco'] = 'bdxsprint';  
	
	
	$conexao = mysqli_connect($_SG['servidor'],$_SG['usuario'],$_SG['senha']) or die (mysql_error());
	$banco = mysqli_select_db($conexao, $_SG['banco']);
?>