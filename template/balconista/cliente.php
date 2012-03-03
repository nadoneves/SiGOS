<?php
include_once("topo.php");
?>
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
			<input type="text" name="nascimento" id="nascimento" />
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
			<input type="text" name="logradouro" id="logradoure" />
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
			</select>
		</td>
	</tr>
</table>
</div>

<div id="lineButton">
	<input type="submit" id="cadastrar" value="Cadastrar" />
	<input type="submit" id="consultar" value="Consultar" />
	<input type="submit" id="editar" value="Editar" />
	<input type="submit" id="remover" value="Remover" />
</div>

<div id="retorno"></div>

<script>
	$(document).ready( function(){
		
		$("#cadastrar").click( function(){
			var nome = $("#nome").val();

			$.ajax({
				type: "GET",
				url: "ajax/novoCliente.php",
				data: "nome="+nome,
				beforeSend: function(){
					$('#retorno').fadeIn(200);
					$("#retorno").text('Carregando...');
				},
				success: function(html){ 
	  					$('#retorno').html(html);
	  			}
	 		});
		});

	});
</script>

<?php
include_once("rodape.php");
?>
