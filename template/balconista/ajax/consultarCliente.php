<?php 
session_start();

function __autoload( $classes ) {
	include_once("../../../dao/$classes.class.php");
}

extract( $_GET );


if( !empty( $nome ) ) $key = $nome;
elseif( !empty( $cpf ) ) $key = $cpf;
elseif( !empty( $telefone ) ) $key = $telefone;
elseif( !empty( $celular ) ) $key = $celular;
elseif( !empty( $email ) ) $key = $email;



$sql = new Conexao();
$sql->conecta();

$ok = $sql->consulta ( Cliente::consultaKey( $key ) );


/*
echo "<pre>";
var_dump( $_GET );
echo "</pre>";
*/
if($ok){
	

	while( $l = $sql->resultado() ){
?>
<script>
	$('#retorno').fadeIn(200);
	$('table.resultado tbody tr:odd').css('background','#bbd5e2');
	$('table.resultado tbody tr:even').css('background','#EBF3EB');

	function editar( id ){
		$(window.document.location).attr('href','cliente.php?editar=1&id='+id);
	}
</script>
<table class="resultado">
	<tbody>
		<tr>
			<td class="um"><?=$l['nome']?></td>
			<td class="dois"><?=$l['cpf']?></td>
			<td class="tres">
				<img id="edit" src="../img/b_edit.png" onclick="editar(<?=$l['idcliente']?>)" />
			</td>
		</tr>
	</tbody>
</table>

<?php
	}
}else{
	echo "Erro ao consultar Cliente
			<script>$('#retornoErro').fadeOut(5000);</script>";
}

sleep(1);