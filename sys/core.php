<?php 

	namespace X\Sys;
	/**
	*
	*@author: Aitor 
	*
	* Core, clase que recoge la ruta y la separa por controlador, accion y parametros, gracias a la classe request.
	* Y rutea automaticamente hacia ese controlador.
	*
	*
	**/

	use X\Sys\Request;
	use X\Sys\Session;

	class Core{

		static private $controller;
		static private $action;
		static private $params;

		public static function init(){
			Session::init();

			Request::exploding();
			//$array_query prepatat per extreure controlador

			self::$controller=Request::getVariable();
			//echo self::$controller.'<br/>';
			self::$action=Request::getVariable();
			//echo self::$action.'<br/>';
			self::$params=Request::getParams();
			echo '<br/><br/>Prueba Core 1, resultado de recoger los valores del request: <br/>Controlador: '.self::$controller.' <br/>Accion: '.self::$action.'<br/> Parametros: ';
			var_dump(self::$params);
			//Fer routung
			self::router();
		}
		/**
		* route: Looks for controller and action
		*
		*
		*
		*/


		static function router(){

			//si no hi ha controller busquem 'home'
			self::$controller=(self::$controller!="")?self::$controller:'home';
			//si no hi ha action busquem 'home'
			self::$action=(self::$action!="")?self::$action:'home';
			//trobar controladors
			$filename=strtolower(self::$controller).'.php';
			$fileroute=APP.'controllers'.DS.$filename;
			
			if(is_readable($fileroute)){
				$contr_class='\X\App\Controllers\\'.ucfirst(self::$controller);
				self::$controller=new $contr_class(self::$params);
				// cal cridar ara l'accio
				if(is_callable(array(self::$controller,self::$action))){

					call_user_func(array(self::$controller,self::$action));
				}else{

					echo '<br/><br/>Prueba Core 2: '.self::$action.':Mètode inexistent';

				}

			}else{

				echo '<br/><br/>Prueba Core 3: '. self::$controller.': Controlador inexistent';
			

			}
		}

	}