<?php  
require 'environment.php';


$config = array();

if (ENVIRONMENT == "development") {
	define("BASE_URL", "http://localhost/projetox/");
	$config['dbname']="projeto_aluguelcarro";
	$config['host']="localhost";
	$config['dbuser']="root";
	$config['dbpass']="";
}
else{
	define("BASE_URL", "http://localhost/projetox/");
	$config['dbname']="projeto_aluguelcarro";
	$config['host']="localhost";
	$config['dbuser']="root";
	$config['dbpass']="";

}

global $pdo;

try {
	$pdo= new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'],$config['dbuser'],$config['dbpass']);
	
} catch (PDOException $e) {

	echo "ERRO: ".$e->getMessage();

}