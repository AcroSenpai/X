<?php 

	namespace X\Sys;
	use \X\Sys\Registry;
	/**
	*
	* @author Aitor
	* Controller, controlado base del sistema MVC.
	*	
	*
	*
	*
	**/

	class Controller{

		protected $model;
		protected $view;
		protected $params;
		protected $dataView;
		protected $conf;

		//funcion generica para construir un controlador, a la cual le pasamos los parametros y la view.
		function __construct($params,$dataView=null){
			//guardamos los datos
			$this->dataView=$dataView;
			$this->params=$params;
			//guardamos la configuracion en una instancia del registry
			$this->conf=Registry::getInstance();
		}


		function ajax($output){

			ob_clean();
			if (is_array($output)) {
					echo json_encode($output);
			}

		}

	}