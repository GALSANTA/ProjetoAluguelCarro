<?php 
/**
 * Classe Cliente
 *
 *Esta classe é responsavel por requisitar ao banco de dados dados referentes a tabela (tb_cliente)
 *
 *
 *@package models
 *
 *@author Fernando Gabriel M. da Silva <fernando99gabriel@gmail.com>
 */
class Cliente extends Model{

 	public function verificarCliente($cpf){

 		$sql="SELECT id_cliente FROM tb_clientes WHERE cpf=:cpf";
		$sql=$this->pdo->prepare($sql);
		$sql->bindValue(":cpf",$cpf);
		$sql->execute();

		if ($sql->rowCount()>0) {
			return $sql->fetch();
		}
		else{
			return 0;
		}


 	}
 	public function cadastrarCliente($nome,$rg,$cpf,$numero1,$numero2){

 		$id_cliente=$this->verificarCliente($cpf);

 		if ($id_cliente>0) {

 			return $id_cliente;
 		}
 		else{

 		
 			$sql="INSERT INTO `tb_clientes`(`nome`, `rg`, `cpf`, `numero1`, `numero2`) VALUES (:nome,:rg,:cpf,:numero1,:numero2)";
 			$sql=$this->pdo->prepare($sql);
 			$sql->bindValue(":nome",$nome);
 			$sql->bindValue(":rg",$rg);
 			$sql->bindValue(":cpf",$cpf);
 			$sql->bindValue(":numero1",$numero1);
 			$sql->bindValue(":numero2",$numero2);
 			$sql->execute();

 			$id_cliente=$this->verificarCliente($cpf);


 			return $id_cliente;
 		}
 	}
 	
 } 