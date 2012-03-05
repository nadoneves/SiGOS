<?php
function __autoload( $class ){
	include_once("../../dao/$class.class.php");
}

include_once("topo.php");
include_once("../function/formataData.php");


$editar = "";

if($_GET){
	$editar = $_GET['editar'];
	$idcliente = $_GET['id'];
}

if( $editar == "" ){
?>

<form id="form1">
<div id="column1">
<table>
	<tr>
		<td>Nome</td>
		<td>
			<input type="text" name="nome" id="nome" />
		</td>
	</tr>
	<tr>
		<td>Identidade</td>
		<td>
			<input type="text" name="identidade" id="identidade" />
		</td>
	</tr>
	<tr>
		<td>Orgão Expedidor</td>
		<td>
			<input type="text" name="orgaoexpedidor" id="orgaoexpedidor" />
		</td>
	</tr>
	<tr>
		<td>CPF</td>
		<td>
			<input type="text" name="cpf" id="cpf" />
		</td>
	</tr>
	<tr>
		<td>Nascimento</td>
		<td>
			<input type="text" name="nascimento" id="nascimento"
				style="width:150px !important;
					   margin-right: 5px!important" readonly />
		</td>
	</tr>
	</table>
	</div>

	<div id="column2">
<table>
	<tr>
		<td>Telefone</td>
		<td>
			<input type="text" name="telefone" id="telefone" />
		</td>
	</tr>
	<tr>
		<td>Celular</td>
		<td>
			<input type="text" name="celular" id="celular" />
		</td>
	</tr>
	<tr>
		<td>E-mail</td>
		<td>
			<input type="text" name="email" id="email" />
		</td>
	</tr>
	<tr>
		<td>CEP</td>
		<td>
			<input type="text" name="cep" id="cep" />
		</td>
	</tr>
	<tr>
		<td>Logradouro</td>
		<td>
			<input type="text" name="logradouro" id="logradouro" />
		</td>
	</tr>
	</table>
</div>

	<div id="column3">
<table>
	<tr>
		<td>Número</td>
		<td>
			<input type="text" name="numero" id="numero" />
		</td>
	</tr>
	<tr>
		<td>Complemento</td>
		<td>
			<input type="text" name="complemento" id="complemento" />
		</td>
	</tr>
	<tr>
		<td>Bairro</td>
		<td>
			<input type="text" name="bairro" id="bairro" />
		</td>
	</tr>
	<tr>
		<td>Cidade</td>
		<td>
			<input type="text" name="cidade" id="cidade" />
		</td>
	</tr>
	<tr>
		<td>Estado</td>
		<td>
			<select name="uf" id="uf">
				<option  value="" selected>-- Estado</option>
				<?php
					$uf = new Conexao();
					$uf->conecta();
					$uf->consulta( Uf::exibirUf() );
					while( $r = $uf->resultado() ){
				?>
				<option  value="<?=$r['estado']?>"><?=$r['estado']?></option>
				<?php } ?>
			</select>
		</td>
	</tr>
</table>
</div>

<div id="lineButton">
	<input type="button" id="cadastrar" value="Cadastrar" />
	<input type="button" id="consultar" value="Consultar" />
	<input type="reset" value="Limpar" />
</div>
</form>
<?php }else{

$sql = new Conexao();
$sql->conecta();
$sql->consulta( Cliente::consultaId( $idcliente ) );
$l = $sql->resultado();

?>
<form id="form2">
<div id="column1">
	<input type="hidden" name="idcliente" id="idcliente" value="<?=$l['idcliente']?>" />
<table>
	<tr>
		<td>Nome</td>
		<td>
			<input type="text" name="nome" id="nome" value="<?=$l['nome']?>" />
		</td>
	</tr>
	<tr>
		<td>Identidade</td>
		<td>
			<input type="text" name="identidade" id="identidade" value="<?=$l['identidade']?>" />
		</td>
	</tr>
	<tr>
		<td>Orgão Expedidor</td>
		<td>
			<input type="text" name="orgaoexpedidor" id="orgaoexpedidor" value="<?=$l['orgaoexpedidor']?>" />
		</td>
	</tr>
	<tr>
		<td>CPF</td>
		<td>
			<input type="text" name="cpf" id="cpf" value="<?=$l['cpf']?>" />
		</td>
	</tr>
	<tr>
		<td>Nascimento</td>
		<td>
			<input type="text" name="nascimento" id="nascimento"
				style="width:150px !important;
					   margin-right: 5px!important" readonly value="<?=data_dmy($l['nascimento'])?>" />
		</td>
	</tr>
	</table>
	</div>

	<div id="column2">
<table>
	<tr>
		<td>Telefone</td>
		<td>
			<input type="text" name="telefone" id="telefone" value="<?=$l['telefone']?>" />
		</td>
	</tr>
	<tr>
		<td>Celular</td>
		<td>
			<input type="text" name="celular" id="celular" value="<?=$l['celular']?>" />
		</td>
	</tr>
	<tr>
		<td>E-mail</td>
		<td>
			<input type="text" name="email" id="email" value="<?=$l['email']?>" />
		</td>
	</tr>
	<tr>
		<td>CEP</td>
		<td>
			<input type="text" name="cep" id="cep" value="<?=$l['cep']?>" />
		</td>
	</tr>
	<tr>
		<td>Logradouro</td>
		<td>
			<input type="text" name="logradouro" id="logradouro" value="<?=$l['logradouro']?>" />
		</td>
	</tr>
	</table>
</div>

	<div id="column3">
<table>
	<tr>
		<td>Número</td>
		<td>
			<input type="text" name="numero" id="numero" value="<?=$l['numero']?>" />
		</td>
	</tr>
	<tr>
		<td>Complemento</td>
		<td>
			<input type="text" name="complemento" id="complemento" value="<?=$l['complemento']?>" />
		</td>
	</tr>
	<tr>
		<td>Bairro</td>
		<td>
			<input type="text" name="bairro" id="bairro" value="<?=$l['bairro']?>" />
		</td>
	</tr>
	<tr>
		<td>Cidade</td>
		<td>
			<input type="text" name="cidade" id="cidade" value="<?=$l['cidade']?>" />
		</td>
	</tr>
	<tr>
		<td>Estado</td>
		<td>
			<select name="uf" id="uf">
				<option  value="<?=$l['uf']?>" selected><?=$l['uf']?></option>
				<option  value="">------</option>
				<?php
					$uf = new Conexao();
					$uf->conecta();
					$uf->consulta( Uf::exibirUf() );
					while( $r = $uf->resultado() ){
				?>
				<option  value="<?=$r['estado']?>"><?=$r['estado']?></option>
				<?php } ?>
			</select>
		</td>
	</tr>
</table>
</div>

<div id="lineButton">
	<input type="button" id="editar" value="Editar" />
	<input type="button" id="cancelar" value="Cancelar" />
	<input type="button" id="remover" value="Remover" />
</div>
</form>
<?php } ?>

<div id="retornoErro"></div>
<div id="retorno"></div>

<script type="text/javascript" src="/sigos/template/js/jquery.maskedinput.js"></script>
 <script>
    $(document).ready( function(){      
	    $("#cadastrar").click( function(){
	        var nome = $("#form1 #nome").val();
	        var identidade = $("#form1 #identidade").val();
	        var orgaoexpedidor = $("#form1 #orgaoexpedidor").val();
	        var cpf = $("#form1 #cpf").val();
	        var nascimento = $("#form1 #nascimento").val();
	        var telefone = $("#form1 #telefone").val();
	        var celular = $("#form1 #celular").val();
	        var cep = $("#form1 #cep").val();
	        var logradouro = $("#form1 #logradouro").val();
	        var numero = $("#form1 #numero").val();
	        var complemento = $("#form1 #complemento").val();
	        var bairro = $("#form1 #bairro").val();
	        var cidade = $("#form1 #cidade").val();
	        var uf = $("#form1 #uf").val();
	        var email = $("#form1 #email").val();

	        $.ajax({
	            type: "GET",
	            url: "ajax/novoCliente.php",
	            data: "nome="+nome+
	                  "&identidade="+identidade+
	                  "&orgaoexpedidor="+orgaoexpedidor+
	                  "&cpf="+cpf+
	                  "&nascimento="+nascimento+
	                  "&telefone="+telefone+
	                  "&celular="+celular+
	                  "&cep="+cep+
	                  "&logradouro="+logradouro+
	                  "&numero="+numero+
	                  "&complemento="+complemento+
	                  "&bairro="+bairro+
	                  "&cidade="+cidade+
	                  "&uf="+uf+
	                  "&email="+email,  
	            beforeSend: function(){
	                $('#retornoErro').fadeIn(200);
	                $("#retornoErro").text('Carregando...');
	            },
	            success: function(html){ 
	                    $('#retornoErro').html(html);
	            }
	        });
	    });

	    $("#consultar").click( function(){
	        var nome = $("#nome").val();
	        var cpf = $("#cpf").val();
	        var telefone = $("#telefone").val();
	        var celular = $("#celular").val();
	        var email = $("#email").val();

	        $.ajax({
	            type: "GET",
	            url: "ajax/consultarCliente.php",
	            data: "nome="+nome+
	                  "&cpf="+cpf+
	                  "&telefone="+telefone+
	                  "&celular="+celular+
	                  "&email="+email,  
	            beforeSend: function(){
	                $('#retornoErro').fadeIn(200);
	                $("#retornoErro").text('Carregando...');
	            },
	            success: function(html){ 
	            		$('#retornoErro').fadeOut(5000);
	                    $('#retorno').html(html);
	            }
	        });
	    });

	    $("#editar").click( function(){
	    	var idcliente = $("#form2 #idcliente").val();
	    	var nome = $("#form2 #nome").val();
	        var identidade = $("#form2 #identidade").val();
	        var orgaoexpedidor = $("#form2 #orgaoexpedidor").val();
	        var cpf = $("#form2 #cpf").val();
	        var nascimento = $("#form2 #nascimento").val();
	        var telefone = $("#form2 #telefone").val();
	        var celular = $("#form2 #celular").val();
	        var cep = $("#form2 #cep").val();
	        var logradouro = $("#form2 #logradouro").val();
	        var numero = $("#form2 #numero").val();
	        var complemento = $("#form2 #complemento").val();
	        var bairro = $("#form2 #bairro").val();
	        var cidade = $("#form2 #cidade").val();
	        var uf = $("#form2 #uf").val();
	        var email = $("#form2 #email").val();

	        $.ajax({
	            type: "GET",
	            url: "ajax/editarCliente.php",
	            data: "idcliente="+idcliente+
	            	  "&nome="+nome+
	                  "&identidade="+identidade+
	                  "&orgaoexpedidor="+orgaoexpedidor+
	                  "&cpf="+cpf+
	                  "&nascimento="+nascimento+
	                  "&telefone="+telefone+
	                  "&celular="+celular+
	                  "&cep="+cep+
	                  "&logradouro="+logradouro+
	                  "&numero="+numero+
	                  "&complemento="+complemento+
	                  "&bairro="+bairro+
	                  "&cidade="+cidade+
	                  "&uf="+uf+
	                  "&email="+email,  
	            beforeSend: function(){
	                $('#retornoErro').fadeIn(200);
	                $("#retornoErro").text('Carregando...');
	            },
	            success: function(html){ 
	                    $('#retornoErro').html(html);
	            }
	        });
	    });

	    $("#remover").click(function(){
	    	var idcliente = $("#form2 #idcliente").val();
	    	var nome = $("#form2 #nome").val();
	    	if( confirm('Deseja remover o Cliente '+nome+' da base de dados?') ){
					$.ajax({
						type: "GET",
						url: "ajax/removerCliente.php",
						data: "idcliente="+idcliente,
						beforeSend: function(){
				                $('#retornoErro').fadeIn(200);
				                $("#retornoErro").text('Carregando...');
				            },
			            success: function(html){ 
			                    $('#retornoErro').html(html);
			            }
					});
			}
		});

	    $("#cancelar").click( function(){
	    	$(window.document.location).attr('href','cliente.php');
	    });

	   	$("#nome").click(function(){
	        $('#nome').css('background','#fff');
	        $('#nome').css('border','');
	    });
	    $("#identidade").click(function(){
	        $('#identidade').css('background','#fff');
	        $('#identidade').css('border','');
	    });
	    $("#orgaoexpedidor").click(function(){
	        $('#orgaoexpedidor').css('background','#fff');
	        $('#orgaoexpedidor').css('border','');
	    });
	    $("#cpf").click(function(){
	        $('#cpf').css('background','#fff');
	        $('#cpf').css('border','');
	    });
	    $("#nascimento").click(function(){
	        $('#nascimento').css('background','#fff');
	        $('#nascimento').css('border','');
	    });
	    $("#telefone").click(function(){
	        $('#telefone').css('background','#fff');
	        $('#telefone').css('border','');
	    });
	    $("#celular").click(function(){
	        $('#celular').css('background','#fff');
	        $('#celular').css('border','');
	    });
	    $("#email").click(function(){
	        $('#email').css('background','#fff');
	        $('#email').css('border','');
	    });
	    $("#cep").click(function(){
	        $('#cep').css('background','#fff');
	        $('#cep').css('border','');
	    });
	    $("#logradouro").click(function(){
	        $('#logradouro').css('background','#fff');
	        $('#logradouro').css('border','');
	    });
	    $("#numero").click(function(){
	        $('#numero').css('background','#fff');
	        $('#numero').css('border','');
	    });
	    $("#complemento").click(function(){
	        $('#complemento').css('background','#fff');
	        $('#complemento').css('border','');
	    });
	    $("#bairro").click(function(){
	        $('#bairro').css('background','#fff');
	        $('#bairro').css('border','');
	    });
	    $("#cidade").click(function(){
	        $('#cidade').css('background','#fff');
	        $('#cidade').css('border','');
	    });
	    $("#uf").click(function(){
	        $('#uf').css('background','#fff');
	        $('#uf').css('border','');
	    });

	    $('#cpf').mask("999.999.999-99");
	    $('#cep').mask("99999-999");
	    $('#telefone').mask("(99)9999-9999");
	    $('#celular').mask("(99)9999-9999");

	    $("#nascimento").datepicker({
	            showOn: "button",
	            buttonImage: "../img/b_calendar.png",
	            buttonImageOnly: true
	    });
	});
</script>


<?php
include_once("rodape.php");
?>
