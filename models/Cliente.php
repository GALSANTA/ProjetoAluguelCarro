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

	public function getCliente($id_cliente){

		$array=array();
		$sql="SELECT * FROM tb_clientes WHERE id_cliente = :id_cliente";
		$sql=$this->pdo->prepare($sql);
		$sql->bindValue(":id_cliente",$id_cliente);
		$sql->execute();

		return $sql->fetch();
	}

	public function getClientes(){

		$sql="SELECT * FROM tb_clientes";
		$sql=$this->pdo->query($sql);

		if ($sql->rowCount()>0) {
			return $sql->fetchAll();
		}
		else{
			return 0;
		}
	}

	public function filtroCliente($filtro,$valor){
		if ($filtro == 0) {

			$sql="SELECT * FROM tb_clientes WHERE nome = :valor";

		}
		if ($filtro == 1) {

			$sql="SELECT * FROM tb_clientes WHERE rg = :valor";
		}
		if ($filtro == 2) {

			$sql="SELECT * FROM tb_clientes WHERE cpf = :valor";
		}


		$sql=$this->pdo->prepare($sql);
		$sql->bindValue(":valor",$valor);
		$sql->execute();



		if ($sql->rowCount()>0) {
			
			return $sql->fetchAll();
		}
		else{
			return 0;
		}
	}

	public function verificarCliente($cpf){

		$sql="SELECT id_cliente FROM tb_clientes WHERE cpf=:cpf";
		$sql=$this->pdo->prepare($sql);
		$sql->bindValue(":cpf",$cpf);
		$sql->execute();

		if ($sql->rowCount()>0) {
			return $sql->fetch();
		}
		else{
			return false;
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

	public function getHistorico($id_cliente){
		$sql ="SELECT * FROM tb_clientes as c
		LEFT JOIN tb_aluguel as a
		ON c.id_cliente= :id_cliente AND a.id_cliente=:id_cliente
		INNER JOIN tb_carros as car
		ON car.id_carro=a.id_carro";
		$sql=$this->pdo->prepare($sql);
		$sql->bindValue(":id_cliente",$id_cliente);
		$sql->execute();

		return $sql->fetchAll();


	}

} 