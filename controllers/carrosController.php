<?php 
/**
 * Classe AgendaController
 *
 *Esta classe é responsavel por organizar a pagina de carro da aplicação
 *
 *
 *@package controllers
 *
 *@author Fernando Gabriel M. da Silva <fernando99gabriel@gmail.com>
 */
class homeController extends Controller{

	
	public function index(){

		$dados = array();

		$carro = new Carro();

		$dados['carros']= $carro->getCarros();


		if (isset($_POST['nomefiltro']) && !empty($_POST['nomefiltro'])) {

			$filtro = $_POST['filtro'];

			if (empty($_POST['nomefiltro'])) {
				$valor="";
			}

			$valor = $_POST['nomefiltro'];
			
			$dados['carros'] = $carro->filtroCarros($filtro,$valor);

		}
		
		$this->loadTemplate('carros',$dados);


	}
	public function add_carro(){
		$dados = array();

		if (isset($_POST['marca']) && !empty($_POST['marca'])) {

			$marca = $_POST['marca'];
			$modelo = $_POST['modelo'];
			$placa = $_POST['placa'];
			$valor = $_POST['valor'];


			if (empty($modelo) OR empty($placa)) {
				
				header("Location:index");
			}
			$carro = new Carro();
			$carro->addCarro($marca,$modelo,$placa,$valor);
			header("Location:index");
			
		}
		$this->loadTemplate('add_carro',$dados);
	}
	public function editar($id_carro){
		$dados = array();
		$carro = new Carro();

        $dados['carro']=$carro->getCarro($id_carro);

		if (isset($_POST['marca']) && !empty($_POST['marca'])) {
			
            $marca = $_POST['marca'];
			$modelo = $_POST['modelo'];
			$placa = $_POST['placa'];
			$valor = $_POST['valor'];

           
			$carro->editarCarro($id_carro,$marca,$modelo,$placa,$valor);
			header("Location:".BASE_URL."carros/index");

		}

		$this->loadTemplate('editar_carro',$dados);

	}
	public function excluir($id_carro){
		$carro = new Carro();

		$carro->excluirCarro($id_carro);
		header("Location:".BASE_URL."carros/index");
	}

	
	
}