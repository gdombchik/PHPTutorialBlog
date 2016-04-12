<?php 
//complete code listing for models/Blog_Entry_Table.class.php

class Blog_Entry_Table {
	private $db;
	
public function __construct($db){
		//store the received connection in the $this->db property
		$this->db = $db;
	}
	
	public function saveEntry($title,$entry){
		$sql = "Insert into blog_entry (title,entry_text) values (?,?);";
		$data = array($title,$entry);
		$entryStatement = $this->makeStatement($sql,$data);
		return $this->db->lastInsertId();
		/*
		 * Note the lastInsertId() method. It is a standard PDO method that 
		 * can often be very handy. It does what you would expect: it returns 
		 * the id of the most recently inserted row. All it requires is that the 
		 * table in question be created with an auto-incrementing primary key.
		 */
	}
	
	public function getAllEntries(){
		$sql = "Select entry_id,title,substring(entry_text,1,150) as intro From blog_entry";
		$statement = $this->makeStatement($sql);
		return $statement;	
	}
	
	public function getEntry($id){
		$sql = "Select entry_id,title,entry_text,date_created From blog_entry Where entry_id = ?";
		$statement = $this->db->prepare($sql);
		$data = array($id);
		$statement = $this->makeStatement($sql,$data);
		$model = $statement->fetchObject();
		return $model;
	}
	
	public function deleteEntry($id){
		$sql = "Delete from blog_entry where entry_id = ?";
		$data = array($id);
		$statement = $this->makeStatement($sql,$data);
	}
	
	public function updateEntry($id,$title,$entry){
		$sql = "Update blog_entry
				Set title = ?,
				entry_text = ?
				where entry_id = ?";
		$data = array($title,$entry,$id);
		$statement = $this->makeStatement($sql,$data);
		return $statement;
	}
	
	private function makeStatement($sql,$data=NULL){
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