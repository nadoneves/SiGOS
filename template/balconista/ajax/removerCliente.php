<?php 
session_start();

function __autoload( $classes ) {
	include_once("../../../dao/$classes.class.php");
}

extract( $_GET );


$sql = new Conexao();
$sql->conecta();

$ok = $sql->consulta ( Cliente::removerId( $idcliente ) );

/*
echo "<pre>";
var_dump( $_GET );
echo "</pre>";
*/

// Criar rotina para verificar se o cliente tem equipamentos ou OSs antes de deletar

if($ok){
	echo "*Removido com sucesso
		<script>
			$(window.document.location).attr('href','cliente.php');
		</script>";
}else{
	echo "Erro ao remover Cliente
			<script>$('#retornoErro').fadeOut(5000);</script>";
}

sleep(1);