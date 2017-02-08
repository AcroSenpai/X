<?php 

namespace X\App\Models;

use X\Sys\Model;

Class mHome extends Model
{

		public function __construct()
		{
			parent::__construct();
			
		}

		function get_stories()
		{
			$this->query('Select * From stories');
            $this->execute();
	           $res=$this->execute();
				if($res){
					$result=$this->resultset();
								
				}else {$result=null;}
				return $result;
		}
}