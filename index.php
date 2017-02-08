<?php
	/**
	*
	* @author Aitor
	* Index, pagina principal del framework que llama ha todos los ficheros.
	*
	**/

	// developer mode
	error_reporting(E_ALL);
	ini_set('display_errors',1);
	//llamamos al fichero de configuracion
	require_once 'x.inc.php';
	//Usamos la clase Autoload y la clase Core.
	use \X\Sys\Autoload;
	use \X\Sys\Core;
	
	//Creamos un nuevo autoload
	$loader=new Autoload();
	//Creamos un registro
	$loader->register();
	//Añadimos los namespaces que vamos a utilizar
	$loader->addNamespace('X\Sys','sys');
	$loader->addNamespace('X\App','app');
	$loader->addNamespace('X\App\Controllers','app/controllers');
	$loader->addNamespace('X\App\Models','app/models');
	$loader->addNamespace('X\App\Views','app/views');

	
	//Iniciamos el core
	Core::init();