<?php 	

	namespace X\Sys;

	/**
	*
	*@author Aitor
	*
	* Model, clase padre para los modelos
	*
	**/

	Class Model{

		protected $db;
		protected $stmt;

		public function __construct(){
			$this->db=DB::singleton();
			echo "A--";
			var_dump($this->db);
		}
		//Funcion que ejecuta una funcion SQL y devuelve un objeto PDO
		public function query($sql)
		{
			$this->stmt=$this->db->prepare($sql);
		}

		//Funcion que vincula un valor a un parametro
		public function bind($param,$value,$type=null)
		{
			if($type != null)
			{
				$this->stmt->bindValue($param,$value,$type);
			}
			else
			{
				if(is_int($value))
				{
					$type=\PDO::PARAM_INT;
					$this->stmt->bindValue($param,$value,$type);
				}
				else if(is_bool($value))
				{
					$type=\PDO::PARAM_BOOL;
					$this->stmt->bindValue($param,$value,$type);
				}
				else if(is_null($value))
				{
					$type=\PDO::PARAM_NULL;
					$this->stmt->bindValue($param,$value,$type);
				}
				else 
				{
					$type=\PDO::PARAM_STR;
					$this->stmt->bindValue($param,$value,$type);
				}
			}
		}

		//Funcion que ejecuta una sentencia preparada
		function execute()
		{
			return $this->stmt->execute();
		}

		//Convierte el resultado de la sentencia en un array
		function resultSet()
		{
			$result = $this->stmt->fetchAll(\PDO::FETCH_ASSOC);
			var_dump($result);
			return $result;
		}

		//Lo mismo que la anterior, pero solo devuelve un resultado
		function single()
		{
			$result = $this->stmt->fetch(\PDO::FETCH_ASSOC);
			return $result;
		}

		//Devuelve el numero de filas afectadas por la sentencia
		function rowCount()
		{
			$count = $this->stmt->rowCount();
			return $count;
		}

		//Devuelve el ultimo id
		function lastInsertId()
		{
			return $this->stmt->lastInsertId(); 
		}
		//Inicia una transaccion
		function beginTransaction()
		{
			$this->stmt->beginTransaction(); 
		}
		//Termina una transaccion
		function endTransaction()
		{
			$this->stmt->commit(); 
		}
		//cancela una transaccion
		function cancelTransactio()
		{
			$this->stmt->rollback(); 
		}
		//Vuelca un comando preparado de SQL
		function debugDumpParams()
		{
			$this->stmt->debugDumpParams();
		}
	}