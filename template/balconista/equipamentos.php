<?php
function __autoload( $class ){
	include_once("../../dao/$class.class.php");
}
include_once("topo.php");

$editar = "";
if($_GET){
	$editar = $_GET['editar'];
	$idcliente = $_GET['idcliente'];
}

if( $editar == ""){
?>
<div id="buscar">
	<input type="text" id="key" />
	<input type="button" id="buscar" value="Buscar" />
</div>

<div id="listaClientes"></div>
<?php } else { ?>

<div id="dadosCliente">
	<?php 
		$sql = new Conexao();
		$sql->conecta();
		$sql->consulta( Cliente::consultaId( $idcliente ) );
		$r = $sql->resultado();
		echo "<hr>";
		echo $r['nome']."<br />";
		echo $r['cpf']."<br />";
		echo $r['telefone']."<br />";
		echo "<hr>";
	?>
</div>
<div id="dadosEquip">
	<?php
		$sql->consulta( Equipamento::consultaCliente( $idcliente ) );
		while( $l = $sql->resultado() ){
			echo $l['marcaequip']." - ";
			echo $l['modeloequip']." - ";
			echo "<br />";
		}	
	?>
</div>

<?php } ?>
<script>
	$(document).ready( function(){
		$("#listaClientes").load("ajax/consultarEquipamento.php");

		$("#buscar").click( function(){
			var key = $("#key").val();
			$("#listaClientes").load("ajax/consultarEquipamento.php?key="+key);
		});
	});
</script>
<?php include_once("rodape.php"); ?>