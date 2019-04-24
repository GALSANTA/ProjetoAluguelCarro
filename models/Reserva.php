<?php  
/**
 * Classe Reserva
 *
 *Esta classe é responsavel por requisitar ao banco de dados dados referentes a tabela (tb_aluguel)
 *
 *
 *@package models
 *
 *@author Fernando Gabriel M. da Silva <fernando99gabriel@gmail.com>
 */
class Reserva extends Model{


	public function getReservas($data_inicio,$data_fim){
		$array = array();
		
		$sql ="
		SELECT *
		FROM `tb_aluguel`
		join tb_carros ON tb_carros.id_carro=tb_aluguel.id_carro
		join tb_clientes ON tb_clientes.id_cliente=tb_aluguel.id_cliente
		WHERE ( NOT (data_inicio>:data_fim OR data_fim<:data_inicio) )";
		$sql=$this->pdo->prepare($sql);
		$sql->bindValue(":data_inicio",$data_inicio);
		$sql->bindValue(":data_fim",$data_fim);
		$sql->execute();


		if ($sql->rowCount()>0) {
			$array =$sql->fetchAll();
		}

		return $array;
	}
	public function getReserva($id_aluguel){

		$sql="SELECT *
		FROM tb_aluguel
		JOIN tb_clientes ON tb_clientes.id_cliente=tb_aluguel.id_cliente
		WHERE id_aluguel = :id_aluguel";
		$sql=$this->pdo->prepare($sql);
		$sql->bindValue(":id_aluguel",$id_aluguel);
		$sql->execute();

		$array=array();

		if ($sql->rowCount()>0) {

			$array = $sql->fetch();

		}
		return $array;

	}
	public function verificarIndisponibilidade($data){
		
		$valor = array();

		$sql="SELECT id_carro FROM `tb_aluguel` WHERE data_inicio<=:data AND data_fim>=:data";
		$sql=$this->pdo->prepare($sql);
		$sql->bindValue(":data",$data);
		$sql->execute();

		if ($sql->rowCount()>0) {

			$carro = new Carro();

			$valor = $sql->fetchAll();
			
			for ($i=0; $i < sizeof($valor); $i++) { 
				$carro->inserirIndisponibilidade($valor[0]['id_carro']);
			}
		}

	}
	public function verificarDisponibilidade($data){
		
		$valor = array();

		$sql="SELECT id_carro FROM `tb_aluguel` WHERE NOT(data_inicio<=:data AND data_fim>=:data)";
		$sql=$this->pdo->prepare($sql);
		$sql->bindValue(":data",$data);
		$sql->execute();

		if ($sql->rowCount()>0) {

			$carro = new Carro();

			$valor = $sql->fetchAll();
			
			for ($i=0; $i < sizeof($valor); $i++) { 
				$carro->inserirDisponibilidade($valor[0]['id_carro']);
			}
		}

	}
	public function verificarCarroDisponibilidade($carro,$data_inicio,$data_fim){

		$sql="
		SELECT * 
		FROM tb_aluguel
		WHERE id_carro = :carro
		AND (data_inicio>:data_fim
		OR data_fim<:data_inicio)";
		$sql=$this->pdo->prepare($sql);
		$sql->bindValue(":carro",$carro);
		$sql->bindValue(":data_inicio",$data_inicio);
		$sql->bindValue(":data_fim",$data_fim);
		$sql->execute();

		if ($sql->rowCount()>0) {
			return FALSE;
		}
		else{
			return TRUE;
		}



	}
	public function reservar($carro,$id_cliente,$data_inicio,$data_fim){

		$sql="INSERT INTO `tb_aluguel`(`id_cliente`, `id_carro`, `data_inicio`, `data_fim`) VALUES (:id_cliente,:id_carro,:data_inicio,:data_fim)";
		$sql=$this->pdo->prepare($sql);
		$sql->bindValue(":id_cliente",$id_cliente);
		$sql->bindValue(":id_carro",$carro);
		$sql->bindValue(":data_inicio",$data_inicio);
		$sql->bindValue(":data_fim",$data_fim);
		$sql->execute();

	}
	public function excluirReserva($id_aluguel){
		$sql = "DELETE FROM tb_aluguel WHERE id_aluguel = :id_aluguel";
		$sql=$this->pdo->prepare($sql);
		$sql->bindValue(":id_aluguel",$id_aluguel);
		$sql->execute();
	}





	
	
}