<?php 
/**
 * Classe Core
 *
 *Esta classe possui o metodo index que vai devidir a URL e redirecionar
 *
 *
 *@package AluguelCarros
 *
 *@author Fernando Gabriel M. da Silva <fernando99gabriel@gmail.com>
 */
class Core {

	public function index(){

		$url="/";

		$params = array();

		if (isset($_GET['url'])) {
			$url.=$_GET['url'];
		}

		if (!empty($url) && $url !='/') {
			
			$url = explode('/',$url);

			array_shift($url);

			$currentController = $url[0]."Controller";

			array_shift($url);

			if (isset($url[0]) && !empty($url[0])) {

				$currentAction = $url[0];
				array_shift($url);

			}else{

				$currentAction = "index";

			}
			if (count($url)>0) {

				$params = $url;
			}



		}
		else{

			$currentController = "homeController";
			$currentAction = "index";


		}

		if (class_exists($currentController)) {

			$controller = new $currentController;
		}
		else{
			$controller = new homeController();
		}
		

		$metodo = array(
			$controller,
			$currentAction
		);
		$metodo2 = array(
			$controller,
			"index"
		);

	
			
		/*	print_r($url);
			echo "<br>".$currentController."<br>";
			echo $currentAction."<br>";
			print_r($params);*/

		if (!method_exists($controller,$currentAction)) {
			
			call_user_func_array($metodo2, $params);
		}
		else{
			call_user_func_array($metodo, $params);
		}


	}
	
	
}