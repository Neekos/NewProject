<?php 
	/**
	* 
	*/
	class ClassName extends DB
	{

		function __construct()
		{
			parent::connect();
		}

		public function get_one($id){
			
			$this->text = $this->connection->get_one_db($id);
		}
		
	}

 ?>