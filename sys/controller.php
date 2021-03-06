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
		protected $dataView=array();// mechanism for passing data to views
		protected $dataTable=array();
		protected $conf; //object configuration data
		protected $app; //app version and title data

		//funcion generica para construir un controlador, a la cual le pasamos los parametros y la view.
		function __construct($params=null,$dataView=null){
			//guardamos los datos
			$this->params=$params;
			//guardamos la configuracion en una instancia del registry
			$this->conf=Registry::getInstance();
			$this->app=(array)$this->conf->app;
			$this->addData($this->app);
		}

/**
		 *   Merge two arrays
		 * 
		 *   Merge arrays in dataView array
		 * 	to use then lika variables in the template
		 *   @param array $array
		 * 
		 * 
		 * */
		protected function addData($array)
		{
			if (is_array($array))
			{
				if ($this->is_single($array)&& is_array($this->dataView))
				{
					$this->dataView=array_merge($this->dataView,$array);
				}
				else
				{
					$this->dataTable=$array;
				}
			}
			else
			{
				$this->dataView=$array;
			}
		}
		/**
		 *  convert rows form multiple row array to  linnear
		 *  array data
		 * @param $mdata  array
		 * @return $result array
		 * 
		 * 
		 * */
		protected function multipleData($mdata)
		{
			//
			for($i=0;$i<count($mdata);$i++)
			{
				foreach ($mdata[$i] as $key => $value) 
				{
					$result[$key.$i]=$value;
				}
			}
			return $result;
		}
		/**
		 *  Checks if array is single or multidimensional
		 *  @param $data array
		 * 	@return boolean
		 * 
		 * */
		protected function is_single($data)
		{
			foreach ($data as  $value) 
			{
				if (is_array($value))
				{
					return false;
				} 
				else 
				{
					return true;
				}
			}
		}
				
		
		function error()
		{
            $this->msg='Error. Action not defined';
        }

		function ajax($output)
		{

			ob_clean();
			if (is_array($output)) 
			{
					echo json_encode($output);
			}

		}

	}