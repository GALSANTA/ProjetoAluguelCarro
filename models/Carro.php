<?php 
/**
 * Classe Carro
 *
 *Esta classe é responsavel por requisitar ao banco de dados dados referentes a tabela (tb_carros)
 *
 *
 *@package models
 *
 *@author Fernando Gabriel M. da Silva <fernando99gabriel@gmail.com>
 */
class Carro extends Model{

 	/*private $marca;
 	private $modelo;
 	private $placa;*/

 	//gets and sets

 	/*public function getMarca(){
 		return $marca;
 	}
 	public function setMarca($marca){
 		$this->marca = $marca;
 	}
 	public function getModelo(){
 		return $modelo;
 	}
 	public function setModelo($modelo){
 		$this->modelo = $modelo;
 	}
 	public function getPlaca(){
 		return $placa;
 	}
 	public function setPlaca($placa){
 		$this->placa = $placa;
 	}*/

 	//funções que se conectam com a tablela

 	public function getCarro($id_carro){

 		$sql="SELECT * FROM tb_carros WHERE id_carro=:id_carro";
 		$sql=$this->pdo->prepare($sql);
 		$sql->bindValue(":id_carro",$id_carro);

 		$sql->execute();
 		

 		$array=array();

 		if ($sql->rowCount()>0) {

 			$array = $sql->fetch();
 			
 		}
 		return $array;

 	}

 	public function getCarros(){

 		$sql="SELECT * FROM tb_carros";

 		$sql=$this->pdo->query($sql);

 		$array=array();

 		if ($sql->rowCount()>0) {

 			$array = $sql->fetchAll();
 			
 		}
 		return $array;

 	}
 	public function filtroCarros($filtro,$valor){

 		if ($filtro == 0) {

 			$sql="SELECT * FROM tb_carros WHERE placa = :valor";

 		}
 		if ($filtro == 1) {
 			
 			$sql="SELECT * FROM tb_carros WHERE marca = :valor";
 		}
 		if ($filtro == 2) {
 			
 			$sql="SELECT * FROM tb_carros WHERE modelo = :valor";
 		}

 		$array=array();

 		$sql=$this->pdo->prepare($sql);

 		$sql->bindValue(":valor",$valor);

 		$sql->execute();
 		

 		if ($sql->rowCount()>0) {
 			
 			$array = $sql->fetchAll();
 		}
 		return $array;

 	}
 	public function addCarro($marca,$modelo,$placa,$valor){

 		$sql="INSERT INTO `tb_carros`(`marca`, `modelo`, `placa`,`valor`) VALUES (:marca,:modelo,:placa,:valor)";
 		$sql=$this->pdo->prepare($sql);
 		$sql->bindValue(":marca",$marca);
 		$sql->bindValue(":modelo",$modelo);
 		$sql->bindValue(":placa",$placa);
 		$sql->bindValue(":valor",$valor);

 		$sql->execute();

 	}

 	public function excluirCarro($id_carro){

 		$sql = "DELETE FROM tb_carros WHERE id_carro = :id_carro";
 		$sql=$this->pdo->prepare($sql);
 		$sql->bindValue(":id_carro",$id_carro);
 		$sql->execute();


 	}
 	public function editarCarro($id_carro,$marca,$modelo,$placa,$valor){

 		$sql="UPDATE `tb_carros` SET `marca`=:marca,`modelo`=:modelo,`placa`=:placa,`valor`=:valor WHERE id_carro =:id_carro";
 		$sql=$this->pdo->prepare($sql);
 		$sql->bindValue(":id_carro",$id_carro);
 		$sql->bindValue(":marca",$marca);
 		$sql->bindValue(":modelo",$modelo);
 		$sql->bindValue(":placa",$placa);
 		$sql->bindValue(":valor",$valor);

 		$sql->execute();

 	}
 	public function inserirIndisponibilidade($id_carro){
		$sql="UPDATE `tb_carros` SET `status`=1 WHERE id_carro=:id_carro";
		$sql=$this->pdo->prepare($sql);
		$sql->bindValue(":id_carro",$id_carro);
		$sql->execute();
	}
	 	public function inserirDisponibilidade($id_carro){
		$sql="UPDATE `tb_carros` SET `status`=0 WHERE id_carro=:id_carro";
		$sql=$this->pdo->prepare($sql);
		$sql->bindValue(":id_carro",$id_carro);
		$sql->execute();
	}
 	public function getDisponiveis(){

		$sql="SELECT COUNT(id_carro) FROM `tb_carros` WHERE status = 0";
 		$sql=$this->pdo->query($sql);

		if ($sql->rowCount()>0) {
			
			$valor = $sql->fetch();

		}
		return $valor;

	}
	public function getAlugados(){

		$sql="SELECT COUNT(id_carro) FROM `tb_carros` WHERE status = 1";
 		$sql=$this->pdo->query($sql);

		if ($sql->rowCount()>0) {
			$valor = $sql->fetch();

		}
		return $valor;
	}






 	
 	
 } 