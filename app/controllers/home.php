<?php 
	namespace X\App\Controllers;

	use X\Sys\Controller;

	class Home extends Controller{

   	
   		public function __construct($params){
   			parent::__construct($params);
            $this->dataView=array(
               'title'=>'Home',
               'name'=>'Soy Home');
   			$this->model=new \X\App\Models\mHome();
   			$this->view =new \X\App\Views\vHome($this->dataView);
            echo '<br/><br/>Prueba Controlador 1, datos enviados a la View:';
            var_dump($this->view);
   		}

   		function home(){
   			
   		}
   }
