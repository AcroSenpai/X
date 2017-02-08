<?php 
	namespace X\App\Controllers;

	use X\Sys\Controller;

	class Home extends Controller{

   	
   		public function __construct($params){
   			
            parent::__construct($params);
            $this->addData(array(
               'page'=>'Home'));
            $this->model=new \X\App\Models\mHome();
            $this->view =new \X\App\Views\vHome($this->dataView,$this->dataTable);    
            echo "<br/>";
            var_dump($this->model);
           
   			echo '<br/><br/>Prueba Controlador 1, datos enviados a la View:';
            var_dump($this->view);
   		}

   		function home(){
             
              $data=$this->model->get_stories();
            $this->addData($data);
   			  $this->view->__construct($this->dataView,$this->dataTable);
            $this->view->show();
   		}
   }
