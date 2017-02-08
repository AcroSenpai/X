<?php 
	
	/**
	*
	* @author: Aitor
	* X.inc, fichero donde incluimos el autoload y creamos palabras clave.
	*
	**/
	//Determinamos su namespace
	namespace X;
	//incluimos el autoload
	require_once __DIR__.'/sys/autoload.php';


	//Definimos diferentes palabras clave para el uso de rutas.
	define('DS',DIRECTORY_SEPARATOR);
	define('ROOT', realpath(__DIR__).DS);
	//to acces to filesystem
	define('APP', ROOT.'app'.DS);
	define('APP_W', dirname($_SERVER['PHP_SELF']).DS);
	//CSS, nos crea la ruta automaticamente hacia la carpeta css
	define('CSS', APP_W.DS.'pub'.DS.'css'.DS);

