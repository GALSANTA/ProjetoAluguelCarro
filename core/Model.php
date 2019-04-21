<?php 
/**
 * Classe Model
 *
 *Esta classe possibilita a conexão com banco de dados 
 *
 *
 *@package AluguelCarros
 *
 *@author Fernando Gabriel M. da Silva <fernando99gabriel@gmail.com>
 */

class Model{
	
	protected $pdo;
	function __construct(){
		global $pdo;
		$this->pdo=$pdo;
	}
}