<?php 

namespace X\App\Views;

use X\Sys\View;

Class vHome extends View{

		function __construct($dataView){
			parent::__construct($dataView);
			echo '<br/><br/>Prueba View 1, paso de datos correcto:';
			var_dump($dataView);
			//uso de la funcion render del padre para cargar la template
			echo $this->render('thome.php');
		}
	}