<?php 
//complete code models/Table.class.php

class Table{
	protected $db;
	
	public function __construct($db){
		//store the received connection in the $this->db property
		$this->db = $db;
	}
	
	
	protected function makeStatement($sql,$data=NULL){
		$statement = $this->db->prepare($sql);
		try{
			$statement->execute($data);
		}catch (Exception $e){
			$exceptionMessage = "<p>You tried to run this sql: $sql</p>
			<p>Exception: $e</p>";
			trigger_error($exceptionMessage);
		}
		return $statement;
	}	
}



?>