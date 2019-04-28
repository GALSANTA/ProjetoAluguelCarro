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
            if ($cliente->filtroCliente($filtro,$valor)) {

            	$dados['clientes'] = $cliente->filtroCliente($filtro,$valor);
            }else{
            	echo "Não há clientes";
            }

		}

		$this->loadTemplate('clientes',$dados);
	}
	public function historico($id_cliente){
		$dados = array();

		$cliente = new Cliente();

		$dados['cliente'] = $cliente->getCliente($id_cliente);
		$dados['historico'] = $cliente->getHistorico($id_cliente); 

		$this->loadTemplate('historico',$dados);
	}

	
}