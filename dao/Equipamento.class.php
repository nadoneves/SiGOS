<?php

class Equipamento{
	
	static function exibirEquipamentos( $key ){
		$query = "select e.*, c.*, count(e.idcliente) as qtd from equipamento e
					right join cliente c on c.idcliente = e.idcliente
						where c.nome like '%$key%' or c.cpf like '%$key%' or c.telefone like '%$key%' or e.marcaequip like '%$key%' or e.modeloequip like '%$key%' or numserie like '%$key%'
							group by e.idcliente
								order by c.nome asc";
		return $query;
	}

	static function consultaCliente( $id ){
		$query = "select * from equipamento where idcliente=$id";
		return $query;
	}
}