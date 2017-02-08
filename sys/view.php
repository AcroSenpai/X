<?php 	

	namespace X\Sys;

	/**
	*
	*@author Aitor
	*
	* View, clase padre para las vistas
	*
	**/

	Class View extends \ArrayObject{

		protected $output;
		protected $dataTable;
		//funcion para contruir la clase, a la cual le pasamos los datos de la vista
		public function __construct($dataView, $dataTable=null){
			//llamamos a la funcion contruct del padre, pasandole los datos de la vista
			parent::__construct($dataView,\ArrayObject::ARRAY_AS_PROPS);
			if ($dataTable!=null){
				$this->dataTable=$dataTable;
			}
			
		}
		//funcion para renderizar las plantillas
		public function render($fileview){
			ob_start();
	 		include APP.'tpl'.DS.$fileview;
	 		return ob_get_clean();
		}

		function show(){
			echo $this->output;
		}
	}