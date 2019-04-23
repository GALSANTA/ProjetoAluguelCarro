<?php 
/**
 * Classe AgendaController
 *
 *Esta classe é responsavel por organizar a pagina de agenda da aplicação
 *
 *
 *@package controllers
 *
 *@author Fernando Gabriel M. da Silva <fernando99gabriel@gmail.com>
 */
class agendaController extends Controller{

	public function index(){

		$dados = array();

		$reserva = new Reserva();
		$carro = new Carro();
		$cliente = new Cliente();

		$data =date('Y-m');



		if (isset($_POST['ano']) && !empty($_POST['ano'])) {
			
			$ano = $_POST['ano'];
			$mes = $_POST['mes'];
			$data = $ano."-".$mes;
		}
		$dia1 = date('w',strtotime($data));
		$dias = date('t',strtotime($data));
		$linhas = ceil(($dias+$dia1)/7);
		$dia1 = -$dia1;
		$data_inicio = date('Y-m-d',strtotime($dia1.' days',strtotime($data)));
		$data_fim = date('Y-m-d',strtotime(($dia1+($linhas*7)-1).' days',strtotime($data)));


		
		$dados['data'] = $data;
		$dados['data_inicio'] = $data_inicio;
		$dados['data_fim'] = $data_fim;
		$dados['linhas'] = $linhas;
		$dados['reservas'] = $reserva->getReservas($data_inicio,$data_fim);

		$this->loadTemplate('agenda',$dados);
	}
	public function add_reserva(){

		$dados = array();


		$reserva = new Reserva();
		$carro = new Carro();
		$cliente = new Cliente();


		$dados['carros'] = $carro->getCarros();


		if (!empty($_POST['carro'])) {

			$carro = addslashes($_POST['carro']);
			$data_inicio = explode("/", addslashes($_POST['data_inicio']));
			$data_fim =explode("/",addslashes($_POST['data_fim']));
			$nome = addslashes($_POST['nome']);
			$rg = addslashes($_POST['rg']);
			$cpf = addslashes($_POST['cpf']);
			$numero1 = addslashes($_POST['numero1']);
			$numero2 = addslashes($_POST['numero2']);



			$data_inicio = $data_inicio[2]."-".$data_inicio[1]."-".$data_inicio[0];
			$data_fim = $data_fim[2]."-".$data_fim[1]."-".$data_fim[0];

			if ($reserva->verificarDisponibilidade($carro,$data_inicio,$data_fim)) {

				$id_cliente = $cliente->cadastrarCliente($nome,$rg,$cpf,$numero1,$numero2);
				$id_cliente = $id_cliente[0];
				$reserva->reservar($carro,$id_cliente,$data_inicio,$data_fim);

				header("Location:index");
			}
			else{
				echo "sem reserva";
				
			}

		}

		$this->loadView('add_reserva',$dados);
	
	}
	public function editar_reserva($id_aluguel){
        $dados = array();

        $reserva = new Reserva();
		$carro = new Carro();

        
        
        $dados['carros'] = $carro->getCarros();
        $dados['reserva'] = $reserva->getReserva($id_aluguel);





		$this->loadTemplate('editar_reserva',$dados);
	}
	public function excluir_reserva($id_aluguel){
		 
		 $reserva = new Reserva();

		 $reserva->excluirReserva($id_aluguel);
		 header("Location:".BASE_URL."agenda/index");
	}
	
	
}