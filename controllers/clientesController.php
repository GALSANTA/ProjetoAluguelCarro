<?php 
/**
 * Classe HomeController
 *
 *Esta classe é responsavel por organizar a pagina de Cliente da aplicação
 *
 *
 *@package controllers
 *
 *@author Fernando Gabriel M. da Silva <fernando99gabriel@gmail.com>
 */
class clientesController extends Controller{

	public function index(){

		$dados = array();
		$cliente = new Cliente();

		$dados['clientes'] = $cliente->getClientes();

		if (isset($_POST['filtro'])) {
			
			$filtro = $_POST['filtro'];
			$valor = $_POST['nomefiltro'];

			if (empty($_POST['nomefiltro'])) {
				$valor="";
			}
            if ($cliente->getCliente($filtro,$valor)) {

            	$dados['clientes'] = $cliente->getCliente($filtro,$valor);
            }else{
            	echo "Não há clientes";
            }

		}

		$this->loadTemplate('clientes',$dados);
	}

	
}