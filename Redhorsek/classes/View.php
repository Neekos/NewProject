<?
	
	/**
	* 
	*/
	class View extends Apage
	{
		
		public function get_one($id){
			parent::get_one($id);
			return $this->text;

		}
	}
?>