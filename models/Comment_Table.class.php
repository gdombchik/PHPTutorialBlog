<?php 
//complete code listing for models/Comment_Table.class.php

//include parent class definition
include_once "models/Table.class.php";

class Comment_Table extends Table{
	
	public function saveComment($entryId,$author,$txt){
		$sql = "Insert into comment (entry_id,author,txt) values (?,?,?);";
		$data = array($entryId,$author,$txt);
		$entryStatement = $this->makeStatement($sql,$data);
		return $this->db->lastInsertId();
	}
	
	public function getAllById($id){
		$sql = "Select author,txt,date FROM comment 
				Where entry_id = ? 
				Order By comment_id DESC;";
		//echo $sql;
		$data = array($id);
		$statement = $this->makeStatement($sql,$data);
		return $statement;
	}

}
	
?>