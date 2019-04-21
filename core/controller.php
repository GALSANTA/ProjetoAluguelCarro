<?php 
/**
 * Classe Home
 *
 *Esta classe é responsavel por organizar o template e os html
 *
 *
 *@package AluguelCarros
 *
 *@author Fernando Gabriel M. da Silva <fernando99gabriel@gmail.com>
 */
class Controller{


	public function loadTemplate($viewName,$viewData = array()){

		require 'views/template.php';
	}
	public function loadViewInTemplate($viewName,$viewData = array()){
		extract($viewData);
		require 'views/'.$viewName.'.php';
	}




}
