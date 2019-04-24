<?php 
/**
 * Classe HomeController
 *
 *Esta classe é responsavel por organizar a pagina de home da aplicação
 *
 *
 *@package controllers
 *
 *@author Fernando Gabriel M. da Silva <fernando99gabriel@gmail.com>
 */
class homeController extends Controller{

	public function index(){

		$reserva = new Reserva();
		$carro = new Carro();
		$dados = array();
		$data =date('Y-m-d');

		$reserva->verificarIndisponibilidade($data);
		$reserva->verificarDisponibilidade($data);

		$dados['disponiveis']=$carro->getDisponiveis();
		$dados['alugados']=$carro->getAlugados();
	

		$this->loadTemplate('home',$dados);		
	}
	
	public function busca_rapida(){
		$dados = array();

		if (isset($_POST['filtro'])) {

			$filtro = $_POST['filtro'];
			

		}
		$this->loadTemplate('busca_rapida',$dados);
	}
	
	
}